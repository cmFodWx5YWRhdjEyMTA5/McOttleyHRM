<?php

namespace McPersona\Http\Controllers;
use McPersona\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use McPersona\Http\Requests;
use McPersona\Http\Controllers\Controller;

class PasswordController extends Controller
{
     /*
   |--------------------------------------------------------------------------
   | Password Reset Controller
   |--------------------------------------------------------------------------
   |
   | This controller is responsible for handling password reset requests
   | and uses a simple trait to include this behavior. You're free to
   | explore this trait and override any methods you wish to tweak.
   |
   */

   use ResetsPasswords;

    // public function __construct()
    // {

    //     $this->middleware('auth');
    // }



}
