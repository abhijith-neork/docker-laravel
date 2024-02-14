<div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="offcanvasExample1">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal1">Add New Leave Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">

            <form id="leave_type-create" class="row g-3 needs-validation" novalidate method="post"
                action="{{ route('leave_type.store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="leave_type_code" class="form-label">Leave Type Code<span>*</span></label>
                    <input type="text" class="form-control @error('leave_type_code') is-invalid @enderror" id="leave_type_code"
                        placeholder="Leave Type Code" value="{{ old('leave_type_code') }}" name="leave_type_code" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="leave_type_name" class="form-label">Leave Type Name<span>*</span></label>
                    <input type="text" class="form-control @error('leave_type_name') is-invalid @enderror" id="leave_type_name"
                        placeholder="Leave Type Name" value="{{ old('leave_type_name') }}" name="leave_type_name" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12">
                        <div class="custom__form__inputs">
                            <label for="status" class="form-label">Status<span>*</span></label>
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
            <button type="submit" form="leave_type-create" class="btn  px-4  template-btn ">Add</button>
            <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close">Cancel</button>
        </div>
    </div>
</div>