<?php

namespace OrionMedical\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use OrionMedical\Models\Customer;
use OrionMedical\Models\Prescription;
use OrionMedical\Models\Consultation;
use OrionMedical\Models\Bill;
use OrionMedical\Models\Gender;
use OrionMedical\Models\AccountType;
use OrionMedical\Http\Requests;
use OrionMedical\Models\User;
use OrionMedical\Http\Controllers\Controller;
use Input;
use Response;
use Activity;
use Auth;
use OrionMedical\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Image;
use Carbon\Carbon;
use Cache;




class KYCController extends Controller
{

    //  public function __construct()
    // {

    //     $this->middleware('role:Receptionist');
  
    // }

  public function __construct()
    {
        $this->middleware('auth');
    }
 
   public function getPatientProfile($id)
   {

     $users =  User::all();
    $gender =  Gender::get();
    $accounttype = AccountType::orderBy('type', 'ASC')->get(); 
    $customers =  Customer::where('id' ,'=', $id)->get();
    return view('customer.profile', compact('customers'));

   }

   public function getPatientTimeline()
   {
     $accounttype = DB::table('account_types')->orderBy('type', 'ASC')->get(); 
     return view('customer.timeline');

   }
     
    public function activepatients()
    {
     
     $users =  User::all();
    $gender =  Gender::get();
    $accounttype = AccountType::orderBy('type', 'ASC')->get(); 
    $customers =  Customer::paginate(30);
    return view('customer.index', compact('customers','accounttype','users','gender'));
   
  
    }

    public function inactivepatients()
    {
    
    }

  
  public function getSearchResults(Request $request)
    {
      

        $this->validate($request, [
            'search' => 'required'
        ]);

        $search = $request->get('search');

        $customers = Customer::where('fullname', 'like', "%$search%")
            ->orWhere('mobile_number', 'like', "%$search%")
            ->orWhere('account_number', 'like', "%$search%")
            ->orderBy('fullname')
            ->paginate(30)
            ->appends(['search' => $search])
        ;


        return view('customer.index', compact('customers'));
  
    }

function generateCustomerID($length)
{
    $number = '';

    do {
        for ($i=$length; $i--; $i>0) {
            $number .= mt_rand(0,9);
        }
    } while ( !empty(Customer::where('id', $number)->first(['id'])) );

    return $number;
}

    
    public function postNewCustomer(Request $request)
    {
        

        try
        {

            $this->validate($request, [
            'fullname'=> 'required|min:3',
            'date_of_birth'=> 'required',
            'postal_address'=> 'required|min:3',
            'email'=> 'required|email|max:255',
            'mobile_number'=>'required|min:10',
            'account_manager'=>'required',
            ]); 

             $genaccountnumber = $this->generateCustomerID(10);

            $filename=null;
          if($request->hasFile('image'))
            {
           $image = Input::file('image');
           $profile= $genaccountnumber;
           $filename = $profile. '.' . $image->getClientOriginalExtension();
           $path = public_path('images/' . $filename);
           Image::make($image->getRealPath())->resize(200, 200)->save($path); 
            }
            else
            {
              $filename  = 'avatar_default.jpg';
            }

           

           $customer = new Customer;
      	   $customer->account_number  = $genaccountnumber;
           $customer->fullname = $request->input('fullname');
           $customer->account_manager = $request->input('account_manager');
           $customer->postal_address = $request->input('postal_address');
           $customer->residential_address = $request->input('residential_address');
           $customer->email = $request->input('email');
           $customer->mobile_number = $request->input('mobile_number');
           $customer->date_of_birth = Carbon::createFromFormat('d/m/Y', $request->input('date_of_birth'));
           $customer->field_of_activity = $request->input('field_of_activity');
           $customer->gender = $request->input('gender');
           $customer->sales_channel = $request->input('sales_channel');
           $customer->account_type = $request->input('account_type');
           $customer->image = $filename;
           $customer->created_on=Carbon::now();
           $customer->last_updated_on=Carbon::now();
           $customer->created_by=Auth::user()->getNameOrUsername();
           
           if($customer->save())
          {

            

           Activity::log([
          'contentId'   =>  $request->input('account_number'),
          'contentType' => 'User',
          'action'      => 'Create',
          'description' => 'Customer '.$request->input('account_number').' - '.$request->input('fullname').' was registerd successfully!',
          'details'     => 'Username: '.Auth::user()->getNameOrUsername(),
          ]);


              $data = array(
            'fullname' => $request->input('fullname'),
           );


            

            Mail::queue('email.welcome', $data, function($message)
            {
                $message->to('echo.jasonkerr7@gmail.com', 'Jason')->subject('Welcome!');
            });
        
            return redirect()
            ->route('active-customer')
            ->with('success','Account has successfully been created!');
          }

          else
          {

             return redirect()
            ->route('active-customer')
            ->with('error','Account failed to create!');
          }

}

    catch (\Exception $e) {
           
           echo $e->getMessage();
            return redirect()
            ->route('active-customer')
            ->with('error','Account failed to create!');
          
        }

    }



public function updateCustomer()
    {

      try {
        
            //dd(Input::hasFile('image'));
          if(Input::hasFile('image'))
            {
           $image = Input::file('image');
           $profile = Input::get("account_number");
           $filename = $profile. '.' . $image->getClientOriginalExtension();
           $path = public_path('images/' . $filename);
           Image::make($image->getRealPath())->resize(200, 200)->save($path); 
            }
            else
            {
              $filename  = 'avatar_default.jpg';
            }

            $account_number = Input::get("account_number");
            $fullname = Input::get("fullname");
            $account_manager = Input::get("account_manager");
            $residential_address = Input::get("residential_address");
            $postal_address = Input::get("postal_address");
            $email = Input::get("email");
            $mobile_number = Input::get("mobile_number");
            $field_of_activity = Input::get("field_of_activity");
            $date_of_birth = Carbon::createFromFormat('d/m/Y', Input::get('date_of_birth'));
            $sales_channel = Input::get('sales_channel');
            $gender = Input::get('gender');




             $affectedRows = Customer::where('account_number', '=', $account_number)
            ->update(array(
                           
                           'fullname' =>  $fullname,
                           'account_manager' =>  $account_manager,
                           'residential_address' => $residential_address, 
                           'postal_address' => $postal_address, 
                           'email' => $email, 
                           'mobile_number' =>  $mobile_number, 
                           'field_of_activity'=>$field_of_activity,
                           'date_of_birth'=>$date_of_birth,
                           'sales_channel' => $sales_channel,
                           'gender'=> $gender,
                           'image'=>$filename,
                          'last_updated_on'=>Carbon::now()));

            if($affectedRows > 0)
            {
                Activity::log([
          'contentId'   =>  $account_number,
          'contentType' => 'User',
          'action'      => 'Update',
          'description' => 'Updated details of '.$fullname,
          'details'     => 'Username: '.Auth::user()->getNameOrUsername(),
          ]);
        
             
              return redirect()
            ->route('active-customer')
            ->with('success','Customer has successfully been updated!');
            }
            else
            {
               return redirect()
            ->route('active-customer')
            ->with('error','Customer failed to update!');
            }
          }


    catch (\Exception $e) {
           
           echo $e->getMessage();
            
        }
           

    }



   



