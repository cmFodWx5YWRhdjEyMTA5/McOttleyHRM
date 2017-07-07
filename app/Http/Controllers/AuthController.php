<?php

namespace McPersona\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use McPersona\Models\User;
use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\CanResetPassword;
use DB;
use Input;
use Response;
use McPersona\Models\Role; 
use McPersona\Models\AuditTrails; 
use McPersona\Models\Employee; 


class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $redirectTo = '/';



    public function postSignup(Request $request)
    {
        $this->validate($request, [
                'email'=> 'required|unique:users|email|max:255',
                'username'=> 'required|unique:users|alpha_dash|max:20',
                'password' => 'required|same:password_confirmation',
                'password_confirmation' => 'required',
                'fullname'=> 'required|min:3',
                'location'=> 'required|min:2',
                'usertype'=> 'required|min:2',
            ]);

        $assigned_role = $request->input('usertype');

        $user = new User;
        $user->email = strtolower($request->input('email'));
        $user->username = strtolower($request->input('username'));
        $user->password = bcrypt($request->input('password'));
        $user->fullname = $request->input('fullname');
        $user->location = $request->input('location');
        $user->usertype = $request->input('usertype');
        if($user->save())
        {

        $role = Role::where('name','=', $assigned_role)->first();
        $user->attachRole($role);

        return redirect()
            ->route('auth.signup')
            ->with('info','Account has successfully been created!, User can now sign in');
        }
        else
        {
        return redirect()
            ->route('auth.signup')
            ->with('Warning','Account failed to create');
        }
    }


     public function resetPassword(Request $request)
    {
        $this->validate($request, [
                'email'=> 'required|unique:users|email|max:255',
                'password' => 'required|same:password_confirmation',
                'password_confirmation' => 'required',
            ]);

         
            
            $affectedRows = User::where('email', $request->input('email'))->update(array('password' =>  bcrypt($request->input('password'))));

            if($affectedRows > 0)
            {
               
                return redirect()
            ->route('/signin')
            ->with('info','Password has successfully been updated!, User can now sign in');
            }
            else
            {
                return redirect()
            ->route('/signin')
            ->with('Warning','Password failed to update');
            }

    }


    public function findUser(Request $request)
    {
      

        $this->validate($request, [
            'search' => 'required'
        ]);

        $search = $request->get('search');

        $users =            User::where('fullname', 'like', "%$search%")
            ->orderBy('fullname')
            ->paginate(30)
            ->appends(['search' => $search])
        ;
     return view('auth.user',compact('users'));
  
    }


    Public function getAudit()
    {
        $audits = AuditTrails::paginate(30);
        
        return view('auth.audit',compact('audits'));

    }




    public function getSignin()
    {
        return view('auth.signin');
    }

 public function resetnotice()
    {
        return view('auth.notice');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
               
                'username'=> 'required',
                'password'=> 'required',
                
            ]);

        $remember_me = $request->has('remember') ? true : false; 

        if(!Auth::attempt($request->only(['username','password']),$remember_me))
        {
            return redirect()
                    ->back()
                    ->with('error','Invalid Username/Password combination. Please try again');
        }

        //dd(Auth::user()->usertype);


        if(Auth::user()->usertype == 'Staff')
        {
            if(Auth::user()->created_at != Auth::user()->updated_at)
            {
            
            $staffobsid = Employee::where('staff_id',Auth::user()->ref_Code)->first();
            return redirect()
            ->route('employee-profile',$staffobsid->obsid)
            ->with('info','You are now signed in');

            }

            return redirect()
            ->route('reset-password-notice')
            ->with('info','First time login, Please reset your passowrd!!!');

        }

         return redirect()
            ->route('dashboard')
            ->with('info','You are now signed in');

    }

    
public function deleteUser()
    {

        if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = User::where('id', '=', $ID)->delete();

            if($affectedRows > 0)
            {
                $ini   = array('OK'=>'OK');
                return  Response::json($ini);
            }
            else
            {
                $ini   = array('No Data'=>$ID);
                return  Response::json($ini);
            }
        }
        else
        {
           $ini   = array('No Data'=>'No Data');
           return  Response::json($ini);
        }

    }



        public function edit() 
        {
        return view('auth.reset');
        }

     public function getUsers()
    {
        
    $users =  User::paginate(30);
       return view('auth.user', compact('users'));
    }

    public function getSignOut()
    {
        Auth::logout();
        return redirect()
            ->route('auth.signin')
            ->with('info','Please sign in');

    }
}
