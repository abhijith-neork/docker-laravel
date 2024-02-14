<div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="offcanvasExample1">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal1">Add New Sub-Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">

            <form id="addsubcategory" class="row g-3 needs-validation" method="post"
                action="{{ route('sub-category.store') }}">
                @csrf
                <div class="col-md-12">
                    <label for="bsValidation1" class="form-label">Category Code<span>*</span></label>
                    <input type="text" class="form-control @error('category_code') is-invalid @enderror"
                        placeholder="Category Code" value="{{ old('category_code') }}" name="category_code">
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
                        <label for="select" class="form-label"> Parent Category<span>*</span></label>
                        <div class="normal__select">
                            <select class="form-select" id="parentcategory" name="parent_category">
                                <option value="">Select</option>
                                @if($parent_catergories)
                                    @foreach($parent_catergories as $category)
                                        <?php $dash=''; ?>
                                            <option value="{{$category->id}}"style="font-weight: bold;">{{$category->category_name}}</option>
                                            @if(count($category->subcategory)>0)
                                                @include('admin.sub_category.subcategories',['subcategories' => $category->subcategory,'parent_id' =>''])
                                            @endif
                                    @endforeach
                                @endif
                   
                            </select>
                        </div>
                    </div>
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
            <button type="submit" form="addsubcategory" class="btn  px-4  template-btn ">Add</button>
            <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close">Cancel</button>
        </div>
    </div>
</div>
