$(function () {
    //Department table
    dept_Table = $("#dept_Table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [
        { orderable: false, targets: [2,3,4] },
        { targets: [0,1,2],render: DataTable.render.ellipsis( 30) }
        ],
        ajax: {
            url:"get-dept",
            'data': function(data){
                stat = '';
                if($("#dept_status").val()!=''){
                   stat =  $("#dept_status").val();
                }
                // Append to data              
                data.dept_status = stat;
                // data.status = 1;
            }
        },
        columns: [
            { data: 'dept_code' },
            { data: 'dept_name' }, 
            { data: 'dept_head' },             
            { data: 'status'  },
            { data: 'action'  },
        ],
    });
    // Set the search box value
    dept_Table.search(searchValDept).draw();
     // Add an event listener to the search input field
    $('#dept_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filters('/clear_filters_department_filtr',dept_Table);
            dept_Table.search('').draw();        
        }
    });
    $("#dept_status").val(searchValDeptStat);
    $("#dept_status").change();
    $("#dept_status").on('change',function(){
        if(!$(this).val()){
            $("#dept_status").val('');
            clear_filters('/clear_filters_department_stat',dept_Table);
        }
        dept_Table.draw();
    });

    $("#employee_Table_Old").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [{ orderable: false, targets: [2,3,4,5] }],
        ajax: "get-emloyees",
        columns: [
            { data: 'emp_code' },
            { data: 'emp_name' }, 
            { data: 'emp_desg' },             
            { data: 'emp_dept' },             
            { data: 'status'  },
            { data: 'action'  },
        ],
    });
    location_Table = $("#location_Table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [{ orderable: false, targets: [2,3] },{ targets: [0,1],render: DataTable.render.ellipsis( 30) }],
        ajax: {
                url:"get-locations",
                'data': function(data){
                    stat = '';
                    if($("#loc_status").val()!=''){
                       stat =  $("#loc_status").val();
                    }
                    // Append to data              
                    data.status = stat;
                    // data.status = 1;
                }
            },
        columns: [
            { data: 'loc_code' },
            { data: 'loc_name' }, 
            { data: 'status' },             
            { data: 'action'  },
        ],
    });
    location_Table.search(searchValLoc).draw();
    $('#location_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filters('/clear_filters_loc_filtr',location_Table);
            location_Table.search('').draw();
        }
    });
    $("#loc_status").val(searchValLocStat);
    $("#loc_status").change();
    $("#loc_status").on('change',function(){
        if(!$(this).val()){
            $("#loc_status").val('');
            clear_filters('/clear_filters_loc_stat',location_Table);
        }
        location_Table.draw();
    });
    employee_Table = $('#employee_Table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [
        { orderable: false, targets: [4,5] },
        { targets: [0,1,2,3],render: DataTable.render.ellipsis( 30) }
        ],
        ajax: {
                    url:"get-emloyees",
                    'data': function(data){
                        stat = '';
                        if($("#employee_status").val()!=''){
                           stat =  $("#employee_status").val();
                        }
                        // Append to data              
                        data.status = stat;
                        // data.status = 1;
                    }
                },
        columns: [
            { data: 'emp_code' },
            { data: 'emp_name' },
            { data: 'emp_desg' }, 
            { data: 'emp_dept' },             
            { data: 'active_status'  },
            { data: 'action'  },
        ],
    });
    employee_Table.search(searchValEmp).draw();
    $("#employee_status").val(searchValEmpStat);
    $("#employee_status").change();
    $("#employee_status").on('change',function(){
        if(!$(this).val()){
            $("#employee_status").val('');
            clear_filters('/clear_filters_employee_stat',employee_Table);
        }
        employee_Table.draw();
    });
    $('#employee_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filters('/clear_filters_employee_filtr',employee_Table);
            employee_Table.search('').draw();
        }
    });
    notification_Table = $('#notification_Table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [{ orderable: false, targets: [3,4] },{ targets: [0,1,2],render: DataTable.render.ellipsis( 30) }],
        ajax: {
            url:"get-notification",
            'data': function(data){
                // Read values               
                let status = $('#notification_status').val();
                // Append to data              
                data.status = status;
            }
        },
        columns: [
            { data: 'date' },
            { data: 'title' }, 
            { data: 'description'  },
            { data: 'status'  },
            { data: 'action'  },
        ],
    });
    notification_Table.search(searchValNoti).draw();
    $('#notification_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filters('/clear_filters_notification_filtr',notification_Table);
            notification_Table.search('').draw();
        }
    });

    $("#notification_status").val(searchValNotiStat);
    $("#notification_status").change();
    $("#notification_status").on('change',function(){
        if(!$(this).val()){
            $("#notification_status").val('');
            clear_filters('/clear_filters_notification_stat',notification_Table);
        }
        notification_Table.draw();
    });
    comment_Table = $('#comment_Table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [{ orderable: false, targets: [2] },{ targets: [0,1],render: DataTable.render.ellipsis( 30) }],
        ajax: "get-comment",
        columns: [
            { data: 'comments' },
            { data: 'asset_type' }, 
            { data: 'action'  },
        ],
    });
    comment_Table.search(searchValComment).draw();
    $('#comment_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filters('/clear_filters_comment',comment_Table);
            comment_Table.search('').draw();
        }
    });

    main_category_Table = $("#main_category_Table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [{ orderable: false, targets: [2,3] },{ targets: [0,1],render: DataTable.render.ellipsis( 30) }],
        ajax: {
                url:"get-employee-cat",
                'data': function(data){
                    stat = '';
                    if($("#maincat_status").val()!=''){
                       stat =  $("#maincat_status").val();
                    }
                    // Append to data              
                    data.status = stat;
                    // data.status = 1;
                }
            },
        columns: [
            { data: 'main_cat_code' },
            { data: 'main_cat_name' }, 
            { data: 'status'  },
            { data: 'action'  },
        ],
    });
    main_category_Table.search(searchValMainCat).draw();
    $('#main_category_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filters('/clear_filters_maincat_filtr',main_category_Table);
            main_category_Table.search('').draw();
        }
    });
    $("#maincat_status").val(searchValMainCatStat);
    $("#maincat_status").change();
    $("#maincat_status").on('change',function(){
        if(!$(this).val()){
            $("#maincat_status").val('');
            clear_filters('/clear_filters_maincat_stat',main_category_Table);
        }
        main_category_Table.draw();
    });

    sub_category_Table = $("#sub_category_Table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [{ orderable: false, targets: [1,3,4] },{ targets: [0,1,2],render: DataTable.render.ellipsis( 30) }],
        ajax: {
                url:"get-sub-cat",
                'data': function(data){
                    stat = '';
                    if($("#subcat_status").val()!=''){
                       stat =  $("#subcat_status").val();
                    }
                    // Append to data              
                    data.status = stat;
                    // data.status = 1;
                }
            },
        columns: [
            { data: 'sub_cat_code' },
            { data: 'main_cat_name' }, 
            { data: 'sub_cat_name' }, 
            { data: 'status'  },
            { data: 'action'  },
        ],
    });
    sub_category_Table.search(searchValSubCat).draw();
    $('#sub_category_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filters('/clear_filters_subcat_filtr',sub_category_Table);
            sub_category_Table.search('').draw();
        }
    });
    $("#subcat_status").val(searchValSubCatStat);
    $("#subcat_status").change();
    $("#subcat_status").on('change',function(){
        if(!$(this).val()){
            $("#subcat_status").val('');
            clear_filters('/clear_filters_subcat_stat',sub_category_Table);
        }
        sub_category_Table.draw();
    });
    user_Table = $("#user_Table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [{ orderable: false, targets: [4,5] },{ targets: [0,1,2],render: DataTable.render.ellipsis( 30) }],
        ajax: {
                url:"get-users",
                'data': function(data){
                    stat = '';
                    if($("#user_status").val()!=''){
                       stat =  $("#user_status").val();
                    }
                    // Append to data              
                    data.status = stat;
                    // data.status = 1;
                }
            },
        columns: [
            { data: 'name' },
            { data: 'email' }, 
            { data: 'user_category'}, 
            { data: 'user_types' }, 
            { data: 'status'  },
            { data: 'action'  },
        ],
    });
    user_Table.search(searchValUser).draw();
    $('#user_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filters('/clear_filters_user_filtr',user_Table);
            user_Table.search('').draw();
        }
    });
    $("#user_status").val(searchValUserStat);
    $("#user_status").change();
    $("#user_status").on('change',function(){
        if(!$(this).val()){
            $("#user_status").val('');
            clear_filters('/clear_filters_user_stat',user_Table);
        }
        user_Table.draw();
    });
    product_Table = $("#product_Table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [{ orderable: false, targets: [4,5] },{ targets: [0,1,2,3],render: DataTable.render.ellipsis( 30) }],
        ajax: {
            url:"get-products",
            'data': function(data){
                // Read values               
                let status = $('#p_status').val();
                // Append to data              
                data.product_status = status;
            }
        },
        columns: [
            { data: 'prod_code' },
            { data: 'prod_name' }, 
            { data: 'main_cat_name' }, 
            { data: 'sub_cat_name' }, 
            { data: 'status'  },
            { data: 'action'  },
        ],
    });
    // Set the search box value
    product_Table.search(searchValProd).draw();
    $('#product_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filters('/clear_filters_product_filtr',product_Table);
            product_Table.search('').draw();
        }
    });
    $("#p_status").val(searchValProdStat);
    $("#p_status").change();
    $("#p_status").on('change',function(){
        if(!$(this).val()){
            $("#p_status").val('');
            clear_filters('/clear_filters_product_stat',product_Table);
        }
        product_Table.draw();
    });
    supplier_Table = $("#supplier_Table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        columnDefs: [{ orderable: false, targets: [4,5] },{ targets: [0,1,2,3],render: DataTable.render.ellipsis( 30) }],
        ajax: {
            url:"get-suppliers",
            'data': function(data){
                // Read values               
                let status = $('#sup_status').val();
                // Append to data              
                data.supplier_status = status;
            }
        },
        columns: [
            { data: 'sup_code' },
            { data: 'sup_name' }, 
            { data: 'sup_phone' }, 
            { data: 'sup_contact' }, 
            { data: 'status'  },
            { data: 'action'  },
        ],
    });
    // Set the search box value
    supplier_Table.search(searchValSupl).draw();
    $('#supplier_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            supplier_Table.search('').draw();
            clear_filters('/clear_filters_supplier_filtr',supplier_Table);
        }
    });
    $('#sup_status').change(function(){
        if(!$(this).val()){
            $('#sup_status').val('')
            clear_filters('/clear_filters_supplier_stat',supplier_Table);
        }
        supplier_Table.draw();
    });
    $("#sup_status").val(searchValSuplStat);
    $("#sup_status").change();
    //Delete button
    $(document).on("click", ".delete_dept_btn", function () {
        let id = $(this).data('id');
        $(".dept-model #department_id").val(id);
        $('.dept-model').modal('show');
    });

    $(document).on("click", ".delete_emp_btn", function () {
        let id = $(this).data('id');
        $(".employee-model #employee_id").val(id);
        $('.employee-model').modal('show');
    });

    $(document).on("click", ".delete_desig_btn", function () {
        let id = $(this).data('id');
        $(".desig-model #designation_id").val(id);
        $('.desig-model').modal('show');
    });

    $(document).on("click", ".delete_main_cat_btn", function () {
        let id = $(this).data('id');
        $(".employee-cat-model #main_category_id").val(id);
        $('.employee-cat-model').modal('show');
    });

    $(document).on("click", ".delete_sub_cat_btn", function () {
        let id = $(this).data('id');
        $(".sub-cat-model #sub_category_id").val(id);
        $('.sub-cat-model').modal('show');
    });

    $(document).on("click", ".delete_prod_btn", function () {
        let id = $(this).data('id');
        $(".product-model #product_id").val(id);
        $('.product-model').modal('show');
    });

    $(document).on("click", ".delete_supplier_btn", function () {
        let id = $(this).data('id');
        $(".supplier-model #supplier_id").val(id);
        $('.supplier-model').modal('show');
    });

    $(document).on("click", ".delete_notification_btn", function () {
        let id = $(this).data('id');
        $(".notification-model #notification_id").val(id);
        $('.notification-model').modal('show');
    });
    $(document).on("click", ".delete_comment_btn", function () {
        let id = $(this).data('id');
        $(".comment-model #comment_id").val(id);
        $('.comment-model').modal('show');
    });

    $(document).on("click", ".delete_location_btn", function () {
        let id = $(this).data('id');
        $(".location-model #location_id").val(id);
        $('.location-model').modal('show');
    });

    $(document).on("click", ".delete_user_btn", function () {
        let id = $(this).data('id');
        $(".users-model #user_id").val(id);
        $('.users-model').modal('show');
    });
    
    desig_Table =  $("#desig_Table").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            order: [],
            columnDefs: [{ orderable: false, targets: [2,3] },{ targets: [0,1],render: DataTable.render.ellipsis( 30) }],
            ajax: {
            url:"get-desig",
            'data': function(data){
                // Read values               
                let status = $('#designation_status').val();
                // Append to data              
                data.status = status;
            }
        },
            columns: [
               { data: 'desg_code' },
               { data: 'desg_name' },            
               { data: 'status'  },
               { data: 'action'  },
            ],
      });
    // Set the search box value
    desig_Table.search(searchValDesg).draw();
    $("#designation_status").val(searchValDesgStat);
    $("#designation_status").change();
    $("#designation_status").on('change',function(){
        if(!$(this).val()){
            $("#designation_status").val('');
            clear_filters('/clear_filters_designation_stat',desig_Table);
        }
        desig_Table.draw();
    });
     // Add an event listener to the search input field
    $('#desig_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filters('/clear_filters_designation_filtr',desig_Table); 
            desig_Table.search('').draw();      
        }
    });
    $(".modal__cancel__btn").click(function(){
        $("#delete-Modal").modal('hide');
    }); 
    $.validator.addMethod('validPassword', function (value) {

      return /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])(?=.*[a-zA-Z0-9!@#$%^&*()\-_=+{};:,<.>]).{8,}$/.test(value);
    }, 'Create a strong password with a mix of letters, numbers and symbols');

    var validator = $("#change-password-form").validate({
        ignore : [],
        rules: {
            new_password :{
                required:true,
                minlength : 8,
                maxlength : 15,
                validPassword : true
            },
            confirm_password :{
                required:true,
                equalTo : "#new_password",
            }
        },
        messages: {
            confirm_password: {
                equalTo: "The password and confirm password does not match"
            }
        }
    });
    $(document).on("click", ".change-password-btn", function () {
        let id = $(this).data('id');
        validator.resetForm();
        document.getElementById("change-password-form").reset();
        $("#change-password-Modal #user_unique_id").val(id);
        $('#change-password-Modal').modal('show');
    });
    $(".change-user-password-cancel-btn").click(function(){
        validator.resetForm();
        document.getElementById("change-password-form").reset(); 
        $("#change-password-Modal").modal('hide');
    });
    $(".change-user-password-btn").click(function(){
        if($("#change-password-form").valid()){
            $("#loader-image-file").addClass('d-block');
            $("#change-password-form").submit();
        }
    });
});      
function clear_filters_designation(){
    desig_Table.search('').draw();
    $("#designation_status").val('');
    clear_filters('/clear_filters_designation_stat',desig_Table);
    clear_filters('/clear_filters_designation_filtr',desig_Table);
}
  
