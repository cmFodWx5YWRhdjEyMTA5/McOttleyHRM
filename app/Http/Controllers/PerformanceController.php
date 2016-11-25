<?php

namespace OrionMedical\Http\Controllers;

use Illuminate\Http\Request;

use OrionMedical\Http\Requests;
use OrionMedical\Http\Controllers\Controller;

use OrionMedical\Models\Questions;

class PerformanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $partA = Questions::where('section','Part A')->get();
        $partB = Questions::where('section','Part B')->get();
        $partC = Questions::where('section','Part C')->get();
        return view('performancereview.review', compact('partA','partB','partC'));
    }

   
}
