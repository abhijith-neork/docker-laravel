@if (hasPermission('sub-category.update'))
    <span>
        <a href="#SubCatEditForm" class="edit-item edit_sub_cat_btn" title="Edit" data-id="{{ Crypt::encrypt($record->id) }}"
            data-bs-toggle="offcanvas" href="#SubCatEditForm" role="button" aria-controls="offcanvasExample1">
            <i class=" icon-close   fas fa-edit"></i></a>
    </span>
@endif

@if (hasPermission('sub-category.destroy'))
    <span>
        <a href="#" class="delete-item delete_sub_cat_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="{{ Crypt::encrypt($record->id) }}"> <i
                class="fa fa-close dlt-icon"></i></a>
    </span>
@endif
