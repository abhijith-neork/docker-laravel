@extends('admin.layouts.index')
@section('content')
    <!--wrapper-->
    <!--start page wrapper -->

    <div class="page-wrapper">
        <div class="page-content">

            <div class="container-fluid">

                <!--breadcrumb-->
                <div class="page-breadcrumb  d-flex align-items-center mb-3">

                    <div class="ps-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Users</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="btm-for mb-4 text-lg-end">
                            <div class="ms-auto">
                                <div class="btn-group">
                                    @if (hasPermission('site_settings.update'))
                                        <button type="button" class="btn template-btn px-5" data-bs-toggle="offcanvas"
                                            href="#offcanvasExample1" role="button" aria-controls="offcanvasExample1">Add
                                        </button>
                                    @endif


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="title-head d-flex justify-content-between">
                    <h6 class="mb-0 text-uppercase">Settings</h6>

                </div>

                <hr />

                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <ul>
                                {{ session('success') }}
                            </ul>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <ul>
                                {{ session('error') }}
                            </ul>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="container-fluid">

                            <form id="settings-create" class="row g-3 needs-validation" novalidate method="post"
                                action="{{ route('user.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label for="bsValidation1" class="form-label">Website Name<span>*</span></label>
                                    <input type="text" class="form-control @error('website_name') is-invalid @enderror"
                                        id="bsValidation1" placeholder="Name" value="{{ old('website_name') }}"
                                        name="website_name" required>
                                    @error('website_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="inputEmailAddress" class="form-label">Email Address<span>*</span></label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress"
                                        placeholder="example@user.com" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="col-md-12">
                                    <label for="inputMobileNumber" class="form-label">Mobile Number<span>*</span></label>
                                    <div class="input-group">

                                        <span class="input-group-text">+91</span>

                                        <input type="text" name="mobile_number"
                                            class="form-control @error('mobile_number') is-invalid @enderror"
                                            id="inputMobilenumber" placeholder="9876543210"
                                            value="{{ old('mobile_number') }}">
                                    </div>
                                    <p id="mob-val"></p>
                                    @error('mobile_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="custom__form__inputs">
                                        <label for="Select__2" class="form-label">User Role</label>
                                        <div class="custom__select__2">
                                            <select class="form-select" name="user_role" id="user_role">

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="custom__form__inputs">
                                        <label for="Select__2" class="form-label">Profile Image</label>
                                        <div class="custom__select__2 position-relative">
                                            <a type="button" class="image_close d-none" id="removeImageButtonAdd">
                                                <span aria-hidden="true">&times;</span>
                                            </a>

                                            <img src="" height="100px" style="width: 100px; margin-bottom:20px;"
                                                alt="" id="previewImageAdd" class="d-none">
                                            <input type="file" name="profile_image"
                                                class="form-control @error('profile_image_add') is-invalid @enderror"
                                                id="inputProfileImageAdd" value="">
                                            <p class="text-danger"><small>Format: jpeg, png, jpg | Size: &lt; 4MB</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12" id="show_hide_password">
                                    <label for="inputChoosePassword" class="form-label">Password<span>*</span></label>
                                    <div class="show-password-eye">
                                        <a href="javascript:;" class="input-group-text bg-transparent border-0"><i
                                                class='bx bx-hide'></i></a>
                                    </div>
                                    <input name="password" type="password"
                                        class="form-control  @error('password') is-invalid @enderror"
                                        id="inputChoosePassword" value="" placeholder="Enter Password"
                                        autocomplete="off">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12" id="show_hide_password-c">
                                    <label for="inputChoosePassword" class="form-label">
                                        Re-enter
                                        Password<span>*</span></label>
                                    <div class="show-password-eye">
                                        <a href="javascript:;" class="input-group-text bg-transparent border-0"><i
                                                class='bx bx-hide'></i></a>
                                    </div>
                                    <input name="confirm_password" type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        id="inputConfirmPassword" placeholder="Reenter Password" autocomplete="off">

                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="custom__form__inputs">
                                        <label for="select" class="form-label"> Status<span>*</span></label>
                                        <div class="normal__select">
                                            <select class="form-select" id="status" name="status">
                                                <option value="">Select</option>
                                                <option value="1" selected>Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <hr style="opacity: .15;">

                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--end page wrapper -->


    <!-- search modal -->
    <div class="modal" id="SearchModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header gap-2">
                    <div class="position-relative popup-search w-100">
                        <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                            placeholder="Search">
                        <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i
                                class='bx bx-search'></i></span>
                    </div>
                    <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

            </div>
        </div>
    </div>
    <!-- end search modal -->


    <!-- Modal  delete-->
    <div class="modal fade user-modal" id="dltModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 style="text-align: center;font-size: 22px;"> Do you want to delete User?
                    </h2>
                </div>
                <div class="modal-footer text-center">
                    <form name="delete-user" id="delete-user" action="{{ route('user.destroy') }}" method="post">
                        @csrf

                        <input type="hidden" name="user_id" id="dlt_user_id">
                        <button type="submit" class="btn template-btn">Yes</button>
                        <button type="button" class="btn template-btn" data-bs-dismiss="modal">No</button>

                    </form>

                </div>
            </div>
        </div>
    </div>









@endsection
