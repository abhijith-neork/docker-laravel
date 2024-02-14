$(document).ready(function () {



    $.validator.addMethod("validRoleName",
        function (value) {
            let id = $("#role_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-role-name",
                dataType: 'json',
                async: false,
                data: { 'name': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Role Name already exists."
    );

    $.validator.addMethod("emailUnique",
        function (value) {
            let id = $("#user_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-email-unique",
                dataType: 'json',
                async: false,
                data: { 'email': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Email already exists."
    );


    $.validator.addMethod("CheckMainCatCode",
        function (value) {
            let id = $("#cat_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-maincat-code",
                dataType: 'json',
                async: false,
                data: { 'main_cat_code': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Category code already exists."
    );

    $.validator.addMethod("CheckMainCatName",
        function (value) {
            let id = $("#cat_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-maincat-name",
                dataType: 'json',
                async: false,
                data: { 'main_cat_name': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Category name already exists."
    );


    $.validator.addMethod("CheckSubCatCode",
        function (value) {
            let id = $("#cat_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-subcat-code",
                dataType: 'json',
                async: false,
                data: { 'sub_cat_code': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Sub sategory code already exists."
    );

    $.validator.addMethod("CheckSubCatName",
        function (value) {
            let id = $("#cat_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-subcat-name",
                dataType: 'json',
                async: false,
                data: { 'sub_cat_name': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Sub category name already exists."
    );
    
    $.validator.addMethod("CheckTechnologyName",
        function (value) {
            let id = $("#technology_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-technology-name",
                dataType: 'json',
                async: false,
                data: { 'technology_name': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Technology name already exists."
    );

    $.validator.addMethod("CheckJobRoleName",
        function (value) {
            let id = $("#job_role_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-job_role-name",
                dataType: 'json',
                async: false,
                data: { 'job_role_name': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "JobRole name already exists."
    );

    $.validator.addMethod("CheckSkillName",
        function (value) {
            let id = $("#skill_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-skill-name",
                dataType: 'json',
                async: false,
                data: { 'skill_name': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Skill name already exists."
    );

    $.validator.addMethod("CheckDesignationName",
        function (value) {
            let id = $("#designation_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-designation-name",
                dataType: 'json',
                async: false,
                data: { 'designation_name': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Designation name already exists."
    );
    $.validator.addMethod("CheckDesignationCode",
        function (value) {
            let id = $("#designation_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-designation-code",
                dataType: 'json',
                async: false,
                data: { 'designation_code': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Designation code already exists."
    );

    $.validator.addMethod("CheckDepartmentName",
        function (value) {
            let id = $("#department_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-department-name",
                dataType: 'json',
                async: false,
                data: { 'department_name': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Department name already exists."
    );
    $.validator.addMethod("CheckDepartmentCode",
        function (value) {
            let id = $("#department_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-department-code",
                dataType: 'json',
                async: false,
                data: { 'department_code': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Department code already exists."
    );
    $.validator.addMethod("CheckLeaveTypeName",
        function (value) {
            let id = $("#leave_type_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-leave_type-name",
                dataType: 'json',
                async: false,
                data: { 'leave_type_name': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Leave Type name already exists."
    );
    $.validator.addMethod("CheckLeaveTypeCode",
        function (value) {
            let id = $("#leave_type_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "/check-leave_type-code",
                dataType: 'json',
                async: false,
                data: { 'leave_type_code': value, 'id': id },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Leave Type code already exists."
    );

    $.validator.addMethod('validPassword', function (value) {
        return /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?=.*[a-zA-Z0-9!@#$%^&*()\-_=+{};:,<.>]).{8,}$/.test(value);
    }, 'Create a strong password with a mix of letters, numbers and symbols');

    $.validator.addMethod('validEmail', function (value) {
        return /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/.test(value);
    }, 'Enter valid email.');
    $.validator.addMethod('validCode', function (value) {
        return /^[A-Za-z0-9-]+$/.test(value);
    }, 'Enter valid code.');
    $.validator.addMethod('validMobile', function (value) {
        if (value == '') {
            return true;
        }
        else {
            return /^(?!0+$)\d{10}$/.test(value);
        }
    }, 'Please enter valid mobile number');

    $.validator.addMethod("lettersOnly", function (value, element) {
        return /^[A-Za-z\s]+$/.test(value);
    }, "Please enter only letters.");
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than 4MB');
    $.validator.addMethod("filetype", function (value, element) {
        let types = ['jpeg', 'jpg', 'png'],
            ext = value.replace(/.*[.]/, '').toLowerCase();

        if (types.indexOf(ext) !== -1 || value == '') {
            return true;
        }
        return false;
    },
        "Please select allowed file"
    );

    $.validator.addMethod("notEqualToCatId",
        function (value) {
            let id = $("#cat_id").val();
            let result = true;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: '/check-parent-category',
                dataType: 'json',
                async: false,
                data: { cat_id: id, parent_category: value },
                success: function (data) {
                    if (data.status == 1) {
                        result = false;
                    }
                }
            });
            return result;
        },
        "Parent category cannot be the same as the selected category."
    );


    $("#admin-register").validate({
        rules: {
            user_name: {
                required: true,
                minlength: 3,
                maxlength: 80,

            },
            mobile_number: {
                required: true,
                validMobile: true
                // Add your mobile number validation rule here (e.g., digits)
            },
            email: {
                required: true,
                email: true,
                validEmail: true,
                emailUnique: true

                // Add any additional validation rules for email
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 15,
                validPassword: true

                // Add your password validation rules (e.g., custom rule for a strong password)
            },
            confirm_password: {
                required: true,
                equalTo: "#inputChoosePassword",
            },
        },
        messages: {
            user_name: {
                required: "Please enter a Username",
                minlength: "Username must be at least 3 characters",
                maxlength: "Username cannot exceed 80 characters",
            },
            mobile_number: {
                required: "Please enter a Mobile Number",
                minlength: "Mobile number must be at least 10 digits",
                maxlength: "Mobile number cannot exceed 10 digits",
                // Add custom messages for mobile number validation rules
            },
            email: {
                required: "Please enter an Email address",
                email: "Please enter a valid email address",
                // Add any additional error messages for email validation
            },
            password: {
                required: "Please enter a Password",
                minlength: "Password must be at least 8 characters",
                // Add custom messages for password validation rules
            },
            confirm_password: {
                required: "Please confirm your Password",
                equalTo: "Passwords do not match",
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "mobile_number") {
                error.insertAfter("#mob-val");
            } else {
                error.insertAfter(element);
            }
        }
    });

    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true,
                validEmail: true,
            },
            password: {
                required: true,
            },
            captcha: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address",
            },
            password: {
                required: "Please enter a password",
            },
            captcha: {
                required: "Please enter the captcha",
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") == "captcha") {
                error.insertAfter("#captcha-val");
            } else {
                error.insertAfter(element);
            }
        }
    });

    $("#password-reset-form").validate({
        rules: {
            email: {
                required: true,
                email: true,
                validEmail: true,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 15,
                validPassword: true
            },
            password_confirmation: {
                required: true,
                equalTo: "#password",
            },
            // captcha: {
            //     required: true,
            // },
        },
        messages: {
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address",
            },
            password: {
                required: "Please enter a password",
            },
            password_confirmation: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match",
            },
            // captcha: {
            //     required: "Please enter the captcha",
            // },
        },

    });

    $("#forgot-password-form").validate({
        rules: {
            email: {
                required: true,
                email: true,
                validEmail: true,
            },
        },
        messages: {
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address",
            },
        },

    });

    $("#role-create-form").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                validRoleName: true
            },
            description: {
                required: true,
                minlength: 3,
                maxlength: 80,

            },
        },
        messages: {
            name: {
                required: "Please enter a Role Name",
                minlength: "Name must be at least 3 characters",
                maxlength: "Name cannot exceed 60 characters",
            },
            description: {
                required: "Please enter Description",
                minlength: "Description must be at least 3 characters",
                maxlength: "Description cannot exceed 80 characters",
            },

        }
    });

    $("#role-edit-form").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                validRoleName: true
            },
            description: {
                required: true,
                minlength: 3,
                maxlength: 80,

            },
        },
        messages: {
            name: {
                required: "Please enter a Role Name",
                minlength: "Name must be at least 3 characters",
                maxlength: "Name cannot exceed 60 characters",
            },
            description: {
                required: "Please enter Description",
                minlength: "Description must be at least 3 characters",
                maxlength: "Description cannot exceed 80 characters",
            },

        }
    });

    $("#user-create").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 80,
                lettersOnly: true
            },

            email: {
                required: true,
                email: true,
                validEmail: true,
                emailUnique: true

            },
            mobile_number: {
                required: true,
                validMobile: true
            },
            user_role: {
                required: false,
            },

            password: {
                required: true,
                minlength: 8,
                maxlength: 15,
                validPassword: true

                // Add your password validation rules (e.g., custom rule for a strong password)
            },
            confirm_password: {
                required: true,
                equalTo: "#inputChoosePassword",
            },

            profile_image: {
                filetype: true,
                filesize: 4194304
            },
            status: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Please enter a Name",
                minlength: "Username must be at least 3 characters",
                maxlength: "Username cannot exceed 80 characters",
            },
            user_role: {
                required: "Please select an User Role",
            },
            email: {
                required: "Please enter an Email Address",

            },
            mobile_number: {
                required: "Please enter a Mobile Number",

            },
            password: {
                required: "Please enter a Password",
                minlength: "Password must be at least 8 characters",
                // Add custom messages for password validation rules
            },
            confirm_password: {
                required: "Please confirm your Password",
                equalTo: "Passwords do not match",
            },
            status: {
                required: "Please select a Status",
            },
        },

        errorPlacement: function (error, element) {
            if (element.attr("name") === "mobile_number") {
                error.insertAfter("#mob-val");
            } else {
                error.insertAfter(element);
            }
        }
    });

    $("#user-edit").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 80,
                lettersOnly: true
            },

            email: {
                required: true,
                email: true,
                validEmail: true,
                emailUnique: true
            },
            mobile_number: {
                required: true,
                validMobile: true
            },
            user_role: {
                required: false,
            },

            status: {
                required: true,
            },
            profile_image: {
                filetype: true,
                filesize: 4194304
            },
        },
        messages: {
            name: {
                required: "Please enter a Name",
                minlength: "Username must be at least 3 characters",
                maxlength: "Username cannot exceed 80 characters",
            },
            user_role: {
                required: "Please select an User Role",
            },
            email: {
                required: "Please enter an Email Address",
                email: "Please enter a valid Email address",
                // Add any additional error messages for email validation
            },
            mobile_number: {
                required: "Please enter a Mobile Number",

            },
            status: {
                required: "Please select a Status",
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "mobile_number") {
                error.insertAfter("#mob-val-edit");
            } else {
                error.insertAfter(element);
            }
        }
    });

    $("#user-change-password").validate({
        rules: {
            new_password: {
                required: true,
                minlength: 8,
                maxlength: 15,
                validPassword: true
            },
            confirm_password: {
                required: true,
                equalTo: "#inputChooseNewPassword",
            },
        },
        messages: {
            new_password: {
                required: "Please enter a new password",
                minlength: "Password must be at least 8 characters",
                // Add custom messages for password validation rules
            },
            confirm_password: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match",
            },
        },
        submitHandler: function (form) {
            $('#confirmChangePassModal').modal('show');
        }

    });

    $("#addmaincategory").validate({
        rules: {
            category_code: {
                required: true,
                minlength: 3,
                maxlength: 10,
                validCode: true,
                CheckMainCatCode: true
            },
            category_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckMainCatName: true
            },
            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });
    $("#editmaincategory").validate({
        rules: {
            category_code: {
                required: true,
                minlength: 3,
                maxlength: 10,
                validCode: true,
                CheckMainCatCode: true
            },
            category_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckMainCatName: true
            },
            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });
    $("#addsubcategory").validate({
        rules: {
            category_code: {
                required: true,
                minlength: 3,
                maxlength: 10,
                validCode: true,
                CheckSubCatCode: true
            },
            category_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckSubCatName: true
            },
            parent_category: {
                required: true,
            },

            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });

    $("#editsubcategory").validate({
        rules: {

            category_code: {
                required: true,
                minlength: 3,
                maxlength: 10,
                validCode: true,
                CheckSubCatCode: true
            },
            category_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckSubCatName: true
            },
            parent_category: {
                required: true,
                notEqualToCatId: true,
            },

            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });

    $("#addnotification").validate({
        ignore : [],
        rules: {
            title : {
                required : true,
                minlength:5,
                maxlength: 60
            },
            description : {
                required : true
            },
            recipeint_type : {
                required : true
            },
            status : {
                required : true
            }
        }
    });


    $("#technology-create").validate({
        rules: {
            technology_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckTechnologyName: true
            },

            status: {
                required: true,
            }
        },


        messages: {
            technology_name: {
                required: "Please enter Technology name",
                minlength: "Designation name must be at least 3 characters",
                maxlength: "Designation name cannot exceed 60 characters",
            },
            status: {
                required: "Please select Status",
            }
        },
        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });
    $("#technology-edit").validate({
        rules: {
            technology_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckTechnologyName: true
            },

            status: {
                required: true,
            }
        },


        messages: {
            technology_name: {
                required: "Please enter Technology name",
                minlength: "Designation name must be at least 3 characters",
                maxlength: "Designation name cannot exceed 60 characters",
            },
            status: {
                required: "Please select Status",
            }
        },
        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });

    $("#job_role-create").validate({
        rules: {
            job_role_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckJobRoleName: true
            },

            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });
    $("#job_role-edit").validate({
        rules: {
            job_role_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckJobRoleName: true
            },

            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });
    $("#skill-create").validate({
        rules: {
            skill_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckSkillName: true
            },

            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });

    $("#skill-edit").validate({
        rules: {
            skill_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckSkillName: true
            },

            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });



    $("#designation-create").validate({
        rules: {
            designation_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckDesignationName: true
            },

            designation_code: {
                required: true,
                minlength: 3,
                maxlength: 6,
                // validName:true,
                CheckDesignationCode: true
            },

            status: {
                required: true,
            }
        },

        messages: {
            designation_name: {
                required: "Please enter Designation name",
                minlength: "Designation name must be at least 3 characters",
                maxlength: "Designation name cannot exceed 60 characters",
            },
            designation_code: {
                required: "Please enter a Designation code",
                minlength: "Designation code must be at least 3 characters",
                maxlength: "Designation code cannot exceed 6 characters",
                // Add custom messages for mobile number validation rules
            },
            status: {
                required: "Please select Status",
            }
        },
        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });

    $("#designation-edit").validate({
        rules: {
            designation_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckDesignationName: true
            },

            designation_code: {
                required: true,
                minlength: 3,
                maxlength: 6,
                // validName:true,
                // CheckDesignationCode: true
            },

            status: {
                required: true,
            }
        },


        messages: {
            designation_name: {
                required: "Please enter Designation name",
                minlength: "Designation name must be at least 3 characters",
                maxlength: "Designation name cannot exceed 60 characters",
            },
            designation_code: {
                required: "Please enter Designation code",
                minlength: "Designation code must be at least 3 characters",
                maxlength: "Designation code cannot exceed 6 characters",
                // Add custom messages for mobile number validation rules
            },
            status: {
                required: "Please select Status",
            }
        },
        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });



    $("#leave_type-create").validate({
        rules: {
            leave_type_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckLeaveTypeName: true
            },

            leave_type_code: {
                required: true,
                minlength: 3,
                maxlength: 6,
                // validName:true,
                CheckLeaveTypeCode: true
            },

            status: {
                required: true,
            }
        },


        messages: {
            leave_type_name: {
                required: "Please enter Leave Type name",
                minlength: "Leave Type name must be at least 3 characters",
                maxlength: "Leave Type name cannot exceed 60 characters",
            },
            leave_type_code: {
                required: "Please enter Leave Type code",
                minlength: "Leave Type code must be at least 3 characters",
                maxlength: "Leave Type code cannot exceed 6 characters",
                // Add custom messages for mobile number validation rules
            },
            status: {
                required: "Please select Status",
            }
        },
        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });

    $("#leave_type-edit").validate({
        rules: {
            leave_type_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckLeaveTypeName: true
            },

            leave_type_code: {
                required: true,
                minlength: 3,
                maxlength: 6,
                // validName:true,
                CheckLeaveTypeCode: true
            },


        messages: {
            leave_type_name: {
                required: "Please enter Leave Type name",
                minlength: "Leave Type name must be at least 3 characters",
                maxlength: "Leave Type name cannot exceed 60 characters",
            },
            leave_type_code: {
                required: "Please enter Leave Type code",
                minlength: "Leave Type code must be at least 3 characters",
                maxlength: "Leave Type code cannot exceed 6 characters",
                // Add custom messages for mobile number validation rules
            },
            status: {
                required: "Please select Status",
            }
        },
            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });


    $("#department-create").validate({
        rules: {
            department_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckDepartmentName: true
            },

            department_code: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckDepartmentCode: true
            },

            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });

    $("#department-edit").validate({
        rules: {
            department_name: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckDepartmentName: true
            },

            department_code: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                CheckDepartmentCode: true
            },

            status: {
                required: true,
            }
        },

        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });


    $("#policy-edit,#policy-create").validate({
        rules: {
            policy_title: {
                required: true,
                minlength: 3,
                maxlength: 60,
                // validName:true,
                // CheckpolicyName: true
            },
            policy_description: {
                required: true,
                minlength: 3,
                // validName:true,
                // CheckpolicyName: true
            },
            effective_from:{
                required:true
            },
            status: {
                required: true,
            }
        },


        messages: {
            policy_title: {
                required: "Please enter Policy title",
                minlength: "Policy title name must be at least 3 characters",
                maxlength: "Policy title name cannot exceed 60 characters",
            },
            policy_description: {
                required: "Please enter description",
                minlength: "Description must be at least 3 characters",
                // Add custom messages for mobile number validation rules
            },
            effective_from: {
                required: "Please select effective from",
            },
            status: {
                required: "Please select Status",
            }
        },
        errorPlacement: function (error, element) {

            error.insertAfter(element);

        }
    });
});