<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;
use McPersona\Models\Image;
use McPersona\Models\Employee;
use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Response;
use Carbon\carbon;
use Auth;


class ImageController extends Controller
{
    public static function bytesToHuman($bytes)
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function updatePicture(Request $request)
    {

            //dd($request->input('selectedid'));

          if($request->hasFile('image'))
           {


           $image = $request->file('image');
           $profile = $request->input('selectedid');
           $filename = $profile. '.jpg';
           $file = $image->move(public_path().'/images',$filename);
           //Image::make($image->getRealPath())->resize(200, 200)->save($path);

            $affectedRows = Employee::where('staff_id','=',$profile)->update(array('image' =>  $filename));

           if($affectedRows > 0)
          {
              return redirect()
            ->route('new-employee', $profile )
            ->with('info','Photo uploaded successfully!');
          }

            else
            {
              return redirect()
            ->route('new-employee',$profile )
            ->with('error','Photo failed to upload!');
            
            }

            }

           
    }


    public function postUpload(Request $request)
    {

          try
        {
        

        $image = new Image();
        $this->validate($request, [
            'image' => 'required',
            'filename' => 'required'
        ]);

       // dd(Input::get('selectedid'));
    
        $image->staff_id=Input::get('selectedid');
        $image->filename = Input::get('filename');
        $image->created_on = Carbon::now();

        //dd(Input::file('image'));
        if($request->hasFile('image')) 
        {
            $file = Input::file('image');

            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
           
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $image->original_name = $file->getClientOriginalName();
            $image->filepath = $name;
            $image->created_by=Auth::user()->getNameOrUsername();
           $file = $file->move(public_path().'/uploads/images', $name);
            //Image::make($image->getRealPath())->resize(200, 200)->save($name); 
        }

        $image->save();
        return redirect()
            ->back()
            ->with('info','Document has successfully been uploaded!');
        }

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('account.manage')
            // ->with('info','No document was added!',$e->getMessage());
        }
    }

   
}
