<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;

use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;
use McPersona\Models\DisciplineActions;
use McPersona\Models\Discipline;
use McPersona\Models\Employee;
use Carbon\Carbon;
use Auth;
use Input;
use Response;

class DisciplineController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
 
    
    public function casesPending()
    {
        $actions    = DisciplineActions::get();
        $employees  = Employee::get();
        $cases      = Discipline::paginate();
        return view('discipline.index', compact('cases','employees','actions'));
    }


      public function createCase(Request $request)
    {

         try
        {
           $employee = new Discipline;
           $employee->staff_id          = $request->input('staff_id');
           $employee->description       = $request->input('description');
           $employee->case              = $request->input('case');
           $employee->created_on        = Carbon::now();
           $employee->created_by        = Auth::user()->getNameOrUsername();
            if($employee->save())
          {

            return redirect()
            ->route('disciplinary-cases')
            ->with('success','Case has uccessfully been created!');
          }

          else
          {

             return redirect()
            ->route('disciplinary-cases')
            ->with('error','Failed to create!');
          }

        }

    catch (\Exception $e) {
           
           echo $e->getMessage();
            // return redirect()
            // ->route('employees')
            // ->with('error','Employee failed to create!');
          
        }
    }


    public function actionCase()
    {
       
         
            $caseid = Input::get("ID");
            $status = Input::get("action");
            $affectedRows = Discipline::where('id', $caseid)->update(array('action' => $status));

            if($affectedRows > 0)
            {
               
                $ini = array('OK'=>'OK');
                return  Response::json($ini);
            }
            else
            {
                $ini = array('No Data'=>'No Data');
                return  Response::json($ini);
            }
    }


    public function deleteCase()
    {

      if(Input::get("ID"))
        {
            $ID = Input::get("ID");
            $affectedRows = Discipline::where('id', '=', $ID)->delete();

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

     public function templateVerbWarning()
    {
       
        $documents = PublishedDocuments::where('id','24')->first();
        return view('discipline.template', compact('documents'));
    }



      public function addCaseComment()
    {       
        
        $id = Input::get("ID");
        $comment = Input::get("comment");


            $affectedRows = Discipline::where('id', '=', $id)->update(array('status' => $comment));

            if($affectedRows > 0)
            {

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
