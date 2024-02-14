
$(document).ready(function () {
    $('.alert-success').delay(3000).fadeOut();
    $('.alert-danger').delay(3000).fadeOut();

    $("#date").datepicker({
        dateFormat: 'dd-mm-yy',
        minDate: 0
    });

    $('#recipient-select').multiselect({
        includeSelectAllOption: false,
        selectAllValue: 'select-all-value',
        enableFiltering: false
    });
    // $(".confirmYes").click(function () {
    //     // Close the modal
    //     $("#editModal").modal("hide");
    // });

    $(document).on("click", ".delete_role_btn", function () {
        let id = $(this).data('id');
        $(".role-modal #dlt_role_id").val(id);
    });

    $(document).on("click", ".delete_user_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_user_id").val(id);
    });


    $(document).on("click", ".view_role_btn, .edit_role_btn", function () {

        let id = $(this).data('id');
        let type = $(this).data('type');
        let responseData = roleDetails(id);
        var permissionsHtml = '';
        var name = responseData.data.name;
        var desc = responseData.data.description;
        var permissions = responseData.permissions;
        var role_permissions = responseData.role_permissions;

        for (var permissionKey in permissions) {
            permissionsHtml += '<div class="form-group row">';
            permissionsHtml += '<label class="col-md-2">' + permissionKey + '</label>';
            permissionsHtml += '<div class="col-lg-12">';

            var permissionOptions = permissions[permissionKey];

            for (var permissionOptionKey in permissionOptions) {
                var isChecked = role_permissions.includes(permissionKey + '-' + permissionOptionKey);
                permissionsHtml += '<div class="form-check form-check-inline">';
                permissionsHtml += '<input class="form-check-input" type="checkbox" id="' + permissionKey + '-' + permissionOptionKey + '" name="permissions[]" value="' + permissionKey + '-' + permissionOptionKey + '" ' + (isChecked ? 'checked' : '') + (type !== 'editrole' ? ' disabled' : '') + '>';

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

        if (type == 'editrole') {
            $("#roleEditForm #role_id").val(id);
            $("#roleEditForm .roleName").val(name);
            $("#roleEditForm .roleDesc").val(desc);
            $('#roleEditForm .rolePermissions').html(permissionsHtml);
        } else {
            $("#viewroleModal .roleName").val(name);
            $("#viewroleModal .roleDesc").val(desc);
            $('#viewroleModal .rolePermissions').html(permissionsHtml);

        }

    });

    function roleDetails(id) {
        let responseData;
        // var roleDetailsUrl = "{{ route('role.details') }}";
        $.ajax({
            url: '/role/details',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'role_id': id },
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

    $(document).on("click", ".edit_user_btn", function () {

        let id = $(this).data('id');

        let responseData = userDetails(id);
        var name = responseData.data.name;
        var email = responseData.data.email;
        var mobile = responseData.data.mobile;

        var role_id = responseData.data.role ? responseData.data.role.id : '';
        var status = responseData.data.status;
        var profileImage = responseData.data.profile_image;
        var profileImagePath = '/admin/assets/uploads/profile_image/' + profileImage;

        $('.error').html('');
        $('input, textarea').removeClass('error');
        $("#userEditForm #user_id").val(id);
        $("#userEditForm .userName").val(name);
        $("#userEditForm .userEmail").val(email);
        $("#userEditForm #user_mobile").val(mobile);
        $("#userEditForm #user_role").val(role_id);
        $("#userEditForm #status").val(status);
        $("#userEditForm #removeprofileimage").val('');

        $("#userEditForm #inputProfileImageEdit").prev('img').attr('src', profileImagePath);

        var $profileImage = $("#userEditForm #inputProfileImageEdit").prev('img');

        if (profileImage) {
            $profileImage.attr('src', profileImagePath);
            $profileImage.removeClass('d-none');
            $profileImage.prev('a').removeClass('d-none');
            $profileImage.prev('a').addClass('d-block');
        } else {
            $profileImage.prev('a').removeClass('d-block');
            $profileImage.prev('a').addClass('d-none');
            $profileImage.addClass('d-none');
        }

    });

    $(document).on("click", ".change_pass_btn", function () {

        let id = $(this).data('id');
        let responseData = userDetails(id);
        var email = responseData.data.email;

        $('.error').html('');
        $('input, textarea').removeClass('error');
        $("#changepassModal #change_pass_user_id").val(id);
        $("#changepassModal .userEmail").val(email);
        $("#changepassModal #inputChooseNewPassword").val('');
        $("#changepassModal #inputConfirmPassword").val('');

    });


    $('#confirmChangePassBtn').click(function () {
        $('#user-change-password').off('submit').submit();
    });

    function userDetails(id) {
        let responseData;
        // var roleDetailsUrl = "{{ route('role.details') }}";
        $.ajax({
            url: '/user/details',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'user_id': id },
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


    function handleImageChange(inputId, previewId) {
        var input = document.getElementById(inputId);
        var imagePreview = document.getElementById(previewId);
        var file = input.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            // If no new file is selected, reset the image preview
            imagePreview.src = "";
            imagePreview.classList.add('d-none');
        }
    }

    function handleRemoveImage(buttonId, previewId, inputId) {
        var removeButton = document.getElementById(buttonId);
        var imagePreview = document.getElementById(previewId);
        var inputFile = document.getElementById(inputId);
        var removeImageField = document.getElementById('removeprofileimage');

        removeButton.addEventListener('click', function () {
            // Reset the image preview and clear the file input
            imagePreview.src = "";
            imagePreview.classList.add('d-none');
            inputFile.value = "";
            removeButton.classList.remove('d-block');
            removeButton.classList.add('d-none');
            removeImageField.value = "1";

        });
    }

    // Function to handle image change
    function handleImageInputChange(inputId, previewId, removeButtonId) {
        var inputElement = document.getElementById(inputId);
        var previewElement = document.getElementById(previewId);
        var removeButton = document.getElementById(removeButtonId);

        // Check if the input element exists
        if (inputElement) {
            inputElement.addEventListener('change', function () {
                handleImageChange(inputId, previewId);

                // Check if the remove button exists
                if (removeButton) {
                    removeButton.classList.remove('d-none');
                    removeButton.classList.add('d-block');
                }
            });
        }
    }

    // Function to handle image removal
    function handleRemoveImageButtonClick(removeButtonId, previewId, inputId) {
        var removeButton = document.getElementById(removeButtonId);

        // Check if the remove button exists
        if (removeButton) {
            removeButton.addEventListener('click', function () {
                handleRemoveImage(removeButtonId, previewId, inputId);
            });
        }
    }

    // Usage for "Add" scenario
    handleImageInputChange('inputProfileImageAdd', 'previewImageAdd', 'removeImageButtonAdd');
    handleRemoveImageButtonClick('removeImageButtonAdd', 'previewImageAdd', 'inputProfileImageAdd');

    // Usage for "Edit" scenario
    handleImageInputChange('inputProfileImageEdit', 'previewImageEdit', 'removeImageButtonEdit');
    handleRemoveImageButtonClick('removeImageButtonEdit', 'previewImageEdit', 'inputProfileImageEdit');




    $(document).on("click", ".edit_main_cat_btn", function () {

        let id = $(this).data('id');

        let responseData = categoryDetails(id);
        var code = responseData.data.category_code;
        var name = responseData.data.category_name;
        var status = responseData.data.status;

        $('.error').html('');
        $('input').removeClass('error');
        $("#MainCatEditForm #cat_id").val(id);
        $("#MainCatEditForm #categoryCode").val(code);
        $("#MainCatEditForm #categoryName").val(name);
        $("#MainCatEditForm #status").val(status);

    });

    function categoryDetails(id) {
        let responseData;
        $.ajax({
            url: '/category/details',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'cat_id': id },
            success: function (response) {
                responseData = response;
            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
            },
            async: false  // If you need the response immediately, you can keep async: false
        });
        return responseData;
    }


    $(document).on("click", ".delete_main_cat_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_main_cat_id").val(id);
    });



    $(document).on("click", ".edit_sub_cat_btn", function () {

        let id = $(this).data('id');

        let responseData = categoryDetails(id);
        var code = responseData.data.category_code;
        var name = responseData.data.category_name;
        var parent_category = responseData.data.parent_category_id;
        var status = responseData.data.status;
        $('#SubCatEditForm #parentcategory option').prop('disabled', false);
        $('#SubCatEditForm #parentcategory option[value="' + responseData.data.id + '"]').prop('disabled', true);
        $('.error').html('');
        $('input').removeClass('error');
        $("#SubCatEditForm #cat_id").val(id);
        $("#SubCatEditForm #categoryCode").val(code);
        $("#SubCatEditForm #categoryName").val(name);
        $("#SubCatEditForm #parentcategory").val(parent_category);
        $("#SubCatEditForm #status").val(status);

    });


    $(document).on("click", ".delete_sub_cat_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_sub_cat_id").val(id);
    });

    $(document).on("click", ".delete_notification_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_notification_id").val(id);
    });
    $(document).on("change", "#recipient_type", function () {
        let type = $(this).val();
        $.ajax({
            url: '/recipient-data',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'type': type },
            success: function (response) {
                html='';
                if (response.success) {

                    if (response.data != '') {
                        html+=' <label for="select" class="form-label">Recipient<span>*</span></label>';
                        html+=' <div class="normal__select">';
                        html += '<select id="recipient-select" multiple="multiple" class="form-select" name="recipient[]">';

                        var dataArray = response.data;
                        dataArray.forEach(function (item) {
                            html += '<option value="' + item.id + '">' + item.name + '</option>';
                        });
                        html += '</select>';
                        html += '</div>';


                    } 
                    $('#recipient_outer').html(html);
                    $('#recipient-select').multiselect({
                        includeSelectAllOption: true,
                        selectAllValue: 'select-all-value',
                        enableFiltering: true
                    });
                }

            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
            },
            async: false  // If you need the response immediately, you can keep async: false
        });
    });




    $(document).on("click", ".delete_policy_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #dlt_policy_id").val(id);
    });


    $(document).on("click", ".view_policy_btn, .edit_policy_btn", function () {

        let id = $(this).data('id');
        let type = $(this).data('type');
        let responseData = policyDetails(id);
        var permissionsHtml = '';
        var policy_title = responseData.data.policy_title;
        var policy_description = responseData.data.policy_description;
        var effective_from = responseData.data.effective_from;
        var status = responseData.data.status;
        var permissions = responseData.permissions;
        var policy_permissions = responseData.policy_permissions;

        for (var permissionKey in permissions) {
            permissionsHtml += '<div class="form-group row">';
            permissionsHtml += '<label class="col-md-2">' + permissionKey + '</label>';
            permissionsHtml += '<div class="col-lg-12">';

            var permissionOptions = permissions[permissionKey];

            for (var permissionOptionKey in permissionOptions) {
                var isChecked = policy_permissions.includes(permissionKey + '-' + permissionOptionKey);
                permissionsHtml += '<div class="form-check form-check-inline">';
                permissionsHtml += '<input class="form-check-input" type="checkbox" id="' + permissionKey + '-' + permissionOptionKey + '" name="permissions[]" value="' + permissionKey + '-' + permissionOptionKey + '" ' + (isChecked ? 'checked' : '') + (type !== 'editpolicy' ? ' disabled' : '') + '>';

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

        if (type == 'editpolicy') {
            $("#policyEditForm #policy_id").val(id);
            $("#policyEditForm .policyTitle").val(policy_title);
            $("#policyEditForm .policyDescription").val(policy_description);
            $("#policyEditForm .effectiveFrom").val(effective_from);
            $("#policyEditForm #status").val(status);
            $('#policyEditForm .policyPermissions').html(permissionsHtml);
        } else {
            $("#viewpolicyModal .policyName").val(policy_title);
            $("#policyEditForm .policyDescription").val(policy_description);
            $("#policyEditForm .effectiveFrom").val(effective_from);
            $("#viewpolicyModal #status").val(status);
            $('#viewpolicyModal .policyPermissions').html(permissionsHtml);

        }

    });

    function policyDetails(id) {
        let responseData;
        $.ajax({
            url: '/policy/details',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: { 'policy_id': id },
            success: function (response) {
                responseData = response;
            },
            error: function (xhr, status, error) {
                console.error('Error: ' + error);
            },
            async: false  
        });
        return responseData; 
    }


});