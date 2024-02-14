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
                    href="#roleEditForm" role="button" aria-controls="offcanvasExample1">Yes
                </button>

                <button type="button" class="btn template-btn" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="roleEditForm">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal12">Edit Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
      
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">

            <form id="role-edit-form" class="row g-3 needs-validation" novalidate method="post" action="{{ route('role.update') }}">
                <input type="hidden" id="role_id" name="role_id"> 
                @csrf
                <div class="col-md-12">
                    <label for="bsValidation1" class="form-label">Role Name<span>*</span></label>
                    <input type="text" class="form-control roleName" placeholder="Name" value=""
                        name="name" required>
                    <div class="invalid-feedback">
                    </div>
                </div>


                <div class="col-md-12">
                    <label for="bsValidation13" class="form-label">Description<span>*</span></label>
                    <textarea name="description" class="form-control roleDesc"  placeholder="Description ..." rows="3"
                        required></textarea>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div  class="col-lg-12 col-sm-12">
                        <h6>Permisssions</h6>

                        <div class="rolePermissions">
                              
                        </div>

                    </div>
                </div>




                <hr style="opacity: .15;">
        
            </form>

        </div>
    </div>
    <div class="button-footer">
        <div class="d-md-flex d-flex d-grid align-items-center gap-3 justify-content-end">
            <button type="submit" form="role-edit-form" class="btn  px-4  template-btn ">Update</button>
            <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close">Cancel</button>
        </div>
    </div>
</div>