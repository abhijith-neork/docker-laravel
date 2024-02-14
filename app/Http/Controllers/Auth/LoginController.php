<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\Recaptcha;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers, ThrottlesLogins;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('admin.auth.login');
    }
    public function adminLogin(Request $request)
    {
        // $this->validate($request, [
        //     'g-recaptcha-response' => ['required', new Recaptcha()],

        // ], [
        //     'g-recaptcha-response.required' => 'Please verify captcha',
        // ]);

        $this->validate($request, [
            'captcha' => 'required|captcha',
        ], [
            'captcha.required' => 'Please enter the captcha',
            'captcha.captcha'  =>' invalid Captcha'
        ]);
        // $request->merge(['status' => 1]);

        $login= Auth::attempt(
            $this->credentials($request) + ['status' => 1],
            $request->filled('remember'));   
            
            if(!$login){
                return $this->sendFailedLoginResponse($request);
            }
            return $this->login($request);

     }

    public function refreshCaptcha()
    {

        return response()->json(['captcha' => captcha_img()]);

    }
}
