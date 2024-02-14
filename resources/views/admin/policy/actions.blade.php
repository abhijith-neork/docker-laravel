@if (hasPermission('policy.update'))
    <span>
        <a href="#policyEditForm" class="edit-item edit_policy_btn" title="Edit" data-id="{{ Crypt::encrypt($record->id) }}"
            data-bs-toggle="offcanvas" href="#policyEditForm" role="button" aria-controls="offcanvasExample1">
            <i class=" icon-close   fas fa-edit"></i></a>
    </span>
@endif

@if (hasPermission('policy.destroy'))
    <span>
        <a href="#" class="delete-item delete_policy_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="{{ Crypt::encrypt($record->id) }}"> <i
                class="fa fa-close dlt-icon"></i></a>
    </span>
@endif
