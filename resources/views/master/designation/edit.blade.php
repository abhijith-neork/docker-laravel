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
                        href="#designationEditForm" role="button" aria-controls="offcanvasExample1">Yes
                    </button>

                    <button type="button" class="btn template-btn" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>


    <div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="designationEditForm">
        <div class="offcanvas-header">
            <h5 class="modal-title" id="#gridSystemModal1">Edit Designation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa fa-close"></i>
            </button>

        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">

                <form id="designation-edit" class="row g-3 needs-validation" novalidate method="post"
                    action="{{ route('designation.update') }}" enctype="multipart/form-data">
                    <input type="hidden" id="designation_id" name="designation_id">
                    @csrf
                    <div class="col-md-12">
                        <label for="designation_code" class="form-label">Designation Code<span>*</span></label>
                        <input type="text" class="form-control designationCode" id="designation_code" placeholder="Designation Code"
                            value="" name="designation_code" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="designation_name" class="form-label">Designation Name<span>*</span></label>
                        <input type="text" class="form-control designationName" id="designation_name" placeholder="Designation Name"
                            value="" name="designation_name" required>
                        <div class="invalid-feedback">
                        </div>
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
                <button type="submit" form="designation-edit" class="btn  px-4  template-btn ">Update</button>
                <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                    aria-label="Close">Cancel</button>
            </div>
        </div>

    </div>
