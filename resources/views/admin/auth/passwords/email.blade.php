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

                                        <p class="mb-0">Please fill the below details to reset you password</p>
                                    </div>


                                    <div class="form-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <form id="forgot-password-form" class="row g-3" method="POST"
                                            action="{{ route('password.email') }}">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email</label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="col-12">

                                                {{-- <div class="captcha-main">
                                                    <div id="user-input" class="inline">
                                                        <input id="captcha" type="text" class="form-control"
                                                            placeholder="Enter Captcha" name="captcha">

                                                    </div>
                                                    <div id="image-captcha" class="inline captcha" selectable="False">
                                                        <p>{!! captcha_img() !!}</p>
                                                    </div>

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
                                                </div>


                                            </div> --}}



                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Send Password Reset Link') }}
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