function clear_filters_maincat(){
    main_category_Table.search('').draw();
    $("#maincat_status").val('');
    clear_filters('/clear_filters_maincat_stat',main_category_Table);
    clear_filters('/clear_filters_maincat_filtr',main_category_Table);
}
  
function clear_filters_subcat(){
    sub_category_Table.search('').draw();
    $("#subcat_status").val('');
    clear_filters('/clear_filters_subcat_stat',sub_category_Table);
    clear_filters('/clear_filters_subcat_filtr',sub_category_Table);
}
  
function clear_filters_user(){
    user_Table.search('').draw();
    $("#user_status").val('');
    clear_filters('/clear_filters_user_stat',user_Table);
    clear_filters('/clear_filters_user_filtr',user_Table);
}

function clear_filters_department(){
    dept_Table.search('').draw();
    $("#dept_status").val('');
    clear_filters('/clear_filters_department_stat',dept_Table);
    clear_filters('/clear_filters_department_filtr',dept_Table);
}

function clear_filters_loc(){
    location_Table.search('').draw();
    $("#loc_status").val('');
    clear_filters('/clear_filters_loc_stat',location_Table);
    clear_filters('/clear_filters_loc_filtr',location_Table);
}
function clear_filters_employee(){
    employee_Table.search('').draw();
    $("#employee_status").val('');
    clear_filters('/clear_filters_employee_stat',employee_Table);
    clear_filters('/clear_filters_employee_filtr',employee_Table);
}
function clear_filters_product(){
    product_Table.search('').draw();
    $("#p_status").val('');
    clear_filters('/clear_filters_product_stat',product_Table);
    clear_filters('/clear_filters_product_filtr',product_Table);

}
function clear_filters_supplier(){
    supplier_Table.search('').draw();
    $("#sup_status").val('');
    clear_filters('/clear_filters_supplier_stat',supplier_Table);
    clear_filters('/clear_filters_supplier_filtr',supplier_Table);

}
function clear_filters_notification(){
    notification_Table.search('').draw();
    $("#notification_status").val('');
    clear_filters('/clear_filters_notification_filtr',notification_Table);
    clear_filters('/clear_filters_notification_stat',notification_Table);
}
function clear_filters_comment(){
    comment_Table.search('').draw();
    clear_filters('/clear_filters_comment',comment_Table);
}


function clear_filters(filter_url,table){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:filter_url,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the headers
        },
        success: function(response) {
            table.draw();
        },
        error: function(xhr, status, error) {
            console.error('Error clearing session variable: ' + error);
        }
    });
}