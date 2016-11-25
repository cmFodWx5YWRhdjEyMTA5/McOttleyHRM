<?php

namespace OrionMedical\Http\Controllers;

use Illuminate\Http\Request;

use OrionMedical\Http\Requests;
use OrionMedical\Http\Controllers\Controller;

use OrionMedical\Models\Discipline;
use OrionMedical\Models\Employee;

class DisciplineController extends Controller
{
    
    public function casesPending()
    {
        $employees  = Employee::get();
        $cases      = Discipline::paginate();
        return view('discipline.index', compact('cases','employees'));
    }


}
