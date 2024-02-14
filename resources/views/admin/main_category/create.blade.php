<div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="offcanvasExample1">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal1">Add New Employee Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">

            <form id="addmaincategory" class="row g-3 needs-validation"  method="post"
                action="{{ route('employee-category.store') }}">
                @csrf
                <div class="col-md-12">
                    <label for="bsValidation1" class="form-label">Category Code<span>*</span></label>
                    <input type="text" class="form-control @error('category_code') is-invalid @enderror"
                        placeholder="Category Code" value="{{ old('category_code') }}" name="category_code" >
                    @error('category_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="bsValidation2" class="form-label">Category Name<span>*</span></label>
                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" 
                        placeholder="Category Name" value="{{ old('category_name') }}" name="category_name">
                    @error('category_name')
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
            <button type="submit" form="addmaincategory" class="btn  px-4  template-btn ">Add</button>
            <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close">Cancel</button>
        </div>
    </div>
</div>