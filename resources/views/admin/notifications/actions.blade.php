
@if (hasPermission('employee-category.destroy'))
    <span>
        <a href="#" class="delete-item delete_notification_btn" data-bs-toggle="modal" title="Delete"
            data-bs-target="#dltModal" data-id="{{ Crypt::encrypt($record->id) }}"> <i
                class="fa fa-close dlt-icon"></i></a>
    </span>
@endif