    public function editCustomer()
    {

    $user_id = Input::get('id');
    $user = Customer::find($user_id);
    $data = Array(
        'account_number'=>$user->account_number,
        'account_type'=>$user->account_type,
        'fullname'=>$user->fullname,
        'residential_address'=>$user->residential_address,
        'postal_address'=>$user->postal_address,
        'date_of_birth'=>$user->date_of_birth->format('d/m/Y'),
        'email'=>$user->email,
        'field_of_activity'=>$user->field_of_activity,
        'image'=>$user->image,
        'mobile_number'=>$user->mobile_number,
        'account_manager'=>$user->account_manager,
        'sales_channel'=>$user->sales_channel,
        'gender'=>$user->gender,
        'image'=>$user->image
        
       
         

    );
    return Response::json($data);
    } 

   

  public function activatePatient()
    {
       
         
            $userid = Input::get("ID");

            $affectedRows = Customer::where('id', '=', $userid)->update(array('status' => 'Active'));

            if($affectedRows > 0)
            {
                //SEND EMAIL 
                //SEND SMS

                $ini = array('OK'=>'OK');
                return  Response::json($ini);
            }
            else
            {
                $ini = array('No Data'=>'No Data');
                return  Response::json($ini);
            }
    }



    public function deactivatePatient()
    {
       
         
            $userid = Input::get("ID");

            $affectedRows = Customer::where('id', '=', $userid)->update(array('status' => 'Deactive'));

            if($affectedRows > 0)
            {
                //SEND EMAIL 
                //SEND SMS
                $ini = array('OK'=>'OK');
                return  Response::json($ini);
            }
            else
            {
                $ini = array('No Data'=>'No Data');
                return  Response::json($ini);
            }
    }


    



}
