@extends('admin.layouts.index')
@section('content')
<!--wrapper-->
<div class="wrapper">


    <!--start header wrapper-->
    <div class="header-wrapper">
        <!--start header -->
        @include('admin.layouts.header')

        @extends('hr.hr_submenu')
        <div class="page-wrapper">
            <div class="page-content">
            <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 style="text-align: center;font-size: 22px;"  class="msg_success"> Employee registration completed successfully</h2>
                </div>
                <div class="modal-footer text-center">


                    <button type="button" class="btn template-btn px-5 confirmYes" data-bs-toggle="offcanvas"
                        id="successModalOk" role="button" aria-controls="offcanvasExample1">OK
                    </button>

                </div>
            </div>
        </div>
    </div>


                <div class="container-fluid">

                    <div class="row">

                        <div class="col-xl-10 mx-auto">

                            <div class="card">
                                <div class="card-body p-4">
                                    <h5 class="mb-4">Add Profile</h5>
                                    <form id="add-profile-form" action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" id="user_id" @if($basic_info) value="{{Crypt::encrypt($basic_info->user_id)}}" @endif>
                                        <input type="hidden" name="edu_id" id="edu_id" value="{{$education?count($education):0;}}">
                                        <input type="hidden" name="exp_id" id="exp_id" value="{{($experience)?count($experience):0;}}">
                                        <input type="hidden" name="doc_id" id="doc_id"  value="{{($documents)?count($documents):0;}}">
                                        <input type="hidden" name="prof_id" id="prof_id"  value="{{($professional)?1:0;}}">
                                        <input type="hidden" name="sal_id" id="sal_id"  value="{{($salary)?1:0;}}">
                                        <input type="hidden" name="lve_id" id="lve_id"  value="{{($leaves)?count($leaves):0;}}">
                                        <!-- start step indicators -->
                                        <div class="form-header d-flex mb-4">
                                            <span class="stepIndicator" id="0">Personal</span>
                                            <span class="stepIndicator" id="1">Education</span>
                                            <span class="stepIndicator" id="2">Experience</span>
                                            <span class="stepIndicator" id="3">Document Uploads</span>
                                            <span class="stepIndicator" id="4">Professional</span>
                                            <span class="stepIndicator" id="5">Salary</span>
                                            <span class="stepIndicator" id="6">Leave</span>
                                        </div>
                                        <!-- end step indicators -->


                                        <div class="alert alert-success" style="display: none;">
                                            <ul>
                                                <p class="message_p"></p>
                                            </ul>
                                        </div>
                                        <div class="alert alert-danger" style="display: none;">
                                            <ul>
                                                <p class="message_p"></p>
                                            </ul>
                                        </div>
                                        <!-- step one -->
                                        <div class="step">
                                            <h6 class="text-center mb-4">Create account</h6>

                                            <div class="row">
                                                <div class="col-md-12 mb-2 text-center">

                                                    <div class="avatar-wrapper mb-2">
                                                        <img class="profile-pic" @if($basic_info)  src="/{{$basic_info->image}}" @else  src="" @endif />
                                                        <div class="upload-button">
                                                            <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                                        </div>
                                                        <input class="form-control  file-upload" type="file"  name="profile_img" id="profile_img"  accept=".jpg, .jpeg, .png"/>

                                                    </div>
                                                    <label for="profile_img" class="form-label">profile picture</label>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="first_name" class="form-label">First Name<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        id="first_name" name="first_name" placeholder="First Name" @if($basic_info) value="{{$basic_info->first_name}}" @endif
                                                        required oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="last_name" class="form-label">Last Name<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        id="last_name" name="last_name" placeholder="Last Name" required  @if($basic_info) value="{{$basic_info->last_name}}" @endif
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="gender" class="form-label">Gender<span>*</span></label>
                                                    <select class="form-select required-field" name="gender" id="gender" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <option value="">--Select--</option>
                                                        <option value="Male" @if($basic_info && $basic_info->gender == "Male") selected @endif>Male</option>
                                                        <option value="Female" @if($basic_info && $basic_info->gender == "Female") selected @endif>Female</option>
                                                        <option value="Trans" @if($basic_info && $basic_info->gender == "Trans") selected @endif>Trans</option>
                                                        <option value="Other" @if($basic_info && $basic_info->gender == "Other") selected @endif>Other</option>
                                                    </select>
                                                </div>
                                                @if(Auth::user()->role_id == \App\Models\Role::ROLE_SUPER_ADMIN )
                                                <div class="col-md-6 mb-2">
                                                    <label for="role_id" class="form-label">Role<span>*</span></label>
                                                    <select class="form-select" name="role_id" id="role_id" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <option value="">--Select--</option>
                                                        <option value="2" @if($user && $user->role_id == "2") selected @endif>Admin</option>
                                                        <option value="3" @if($user && $user->role_id == "3") selected @endif>Employee</option>
                                                    </select>
                                                </div>
                                                @endif
                                                <div class="col-md-6 mb-2">
                                                    <label for="dob" class="form-label">DOB<span>*</span></label>
                                                    <input type="text" class="form-control required-field" id="dob"  @if($basic_info) value="{{\Carbon\Carbon::parse($basic_info->dob)->format('d-m-Y')}}" @endif
                                                        name="dob" placeholder="DOB" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="blood_group" class="form-label">Blood Group</label>

                                                    <select class="form-select" name="blood_group" id="blood_group">
                                                        <option value="">--Select--</option>
                                                        <option value="A+ve" @if($basic_info && $basic_info->blood_group == "A+ve") selected @endif>A+ve</option>
                                                        <option value="A-ve" @if($basic_info && $basic_info->blood_group == "A-ve") selected @endif>A-ve</option>
                                                        <option value="B+ve" @if($basic_info && $basic_info->blood_group == "B+ve") selected @endif>B+ve</option>
                                                        <option value="B-ve" @if($basic_info && $basic_info->blood_group == "B-ve") selected @endif>B-ve</option>
                                                        <option value="AB+ve" @if($basic_info && $basic_info->blood_group == "AB+ve") selected @endif>AB+ve</option>
                                                        <option value="AB-ve" @if($basic_info && $basic_info->blood_group == "AB-ve") selected @endif>AB-ve</option>
                                                        <option value="O+ve" @if($basic_info && $basic_info->blood_group == "O+ve") selected @endif>O+ve</option>
                                                        <option value="O-ve" @if($basic_info && $basic_info->blood_group == "O-ve") selected @endif>O-ve</option>
                                                        <option value="Other" @if($basic_info && $basic_info->blood_group == "Other") selected @endif>Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="marital_status" class="form-label">Marital Status</label>
                                                    <select class="form-select" name="marital_status"
                                                        id="marital_status">
                                                        <option value="">--Select--</option>
                                                        <option value="Married" @if($basic_info && $basic_info->marital_status == "Married") selected @endif >Married</option>
                                                        <option value="Single" @if($basic_info && $basic_info->marital_status == "Single") selected @endif>Single</option>
                                                        <option value="Divorced" @if($basic_info && $basic_info->marital_status == "Divorced") selected @endif>Divorced</option>
                                                        <option value="Widow" @if($basic_info && $basic_info->marital_status == "Widow") selected @endif>Widow/Widower</option>
                                                        <option value="Other" @if($basic_info && $basic_info->marital_status == "Other") selected @endif>Other</option>
                                                    </select>
                                                </div>
                                                <!-- Contact  -->
                                                <div class="col-md-12 mb-2">
                                                    <label for="address" class="form-label">Address<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        name="address" id="address" placeholder="Address" required  @if($basic_info) value="{{$basic_info->address}}" @endif
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="email" class="form-label">Email<span>*</span></label>
                                                    <input type="email" class="form-control required-field" name="email"  @if($basic_info) value="{{$basic_info->email}}" @endif
                                                        id="email" placeholder="Email" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <span class="mt-2 text-danger" id="email_error"></span>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="company_mail" class="form-label">Company Mail<span>*</span></label>
                                                    <input type="email" class="form-control required-field"
                                                        name="company_mail" id="company_mail" placeholder="Company Mail"  @if($basic_info) value="{{$basic_info->company_mail}}" @endif
                                                        required oninput="removeErrClass(this, 'invalid')">
                                                        <span class="mt-2 text-danger" id="company_mail_error"></span>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="phone" class="form-label">Phone<span>*</span></label>
                                                    <input type="text" class="form-control required-field" name="phone"  @if($basic_info) value="{{$basic_info->phone}}" @endif
                                                        id="phone" placeholder="Phone" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <span class="mt-2 text-danger" id="phone_error"></span>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="aadhaar" class="form-label">AADHAAR<span>*</span></label>
                                                    <input type="text" class="form-control required-field" name="aadhaar"  @if($basic_info) value="{{$basic_info->aadhaar}}" @endif
                                                        id="aadhaar" placeholder="AADHAAR" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <span class="mt-2 text-danger" id="aadhaar_error"></span>
                                                </div>
                                                <div class="col-md-12 mb-2">Emergency Contact 1</div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="emergency_contact_name_1" class="form-label">Name<span>*</span></label>
                                                    <input type="text" class="form-control required-field" required name="emergency_contact_name_1" @if($basic_info) value="{{$basic_info->emergency_contact_name_1}}" @endif
                                                        id="emergency_contact_name_1" placeholder="Name"
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="emergency_contact_relation_1" class="form-label">Relation</label>
                                                    <input type="text" class="form-control" name="emergency_contact_relation_1" @if($basic_info) value="{{$basic_info->emergency_contact_relation_1}}" @endif
                                                        id="emergency_contact_relation_1" placeholder="Relation"
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="emergency_contact_phone_1" class="form-label">Phone<span>*</span></label>
                                                    <input type="text" class="form-control required-field" name="emergency_contact_phone_1" @if($basic_info) value="{{$basic_info->emergency_contact_phone_1}}" @endif
                                                        id="emergency_contact_phone_1" placeholder="Phone" required   min="10" max="12"
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <span class="mt-2 text-danger" id="emergency_contact_phone_1_error"></span>
                                                </div>
                                                
                                                <div class="col-md-12 mb-2">Emergency Contact 2</div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="emergency_contact_name_2" class="form-label">Name<span>*</span></label>
                                                    <input type="text" class="form-control required-field" required name="emergency_contact_name_2" @if($basic_info) value="{{$basic_info->emergency_contact_name_2}}" @endif
                                                        id="emergency_contact_name_2" placeholder="Name"
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="emergency_contact_relation_2" class="form-label">Relation</label>
                                                    <input type="text" class="form-control" name="emergency_contact_relation_2" @if($basic_info) value="{{$basic_info->emergency_contact_relation_2}}" @endif
                                                        id="emergency_contact_relation_2" placeholder="Relation"
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="emergency_contact_phone_2" class="form-label">Phone<span>*</span></label>
                                                    <input type="text" class="form-control required-field" name="emergency_contact_phone_2" @if($basic_info) value="{{$basic_info->emergency_contact_phone_2}}" @endif
                                                        id="emergency_contact_phone_2" placeholder="Phone" required min="10" max="12"
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <span class="mt-2 text-danger" id="emergency_contact_phone_2_error"></span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- /* Education */ -->
                                        <!-- step one -->
                                        <div class="step">
                                            <p class="text-center mb-4">Educational Details</p>
                                            @if($education && count($education)>=1)
                                            <input type="hidden" name="edu_count" id="edu_count" value="{{count($education)}}">
                                            <?php $id = 1;?>
                                            @foreach($education as $edu)
                                            <div class="row edu_div">
                                                <div class="col-md-12 mb-2">
                                                    <label for="institution_{{$id}}" class="form-label"> Institution with
                                                        Address<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        name="institution_{{$id}}" id="institution_{{$id}}"
                                                        placeholder="Institution" required value="{{$edu->institution}}"
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="qualification_{{$id}}" class="form-label"> Qualification<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        name="qualification_{{$id}}" id="qualification_{{$id}}" value="{{$edu->qualification}}"
                                                        placeholder="Qualification" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="specialization_{{$id}}" class="form-label "> Specialization</label>
                                                    <input type="text" class="form-control required-field"
                                                        name="specialization_{{$id}}" id="specialization_{{$id}}" value="{{$edu->specialization}}"
                                                        placeholder="Specialization"
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="start_date_{{$id}}" class="form-label "> Start Date<span>*</span></label>
                                                    <input type="text" class="form-control required-field  from-date" value="{{\Carbon\Carbon::parse($edu->start_date)->format('d-m-Y')}}"
                                                        name="start_date_{{$id}}" id="start_date_{{$id}}" placeholder="Start Date"
                                                        required oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="end_date_{{$id}}" class="form-label "> End Date<span>*</span></label>
                                                    <input type="text" class="form-control required-field  to-date" value="{{\Carbon\Carbon::parse($edu->end_date)->format('d-m-Y')}}"
                                                        name="end_date_{{$id}}" id="end_date_{{$id}}" placeholder="End Date"
                                                        required oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="percentage_{{$id}}" class="form-label "> Percentage/GPA<span>*</span></label>
                                                    <input type="text" class="form-control required-field" value="{{$edu->percentage}}"
                                                        name="percentage_{{$id}}" id="percentage_{{$id}}" placeholder="Percentage/GPA" required
                                                        oninput="removeErrClass(this, 'invalid')"   maxlength="5" onkeypress="return validateNumber(event)">
                                                </div>
                                                @if(count($education) == 1 ||$id == 1)
                                                <div class="d-flex  justify-content-end edu_add_first">
                                                    @if(count($education) == 1 )
                                                    <a class="btn template-btn edu_add">Add </a>
                                                    @endif
                                                    <a class="btn template-btn ms-3 edu_clear">Clear </a>

                                                </div>
                                                <div class="d-none justify-content-end edu_add_next">
                                                    <a class="btn template-btn edu_add">Add </a>
                                                    <a class="btn template-btn edu_delete ms-3">Delete</a>
                                                </div>
                                                @else
                                                <div class="d-flex justify-content-end edu_add_next">
                                                    @if(count($education) == $id)
                                                    <a class="btn template-btn edu_add">Add </a>
                                                    @endif
                                                    <a class="btn template-btn edu_delete ms-3">Delete</a>
                                                </div>
                                                @endif
                                            </div>
                                            <?php $id++;?>
                                            @endforeach
                                            @else
                                            <input type="hidden" name="edu_count" id="edu_count" value="1">

                                            <div class="row edu_div">
                                                <div class="col-md-12 mb-2">
                                                    <label for="institution_1" class="form-label"> Institution with
                                                        Address<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        name="institution_1" id="institution_1"
                                                        placeholder="Institution" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="qualification_1" class="form-label"> Qualification<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        name="qualification_1" id="qualification_1"
                                                        placeholder="Qualification" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="specialization_1" class="form-label "> Specialization</label>
                                                    <input type="text" class="form-control required-field"
                                                        name="specialization_1" id="specialization_1"
                                                        placeholder="Specialization" 
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="start_date_1" class="form-label "> Start Date<span>*</span></label>
                                                    <input type="text" class="form-control required-field  from-date"
                                                        name="start_date_1" id="start_date_1" placeholder="Start Date"
                                                        required oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="end_date_1" class="form-label "> End Date<span>*</span></label>
                                                    <input type="text" class="form-control required-field  to-date"
                                                        name="end_date_1" id="end_date_1" placeholder="End Date"
                                                        required oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="percentage_1" class="form-label "> Percentage/GPA<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        name="percentage_1" id="percentage_1" placeholder="Percentage/GPA" required
                                                        oninput="removeErrClass(this, 'invalid')"  max="5" onkeypress="return validateNumber(event)">
                                                </div>
                                                <div class="d-flex  justify-content-end edu_add_first">
                                                    <a class="btn template-btn edu_add">Add </a>
                                                    <a class="btn template-btn ms-3 edu_clear">Clear </a>

                                                </div>
                                                <div class="d-none  justify-content-end edu_add_next">
                                                    <a class="btn template-btn edu_add">Add </a>
                                                    <a class="btn template-btn edu_delete ms-3">Delete</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>

                                        <!-- /* Experience */ -->
                                        <!-- step one -->
                                        <div class="step">
                                            <p class="text-center mb-4">Experience Details</p>
                                            @if($experience && count($experience)>=1)
                                            <input type="hidden" name="exp_count" id="exp_count" value="{{count($experience)}}">
                                            <?php $id = 1;?>

                                            @foreach($experience as $exp)

                                            <div class="row exp_div">
                                                <div class="col-md-12 mb-2">
                                                    <label for="employer_{{$id}}" class="form-label">Employer Name with
                                                        Address<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        name="employer_{{$id}}" id="employer_{{$id}}"  value="{{$exp->employer_name}}"
                                                        placeholder="Employer Name with Address" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="job_start_date_{{$id}}" class="form-label"> Start Date<span>*</span></label>
                                                    <input type="text" class="form-control required-field  from-date" value="{{\Carbon\Carbon::parse($exp->start_date)->format('d-m-Y')}}"
                                                        name="job_start_date_{{$id}}" id="job_start_date_{{$id}}"  
                                                        placeholder="Start Date" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="job_end_date_{{$id}}" class="form-label"> End Date<span>*</span></label>
                                                    <input type="text" class="form-control required-field  to-date" value="{{\Carbon\Carbon::parse($exp->end_date)->format('d-m-Y')}}"
                                                        name="job_end_date_{{$id}}" id="job_end_date_{{$id}}" placeholder="End Date"
                                                        required oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="position_held_{{$id}}" class="form-label"> Position Held<span>*</span></label>
                                                    <input type="text" class="form-control required-field"  value="{{$exp->position_held}}"
                                                        name="position_held_{{$id}}" id="position_held_{{$id}}"
                                                        placeholder="Position Held" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                @if(count($experience) == 1 ||$id == 1)
                                                <div class="d-flex  justify-content-end exp_add_first">
                                                    @if(count($experience) == 1 )
                                                    <a class="btn template-btn exp_add">Add </a>
                                                    @endif
                                                    <a class="btn template-btn ms-3 exp_clear">Clear </a>

                                                </div>
                                                <div class="d-none justify-content-end exp_add_next">
                                                    <a class="btn template-btn exp_add">Add </a>
                                                    <a class="btn template-btn exp_delete ms-3">Delete</a>
                                                </div>
                                                @else
                                                <div class="d-flex justify-content-end exp_add_next">
                                                    @if(count($experience) == $id)
                                                    <a class="btn template-btn exp_add">Add </a>
                                                    @endif
                                                    <a class="btn template-btn exp_delete ms-3">Delete</a>
                                                </div>
                                                @endif
                                            </div>
                                            <?php $id++;?>
                                            @endforeach
                                            @else
                                            <input type="hidden" name="exp_count" id="exp_count" value="1">
                                            <div class="row exp_div">
                                                <div class="col-md-12 mb-2">
                                                    <label for="employer_1" class="form-label">Employer Name with
                                                        Address<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        name="employer_1" id="employer_1"
                                                        placeholder="Employer Name with Address" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="job_start_date_1" class="form-label"> Start Date<span>*</span></label>
                                                    <input type="text" class="form-control required-field  from-date"
                                                        name="job_start_date_1" id="job_start_date_1"
                                                        placeholder="Start Date" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="job_end_date_1" class="form-label"> End Date<span>*</span></label>
                                                    <input type="text" class="form-control required-field  to-date"
                                                        name="job_end_date_1" id="job_end_date_1" placeholder="End Date"
                                                        required oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="position_held_1" class="form-label"> Position Held<span>*</span></label>
                                                    <input type="text" class="form-control required-field"
                                                        name="position_held_1" id="position_held_1"
                                                        placeholder="Position Held" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="d-flex  justify-content-end exp_add_first">
                                                    <a class="btn template-btn exp_add">Add </a>
                                                    <a class="btn template-btn ms-3 exp_clear">Clear </a>

                                                </div>
                                                <div class="d-none  justify-content-end exp_add_next">
                                                    <a class="btn template-btn exp_add">Add </a>
                                                    <a class="btn template-btn exp_delete ms-3">Delete</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- /* Document */ -->
                                        <!-- step one -->
                                        <div class="step">
                                            <p class="text-center mb-4">Document Uploads</p>   
                                            @if($documents && count($documents)>=1)
                                            <input type="hidden" name="doc_count" id="doc_count" value="{{count($documents)}}">
                                            <?php $id = 1;?>

                                            @foreach($documents as $doc)

                                            <div class="row doc_div">
                                                <!-- /* Documents */ -->

                                                <div class="col-md-6 mb-2">
                                                    <label for="document_type_{{$id}}" class="form-label">Document Type<span>*</span></label>
                                                    <select class="form-select required-field" name="document_type_{{$id}}"
                                                        id="document_type_{{$id}}" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <option value="">--Select--</option>
                                                        <option value="Experience" @if($doc->document_type =="Experience") selected @endif>Experience Certificate</option>
                                                        <option value="Salary" @if($doc->document_type =="Salary") selected @endif>Salary Certificate</option>
                                                        <option value="Education" @if($doc->document_type =="Education") selected @endif>Education Certificate</option>
                                                        <option value="Relieving" @if($doc->document_type =="Relieving") selected @endif>Relieving Letter</option>
                                                        <option value="ID" @if($doc->document_type =="ID") selected @endif>ID Proof</option>
                                                        <option value="Other" @if($doc->document_type =="Other") selected @endif>Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="file_name_{{$id}}" class="form-label">Upload File<span>*</span></label>
                                                    <input type="file" class="form-control required-field"  accept=".jpg, .jpeg, .png, .pdf"
                                                        name="file_name_{{$id}}" id="file_name_{{$id}}" required @if($doc->file_name) value="{{$doc->file_name}}" @endif
                                                        oninput="removeErrClass(this, 'invalid')"
                                                        placeholder="Upload File">
                                                </div>
                                               
                                                @if(count($documents) == 1 ||$id == 1)
                                                <div class="d-flex  justify-content-end doc_add_first">
                                                    @if(count($documents) == 1 )
                                                    <a class="btn template-btn doc_add">Add </a>
                                                    @endif
                                                    <a class="btn template-btn ms-3 doc_clear">Clear </a>

                                                </div>
                                                <div class="d-none justify-content-end doc_add_next">
                                                    <a class="btn template-btn doc_add">Add </a>
                                                    <a class="btn template-btn doc_delete ms-3">Delete</a>
                                                </div>
                                                @else
                                                <div class="d-flex justify-content-end doc_add_next">
                                                    @if(count($documents) == $id)
                                                    <a class="btn template-btn doc_add">Add </a>
                                                    @endif
                                                    <a class="btn template-btn doc_delete ms-3">Delete</a>
                                                </div>
                                                @endif
                                            </div>
                                            <?php $id++;?>
                                            @endforeach
                                            @else
                                            <input type="hidden" name="doc_count" id="doc_count" value="1">
                                            <div class="row doc_div">
                                                <!-- /* Documents */ -->

                                                <div class="col-md-6 mb-2">
                                                    <label for="document_type_1" class="form-label">Document Type<span>*</span></label>
                                                    <select class="form-select required-field" name="document_type_1"
                                                        id="document_type_1" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <option value="">--Select--</option>
                                                        <option value="Experience">Experience Certificate</option>
                                                        <option value="Salary">Salary Certificate</option>
                                                        <option value="Education">Education Certificate</option>
                                                        <option value="Relieving">Relieving Letter</option>
                                                        <option value="ID">ID Proof</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="file_name_1" class="form-label">Upload File<span>*</span></label>
                                                    <input type="file" class="form-control required-field"
                                                        name="file_name_1" id="file_name_1" required  accept=".jpg, .jpeg, .png, .pdf"
                                                        oninput="removeErrClass(this, 'invalid')"
                                                        placeholder="Upload File">
                                                </div>
                                                <div class="d-flex  justify-content-end doc_add_first">
                                                    <a class="btn template-btn doc_add">Add </a>
                                                    <a class="btn template-btn ms-3 doc_clear">Clear </a>

                                                </div>
                                                <div class="d-none  justify-content-end doc_add_next">
                                                    <a class="btn template-btn doc_add">Add </a>
                                                    <a class="btn template-btn doc_delete ms-3">Delete</a>
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                        <!-- step two -->
                                        <div class="step">
                                            <p class="text-center mb-4">Professional Details</p>
                                            <div class="row">

                                                <div class="col-md-6 mb-2">
                                                    <label for="date_of_joining" class="form-label">Date of Joining<span>*</span></label>
                                                    <input type="text" class="form-control required-field  to-date" @if($professional) value="{{\Carbon\Carbon::parse($professional->date_of_joining)->format('d-m-Y')}}" @endif
                                                        name="date_of_joining" id="date_of_joining" required
                                                        oninput="removeErrClass(this, 'invalid')"
                                                        placeholder="Date of Joining">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="designation_id" class="form-label">Designation<span>*</span></label>
                                                    <select class="form-select required-field" id="designation_id"
                                                        required oninput="removeErrClass(this, 'invalid')"
                                                        name="designation_id">
                                                        <option value="">Select</option>
                                                        @foreach($designation as $desig)
                                                        <option value="{{$desig->id}}"  @if($professional && $professional->designation_id ==$desig->id) selected @endif>
                                                            {{$desig->designation_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="relieving_date" class="form-label">Relieving Date</label>
                                                    <input type="text" class="form-control  to-date" name="relieving_date" id="relieving_date"
                                                        placeholder="Relieving Date" @if($professional && $professional->relieving_date) value="{{\Carbon\Carbon::parse($professional->relieving_date)->format('d-m-Y')}}" @endif>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="supervisor" class="form-label">Supervisor Name</label>

                                                    <p class="multitem"><select class="js-example-basic-multiple"
                                                            name="supervisor" >
                                                        @foreach($supervisor as $sup)
                                                        <option value="{{$sup->id}}"  @if($professional && $professional->supervisor_id == $sup->id ) selected @endif>
                                                            {{$sup->name}}</option>
                                                        @endforeach
                                                        </select></p>

                                                </div>

                                                <div class="col-md-12 mb-2 mb-2 "> 
                                                    <label for="technology" class="form-label">Technology</label>
                                                    <p class="multitem"><select class="js-example-basic-multiple"
                                                            name="technology[]" multiple="multiple">
                                                        @foreach($technology as $tech)
                                                        <option value="{{$tech->id}}"   style="font-weight: bold;" @if($professional && $professional->technology_used){{ in_array($tech->id,  json_decode($professional->technology_used)) ? 'selected' : '' }} @endif>
                                                            {{$tech->technology_name}}</option>
                                                        @endforeach
                                                        </select></p>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- step three -->
                                        <div class="step">
                                            <p class="text-center mb-4">Salary Details</p>
                                            <div class="row">

                                                <div class="col-md-6 mb-2">
                                                    <label for="basic_pay" class="form-label">Basic Pay<span>*</span></label>
                                                    <input type="text" class="form-control required-field" name="basic_pay" id="basic_pay"
                                                        required oninput="removeErrClass(this, 'invalid')" @if($salary) value="{{$salary->basic_pay}}" @endif
                                                        placeholder="Basic Pay"  onkeypress="return validateNumber(event)">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="da" class="form-label">DA</label>
                                                    <input type="text" class="form-control" name="da" id="da"@if($salary) value="{{$salary->da}}" @endif
                                                        placeholder="DA"  onkeypress="return validateNumber(event)">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="hra" class="form-label">HRA</label>
                                                    <input type="text" class="form-control" name="hra" id="hra"@if($salary) value="{{$salary->hra}}" @endif
                                                        placeholder="HRA"  onkeypress="return validateNumber(event)">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="pf_contribution" class="form-label">Contribution to PF</label>
                                                    <input type="text" class="form-control" name="pf_contribution" id="pf_contribution"@if($salary) value="{{$salary->pf_contribution}}" @endif
                                                        placeholder="Contribution to PF"  onkeypress="return validateNumber(event)">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="bank_name" class="form-label">Bank Name<span>*</span></label>
                                                    <input type="text" class="form-control required-field" name="bank_name" id="bank_name"@if($salary) value="{{$salary->bank_name}}" @endif
                                                        required oninput="removeErrClass(this, 'invalid')"
                                                        placeholder="Bank Name">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="branch" class="form-label">Branch<span>*</span></label>
                                                    <input type="text" class="form-control required-field" name="branch" id="branch"@if($salary) value="{{$salary->branch}}" @endif
                                                        required oninput="removeErrClass(this, 'invalid')"
                                                        placeholder="Branch">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="account_number" class="form-label">Account No<span>*</span></label>
                                                    <input type="text" class="form-control required-field" name="account_number" id="account_number"@if($salary) value="{{$salary->account_number}}" @endif
                                                        required oninput="removeErrClass(this, 'invalid')"
                                                        placeholder="Account No">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="ifsc" class="form-label">IFSC<span>*</span></label>
                                                    <input type="text" class="form-control required-field" name="ifsc" id="ifsc"@if($salary) value="{{$salary->ifsc}}" @endif
                                                        required oninput="removeErrClass(this, 'invalid')"
                                                        placeholder="IFSC">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- step four -->
                                        <div class="step">
                                            <p class="text-center mb-4">Leave Details</p>
                                            @if($leaves && count($leaves)>=1)
                                            <input type="hidden" name="lve_count" id="lve_count" value="{{count($leaves)}}">
                                            <?php $id = 1;?>

                                            @foreach($leaves as $lve)
                                            <div class="row lve_div">

                                                <div class="col-md-6 mb-2">
                                                    <label for="leave_type_{{$id}}" class="form-label">Leave Type<span>*</span></label>
                                                    <select class="form-select required-field" name="leave_type_{{$id}}"
                                                        id="leave_type_{{$id}}" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <option value="">--Select--</option>
                                                        @foreach($leave_types as $leave_type)
                                                        <option value="{{$leave_type->id}}" @if($leave_type->id ==$lve->leave_type_id) selected @endif>
                                                            {{$leave_type->leave_type_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="no_of_leave_{{$id}}" class="form-label">No of leaves<span>*</span></label>
                                                    <input type="text" class="form-control required-field"  onkeypress="return validateNumber(event)"
                                                        name="no_of_leave_{{$id}}" id="no_of_leave_{{$id}}" placeholder="No of leaves"
                                                        required oninput="removeErrClass(this, 'invalid')" @if($lve->no_of_leaves_alloted) value="{{$lve->no_of_leaves_alloted}}" @endif>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="lve_effective_from_{{$id}}" class="form-label"> Effective From<span>*</span></label>
                                                    <input type="text" class="form-control required-field lve_from-date"
                                                        name="lve_effective_from_{{$id}}" id="lve_effective_from_{{$id}}" @if($lve->effective_from) value="{{\Carbon\Carbon::parse($lve->effective_from)->format('d-m-Y')}}" @endif
                                                        placeholder="Effective From" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="lve_effective_to_{{$id}}" class="form-label"> Effective To<span>*</span></label>
                                                    <input type="text" class="form-control lve_to-date required-field"
                                                        name="lve_effective_to_{{$id}}" id="lve_effective_to_{{$id}}" @if($lve->effective_to) value="{{\Carbon\Carbon::parse($lve->effective_to)->format('d-m-Y')}}" @endif
                                                        placeholder="Effective To" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                
                                                @if(count($documents) == 1 ||$id == 1)
                                                <div class="d-flex  justify-content-end lve_add_first">
                                                    @if(count($documents) == 1 )
                                                    <a class="btn template-btn lve_add">Add </a>
                                                    @endif
                                                    <a class="btn template-btn ms-3 lve_clear">Clear </a>

                                                </div>
                                                <div class="d-none justify-content-end lve_add_next">
                                                    <a class="btn template-btn lve_add">Add </a>
                                                    <a class="btn template-btn lve_delete ms-3">Delete</a>
                                                </div>
                                                @else
                                                <div class="d-flex justify-content-end lve_add_next">
                                                    @if(count($documents) == $id)
                                                    <a class="btn template-btn lve_add">Add </a>
                                                    @endif
                                                    <a class="btn template-btn lve_delete ms-3">Delete</a>
                                                </div>
                                                @endif
                                            </div>
                                            <?php $id++;?>
                                            @endforeach

                                            @else
                                            <input type="hidden" name="lve_count" id="lve_count" value="1">
                                            <div class="row lve_div">

                                                <div class="col-md-6 mb-2">
                                                    <label for="leave_type_1" class="form-label">Leave Type<span>*</span></label>
                                                    <select class="form-select required-field" name="leave_type_1"
                                                        id="leave_type_1" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                        <option value="">--Select--</option>
                                                        @foreach($leave_types as $leave_type)
                                                        <option value="{{$leave_type->id}}">
                                                            {{$leave_type->leave_type_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="no_of_leave_1" class="form-label">No of leaves<span>*</span></label>
                                                    <input type="text" class="form-control required-field"  onkeypress="return validateNumber(event)"
                                                        name="no_of_leave_1" id="no_of_leave_1" placeholder="No of leaves"
                                                        required oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="lve_effective_from_1" class="form-label"> Effective From<span>*</span></label>
                                                    <input type="text" class="form-control required-field lve_from-date"
                                                        name="lve_effective_from_1" id="lve_effective_from_1"
                                                        placeholder="Effective From" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="lve_effective_to_1" class="form-label"> Effective To<span>*</span></label>
                                                    <input type="text" class="form-control lve_to-date required-field"
                                                        name="lve_effective_to_1" id="lve_effective_to_1"
                                                        placeholder="Effective To" required
                                                        oninput="removeErrClass(this, 'invalid')">
                                                </div>
                                                <div class="d-flex  justify-content-end lve_add_first">
                                                    <a class="btn template-btn lve_add">Add </a>
                                                    <a class="btn template-btn ms-3 lve_clear">Clear </a>

                                                </div>
                                                <div class="d-none  justify-content-end lve_add_next">
                                                    <a class="btn template-btn lve_add">Add </a>
                                                    <a class="btn template-btn lve_delete ms-3">Delete</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>


                                        <!-- start previous / next buttons -->
                                        <div class="form-footer d-flex  mt-4">
                                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                        </div>
                                        <!-- end previous / next buttons -->
                                    </form>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--end page wrapper -->