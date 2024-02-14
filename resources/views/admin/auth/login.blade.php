@extends('admin.layouts.custom-app')

@section('content')
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        <img src="/admin/assets/images/NeorkProfile-logo.svg"
                                                style="width:40%" alt="" />
                                    </div>
                                    <div class="text-center mb-4">

                                        <p class="mb-0">Please fill the below details to create your account</p>
                                    </div>

                                    <style>
                                        .error-msg {
                                            color: red
                                        }

                                        .captcha img {
                                            width: 100%;
                                            height: 50%;
                                        }
                                    </style>

                                    <div class="form-body">
                                        <form id="loginForm" class="row g-3" method="POST"
                                            action="{{ route('admin.login') }}">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email</label>
                                                <input type="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror "
                                                    id="inputEmailAddress" placeholder="Enter Email" name="email"
                                                    value="{{ old('email') }}" autocomplete="email" autofocus>

                                                @if ($errors->has('email'))
                                                    <br>
                                                    <span class="help-block">
                                                        <strong class="error-msg">{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-12" id="show_hide_password">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="show-password-eye">
                                                    <a href="javascript:;"
                                                        class="input-group-text bg-transparent border-0"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                                <input type="password"
                                                    class="form-control  @error('password') is-invalid @enderror  "
                                                    id="inputPassword" name="password" value=""
                                                    placeholder="Enter Password" autocomplete="current-password">

                                                @if ($errors->has('password'))
                                                    <br>
                                                    <span class="help-block">
                                                        <strong class="error-msg">{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>


                                            <div class="col-md-6">
                                                <div class="col-md-12"><a href="{{ route('password.request') }}">Forgot Password ?</a>
                                                </div>

                                            </div>

                                            <div class="col-12">

                                                {{-- <div class="g-recaptcha" id="feedback-recaptcha"
                                                    data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
                                                </div>

                                                @if ($errors->has('g-recaptcha-response'))
                                                    <br>
                                                    <span class="help-block">
                                                        <strong
                                                            class="error-msg">{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif --}}


                                                <div class="captcha-main">
                                                    <div id="user-input" class="inline">
                                                        <input id="captcha" type="text" class="form-control"
                                                            placeholder="Enter Captcha" name="captcha">

                                                    </div>
                                                    <div id="image-captcha" class="inline captcha" selectable="False">
                                                        <p>{!! captcha_img() !!}</p>
                                                    </div>
                                                    {{-- <div class="inline" onclick="generate()">
                                                       
                                                    </div> --}}
                                                    <a type="button" class="reload inline btn-refresh" id="reload">
                                                        <i class="fas fa-sync"></i></a>
                                                    @if ($errors->has('captcha'))
                                                        <br>
                                                        <span class="help-block">
                                                            <strong
                                                                class="error-msg">{{ $errors->first('captcha') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                        <strong id="captcha-val"></strong>

                                                    {{-- <p id="key"></p> --}}

                                                </div>

                                                <div class="col-12 mt-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>



                                                {{-- <div class="form-group mt-4 mb-4">
                                                    <div class="captcha">
                                                        <span>{!! captcha_img() !!}</span>
                                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                            &#x21bb;
                                                        </button>
                                                    </div>
                                                </div>


                                                <div class="form-group mb-4">
                                                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                                </div> --}}

                                            </div>



                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Login') }}
                                                    </button>
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
    <!--end wrapper-->
@endsection
