$(function () {

    //Nrork project
    // DataTable initialization


    function clear_filter(value, table) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/clear_filter/' + value,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the headers
            },
            success: function (response) {
                table.search('').draw();
            },
            error: function (xhr, status, error) {
                console.error('Error clearing session variable: ' + error);
            }
        });
    }

    role_Table = $("#role_Table").DataTable({

        processing: true,
        language: {
            processing: '<div class="spinner-border text-primary" role="status"></div>'
        },
        serverSide: true,
        order: [],
        columnDefs: [
            { orderable: false, targets: [0, 3] }, // Disable sorting for the 3rd column (index 2)
            { targets: [1, 2], render: $.fn.dataTable.render.ellipsis(30) },
        ],
        ajax: {
            url: "role/list",
            data: function (data) {
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    // Use meta.row to get the row number (starting from 0) and increment it by 1
                    return meta.row + 1;
                }
            },
            { data: 'name' },
            { data: 'description' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            $('td', row).eq(0).addClass('serial-number-column');
        }
    });

    technology_Table = $("#technology_Table").DataTable({

        processing: true,
        language: {
            processing: '<div class="spinner-border text-primary" technology="status"></div>'
        },
        serverSide: true,
        order: [],
        columnDefs: [
            { orderable: false, targets: [0,3] }, // Disable sorting for the 3rd column (index 2)
            { targets: [1], render: $.fn.dataTable.render.ellipsis(30) },
        ],
        ajax: {
            url: "technology/list/0",
            data: function (data) {
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    // Use meta.row to get the row number (starting from 0) and increment it by 1
                    return meta.row + 1;
                }
            },
            { data: 'technology_name' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            $('td', row).eq(0).addClass('serial-number-column');
        }
    }); 
    technology_Table.search(searchValTechnology).draw();

    $('#technology_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filter('searchValTechnology',technology_Table);
            technology_Table.search('').draw();
        }
    });

    job_role_Table = $("#job_role_Table").DataTable({

        processing: true,
        language: {
            processing: '<div class="spinner-border text-primary" job_role="status"></div>'
        },
        serverSide: true,
        order: [],
        columnDefs: [
            { orderable: false, targets: [0,3] }, // Disable sorting for the 3rd column (index 2)
            { targets: [1], render: $.fn.dataTable.render.ellipsis(30) },
        ],
        ajax: {
            url: "job_role/list/0",
            data: function (data) {
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    // Use meta.row to get the row number (starting from 0) and increment it by 1
                    return meta.row + 1;
                }
            },
            { data: 'job_role_name' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            $('td', row).eq(0).addClass('serial-number-column');
        }
    }); 

    job_role_Table.search(searchValJobRole).draw();

    $('#job_role_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filter('searchValJobRole',job_role_Table);
            job_role_Table.search('').draw();
        }
    });
    skill_Table = $("#skill_Table").DataTable({

        processing: true,
        language: {
            processing: '<div class="spinner-border text-primary" skill="status"></div>'
        },
        serverSide: true,
        order: [],
        columnDefs: [
            { orderable: false, targets: [0,3] }, // Disable sorting for the 3rd column (index 2)
            { targets: [1], render: $.fn.dataTable.render.ellipsis(30) },
        ],
        ajax: {
            url: "skill/list/0",
            data: function (data) {
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    // Use meta.row to get the row number (starting from 0) and increment it by 1
                    return meta.row + 1;
                }
            },
            { data: 'skill_name' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            $('td', row).eq(0).addClass('serial-number-column');
        }
    });


    skill_Table.search(searchValSkill).draw();

    $('#skill_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filter('searchValSkill',skill_Table);
            skill_Table.search('').draw();
        }
    });



    designation_Table = $("#designation_Table").DataTable({

        processing: true,
        language: {
            processing: '<div class="spinner-border text-primary" designation="status"></div>'
        },
        serverSide: true,
        order: [],
        columnDefs: [
            { orderable: false, targets: [0,4] }, // Disable sorting for the 3rd column (index 2)
            { targets: [1], render: $.fn.dataTable.render.ellipsis(30) },
        ],
        ajax: {
            url: "designation/list/0",
            data: function (data) {
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    // Use meta.row to get the row number (starting from 0) and increment it by 1
                    return meta.row + 1;
                }
            },
            { data: 'designation_code' },
            { data: 'designation_name' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            $('td', row).eq(0).addClass('serial-number-column');
        }
    });

    designation_Table.search(searchValDesignation).draw();

    $('#designation_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filter('searchValDesignation',designation_Table);
            designation_Table.search('').draw();
        }
    });
    leave_type_Table = $("#leave_type_Table").DataTable({

        processing: true,
        language: {
            processing: '<div class="spinner-border text-primary" leave_type="status"></div>'
        },
        serverSide: true,
        order: [],
        columnDefs: [
            { orderable: false, targets: [0,4] }, // Disable sorting for the 3rd column (index 2)
            { targets: [1], render: $.fn.dataTable.render.ellipsis(30) },
        ],
        ajax: {
            url: "leave_type/list/0",
            data: function (data) {
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    // Use meta.row to get the row number (starting from 0) and increment it by 1
                    return meta.row + 1;
                }
            },
            { data: 'leave_type_code' },
            { data: 'leave_type_name' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            $('td', row).eq(0).addClass('serial-number-column');
        }
    });


    leave_type_Table.search(searchValLeaveType).draw();

    $('#leave_type_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filter('searchValLeaveType',leave_type_Table);
            leave_type_Table.search('').draw();
        }
    });

    department_Table = $("#department_Table").DataTable({

        processing: true,
        language: {
            processing: '<div class="spinner-border text-primary" department="status"></div>'
        },
        serverSide: true,
        order: [],
        columnDefs: [
            { orderable: false, targets: [0,4] }, // Disable sorting for the 3rd column (index 2)
            { targets: [1], render: $.fn.dataTable.render.ellipsis(30) },
        ],
        ajax: {
            url: "department/list/0",
            data: function (data) {
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    // Use meta.row to get the row number (starting from 0) and increment it by 1
                    return meta.row + 1;
                }
            },
            { data: 'department_code' },
            { data: 'department_name' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            $('td', row).eq(0).addClass('serial-number-column');
        }
    });

    department_Table.search(searchValDepartment).draw();

    $('#department_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filter('searchValDepartment',department_Table);
            department_Table.search('').draw();
        }
    });
    user_Table = $("#user_Table").DataTable({
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        pageLength: 10,
        responsive: false,
        processing: true,
        language: {
            processing: '<div class="spinner-border text-primary" role="status"></div>'
        },
        serverSide: true,
        order: [],
        columnDefs: [
            { orderable: false, targets: [0, 6] }, // Disable sorting for the 3rd column (index 2)
            { targets: [1, 2, 4], render: $.fn.dataTable.render.ellipsis(30) }
        ],

        ajax: {
            url: "user/list/1",
            data: function (data) {
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    // Use meta.row to get the row number (starting from 0) and increment it by 1
                    return meta.row + 1;
                }
            },
            { data: 'name' },
            { data: 'email' },
            { data: 'mobile' },
            { data: 'role' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            // Add a class to the first column (the serial number column)
            $('td', row).eq(0).addClass('serial-number-column');
        }
    });
    user_Table.search(searchValUser).draw();

    $('#user_Table_filter input').on('keyup', function () {
        if (!$(this).val()) {
            clear_filter('searchValUser', user_Table);
        }
    });


    //Main category

    main_category_Table = $("#main_category_Table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        language: {
            processing: '<div class="spinner-border text-primary" role="status"></div>'
        },
        columnDefs: [
            { orderable: false, targets: [0, 4] },
            { targets: [2], render: $.fn.dataTable.render.ellipsis(30) }
        ],
        ajax: {
            url: "employee-categories/list/0",
            'data': function (data) {
                // stat = '';
                // if($("#maincat_status").val()!=''){
                //    stat =  $("#maincat_status").val();
                // }
                // Append to data              
                // data.status = stat;
                // data.status = 1;
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: 'category_code' },
            { data: 'category_name' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            // Add a class to the first column (the serial number column)
            $('td', row).eq(0).addClass('serial-number-column');
        }
    });

    main_category_Table.search(searchValMainCat).draw();

    $('#main_category_Table_filter input').on('keyup', function () {
        if (!$(this).val()) {
            clear_filter('searchValMainCat', main_category_Table);
        }
    });



    //Sub category

    sub_category_Table = $("#sub_category_Table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        language: {
            processing: '<div class="spinner-border text-primary" role="status"></div>'
        },
        columnDefs: [
            { orderable: false, targets: [0, 5] },
            { targets: [2,3], render: $.fn.dataTable.render.ellipsis(30) }
        ],
        ajax: {
            url: "sub-categories/list/0",
            'data': function (data) {

            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: 'category_code' },
            { data: 'category_name' },
            { data: 'parent_category_name' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            // Add a class to the first column (the serial number column)
            $('td', row).eq(0).addClass('serial-number-column');
        }
    });

    sub_category_Table.search(searchValSubCat).draw();

    $('#sub_category_Table_filter input').on('keyup', function () {
        if (!$(this).val()) {
            clear_filter('searchValSubCat', sub_category_Table);
        }
    });

    notification_Table = $("#notification_Table").DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [],
        language: {
            processing: '<div class="spinner-border text-primary" ></div>'
        },
        columnDefs: [
            { orderable: false, targets: [0, 4] },
            { targets: [2,3], render: $.fn.dataTable.render.ellipsis(30) }
        ],
        ajax: {
            url: "notification/list",
            'data': function (data) {

            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: 'date' },
            { data: 'title' },
            { data: 'description' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            // Add a class to the first column (the serial number column)
            $('td', row).eq(0).addClass('serial-number-column');
        }
    });


    notification_Table.search(searchValNotification).draw();

    $('#notification_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filter('searchValNotification',notification_Table);
            notification_Table.search('').draw();
        }
    });

    policy_Table = $("#policy_Table").DataTable({

        processing: true,
        language: {
            processing: '<div class="spinner-border text-primary" policy="status"></div>'
        },
        serverSide: true,
        order: [],
        columnDefs: [
            { orderable: false, targets: [0,5] }, // Disable sorting for the 3rd column (index 2)
            { targets: [1], render: $.fn.dataTable.render.ellipsis(30) },
        ],
        ajax: {
            url: "policy/list/0",
            data: function (data) {
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    // Use meta.row to get the row number (starting from 0) and increment it by 1
                    return meta.row + 1;
                }
            },
            { data: 'policy_title' },
            { data: 'policy_description' },
            { data: 'effective_from' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            $('td', row).eq(0).addClass('serial-number-column');
        }
    }); 

    policy_Table.search(searchValPolicy).draw();

    $('#policy_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filter('searchValPolicy',policy_Table);
            policy_Table.search('').draw();
        }
    });

    employee_Table = $("#employee_Table").DataTable({

        processing: true,
        language: {
            processing: '<div class="spinner-border text-primary" role="status"></div>'
        },
        serverSide: true,
        order: [],
        columnDefs: [
            { orderable: false, targets: [0, 6] }, // Disable sorting for the 3rd column (index 2)
            { targets: [1, 2], render: $.fn.dataTable.render.ellipsis(30) },
        ],
        ajax: {
            url: "employee/list",
            data: function (data) {
            }
        },
        columns: [
            {
                data: null, render: function (data, type, row, meta) {
                    // Use meta.row to get the row number (starting from 0) and increment it by 1
                    return meta.row + 1;
                }
            },
            { data: 'employee_code' },
            { data: 'name' },
            { data: 'designation_name' },
            { data: 'date_of_joining' },
            { data: 'status' },
            { data: 'action' },
        ],
        createdRow: function (row, data, dataIndex) {
            $('td', row).eq(0).addClass('serial-number-column');
        }
    });

    employee_Table.search(searchValEmployee).draw();

    $('#employee_Table_filter input').on('keyup', function() {
        // Get the value entered into the search box
        if(!$(this).val()){
            clear_filter('searchValEmployee',employee_Table);
            employee_Table.search('').draw();
        }
    });
});


