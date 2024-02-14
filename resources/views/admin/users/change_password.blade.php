  <!--Modal ChangePassword-->
  <div class="modal fade user-modal" id="changepassModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="#gridSystemModal1"> Change Password</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="user-change-password" class="row g-3 needs-validation" novalidate method="post"
                    action="{{ route('user.changepassword') }}">
                    @csrf

                    <input type="hidden" name="user_id" id="change_pass_user_id">
                    <div class="col-md-12">
                        <label for="inputEmailAddress" class="form-label ">Email Address</label>
                        <input type="email" name="email"
                            class="form-control userEmail @error('email') is-invalid @enderror" id="inputEmailAddress"
                            value="{{ old('email') }}" disabled>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="col-md-12 mt-2" id="show_hide_password">
                        <label for="inputChoosePassword" class="form-label">New Password<span>*</span></label>
                        <div class="show-password-eye">
                            <a href="javascript:;" class="input-group-text bg-transparent border-0"><i
                                    class='bx bx-hide'></i></a>
                        </div>
                        <input name="new_password" type="password"
                            class="form-control  @error('new_password') is-invalid @enderror"
                            id="inputChooseNewPassword" value="" placeholder="Enter Password" autocomplete="off">

                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-2" id="show_hide_password-c">
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
                    <div class="modal-footer text-center">

                        <button type="submit" class="btn template-btn" >Change Password</button>
                        <button type="button" class="btn template-btn" data-bs-dismiss="modal">cancel</button>


                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



<!-- Modal Confirm Changepassword -->
<div class="modal fade" id="confirmChangePassModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 style="text-align: center;font-size: 22px;"> Are you sure you want to change the password?</h2>
            </div>
            <div class="modal-footer text-center">


                <button class="btn template-btn px-5 confirmYes" id="confirmChangePassBtn">Yes</button>
                <button type="button" class="btn template-btn" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>