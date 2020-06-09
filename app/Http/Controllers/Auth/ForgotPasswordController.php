<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;



    /*
     * call showLinkRequestForm() on the above trait

        which takes the user to view('auth.passwords.email')
    */


    /*
     * Submitted email to reset password is sent to sendResetLinkEmail(Request $request)
     * -This meth validates the email and sends it with a link for the user to reset their password
     *
     */



}
