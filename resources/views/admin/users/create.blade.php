<div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="offcanvasExample1">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal1">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">

            <form id="user-create" class="row g-3 needs-validation" novalidate method="post"
                action="{{ route('user.store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="bsValidation1" class="form-label">Name<span>*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="bsValidation1"
                        placeholder="Name" value="{{ old('name') }}" name="name" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="inputEmailAddress" class="form-label">Email Address<span>*</span></label>
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
                                <option value="">Select</option>
                                @foreach($roles as $index=>$key)
                                    <option @if($key->id == old('user_role')) selected @endif value="{{$key->id}}">{{$key->name}}</option>
                                @endforeach
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
                           
                            <img src="" height="100px" style="width: 100px; margin-bottom:20px;" alt="" id="previewImageAdd" class="d-none">
                            <input type="file" name="profile_image" class="form-control @error('profile_image_add') is-invalid @enderror" id="inputProfileImageAdd" value="">
                            <p class="text-danger"><small>Format: jpeg, png, jpg | Size: &lt; 4MB</small></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" id="show_hide_password">
                    <label for="inputChoosePassword" class="form-label">Password<span>*</span></label>
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

                <div class="col-md-12" id="show_hide_password-c">
                    <label for="inputChoosePassword" class="form-label">
                        Re-enter
                        Password<span>*</span></label>
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

    <div class="button-footer">
        <div class="d-md-flex d-flex d-grid align-items-center gap-3 justify-content-end">
            <button type="submit" form="user-create" class="btn  px-4  template-btn ">Add</button>
            <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close">Cancel</button>
        </div>
    </div>
</div>