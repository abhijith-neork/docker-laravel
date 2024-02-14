$( document ).ready(function() {
	$( "#date" ).datepicker({
		dateFormat: 'dd-mm-yy',
        minDate: 0
	});
    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than 4MB');
    $.validator.addMethod("filetype", function(value, element) {
        let types = ['jpeg', 'jpg', 'png'],
        ext = value.replace(/.*[.]/, '').toLowerCase();

        if (types.indexOf(ext) !== -1 || value=='') {
            return true;
        }
            return false;
        },
        "Please select allowed file"
    );
    $.validator.addMethod('validLocationName', function (value) { 
        return /^[A-Za-z0-9\s]*$/.test(value);
    }, 'Enter valid name.');
	$.validator.addMethod('validName', function (value) { 
        return /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/.test(value);
    }, 'Enter valid name.');
	$.validator.addMethod('validEmail', function (value) { 
        return /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/.test(value);
    }, 'Enter valid email.');
    $.validator.addMethod('validCode', function (value) { 
        return /^[A-Za-z0-9-]+$/.test(value);
    }, 'Enter valid code.');
    $.validator.addMethod('validMobile', function (value) { 
    	if(value=='')
    	{
    	    return true;
    	}
    	else
    	{
        	return /\+971[0-9]{8,9}$/.test(value);
        }
    }, 'Enter valid mobile number (+971XXXXXXXXX).');
    $.validator.addMethod("CheckDeptCode", 
	    function(value) {
	       let id = $("#id").val();	
	       let result = true; 
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type:"post",
	            url: "/check_dept_code" ,
	            dataType : 'json',
	            async: false,
	            data : {'dept_code':value,'id':id},
	            success: function(data) {
	                if(data.status == 1) 
	                {
	                    result = false;
	                }      
	            }
	        });
	        return result;
		}, 
		"Department code already exists."
	);
    $.validator.addMethod("validEmpId", 
        function(value) {
           let id = $("#user_id").val(); 
           let result = true; 
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"post",
                url: "/check-emp-id" ,
                dataType : 'json',
                async: false,
                data : {'emp_id':value,'id':id},
                success: function(data) {
                    if(data.status == 1) 
                    {
                        result = false;
                    }      
                }
            });
            return result;
        }, 
        "User already exists."
    );
    $.validator.addMethod("emailUnique", 
        function(value) {
           let id = $("#user_id").val(); 
           let result = true; 
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"post",
                url: "/check-email-unique" ,
                dataType : 'json',
                async: false,
                data : {'email':value,'id':id},
                success: function(data) {
                    if(data.status == 1) 
                    {
                        result = false;
                    }      
                }
            });
            return result;
        }, 
        "Email already exists."
    );
	$.validator.addMethod("CheckEmpCode", 
	    function(value) {
	       let id = $("#employee_id").val();
	       let result = true; 
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type:"post",
	            url: "/check-emp-code" ,
	            dataType : 'json',
	            async: false,
	            data : {'emp_code':value,'id':id},
	            success: function(data) {
	                if(data.status == 1) 
	                {
	                    result = false;
	                }      
	            }
	        });
	        return result;
		}, 
		"Employee code already exists."
	);
    $.validator.addMethod("CheckLocCode", 
        function(value) {
           let id = $("#location_id").val();
           let result = true; 
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"post",
                url: "/check-location-code" ,
                dataType : 'json',
                async: false,
                data : {'loc_code':value,'id':id},
                success: function(data) {
                    if(data.status == 1) 
                    {
                        result = false;
                    }      
                }
            });
            return result;
        }, 
        "Designation code already exists."
    );
	$.validator.addMethod("CheckDesgCode", 
	    function(value) {
	       let id = $("#designation_id").val();
	       let result = true; 
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type:"post",
	            url: "/check-desg-code" ,
	            dataType : 'json',
	            async: false,
	            data : {'desg_code':value,'id':id},
	            success: function(data) {
	                if(data.status == 1) 
	                {
	                    result = false;
	                }      
	            }
	        });
	        return result;
		}, 
		"Designation code already exists."
	);

	$.validator.addMethod("CheckMainCatCode", 
	    function(value) {
	       let id = $("#main_cat_id").val();
	       let result = true; 
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type:"post",
	            url: "/check-maincat-code" ,
	            dataType : 'json',
	            async: false,
	            data : {'main_cat_code':value,'id':id},
	            success: function(data) {
	                if(data.status == 1) 
	                {
	                    result = false;
	                }      
	            }
	        });
	        return result;
		}, 
		"Category code already exists."
	);
    $.validator.addMethod("CheckMainCatName", 
        function(value) {
           let id = $("#main_cat_id").val();
           let result = true; 
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"post",
                url: "/check-maincat-name" ,
                dataType : 'json',
                async: false,
                data : {'main_cat_name':value,'id':id},
                success: function(data) {
                    if(data.status == 1) 
                    {
                        result = false;
                    }      
                }
            });
            return result;
        }, 
        "Category name already exists."
    );
    $.validator.addMethod("CheckSubCatName", 
        function(value) {
           let id = $("#sub_cat_id").val();
           let result = true; 
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"post",
                url: "/check-subcat-name" ,
                dataType : 'json',
                async: false,
                data : {'sub_cat_name':value,'id':id},
                success: function(data) {
                    if(data.status == 1) 
                    {
                        result = false;
                    }      
                }
            });
            return result;
        }, 
        "Category name already exists."
    );
	$.validator.addMethod("CheckSubCatCode", 
	    function(value) {
	       let id = $("#sub_cat_id").val();
	       let result = true; 
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type:"post",
	            url: "/check-subcat-code" ,
	            dataType : 'json',
	            async: false,
	            data : {'sub_cat_code':value,'id':id},
	            success: function(data) {
	                if(data.status == 1) 
	                {
	                    result = false;
	                }      
	            }
	        });
	        return result;
		}, 
		"Category code already exists."
	);
	$.validator.addMethod("CheckProductCode", 
	    function(value) {
	       let id = $("#product_id").val();
	       let result = true; 
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type:"post",
	            url: "/check-prod-code" ,
	            dataType : 'json',
	            async: false,
	            data : {'prod_code':value,'id':id},
	            success: function(data) {
	                if(data.status == 1) 
	                {
	                    result = false;
	                }      
	            }
	        });
	        return result;
		}, 
		"Product code already exists."
	);
	$.validator.addMethod("CheckSupplierCode", 
	    function(value) {
	       let id = $("#supplier_id").val();
	       let result = true; 
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type:"post",
	            url: "/check-supplier-code" ,
	            dataType : 'json',
	            async: false,
	            data : {'sup_code':value,'id':id},
	            success: function(data) {
	                if(data.status == 1) 
	                {
	                    result = false;
	                }      
	            }
	        });
	        return result;
		}, 
		"Supplier code already exists."
	);
	$.validator.addMethod("CheckDesgName", 
	    function(value) {
	       let id = $("#designation_id").val();
	       let result = true; 
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type:"post",
	            url: "/check-desig-name" ,
	            dataType : 'json',
	            async: false,
	            data : {'desg_name':value,'id':id},
	            success: function(data) {
	                if(data.status == 1) 
	                {
	                    result = false;
	                }      
	            }
	        });
	        return result;
		}, 
		"Designation name already exists."
	);

    $.validator.addMethod("CheckDeptName", 
	    function(value) {
	       let id = $("#id").val();
	       let result = true; 
	        $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            type:"post",
	            url: "/check_dept_name" ,
	            dataType : 'json',
	            async: false,
	            data : {'dept_name':value,'id':id},
	            success: function(data) {
	                if(data.status == 1) 
	                {
	                  result = false;
	                }                
	            }
	        });
	        return result;
		}, 
		"Department name already exists."
	);
    $.validator.addMethod('validPassword', function (value) {
      return /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?=.*[a-zA-Z0-9!@#$%^&*()\-_=+{};:,<.>]).{8,}$/.test(value);
    }, 'Create a strong password with a mix of letters, numbers and symbols');
	$("#adddepartment,#editdepartment").validate({
        ignore : [],
        rules: {
            dept_code: {
                required : true,
                minlength:3,
                maxlength: 10,
                validCode:true,
                CheckDeptCode:true
            },
            dept_name : {
                required : true,
                minlength:3,
                maxlength: 80,
                // validName:true,
                CheckDeptName:true
            },
            status : {
            	required : true,
            }
        },
    });
    $("#addemployee,#editemployee").validate({
        ignore : [],
        rules: {
            employee_code: {
                required : true,
                minlength:3,
                maxlength: 10,
                validCode:true,
                CheckEmpCode:true
            },
            emp_name : {
                required : true,
                minlength:3,
                maxlength: 80,
                // validName:true,
            },
            status : {
            	required : true,
            }
        },
    });
    $("#addlocation,#editlocation").validate({
        ignore : [],
        rules: {
            loc_code: {
                required : true,
                minlength:3,
                maxlength: 10,
                validCode:true,
                CheckLocCode:true
            },
            loc_name : {
                required : true,
                minlength:3,
                maxlength: 80,
                validLocationName:true,
            },
            status : {
                required : true,
            }
        }
    });
    $("#adddesignation,#editdesignation").validate({
        ignore : [],
        rules: {
            desg_code: {
                required : true,
                minlength:3,
                maxlength: 10,
                validCode:true,
                CheckDesgCode:true
            },
            desg_name : {
                required : true,
                minlength:3,
                maxlength: 80,
                // validName:true,
                CheckDesgName:true
            },
            status : {
            	required : true,
            }
        }
    });
    $("#addmaincategory,#editmaincategory").validate({
        ignore : [],
        rules: {
            main_cat_code: {
                required : true,
                minlength:3,
                maxlength: 10,
                validCode:true,
                CheckMainCatCode:true
            },
            main_cat_name : {
                required : true,
                minlength:3,
                maxlength: 60,
                // validName:true,
                CheckMainCatName : true
            },
            status : {
            	required : true,
            }
        }
    });
    $("#addsubcategory,#editsubcategory").validate({
        ignore : [],
        rules: {
            sub_cat_code: {
                required : true,
                minlength:3,
                maxlength: 10,
                validCode:true,
                CheckSubCatCode:true
            },
            sub_cat_name : {
                required : true,
                minlength:3,
                maxlength: 60,
                // validName:true,
                CheckSubCatName : true
            },
            main_cat : {
            	required : true,
            },
            status : {
            	required : true,
            }
        }
    });
    $("#addproduct,#editproduct").validate({
        ignore : [],
        rules: {
            prod_code: {
                required : true,
                minlength:3,
                maxlength: 10,
                validCode:true,
                CheckProductCode:true
            },
            prod_name : {
                required : true,
                minlength:3,
                maxlength: 60,
                // validName:true,
            },
            main_cat_id : {
            	required : true,
            },
            sub_cat_id : {
            	required : true,
            },
            status : {
            	required : true,
            },
            prod_manufacturer : {
            	minlength:3,
            	maxlength: 60
            }
        }
    });
    $("#addsupplier,#editsupplier").validate({
        ignore : [],
        rules: {
            sup_code: {
                required : true,
                minlength:3,
                maxlength: 10,
                validCode:true,
                CheckSupplierCode:true
            },
            sup_name : {
                required : true,
                minlength:3,
                maxlength: 80,
                // validName:true,
            },
            sup_phone : {
            	required : true,
            	minlength:10,
                maxlength: 20,
                validMobile : true
            },
            sup_contact : {
            	required : true,
            	minlength:3,
                maxlength: 60
            },
            status : {
            	required : true,
            }
        }
    });
    $("#editprofile").validate({
        ignore : [],
        rules: {
            name : {
                required : true,
                minlength:3,
                maxlength: 80
            },
            email : {
                required : true,
                validEmail : true,
                emailUnique : true
            },
            phone_no : {
                validMobile : true
            },
        }
    });
    $("#changepassword").validate({
        ignore : [],
        rules: {
            new_password : {
                required : true,
                minlength:8,
                maxlength: 15,
                validPassword : true
            },
            confirm_password : {
                required : true,
                minlength:8,
                maxlength: 15,
                equalTo: "#new_password"
            },
            
        }
    });
    $("#addcompanyfrm").validate({
        ignore : [],
        onfocusout: false,
        rules: {
            comp_code : {
                required : true,
                minlength:3,
                maxlength: 10,
                validCode : true
            },
            comp_name : {
                required : true,
                minlength:3,
                maxlength: 80,
            },
            email : {
                required : true,
                validEmail : true
            },
            phone_no : {
                required : true,
                validMobile : true
            },
            address : {
                required : true,
            },
            image : {
                required : true,
                extension: "jpeg|jpg|png",
                filesize:4194304
            }
        }
    });
    $("#editcompanyfrm").validate({
        ignore : [],
        onfocusout: false,
        rules: {
            comp_code : {
                required : true,
                minlength:3,
                maxlength: 10,
            },
            comp_name : {
                required : true,
                minlength:3,
                maxlength: 80,
            },
            email : {
                required : true,
                validEmail : true
            },
            phone_no : {
                required : true,
                validMobile : true
            },
            address : {
                required : true,
            },
            image : {
                filetype : true,
                filesize:4194304
            }
        }
    });
    $("#add_location_btn").click(function(){
        if($("#addlocation").valid()){
            $("#loader-image-file").addClass('d-block');
            $("#addlocation").submit();
        }
    });
    $("#edit_location_btn").click(function(){
        if($("#editlocation").valid()){
            $("#loader-image-file").addClass('d-block');
            $("#editlocation").submit();
        }
    });
    $("#add-companysetup").click(function(){
        if($("#addcompanyfrm").valid()){
            $("#loader-image-file").addClass('d-block');
            $("#addcompanyfrm").submit();
        }
    });
    $("#edit-companysetup").click(function(){
        if($("#editcompanyfrm").valid()){
            $("#loader-image-file").addClass('d-block');
            $("#editcompanyfrm").submit();
        }
    });
    $("#update-password").click(function(){
        if($("#changepassword").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#changepassword").submit();
        }
    });
    $("#update-admin-profile").click(function(){
        if($("#editprofile").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#editprofile").submit();
        }
    });
    $("#addnotification,#editnotification").validate({
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
            date : {
                required : true
            },
            status : {
                required : true
            }
        }
    });
    $("#addcomment,#editcomment").validate({
        ignore : [],
        rules: {
            comments : {
                required : true,
                minlength:3,
                maxlength: 60
            },
            asset_type : {
                required : true
            }
        }
    });
    $("#adduser,#edituser").validate({
        ignore : [],
        rules: {
            emp_id : {
                required : true,
                validEmpId : true
            },
            user_type : {
                required : true
            },
            email : {
                required : true,
                validEmail : true,
                emailUnique : true
            },
            status : {
                required : true
            }
        }
    });
    $("#add_user_btn").click(function(){
        if($("#adduser").valid()){
            $("#loader-image-file").addClass('d-block');
            $("#adduser").submit();
        }
    });
    $("#edit_user_btn").click(function(){
        if($("#edituser").valid()){
            $("#loader-image-file").addClass('d-block');
            $("#edituser").submit();
        }
    });
    $("#add-notification").click(function(){
        if($("#addnotification").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#addnotification").submit();
        }
    });
    $("#add-comment").click(function(){
        if($("#addcomment").valid()){
            $("#loader-image-file").addClass('d-block');
            $("#addcomment").submit();
        }
    });
    $("#edit-notification").click(function(){
        if($("#editnotification").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#editnotification").submit();
        }
    });
    $("#edit-comment").click(function(){
        if($("#editcomment").valid()){
            $("#loader-image-file").addClass('d-block');
            $("#editcomment").submit();
        }
    });
    $("#edit_supplier_btn").click(function(){
        if($("#editsupplier").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#editsupplier").submit();
        }
    });

    $("#add_supplier_btn").click(function(){
        if($("#addsupplier").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#addsupplier").submit();
        }
    });
    $("#edit_product_btn").click(function(){
        if($("#editproduct").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#sub_cat_id").attr('disabled',false);
            $("#main_cat_id").attr('disabled',false);
            $("#editproduct").submit();
        }
    });

    $("#add_product_btn").click(function(){
        if($("#addproduct").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#addproduct").submit();
        }
    });
    $("#edit_subcat_btn").click(function(){
        if($("#editsubcategory").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#main_cat").attr('disabled',false);
            $("#editsubcategory").submit();
        }
    });

    $("#add_subcat_btn").click(function(){
        if($("#addsubcategory").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#addsubcategory").submit();
        }
    });
    $("#edit_maincat_btn").click(function(){
        if($("#editmaincategory").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#editmaincategory").submit();
        }
    });

    $("#add_maincat_btn").click(function(){
        if($("#addmaincategory").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#addmaincategory").submit();
        }
    });
    $("#edit_desig_btn").click(function(){
        if($("#editdesignation").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#editdesignation").submit();
        }
    });

    $("#add_desig_btn").click(function(){
        if($("#adddesignation").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#adddesignation").submit();
        }
    });
    $("#add_dept_btn").click(function(){
        if($("#adddepartment").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#adddepartment").submit();
        }
    });

    $("#edit_dept_btn").click(function(){
        if($("#editdepartment").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#editdepartment").submit();
        }
    });

    $("#add_employee_btn").click(function(){
        if($("#addemployee").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#addemployee").submit();
        }
    });

    $("#edit_employee_btn").click(function(){
        if($("#editemployee").valid()){
        	$("#loader-image-file").addClass('d-block');
            $("#editemployee").submit();
        }
    });
    

	$('#dept_head').on('change', function() {  
	    $(this).valid(); 
	});
	$('#status').on('change', function() {  
	    $(this).valid(); 
	});


    $("#register-admin").validate({
        ignore : [],
        rules: {
            employee_code: {
                required : true,
                minlength:3,
                maxlength: 10,
                validCode:true,
                CheckEmpCode:true
            },
            emp_name : {
                required : true,
                minlength:3,
                maxlength: 80,
                // validName:true,
            },
            status : {
            	required : true,
            }
        },
    });

});