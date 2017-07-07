<?php

namespace McPersona\Http\Controllers;

use Illuminate\Http\Request;

use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;

class EmailController extends Controller
{
    

    public function probation(Request $request)
    {
        // $title = $request->input('title');
        // $content = $request->input('content');

        // Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        // {

        //     $message->from('me@gmail.com', 'Christian Nwamba');

        //     $message->to('chrisn@scotch.io');

        // });

        // return response()->json(['message' => 'Request completed']);
    }

}
