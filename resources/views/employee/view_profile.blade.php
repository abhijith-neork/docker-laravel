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

                <div class="container-fluid">
                    <div class="row">

                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-view">
                                            <div class="profile-img-wrap">
                                                <div class="profile-img">
                                                    <a href="#"><img @if($basic_info)  src="/{{$basic_info->image}}" @else  src="" @endif
                                                            alt="User Image"></a>
                                                </div>
                                            </div>
                                            <div class="profile-basic">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="profile-info-left">
                                                            <h3 class="user-name m-t-0 mb-">
                                                                {{$basic_info->first_name." ".$basic_info->last_name}}
                                                            </h3>
                                                            <h6 class="text-muted">{{$professional->designation->designation_name}}
                                                            </h6>
                                                            <!-- <small class="text-muted">Web Designer</small> -->
                                                            <div class="staff-id">Employee ID
                                                                :{{$basic_info->employee_code}} </div>
                                                            <div class="small doj text-muted">Date of Join :
                                                                {{\Carbon\Carbon::parse($professional->date_of_joining)->format('d-m-Y')}}</div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <ul class="personal-info">
                                                            <li>
                                                                <div class="title">Phone:</div>
                                                                <div class="text"><a href="">{{$basic_info->phone}}</a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Email:</div>
                                                                <div class="text"><a
                                                                        href="">{{$basic_info->company_mail}}</a></div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Birthday:</div>
                                                                <div class="text">{{\Carbon\Carbon::parse($basic_info->dob)->format('d-m-Y')}}</div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Address:</div>
                                                                <div class="text">{{$basic_info->address}}</div>
                                                            </li>
                                                            <li>
                                                                <div class="title">Gender:</div>
                                                                <div class="text">{{$basic_info->gender}}</div>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card tab-box">
                        <div class="row user-tabs">
                            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                <ul class="nav nav-tabs nav-tabs-bottom" role="tablist">
                                    <li class="nav-item" role="presentation"><a href="#emp_profile" data-bs-toggle="tab"
                                            class="nav-link active" aria-selected="true" role="tab">Profile</a></li>

                                    <li class="nav-item" role="presentation"><a href="#bank_statutory"
                                            data-bs-toggle="tab" class="nav-link" aria-selected="false" tabindex="-1"
                                            role="tab">Bank &amp;
                                            Statutory <small class="text-danger">(Admin Only)</small></a></li>
                                    <li class="nav-item" role="presentation"><a href="#emp_assets" data-bs-toggle="tab"
                                            class="nav-link" aria-selected="false" tabindex="-1" role="tab">Assets</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">

                        <!-- Profile Info Tab -->
                        <div id="emp_profile" class="pro-overview tab-pane fade show active" role="tabpanel">
                            <div class="row">

                                <div class="col-md-6 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            <h3 class="card-title">Emergency Contact </h3>
                                            <h5 class="section-title">Primary</h5>
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Name</div>
                                                    <div class="text">{{$basic_info->emergency_contact_name_1}}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Relationship</div>
                                                    <div class="text">{{$basic_info->emergency_contact_relation_1}}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Phone </div>
                                                    <div class="text">{{$basic_info->emergency_contact_phone_1}}</div>
                                                </li>
                                            </ul>
                                            <hr>
                                            <h5 class="section-title">Secondary</h5>
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Name</div>
                                                    <div class="text">{{$basic_info->emergency_contact_name_2}}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Relationship</div>
                                                    <div class="text">{{$basic_info->emergency_contact_relation_2}}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Phone </div>
                                                    <div class="text">{{$basic_info->emergency_contact_phone_2}}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            <h3 class="card-title">Bank information</h3>
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Bank name</div>
                                                    <div class="text">@if($salary){{$salary->bank_name}}@endif</div>
                                                </li>
                                                <li>
                                                    <div class="title">Branch</div>
                                                    <div class="text">@if($salary){{$salary->branch}}@endif</div>
                                                </li>
                                                <li>
                                                    <div class="title">Bank account No.</div>
                                                    <div class="text">@if($salary){{$salary->account_number}}@endif</div>
                                                </li>
                                                <li>
                                                    <div class="title">IFSC Code</div>
                                                    <div class="text">@if($salary){{$salary->ifsc}}@endif</div>
                                                </li>
                                                <!-- <li>
                                                <div class="title">PAN No</div>
                                                <div class="text">{{$basic_info->dob}}</div>
                                            </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations</h3>
                                            <div class="experience-box">
                                                <ul class="experience-list">
                                                    @foreach($education as $edu)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#/" class="name">{{$edu->institution}}</a>
                                                                <div>{{$edu->qualification}} - {{$edu->specialization}}
                                                                </div>
                                                                <span
                                                                    class="time">{{\Carbon\Carbon::parse($edu->start_date)->format('d-m-Y')}}
                                                                    -
                                                                    {{\Carbon\Carbon::parse($edu->end_date)->format('d-m-Y')}}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience </h3>
                                            <div class="experience-box">
                                                <ul class="experience-list">
                                                    @foreach($experience as $exp)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#/" class="name">{{$exp->employer_name}}</a>
                                                                <div>{{$exp->position_held}}</div>
                                                                <span
                                                                    class="time">{{\Carbon\Carbon::parse($exp->start_date)->format('d-m-Y')}}
                                                                    -
                                                                    {{\Carbon\Carbon::parse($exp->end_date)->format('d-m-Y')}}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Profile Info Tab -->



                        <!-- Bank Statutory Tab -->
                        <div class="tab-pane fade" id="bank_statutory" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title"> Basic Salary Information</h3>
                                    <form action="salary.html">
                                        <div class="row">

                                            <div class="col-sm-6 mb-4">
                                                <label class="col-form-label">Net Salary</label>
                                                <input class="form-control" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="text-primary">Earnings</h4>
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Basic</label>
                                                    <input class="form-control" type="text"
                                                    @if($salary) value="{{$salary->basic_pay}}"@endif>
                                                </div>
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">DA</label>
                                                    <input class="form-control" type="text"@if($salary) value="{{$salary->da}}"@endif>
                                                </div>
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">HRA</label>
                                                    <input class="form-control" type="text" @if($salary)value="{{$salary->hra}}"@endif>
                                                </div>
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Contribution to PF</label>
                                                    <input class="form-control" type="text"
                                                    @if($salary) value="{{$salary->pf_contribution}}"@endif>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                            <h4 class="text-primary">Deductions</h4>
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">TDS</label>
                                                <input class="form-control" type="text" value="$300">
                                            </div>
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">ESI</label>
                                                <input class="form-control" type="text" value="$20">
                                            </div>
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">PF</label>
                                                <input class="form-control" type="text" value="$20">
                                            </div>
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Leave</label>
                                                <input class="form-control" type="text" value="$250">
                                            </div>
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Prof. Tax</label>
                                                <input class="form-control" type="text" value="$110">
                                            </div>
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Labour Welfare</label>
                                                <input class="form-control" type="text" value="$10">
                                            </div>
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Fund</label>
                                                <input class="form-control" type="text" value="$40">
                                            </div>

                                        </div> -->
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Bank Statutory Tab -->

                        <!-- Assets -->
                        <div class="tab-pane fade" id="emp_assets" role="tabpanel">
                            <div class="card">
                                <div class="card-body" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                                    <div class="table-responsive">


                                        <table id="example" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr class="bxs" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Asset ID</th>
                                                    <th>Assigned Date</th>
                                                    <th>Assignee</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bxshod">
                                                    <td>1</td>
                                                    <td>
                                                        <a href="assets-details.html" class="table-imgname">

                                                            <span>Laptop</span>
                                                        </a>
                                                    </td>
                                                    <td>AST - 001</td>
                                                    <td>22 Nov, 2022 10:32AM</td>
                                                    <td class="table-namesplit">
                                                        <a href="javascript:void(0);" class="table-profileimage">
                                                            <img src="assets/images/avatars/avatar-2.png" class="me-2"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="javascript:void(0);" class="table-name">
                                                            <span>John Paul Raj</span>

                                                        </a>
                                                    </td>

                                                </tr>
                                            </tbody>

                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Assets -->

                    </div>

                </div>

            </div>

        </div>
    </div>