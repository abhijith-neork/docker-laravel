@extends('admin.layouts.custom-app')

@section('content')
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            {{ session('success') }}
                                        </ul>
                                    </div>
                                @endif
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        <img
                                                src="{{ asset('admin/assets/images/NeorkProfile-logo.svg') }}"
                                                style="width:40%" alt="" />
                                    </div>
                                    <div class="text-center mb-4">

                                        <p class="mb-0">Please fill the below details to create your account</p>
                                    </div>
                                    <div class="form-body">
                                        <form id="admin-register" class="row g-3" method="POST"
                                            action="{{ route('admin.register') }}">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputUsername" class="form-label">Username</label>
                                                <input type="text"
                                                    class="form-control @error('user_name') is-invalid @enderror"
                                                    name="user_name" value="{{ old('user_name') }}" id="inputUsername"
                                                    placeholder="Jhon">
                                                @error('user_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="inputEmailAddress" placeholder="example@user.com"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                            {{-- <div class="col-12">
                                                <label for="mobile_number" class="form-label">Phone Number</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">+91</span>
                                                    <input type="hidden" name="country_code"value="+91">
                                                    <input type="text" name="mobile_number"
                                                        class="form-control @error('mobile_number') is-invalid @enderror"
                                                        id="inputMobilenumber" placeholder="979845857"
                                                        value="{{ old('mobile_number') }}">
                                                </div>
                                                @error('mobile_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> --}}
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Mobile Number</label>
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



                                            <div class="col-12" id="show_hide_password">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="show-password-eye">
                                                    <a href="javascript:;"
                                                        class="input-group-text bg-transparent border-0"><i
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

                                            <div class="col-12" id="show_hide_password-c">
                                                <label for="inputChoosePassword" class="form-label">
                                                    Re-enter
                                                    Password</label>
                                                <div class="show-password-eye">
                                                    <a href="javascript:;"
                                                        class="input-group-text bg-transparent border-0"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                                <input name="confirm_password" type="password"
                                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                                    id="inputConfirmPassword" placeholder="Reenter Password"
                                                    autocomplete="off">

                                                @error('confirm_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>



                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked agreeToTerms" name="agree_to_terms"
                                                        required>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">I read
                                                        and
                                                        agree to <a href="">Terms & Conditions</a></label>
                                                </div>
                                            </div>
                                            <!-- <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Sign up</button>
                                                </div>
                                            </div> -->
                                            <div class="col-12">
                                                <div class="text-center ">
                                                    <p class="mb-0">Already have an account? <a
                                                            href="{{ route('admin-login-page') }}">Sign in
                                                            here</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
@endsection
