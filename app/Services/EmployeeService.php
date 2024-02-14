<?php

namespace App\Services;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use App\Models\EmployeeBasicInfo;
use App\Models\EmployeeDocument;
use App\Models\EmployeeEducation;
use App\Models\EmployeeExperience;
use App\Models\EmployeeLeaveDetail;
use App\Models\EmployeeProfessionalDetail;
use App\Models\EmployeeSalaryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;
use Validator;

class EmployeeService {
    
    public function addEmployee(Request $request, $id=null) {
        DB::beginTransaction();            
        try {
            $employee = $this->addEmployeeDetail($request, $id);
            DB::commit();

            return $employee;
        } catch (\Exception $e) {
            DB::rollback();
             return [
                'success' => false,
                'message' => $e];
        } 
    }

    private function addEmployeeDetail(Request $request, $id) {
try{
        Validator::extend('validMobile', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^(?!0+$)\d{10}$/', $value);
        }, 'Please enter a valid mobile number');

        $rules = [
            'name' => 'required|min:3|max:80',
            'email' => 'required|email|unique:users',
            'phone' => 'required|validMobile',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ];

        // $this->userValidationMessages($request, $rules);

         if ($id) {
            $id = Crypt::decrypt($id);
            $user = User::where('id',$id)->first();
            $employee = EmployeeBasicInfo::where('user_id',$id)->first()?:new EmployeeBasicInfo();
            $employeeProf = EmployeeProfessionalDetail::where('user_id',$id)->first()?:new EmployeeProfessionalDetail();
            $employeeSal = EmployeeSalaryDetail::where('user_id',$id)->first()?:new EmployeeSalaryDetail();
        } else {
            $input['name'] = $request->first_name." ".$request->last_name;
            $input['mobile'] = $request->input('phone');
            $input['email'] = $request->input('company_mail');
            $input['role_id'] = $request->role_id?$request->role_id:Role::ROLE_EMPLOYEE;
            $new_pass = Str::random(8); 
            $input['password'] = Hash::make($new_pass);
            $user = User::create($input); 
            $data = ([
                'subject' => "Welcome to Neork.",
                'name' => $request->first_name." ".$request->last_name,
                'email' => $request->company_mail,
                'password' => $new_pass,
            ]);

            // if user registration process completed then only send mail to 
            Mail::send('emails.user_invitation', $data, function ($message) use ($data) {
                $message->to($data['email'])
                    ->subject('Welcome to Neork.');
            });

            Mail::send('emails.admin_registration_notification', $data, function ($message) use ($data) {
                $message->to(env('MAIL_FROM_ADDRESS'))
                    ->subject('New User Registration Notification');
            });
            $employee = new EmployeeBasicInfo();
            $employeeProf = new EmployeeProfessionalDetail();
            $employeeSal = new EmployeeSalaryDetail();
            
        }
        $employee_code = "EMP_".$user->id;
        $employee->user_id           = $user->id;
        $employee->first_name           = $request->first_name;
        $employee->last_name           = $request->last_name;
        $employee->employee_code           = $employee_code;
        $employee->gender           = $request->gender;
        $employee->blood_group           = $request->blood_group;
        $employee->marital_status           = $request->marital_status;
        if ($request->file('profile_img')) {
            $file = $request->file('profile_img');
            $filename = date('YmdHi') . $employee_code.".".$file->getClientOriginalExtension();
            $file->move(public_path('admin/assets/uploads/profile_image'), $filename);
            $employee->image  = 'admin/assets/uploads/profile_image/'.$filename;
            $user->profile_image = $filename;
        }
        $user->name =  $request->first_name." ".$request->last_name;
        $user->mobile =  $request->phone;
        $user->save();

        $employee->dob           = date('Y-m-d', strtotime($request->dob));
        $employee->address           = $request->address;
        $employee->email           = $request->email;
        $employee->company_mail           = $request->company_mail;
        $employee->phone           = $request->phone;
        $employee->aadhaar           = $request->aadhaar;
        $employee->emergency_contact_name_1           = $request->emergency_contact_name_1;
        $employee->emergency_contact_relation_1           = $request->emergency_contact_relation_1;
        $employee->emergency_contact_phone_1           = $request->emergency_contact_phone_1;
        $employee->emergency_contact_name_2           = $request->emergency_contact_name_2;
        $employee->emergency_contact_relation_2           = $request->emergency_contact_relation_2;
        $employee->emergency_contact_phone_2           = $request->emergency_contact_phone_2;
        $employee->created_by                 = Auth::user()->id;
        $employee->save();

        if($request->date_of_joining){
            $employeeProf->user_id           = $user->id; 
            $employeeProf->date_of_joining           = date('Y-m-d', strtotime($request->date_of_joining));
            if($request->relieving_date)
                $employeeProf->relieving_date           = $request->relieving_date?date('Y-m-d', strtotime($request->relieving_date)):null;
            if($request->technology)
                $employeeProf->technology_used           = $request->technology;
            $employeeProf->supervisor_id           = $request->supervisor_id;
            $employeeProf->designation_id           = $request->designation_id;
            $employeeProf->created_by                 = Auth::user()->id;
            $employeeProf->save();
        }
        if($request->basic_pay){
            $employeeSal->user_id           = $user->id; 
            $employeeSal->basic_pay           = $request->basic_pay;
            $employeeSal->da           = $request->da;
            $employeeSal->pf_contribution           = $request->pf_contribution;
            $employeeSal->hra           = $request->hra;
            $employeeSal->bank_name           = $request->bank_name;
            $employeeSal->branch           = $request->branch;
            $employeeSal->account_number           = $request->account_number;
            $employeeSal->ifsc           = $request->ifsc;
            $employeeSal->created_by                 = Auth::user()->id;
            $employeeSal->save();
        }

        if($request->leave_type_1){
            $data = EmployeeLeaveDetail::where('user_id',$user->id)->get();
            if(count($data)>0){
                EmployeeLeaveDetail::where('user_id',$id)->delete();
            }
            for($i=1;$i<=$request->lve_count;$i++){
                $employeeLve = new EmployeeLeaveDetail();
                $no_of_leaves_alloted = 'no_of_leave_' . $i;
                $effective_from = 'lve_effective_from_' . $i;
                $effective_to = 'lve_effective_to_' . $i;
                $leave_type_id = 'leave_type_' . $i;
            
                $employeeLve->user_id           = $user->id;  
                $employeeLve->no_of_leaves_alloted           = $request->$no_of_leaves_alloted;
                $employeeLve->effective_from           = date('Y-m-d', strtotime($request->$effective_from));
                $employeeLve->effective_to           = date('Y-m-d', strtotime($request->$effective_to));
                $employeeLve->leave_type_id           = $request->$leave_type_id;
                $employeeLve->created_by                 = Auth::user()->id;
                $employeeLve->save();
            }                                                                   
        }
     if($request->qualification_1){
        $data = EmployeeEducation::where('user_id',$user->id)->get();
        if(count($data)>0){
            EmployeeEducation::where('user_id',$id)->delete();
        }
        for($i=1;$i<=$request->edu_count;$i++){
            $employeeEdu = new EmployeeEducation();
            $qualification = 'qualification_' . $i;
            $specialization = 'specialization_' . $i;
            $institution = 'institution_' . $i;
            $start_date = 'start_date_' . $i;
            $end_date = 'end_date_' . $i;
            $percentage = 'percentage_' . $i;
        
            $employeeEdu->user_id           = $user->id;  
            $employeeEdu->qualification           = $request->$qualification;
            $employeeEdu->specialization           = $request->$specialization;
            $employeeEdu->institution           = $request->$institution;
            $employeeEdu->start_date           = date('Y-m-d', strtotime($request->$start_date));
            $employeeEdu->end_date           = date('Y-m-d', strtotime($request->$end_date));
            $employeeEdu->percentage           = $request->$percentage;
            $employeeEdu->created_by                 = Auth::user()->id;
            $employeeEdu->save();
        }
     }

     if($request->employer_1){
        $data = EmployeeExperience::where('user_id',$id)->get();
        if(count($data)>0){
            EmployeeExperience::where('user_id',$id)->delete();
        }
        for($i=1;$i<=$request->exp_count;$i++){
            $employeeExp = new EmployeeExperience();
            $employer = 'employer_' . $i;
            $position_held = 'position_held_' . $i;
            $institution = 'institution_' . $i;
            $job_start_date = 'job_start_date_' . $i;
            $job_end_date = 'job_end_date_' . $i;
            $percentage = 'percentage_' . $i;

            $employeeExp->user_id           = $user->id; 
            $employeeExp->employer_name           = $request->$employer;
            $employeeExp->position_held           = $request->$position_held;
            $employeeExp->start_date           = date('Y-m-d', strtotime($request->$job_start_date));
            $employeeExp->end_date           = date('Y-m-d', strtotime($request->$job_end_date));
            $employeeExp->created_by                 = Auth::user()->id;
            $employeeExp->save();
        }
     }

     if($request->document_type_1!=null){
        $data = EmployeeDocument::where('user_id',$id)->get();
        if(count($data)>0){
            EmployeeDocument::where('user_id',$id)->delete();
        }
        for($i=1;$i<=$request->doc_count;$i++){
            $employeeDoc = new EmployeeDocument();
            $document_type = 'document_type_' . $i;
            // $document_type = 'document_type_' . $i;
            $employeeDoc->user_id           = $user->id; 
            $employeeDoc->document_type           = $request->$document_type;
            $filename ="";
            if ($request->file('file_name')) {
                $file = $request->file('file_name');
                $filename = $user->id.date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('admin/assets/uploads/documents'), $filename);
            }
            $employeeDoc->file_name           = $filename;
            $employeeDoc->created_by                 = Auth::user()->id;
            $employeeDoc->save();
        }
    }
    return   ['success' => true,
    'id' => Crypt::encrypt($user->id)];

    }catch(Exception  $e){
        return [
        'success' => false,
        'message' => $e];
    }
        
       
    }
    public function deleteEmployee($id) {
        DB::beginTransaction();            
        try {
            $user  = User::find($id);
            $employee = EmployeeBasicInfo::where('user_id',$id)->first();
            if($employee)
                $employee->delete(); 
            $employeeProf = EmployeeProfessionalDetail::where('user_id',$id)->first();
            if($employeeProf)
                $employeeProf->delete(); 
            $employeeSal = EmployeeSalaryDetail::where('user_id',$id)->first();
            if($employeeSal)
                $employeeSal->delete(); 
            $data = EmployeeLeaveDetail::where('user_id',$user->id)->get();
            if(count($data)>0){
                EmployeeLeaveDetail::where('user_id',$id)->delete();
            }
            $data = EmployeeEducation::where('user_id',$user->id)->get();
            if(count($data)>0){
                EmployeeEducation::where('user_id',$id)->delete();
            }
            $data = EmployeeExperience::where('user_id',$id)->get();
            if(count($data)>0){
                EmployeeExperience::where('user_id',$id)->delete();
            }
            $data = EmployeeDocument::where('user_id',$id)->get();
            if(count($data)>0){
                EmployeeDocument::where('user_id',$id)->delete();
            }
            $user->delete(); 
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }   
    }
}