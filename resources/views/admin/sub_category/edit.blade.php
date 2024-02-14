    <!-- Modal edit -->



    <div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="SubCatEditForm">
        <div class="offcanvas-header">
            <h5 class="modal-title" id="#gridSystemModal1">Edit Sub-Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa fa-close"></i>
            </button>

        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">

                <form id="editsubcategory" class="row g-3 needs-validation" novalidate method="post"
                    action="{{ route('sub-category.update') }}" enctype="multipart/form-data">
                    <input type="hidden" id="cat_id" name="cat_id">
                    @csrf
                    <div class="col-md-12">
                        <label for="bsValidation1" class="form-label">Category Code<span>*</span></label>
                        <input type="text" class="form-control categoryCode" placeholder="Category Code"
                            value="" name="category_code" id="categoryCode" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="bsValidation1" class="form-label"> Category Name<span>*</span></label>
                        <input type="text" class="form-control categoryName" placeholder="Category Name"
                            value="" name="category_name" required id="categoryName">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                  
                    <div class="col-md-12">
                        <div class="custom__form__inputs">
                            <label for="select" class="form-label"> Parent Category<span>*</span></label>
                            <div class="normal__select">
                                <select class="form-select" id="parentcategory" name="parent_category">
                                    <option value="">Select</option>
                                    @if ($parent_catergories)
                                        @foreach ($parent_catergories as $category)
                                            <?php $dash = ''; ?>
                                            <option value="{{ $category->id }}">
                                                {{ $category->category_name }}</option>
                                            @if (count($category->subcategory) > 0)
                                                @include('admin.sub_category.subcategories', [
                                                    'subcategories' => $category->subcategory,
                                                    'parent_id' => '',
                                                ])
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
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
                <button type="submit" form="editsubcategory" class="btn  px-4  template-btn ">Update</button>
                <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                    aria-label="Close">Cancel</button>
            </div>
        </div>

    </div>
