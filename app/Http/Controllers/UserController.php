<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private User $user;

     public function __construct(User $user)
     {
         $this->userData = $user;
         session_start();
     }

    private function userValidationMessages(Request $request, $rules = array())
    {

        $messages = [
            'name.required' => 'Please enter a name',
            'name.min' => 'Username must be at least 3 characters',
            'name.max' => 'Username cannot exceed 80 characters',
            'email.required' => 'Please enter an email address',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'The email address is already taken',
            'mobile_number.required' => 'Please enter a mobile number',
            'mobile_number.validMobile' => 'Please enter a valid mobile number',

            'password.required' => 'Please enter a password',
            'password.min' => 'Password must be at least 8 characters',
            'confirm_password.required' => 'Please confirm your password',
            'confirm_password.same' => 'Passwords do not match',
            'status.required' => 'Please select a status',
            'profile_image.image' => 'The selected file must be an image (JPEG,PNG,JPG).',
            'profile_image.mimes' => 'Only JPEG, PNG, and JPG images are allowed.',
            'profile_image.max' => 'The image size must not exceed 4MB.',
        ];

        return $this->validate($request, $rules, $messages);
    }
    public function index()
    {
        $data['roles'] = Role::all();
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Validator::extend('validMobile', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^(?!0+$)\d{10}$/', $value);
        }, 'Please enter a valid mobile number');

        $rules = [
            'name' => 'required|min:3|max:80',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|validMobile',
            'user_role' => 'nullable',
            'password' => 'required|min:8|max:15',
            'confirm_password' => 'required|same:password',
            'status' => 'required',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ];

        $this->userValidationMessages($request, $rules);

        $input = $request->only(['name', 'email', 'status']);
        $input['mobile'] = $request->input('mobile_number');
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/uploads/profile_image'), $filename);
            $input['profile_image'] = $filename;
        }
        $input['role_id'] = $request->user_role;
        $input['password'] = Hash::make($request->input('password'));
        try {
            $user = User::create($input);
            $data = ([
                'subject' => "Welcome to Neork.",
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->input('password'),
            ]);
            Mail::send('emails.user_invitation', $data, function ($message) use ($data) {
                $message->to($data['email'])
                    ->subject('Welcome to Neork.');
            });

            Mail::send('emails.admin_registration_notification', $data, function ($message) use ($data) {
                $message->to(env('MAIL_FROM_ADDRESS'))
                    ->subject('New User Registration Notification');
            });

        } catch (\Exception $e) {
            return redirect()->route('users')->with('error', 'Somthing went wrong.');

        }
        return redirect()->route('users')->with('success', 'New User successfully added.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = Crypt::decrypt($request->user_id);
        Validator::extend('validMobile', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^(?!0+$)\d{10}$/', $value);
        }, 'Please enter a valid mobile number');

        $rules = [
            'name' => 'required|min:3|max:80',
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'required|validMobile',

            'user_role' => 'nullable',
            'status' => 'required',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',

        ];

        $this->userValidationMessages($request, $rules);

        $input = $request->only(['name', 'email', 'status']);
        $input['role_id'] = $request->user_role;
        $input['mobile'] = $request->input('mobile_number');

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('admin/assets/uploads/profile_image'), $filename);
            $input['profile_image'] = $filename;
        } elseif ($request->remove_profile_image == 1) {
            $input['profile_image'] = null;

        }

        try {

            $user = User::find($id);

            $user->update($input);

        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('users')->with('error', 'Something went wrong.');

        }
        return redirect()->route('users')->with('success', 'User successfully Updated.');}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {

            $id = Crypt::decrypt($request->user_id);
            $user = User::find($id);
            if (!$user) {
                return redirect()->route('users')->with('error', "User not found");
            } else {
                $user->delete();
            }
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('users')->with('error', 'Something went wrong.');

        }
        return redirect()->route('users')->with('success', 'User successfully deleted.');

    }

    public function check_email_unique(Request $request)
    {
        $user = new User;
        $user_details = $user->check_email_unique($request->email, $request->id);
        (count($user_details) > 0) ? $data['status'] = 1 : $data['status'] = 0;
        return json_encode($data);
    }

    public function get_user_list(Request $request,$is_list)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        if (isset($search_arr['value'])) {
            $_SESSION['searchValUser'] = $search_arr['value'];
        } else if (isset($_SESSION['searchValUser'])) {
            $search_arr['value'] = $_SESSION['searchValUser'];
        }

        $searchValue = $search_arr['value'];

        if (empty($columnIndex_arr)) {
            $columnName = "id";
            $columnSortOrder = "desc";
        } else {
            // Column index
            $columnIndex = $columnIndex_arr[0]['column'];
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir'];
        }
        $status='';
        if( $search_arr['value'] != '') {
            $_SESSION['searchValUser'] =  $search_arr['value'];
        }
        else if(isset($_SESSION['searchValUser'])){
            $search_arr['value'] = $_SESSION['searchValUser'];
        } 
        $searchValue = $search_arr['value']; // Search value
        $user = new User;
        // Total records
        $totalRecords = $user->get_count();
        $totalRecordswithFilter = $user->get_count($searchValue, $status);
        $records = $user->get_records($columnName, $columnSortOrder, $searchValue, $start, $rowperpage, $status);
        $data_arr = array();

        foreach ($records as $key=> $record) {
            $edit_action = $delete_action = $change_password_btn = '';

            if ($record->id != 1) {

                if (hasPermission('user.update')) {

                    $edit_action = ' <span><a href="#userEditForm" class="edit-item edit_user_btn"  title="Edit"
            data-id="' . Crypt::encrypt($record->id) . '" data-bs-toggle="offcanvas"
            href="#userEditForm" role="button" aria-controls="offcanvasExample1">
            <i class=" icon-close   fas fa-edit"></i></a></span>';
                }

                if (hasPermission('user.destroy')) {

                    $delete_action = '<span> <a
            href="#" class="delete-item delete_user_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="' . Crypt::encrypt($record->id) . '"> <i class="fa fa-close dlt-icon"></i></a></span>';
                }
            }
            if (hasPermission('user.changepassword')) {

                $change_password_btn = '<span> <a href="#"
            class="delete-item change_pass_btn" data-bs-toggle="modal" data-bs-target="#changepassModal" title="Change Password"
            data-id="' . Crypt::encrypt($record->id) . '"><i class="fa fa-unlock-alt"></i></a></span>';
            }
            $data_arr[$key] = array(
                "name" => $record->name,
                "email" => $record->email,
                "mobile" => ($record->mobile) ? $record->mobile : '',

                "role" => ($record->role) ?? '',
                "status" => ($record->status == 1 ? 'Active' : 'Inactive'),

            );
            if ($is_list) {
                $data_arr[$key]['action'] =  $edit_action . ' ' . $delete_action . ' ' . $change_password_btn;
            }
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        );

        return response()->json($response);

    }

    public function getuserDetails(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->user_id);
            $user = User::with('role')->find($id);
            if ($user) {

                return response()->json([
                    'success' => true,
                    'data' => $user,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
            ], 500);
        }
    }

    public function changeuserPassword(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->user_id);
            $user = User::find($id);

            if ($user) {
                $user->password = Hash::make($request->new_password);
                $user->update();

            } else {
                return redirect()->route('users')->with('error', "User not found");

            }
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('users')->with('error', 'Something went wrong.');
        }
        return redirect()->route('users')->with('success', 'User password changed successfully.');

    }

    public function userReport(Request $request)
    {
        $data['roles'] = Role::all();
        return view('admin.users.user_report', $data);

    }

 

}
