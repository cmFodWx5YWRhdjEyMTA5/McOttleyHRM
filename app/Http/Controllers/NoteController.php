<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;
use McPersona\Models\PublishedDocuments;
use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;
use Carbon\Carbon;

class NoteController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
 
 
    public function index()
    {
        return view('notes.index');
    }

    public function documents()
    {
        $documents = PublishedDocuments::get();
    	return view('documents.index', compact('documents'));
    }

     public function new()
    {
        
        return view('documents.new');
    }

     public function savedocument(Request $request)
    {
          $this->validate($request, [
            'file_name' => 'required'
        ]);

        $result           = $request->input('report');
        $docs             = new PublishedDocuments;
        $docs->file_name   = $request->input('file_name');
        $docs->content    = $request->input('report');
        $docs->save();
        
         return redirect()
            ->route('published-documents')
            ->with('info','Document successfully saved!');
       
    }
    

   
}
