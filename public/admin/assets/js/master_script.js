
$(document).ready(function () {
    $('.alert-success').delay(3000).fadeOut();
    $('.alert-danger').delay(3000).fadeOut();

    $("#date").datepicker({
        dateFormat: 'dd-mm-yy',
        minDate: 0
    });


    $(document).on("click", ".delete_technology_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_technology_id").val(id);
    });


    $(document).on("click", ".view_technology_btn, .edit_technology_btn", function () {

        let id = $(this).data('id');
        let type = $(this).data('type');
        let responseData = technologyDetails(id);
        var permissionsHtml = '';
        var name = responseData.data.technology_name;
        var status = responseData.data.status;
        var permissions = responseData.permissions;
        var technology_permissions = responseData.technology_permissions;

        for (var permissionKey in permissions) {
            permissionsHtml += '<div class="form-group row">';
            permissionsHtml += '<label class="col-md-2">' + permissionKey + '</label>';
            permissionsHtml += '<div class="col-lg-12">';

            var permissionOptions = permissions[permissionKey];

            for (var permissionOptionKey in permissionOptions) {
                var isChecked = technology_permissions.includes(permissionKey + '-' + permissionOptionKey);
                permissionsHtml += '<div class="form-check form-check-inline">';
                permissionsHtml += '<input class="form-check-input" type="checkbox" id="' + permissionKey + '-' + permissionOptionKey + '" name="permissions[]" value="' + permissionKey + '-' + permissionOptionKey + '" ' + (isChecked ? 'checked' : '') + (type !== 'edittechnology' ? ' disabled' : '') + '>';

                permissionsHtml += '<label class="form-check-label font-weight-light" for="' + permissionKey + '-' + permissionOptionKey + '">' + permissionOptionKey + '</label>';
                permissionsHtml += '</div>';
            }

            permissionsHtml += '</div>';
            permissionsHtml += '</div>';
        }

        $('.error').html('');
        $('input, textarea').removeClass('error');
        const validInputs = document.querySelectorAll('input:valid');

        validInputs.forEach(input => {
            input.value = ''; // Reset the input value
            input.setAttribute('aria-invalid', 'true'); // Set aria-invalid to "true"
            input.setCustomValidity(''); // Remove any custom validity messages
        });

        if (type == 'edittechnology') {
            $("#technologyEditForm #technology_id").val(id);
            $("#technologyEditForm .technologyName").val(name);
            $("#technologyEditForm #status").val(status);
            $('#technologyEditForm .technologyPermissions').html(permissionsHtml);
        } else {
            $("#viewtechnologyModal .technologyName").val(name);
            $("#viewtechnologyModal #status").val(status);
            $('#viewtechnologyModal .technologyPermissions').html(permissionsHtml);

        }

    });

    function technologyDetails(id) {
        let responseData;
        // var technologyDetailsUrl = "{{ route('technology.details') }}";
        $.ajax({
            url: '/technology/details',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'technology_id': id },
            success: function (response) {
                responseData = response;
            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
            },
            async: false  // If you need the response immediately, you can keep async: false
        });
        return responseData; // Return the response data
    }


    $(document).on("click", ".delete_skill_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_skill_id").val(id);
    });


    $(document).on("click", ".view_skill_btn, .edit_skill_btn", function () {

        let id = $(this).data('id');
        let type = $(this).data('type');
        let responseData = skillDetails(id);
        var permissionsHtml = '';
        var name = responseData.data.skill_name;
        var status = responseData.data.status;
        var permissions = responseData.permissions;
        var skill_permissions = responseData.skill_permissions;

        for (var permissionKey in permissions) {
            permissionsHtml += '<div class="form-group row">';
            permissionsHtml += '<label class="col-md-2">' + permissionKey + '</label>';
            permissionsHtml += '<div class="col-lg-12">';

            var permissionOptions = permissions[permissionKey];

            for (var permissionOptionKey in permissionOptions) {
                var isChecked = skill_permissions.includes(permissionKey + '-' + permissionOptionKey);
                permissionsHtml += '<div class="form-check form-check-inline">';
                permissionsHtml += '<input class="form-check-input" type="checkbox" id="' + permissionKey + '-' + permissionOptionKey + '" name="permissions[]" value="' + permissionKey + '-' + permissionOptionKey + '" ' + (isChecked ? 'checked' : '') + (type !== 'editskill' ? ' disabled' : '') + '>';

                permissionsHtml += '<label class="form-check-label font-weight-light" for="' + permissionKey + '-' + permissionOptionKey + '">' + permissionOptionKey + '</label>';
                permissionsHtml += '</div>';
            }

            permissionsHtml += '</div>';
            permissionsHtml += '</div>';
        }

        $('.error').html('');
        $('input, textarea').removeClass('error');
        const validInputs = document.querySelectorAll('input:valid');

        validInputs.forEach(input => {
            input.value = ''; // Reset the input value
            input.setAttribute('aria-invalid', 'true'); // Set aria-invalid to "true"
            input.setCustomValidity(''); // Remove any custom validity messages
        });

        if (type == 'editskill') {
            $("#skillEditForm #skill_id").val(id);
            $("#skillEditForm .skillName").val(name);
            $("#skillEditForm #status").val(status);
            $('#skillEditForm .skillPermissions').html(permissionsHtml);
        } else {
            $("#viewskillModal .skillName").val(name);
            $("#viewskillModal #status").val(status);
            $('#viewskillModal .skillPermissions').html(permissionsHtml);

        }

    });

    function skillDetails(id) {
        let responseData;
        // var skillDetailsUrl = "{{ route('skill.details') }}";
        $.ajax({
            url: '/skill/details',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'skill_id': id },
            success: function (response) {
                responseData = response;
            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
            },
            async: false  // If you need the response immediately, you can keep async: false
        });
        return responseData; // Return the response data
    }
    $(document).on("click", ".delete_designation_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_designation_id").val(id);
    });


    $(document).on("click", ".view_designation_btn, .edit_designation_btn", function () {

        let id = $(this).data('id');
        let type = $(this).data('type');
        let responseData = designationDetails(id);
        var permissionsHtml = '';
        var name = responseData.data.designation_name;
        var code = responseData.data.designation_code;
        var status = responseData.data.status;
        var permissions = responseData.permissions;
        var designation_permissions = responseData.designation_permissions;

        for (var permissionKey in permissions) {
            permissionsHtml += '<div class="form-group row">';
            permissionsHtml += '<label class="col-md-2">' + permissionKey + '</label>';
            permissionsHtml += '<div class="col-lg-12">';

            var permissionOptions = permissions[permissionKey];

            for (var permissionOptionKey in permissionOptions) {
                var isChecked = designation_permissions.includes(permissionKey + '-' + permissionOptionKey);
                permissionsHtml += '<div class="form-check form-check-inline">';
                permissionsHtml += '<input class="form-check-input" type="checkbox" id="' + permissionKey + '-' + permissionOptionKey + '" name="permissions[]" value="' + permissionKey + '-' + permissionOptionKey + '" ' + (isChecked ? 'checked' : '') + (type !== 'editdesignation' ? ' disabled' : '') + '>';

                permissionsHtml += '<label class="form-check-label font-weight-light" for="' + permissionKey + '-' + permissionOptionKey + '">' + permissionOptionKey + '</label>';
                permissionsHtml += '</div>';
            }

            permissionsHtml += '</div>';
            permissionsHtml += '</div>';
        }

        $('.error').html('');
        $('input, textarea').removeClass('error');
        const validInputs = document.querySelectorAll('input:valid');

        validInputs.forEach(input => {
            input.value = ''; // Reset the input value
            input.setAttribute('aria-invalid', 'true'); // Set aria-invalid to "true"
            input.setCustomValidity(''); // Remove any custom validity messages
        });

        if (type == 'editdesignation') {
            $("#designationEditForm #designation_id").val(id);
            $("#designationEditForm .designationName").val(name);
            $("#designationEditForm .designationCode").val(code);
            $("#designationEditForm #status").val(status);
            $('#designationEditForm .designationPermissions').html(permissionsHtml);
        } else {
            $("#viewdesignationModal .designationName").val(name);
            $("#viewdesignationModal .designationCode").val(code);
            $("#viewdesignationModal #status").val(status);
            $('#viewdesignationModal .designationPermissions').html(permissionsHtml);

        }

    });

    function designationDetails(id) {
        let responseData;
        // var designationDetailsUrl = "{{ route('designation.details') }}";
        $.ajax({
            url: '/designation/details',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'designation_id': id },
            success: function (response) {
                responseData = response;
            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
            },
            async: false  // If you need the response immediately, you can keep async: false
        });
        return responseData; // Return the response data
    }


    $(document).on("click", ".delete_leave_type_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_leave_type_id").val(id);
    });


    $(document).on("click", ".view_leave_type_btn, .edit_leave_type_btn", function () {

        let id = $(this).data('id');
        let type = $(this).data('type');
        let responseData = leave_typeDetails(id);
        var permissionsHtml = '';
        var name = responseData.data.leave_type_name;
        var code = responseData.data.leave_type_code;
        var status = responseData.data.status;
        var permissions = responseData.permissions;
        var leave_type_permissions = responseData.leave_type_permissions;

        for (var permissionKey in permissions) {
            permissionsHtml += '<div class="form-group row">';
            permissionsHtml += '<label class="col-md-2">' + permissionKey + '</label>';
            permissionsHtml += '<div class="col-lg-12">';

            var permissionOptions = permissions[permissionKey];

            for (var permissionOptionKey in permissionOptions) {
                var isChecked = leave_type_permissions.includes(permissionKey + '-' + permissionOptionKey);
                permissionsHtml += '<div class="form-check form-check-inline">';
                permissionsHtml += '<input class="form-check-input" type="checkbox" id="' + permissionKey + '-' + permissionOptionKey + '" name="permissions[]" value="' + permissionKey + '-' + permissionOptionKey + '" ' + (isChecked ? 'checked' : '') + (type !== 'editleave_type' ? ' disabled' : '') + '>';

                permissionsHtml += '<label class="form-check-label font-weight-light" for="' + permissionKey + '-' + permissionOptionKey + '">' + permissionOptionKey + '</label>';
                permissionsHtml += '</div>';
            }

            permissionsHtml += '</div>';
            permissionsHtml += '</div>';
        }

        $('.error').html('');
        $('input, textarea').removeClass('error');
        const validInputs = document.querySelectorAll('input:valid');

        validInputs.forEach(input => {
            input.value = ''; // Reset the input value
            input.setAttribute('aria-invalid', 'true'); // Set aria-invalid to "true"
            input.setCustomValidity(''); // Remove any custom validity messages
        });

        if (type == 'editleave_type') {
            $("#leave_typeEditForm #leave_type_id").val(id);
            $("#leave_typeEditForm .leave_typeName").val(name);
            $("#leave_typeEditForm .leave_typeCode").val(code);
            $("#leave_typeEditForm #status").val(status);
            $('#leave_typeEditForm .leave_typePermissions').html(permissionsHtml);
        } else {
            $("#viewleave_typeModal .leave_typeName").val(name);
            $("#viewleave_typeModal .leave_typeCode").val(code);
            $("#viewleave_typeModal #status").val(status);
            $('#viewleave_typeModal .leave_typePermissions').html(permissionsHtml);

        }

    });

    function leave_typeDetails(id) {
        let responseData;
        // var leave_typeDetailsUrl = "{{ route('leave_type.details') }}";
        $.ajax({
            url: '/leave_type/details',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'leave_type_id': id },
            success: function (response) {
                responseData = response;
            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
            },
            async: false  // If you need the response immediately, you can keep async: false
        });
        return responseData; // Return the response data
    }


    $(document).on("click", ".delete_job_role_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_job_role_id").val(id);
    });


    $(document).on("click", ".view_job_role_btn, .edit_job_role_btn", function () {

        let id = $(this).data('id');
        let type = $(this).data('type');
        let responseData = job_roleDetails(id);
        var permissionsHtml = '';
        var name = responseData.data.job_role_name;
        var status = responseData.data.status;
        var permissions = responseData.permissions;
        var job_role_permissions = responseData.job_role_permissions;

        for (var permissionKey in permissions) {
            permissionsHtml += '<div class="form-group row">';
            permissionsHtml += '<label class="col-md-2">' + permissionKey + '</label>';
            permissionsHtml += '<div class="col-lg-12">';

            var permissionOptions = permissions[permissionKey];

            for (var permissionOptionKey in permissionOptions) {
                var isChecked = job_role_permissions.includes(permissionKey + '-' + permissionOptionKey);
                permissionsHtml += '<div class="form-check form-check-inline">';
                permissionsHtml += '<input class="form-check-input" type="checkbox" id="' + permissionKey + '-' + permissionOptionKey + '" name="permissions[]" value="' + permissionKey + '-' + permissionOptionKey + '" ' + (isChecked ? 'checked' : '') + (type !== 'editjob_role' ? ' disabled' : '') + '>';

                permissionsHtml += '<label class="form-check-label font-weight-light" for="' + permissionKey + '-' + permissionOptionKey + '">' + permissionOptionKey + '</label>';
                permissionsHtml += '</div>';
            }

            permissionsHtml += '</div>';
            permissionsHtml += '</div>';
        }

        $('.error').html('');
        $('input, textarea').removeClass('error');
        const validInputs = document.querySelectorAll('input:valid');

        validInputs.forEach(input => {
            input.value = ''; // Reset the input value
            input.setAttribute('aria-invalid', 'true'); // Set aria-invalid to "true"
            input.setCustomValidity(''); // Remove any custom validity messages
        });

        if (type == 'editjob_role') {
            $("#job_roleEditForm #job_role_id").val(id);
            $("#job_roleEditForm .job_roleName").val(name);
            $("#job_roleEditForm #status").val(status);
            $('#job_roleEditForm .job_rolePermissions').html(permissionsHtml);
        } else {
            $("#viewjob_roleModal .job_roleName").val(name);
            $("#viewjob_roleModal #status").val(status);
            $('#viewjob_roleModal .job_rolePermissions').html(permissionsHtml);

        }

    });

    function job_roleDetails(id) {
        let responseData;
        // var job_roleDetailsUrl = "{{ route('job_role.details') }}";
        $.ajax({
            url: '/job_role/details',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'job_role_id': id },
            success: function (response) {
                responseData = response;
            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
            },
            async: false  // If you need the response immediately, you can keep async: false
        });
        return responseData; // Return the response data
    }

    $(document).on("click", ".delete_department_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_department_id").val(id);
    });


    $(document).on("click", ".view_department_btn, .edit_department_btn", function () {

        let id = $(this).data('id');
        let type = $(this).data('type');
        let responseData = departmentDetails(id);
        var permissionsHtml = '';
        var name = responseData.data.department_name;
        var code = responseData.data.department_code;
        var status = responseData.data.status;
        var permissions = responseData.permissions;
        var department_permissions = responseData.department_permissions;

        for (var permissionKey in permissions) {
            permissionsHtml += '<div class="form-group row">';
            permissionsHtml += '<label class="col-md-2">' + permissionKey + '</label>';
            permissionsHtml += '<div class="col-lg-12">';

            var permissionOptions = permissions[permissionKey];

            for (var permissionOptionKey in permissionOptions) {
                var isChecked = department_permissions.includes(permissionKey + '-' + permissionOptionKey);
                permissionsHtml += '<div class="form-check form-check-inline">';
                permissionsHtml += '<input class="form-check-input" type="checkbox" id="' + permissionKey + '-' + permissionOptionKey + '" name="permissions[]" value="' + permissionKey + '-' + permissionOptionKey + '" ' + (isChecked ? 'checked' : '') + (type !== 'editdepartment' ? ' disabled' : '') + '>';

                permissionsHtml += '<label class="form-check-label font-weight-light" for="' + permissionKey + '-' + permissionOptionKey + '">' + permissionOptionKey + '</label>';
                permissionsHtml += '</div>';
            }

            permissionsHtml += '</div>';
            permissionsHtml += '</div>';
        }

        $('.error').html('');
        $('input, textarea').removeClass('error');
        const validInputs = document.querySelectorAll('input:valid');

        validInputs.forEach(input => {
            input.value = ''; // Reset the input value
            input.setAttribute('aria-invalid', 'true'); // Set aria-invalid to "true"
            input.setCustomValidity(''); // Remove any custom validity messages
        });

        if (type == 'editdepartment') {
            $("#departmentEditForm #department_id").val(id);
            $("#departmentEditForm .departmentName").val(name);
            $("#departmentEditForm .departmentCode").val(code);
            $("#departmentEditForm #status").val(status);
            $('#departmentEditForm .departmentPermissions').html(permissionsHtml);
        } else {
            $("#viewdepartmentModal .departmentName").val(name);
            $("#viewdepartmentModal .departmentCode").val(code);
            $("#viewdepartmentModal #status").val(status);
            $('#viewdepartmentModal .departmentPermissions').html(permissionsHtml);

        }

    });

    function departmentDetails(id) {
        let responseData;
        // var departmentDetailsUrl = "{{ route('department.details') }}";
        $.ajax({
            url: '/department/details',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'department_id': id },
            success: function (response) {
                responseData = response;
            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
            },
            async: false  // If you need the response immediately, you can keep async: false
        });
        return responseData; // Return the response data
    }

});