<div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="offcanvasExample1">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal1">Add New Policy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">

            <form id="addpolicy" class="row g-3 needs-validation"  method="post"
                action="{{ route('policy.store') }}">
                @csrf
                <div class="col-md-12">
                    <label for="bsValidation1" class="form-label">Title<span>*</span></label>
                    <input type="text" class="form-control @error('policy_title') is-invalid @enderror"
                        placeholder="Title" value="{{ old('policy_title') }}" name="policy_title" >
                    @error('policy_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="bsValidation2" class="form-label">Description<span>*</span></label>
                    <textarea class="form-control @error('policy_description') is-invalid @enderror" placeholder="Description" name="policy_description">{{ old('policy_description') }}</textarea>
                    @error('policy_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            
                <div class="col-md-6">
                    <label for="bsValidation1" class="form-label">Effective From<span>*</span></label>
                    <input type="date" class="form-control @error('effective_from') is-invalid @enderror"
                        placeholder="Effective From" value="{{ old('effective_from') }}" name="effective_from" >
                    @error('effective_from')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6">
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
            <button type="submit" form="addpolicy" class="btn  px-4  template-btn ">Add</button>
            <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close">Cancel</button>
        </div>
    </div>
</div>