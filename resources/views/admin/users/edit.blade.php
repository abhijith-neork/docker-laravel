    <!-- Modal edit -->
   
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 style="text-align: center;font-size: 22px;"> Do you want to edit data?</h2>
                </div>
                <div class="modal-footer text-center">


                    <button type="button" class="btn template-btn px-5 confirmYes" data-bs-toggle="offcanvas"
                        href="#userEditForm" role="button" aria-controls="offcanvasExample1">Yes
                    </button>

                    <button type="button" class="btn template-btn" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>


    <div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="userEditForm">
        <div class="offcanvas-header">
            <h5 class="modal-title" id="#gridSystemModal1">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa fa-close"></i>
            </button>

        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">

                <form id="user-edit" class="row g-3 needs-validation" novalidate method="post"
                    action="{{ route('user.update') }}" enctype="multipart/form-data">
                    <input type="hidden" id="user_id" name="user_id">
                    @csrf
                    <div class="col-md-12">
                        <label for="bsValidation1" class="form-label"> Name<span>*</span></label>
                        <input type="text" class="form-control userName" id="bsValidation1" placeholder="Name"
                            value="" name="name" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label for="inputEmailAddress" class="form-label">Email Address<span>*</span></label>
                        <input type="email" name="email"
                            class="form-control userEmail @error('email') is-invalid @enderror" id="inputEmailAddress"
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
                            id="user_mobile" placeholder="9876543210"
                            value="">
                        </div>
                        <p id="mob-val-edit"></p>
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
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="custom__form__inputs">
                            <label for="Select__2" class="form-label">Profile Image</label>
                            <div class="custom__select__2 position-relative">
                                <a type="button" class="image_close" id="removeImageButtonEdit">
                                    <span aria-hidden="true">&times;</span>
                                </a>

                                <img src="" height="100px" style="width: 100px; margin-bottom:20px;" alt=""
                                    id="previewImageEdit">
                                <input type="file" name="profile_image"
                                    class="form-control @error('profile_image_edit') is-invalid @enderror"
                                    id="inputProfileImageEdit" value="">
                                <p class="text-danger"><small>Format: jpeg, png, jpg | Size: &lt; 4MB</small></p>
                                <input type="hidden" name="remove_profile_image" id="removeprofileimage"
                                    value="">

                            </div>
                        </div>
                    </div>





                    <div class="col-md-12">
                        <div class="custom__form__inputs">
                            <label for="select" class="form-label">Status<span>*</span></label>
                            <div class="normal__select">
                                <select class="form-select" id="status" name="status">
                                    <option value="">Select</option>
                                    <option value="1">Active</option>
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
                <button type="submit" form="user-edit" class="btn  px-4  template-btn ">Update</button>
                <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                    aria-label="Close">Cancel</button>
            </div>
        </div>

    </div>
