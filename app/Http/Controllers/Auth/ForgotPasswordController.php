<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

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

    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.auth.passwords.email')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // public function sendResetLinkEmail(Request $request)
    // {
    //     $this->validateEmail($request);
    
    //     $this->broker()->emailView = 'emails.qqforgot_password'; // Update with your custom view name
    //     $this->broker()->emailSubject = 'Custom Password Reset Email Subject'; // Update with your custom subject
    //     // Use the email address from the $request
    //     $email = $request->input('email');
    //     $response = $this->broker()->sendResetLink(['email' => $email]);
    
    //     return $response == Password::RESET_LINK_SENT
    //         ? $this->sendResetLinkResponse($response)
    //         : $this->sendResetLinkFailedResponse($response);
    // }

    // protected function sendResetLinkResponse($response)
    // {
    //     return back()
    //         ->with('status', trans($response));
    // }

    public function showresetConfirmForm(Request $request, $token)
    {
        return view('admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
