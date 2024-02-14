<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


     public function index(){
        
        return view('admin.auth.register');

    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'min:3', 'max:80'],
            'mobile_number' => ['required', 'digits_between:10,20'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:15'],
            'confirm_password' => ['required', 'string', 'same:password'],
        ], [
            'user_name.required' => 'Please enter a username',
            'user_name.min' => 'Username must be at least 3 characters',
            'user_name.max' => 'Username cannot exceed 80 characters',
            'mobile_number.required' => 'Please enter a mobile number',
            'mobile_number.digits_between' => 'Mobile number must be between 10 and 20 digits',
            'email.required' => 'Please enter an email address',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Please enter a password',
            'password.min' => 'Password must be at least 8 characters',
            'password.max' => 'Password cannot exceed 15 characters',
            'confirm_password.required' => 'Please confirm your password',
            'confirm_password.same' => 'Passwords do not match',
        ]);
    
    
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function storeAdmin(Request $request)
    {
        
        // $validation = $this->validator($request->all());
    
        // if ($validation->fails()) {
        //     $errors = $validation->errors()->all();
    
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => implode('<br>', $errors),
        //     ]);
        // }
    
        // $user = User::create([
        //     'name' => $request->input('user_name'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password')),
        //     'mobile_number' => $request->input('mobile_number'),
        // ]);

        
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'User registered successfully',
        // ]);
            
        $this->validate($request, [
            'user_name' => 'required|string|min:3|max:80',
            'mobile_number' => 'required|digits_between:10,20', 
            'email' => 'required|email|unique:users', 
            'password' => 'required|string|min:8|max:15|regex:/(^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$)/',            'confirm_password' => 'required|string|same:password',
            'agree_to_terms' => 'accepted',
        ], [
            'user_name.required' => 'Please enter a username',
            'user_name.min' => 'Username must be at least 3 characters',
            'user_name.max' => 'Username cannot exceed 80 characters',
            'mobile_number.required' => 'Please enter a mobile number',
            'mobile_number.digits_between' => 'Mobile number must be between 10 and 20 digits',
            'email.required' => 'Please enter an email address',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',
            'password.required' => 'Please enter a password',
            'password.min' => 'Password must be at least 8 characters',
            'password.max' => 'Password cannot exceed 15 characters',
            'password.regex' => 'Create a strong password with a mix of letters, numbers, and symbols',
            'confirm_password.required' => 'Please confirm your password',
            'confirm_password.same' => 'Passwords do not match',
            'agree_to_terms.accepted'=>'Please agree'
        ]);
        User::create([
            'name' => $request->input('user_name'),
            'mobile' => $request->input('country_code').' '.$request->input('mobile_number'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status'=>1
            // Additional user attributes
        ]);

        $data = ([
            'subject' => "Welcome to Neork.",
            'name' => $request->user_name,
            'email' => $request->email,
            // 'password' => $random_password,
        ]);
        Mail::send('emails.user_invitation', $data, function($message)use($data) {
            $message->to($data['email'])
            ->subject('Welcome to Neork.');
        });

        Mail::send('emails.admin_registration_notification', $data, function($message)use($data) {          
            $message->to(env('MAIL_FROM_ADDRESS'))
            ->subject('New User Registration Notification');
        });


        return redirect()->back()->with('success', 'User registered successfully.');
    }
}
