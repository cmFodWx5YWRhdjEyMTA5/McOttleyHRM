<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;

use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;
use McPersona\Models\Award;
use McPersona\Models\Employee;
class AwardController extends Controller
{
     public function awardlist()
    {
        $employees  = Employee::get();
        $cases      = Award::paginate(30);
        return view('awards.index', compact('cases','employees'));
    }
}
