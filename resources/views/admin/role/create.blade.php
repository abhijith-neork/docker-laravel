<div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="offcanvasExample1">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal1">Add New Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">

            <form id="role-create-form" class="row g-3 needs-validation role-create-form" novalidate method="post"
                action="{{ route('role.create') }}">
                @csrf
                <div class="col-md-12">
                    <label for="bsValidation1" class="form-label">Role Name<span>*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="bsValidation1"
                        placeholder="Name" value="{{ old('name') }}" name="name" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="col-md-12">
                    <label for="bsValidation13" class="form-label">Description<span>*</span></label>
                    <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="bsValidation13"
                        placeholder="Description ..." rows="3" required></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <hr>

                <div class="row">
                    <div id="permissions" class="col-lg-12 col-sm-12">
                        <h6>Permisssions</h6>
                        @foreach ($permissions as $permissionKey => $permissionOptions)
                            <div class="form-group row">
                                <label class="col-md-2 m-2 fw-bold">{{ $permissionKey }}</label>
                                <div class="col-lg-12">
                                    @foreach ($permissionOptions as $permissionOptionKey => $permissionOptionValue)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                id="{{ $permissionKey }}-{{ $permissionOptionKey }}"
                                                name="permissions[]"
                                                value="{{ $permissionKey }}-{{ $permissionOptionKey }}">
                                            <label class="form-check-label font-weight-light"
                                                for="{{ $permissionKey }}-{{ $permissionOptionKey }}">{{ $permissionOptionKey }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>




                <hr style="opacity: .15;">

            </form>

        </div>
    </div>
    <div class="button-footer">
        <div class="d-md-flex d-flex d-grid align-items-center gap-3 justify-content-end">
            <button type="submit" form="role-create-form" class="btn  px-4  template-btn ">Add</button>
            <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close">Cancel</button>
        </div>
    </div>
</div>
