<div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="offcanvasExample1">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal1">Add New Department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">

            <form id="department-create" class="row g-3 needs-validation" novalidate method="post"
                action="{{ route('department.store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="department_code" class="form-label">Department Code<span>*</span></label>
                    <input type="text" class="form-control @error('department_code') is-invalid @enderror" id="department_code"
                        placeholder="Department Code" value="{{ old('department_code') }}" name="department_code" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="department_name" class="form-label">Department Name<span>*</span></label>
                    <input type="text" class="form-control @error('department_name') is-invalid @enderror" id="department_name"
                        placeholder="Department Name" value="{{ old('department_name') }}" name="department_name" required>
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
            <button type="submit" form="department-create" class="btn  px-4  template-btn ">Add</button>
            <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close">Cancel</button>
        </div>
    </div>
</div>