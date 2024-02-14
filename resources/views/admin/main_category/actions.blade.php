@if (hasPermission('employee-category.update'))
    <span>
        <a href="#MainCatEditForm" class="edit-item edit_main_cat_btn" title="Edit" data-id="{{ Crypt::encrypt($record->id) }}"
            data-bs-toggle="offcanvas" href="#MainCatEditForm" role="button" aria-controls="offcanvasExample1">
            <i class=" icon-close   fas fa-edit"></i></a>
    </span>
@endif

@if (hasPermission('employee-category.destroy'))
    <span>
        <a href="#" class="delete-item delete_main_cat_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="{{ Crypt::encrypt($record->id) }}"> <i
                class="fa fa-close dlt-icon"></i></a>
    </span>
@endif
