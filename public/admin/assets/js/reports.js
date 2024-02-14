$(function () {

    //Nrork project
    // DataTable initialization
    let now = new Date();
    let jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
    let new_date = jsDate.toString();
    let current_date = now.getDate() + '' + (now.getMonth() + 1) + '' + now.getFullYear();
    let current_time = now.toLocaleTimeString();
    let logo = $("#logo_url").val();
    getBase64FromImageUrl(logo);

    function getBase64FromImageUrl(url) {
        let img = new Image();
        img.crossOrigin = "anonymous";

        img.onload = function () {
            let canvas = document.createElement("canvas");
            canvas.width = this.width;
            canvas.height = this.height;

            let ctx = canvas.getContext("2d");
            ctx.drawImage(this, 0, 0);
            let fileType = url.split('.').pop().toLowerCase();
            let dataURL = canvas.toDataURL("image/" + fileType);
            let new_url = dataURL.replace(/^data:image\/(png|jpeg|jpg);base64,/, "");
            initialiseTable(dataURL);
        };

        img.src = url;
    }

 

    function initialiseTable(logo_image) {

        user_report_Table = $("#user_report_Table").DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            responsive: false,
            processing: true,
            searching: false,
            ordering: true,
            pagination: true,
            info: false,
            length: false,
            async: false,
            language: {
                processing: '<div class="spinner-border text-primary" role="status"></div>'
            },
            serverSide: true,
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 1, 2, 3, 4, 5] },
            ],
            dom: 'fBlrtip', // Include buttons
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'USERS-LIST-' + current_date.toString() + current_time,
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    title: 'USERS LIST',
                    className: 'sm__btn mb-3',
                    orientation: 'landscape',
                    download: true,
                    customize: function (doc) {
                        doc.content[1].table.widths = ['5%', '25%', '25%', '10%', '25%', '10%'];
                        doc.styles.tableHeader.fillColor = '#004eaa';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 12;

                        doc['header'] = (function () {
                            return {
                                absolutePosition: { x: -80, y: -75 },
                                columns: [
                                    {
                                        image: logo_image,
                                        width: 300,
                                    }
                                ],
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    '',
                                    {
                                        alignment: 'left',
                                        margin: [-270, 0],
                                        text: ['', { text: jsDate.toString() }],

                                    },
                                    {
                                        alignment: 'right',
                                        margin: [10, 0],
                                        text: [
                                            { text: page.toString(), italics: false },
                                            ' of ',
                                            { text: pages.toString(), italics: false }
                                        ]
                                    },
                                ],
                            }
                        });


                        let objLayout = {};
                        objLayout['width'] = function (i) { return 800; };
                        objLayout['hLineWidth'] = function (i) { return .5; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 4; };
                        objLayout['paddingRight'] = function (i) { return 4; };
                        doc.content[1].layout = objLayout;
                        doc.autoPrint = false;

                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    messageTop: function () {
                        return '<h1 style="text-align:center;">USERS LIST</h1>';
                    },
                    title: "",
                    className: 'sm__outline__btn mb-3',
                    pagingType: "simple",
                    customize: function (win) {
                        $(win.document.body).find('td:nth-child(2),td:nth-child(3),td:nth-child(5)').removeClass('ellipsis');
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="report-head"><img src="' + logo + '" style="position:relative; top:0; left:0;width:250px" /><p style="position:relative; top:0; left:0;"><span style="text-align:right;display:block;width:100%">' + new_date + '</span></p></div>'
                            );
                    },
                },
                ,
                {
                    text: 'Cancel',
                    className: 'sm__cancel__btn mb-3',
                    action: function (e, dt, button, config) {
                        window.location = '/users';
                    }
                }
            ],
            ajax: "/user/list/0",
            columns: [
                {
                    data: null, render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'name' },
                { data: 'email' },
                { data: 'mobile' },
                { data: 'role' },
                { data: 'status' },

            ],
            createdRow: function (row, data, dataIndex) {
                // Add a class to the first column (the serial number column)
                $('td', row).eq(0).addClass('serial-number-column');
            }
        });

        main_category_report_Table = $("#main_category_report_Table").DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            responsive: false,
            processing: true,
            searching: false,
            ordering: true,
            pagination: true,
            info: false,
            length: false,
            async: false,
            language: {
                processing: '<div class="spinner-border text-primary" role="status"></div>'
            },
            serverSide: true,
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 1, 2, 3] },
            ],
            dom: 'fBlrtip', // Include buttons
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'EMPLOYEE CATEGORY-LIST-' + current_date.toString() + current_time,
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    title: 'EMPLOYEE CATEGORY LIST',
                    className: 'sm__btn mb-3',
                    orientation: 'landscape',
                    download: true,
                    customize: function (doc) {
                        doc.content[1].table.widths = ['10%', '30%', '40%', '20%'];
                        doc.styles.tableHeader.fillColor = '#004eaa';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 12;

                        doc['header'] = (function () {
                            return {
                                absolutePosition: { x: -80, y: -75 },
                                columns: [
                                    {
                                        image: logo_image,
                                        width: 300,
                                    }
                                ],
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    '',
                                    {
                                        alignment: 'left',
                                        margin: [-270, 0],
                                        text: ['', { text: jsDate.toString() }],

                                    },
                                    {
                                        alignment: 'right',
                                        margin: [10, 0],
                                        text: [
                                            { text: page.toString(), italics: false },
                                            ' of ',
                                            { text: pages.toString(), italics: false }
                                        ]
                                    },
                                ],
                            }
                        });


                        let objLayout = {};
                        objLayout['width'] = function (i) { return 800; };
                        objLayout['hLineWidth'] = function (i) { return .5; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 4; };
                        objLayout['paddingRight'] = function (i) { return 4; };
                        doc.content[1].layout = objLayout;
                        doc.autoPrint = false;

                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: [0, 1, 2, 3 ]
                    },
                    messageTop: function () {
                        return '<h1 style="text-align:center;">EMPLOYEE CATEGORY LIST</h1>';
                    },
                    title: "",
                    className: 'sm__outline__btn mb-3',
                    pagingType: "simple",
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="report-head"><img src="' + logo + '" style="position:relative; top:0; left:0;width:250px" /><p style="position:relative; top:0; left:0;"><span style="text-align:right;display:block;width:100%">' + new_date + '</span></p></div>'
                            );
                    },
                },
                ,
                {
                    text: 'Cancel',
                    className: 'sm__cancel__btn mb-3',
                    action: function (e, dt, button, config) {
                        window.location = '/employee-categories';
                    }
                }
            ],
            ajax: "/employee-categories/list/1",
            columns: [
                {
                    data: null, render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'category_code' },
                { data: 'category_name' }, 
                { data: 'status'  },

            ],
            createdRow: function (row, data, dataIndex) {
                // Add a class to the first column (the serial number column)
                $('td', row).eq(0).addClass('serial-number-column');
            }
        });

        sub_category_report_Table = $("#sub_category_report_Table").DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            responsive: false,
            processing: true,
            searching: false,
            ordering: true,
            pagination: true,
            info: false,
            length: false,
            async: false,
            language: {
                processing: '<div class="spinner-border text-primary" role="status"></div>'
            },
            serverSide: true,
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 1, 2, 3,4] },
            ],
            dom: 'fBlrtip', // Include buttons
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'SUB CATEGORY-LIST-' + current_date.toString() + current_time,
                    exportOptions: {
                        columns: [0, 1, 2, 3,4]
                    },
                    title: 'SUB CATEGORY LIST',
                    className: 'sm__btn mb-3',
                    orientation: 'landscape',
                    download: true,
                    customize: function (doc) {
                        doc.content[1].table.widths = ['5%', '15%', '30%','30%','20%'];
                        doc.styles.tableHeader.fillColor = '#004eaa';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 12;

                        doc['header'] = (function () {
                            return {
                                absolutePosition: { x: -80, y: -75 },
                                columns: [
                                    {
                                        image: logo_image,
                                        width: 300,
                                    }
                                ],
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    '',
                                    {
                                        alignment: 'left',
                                        margin: [-270, 0],
                                        text: ['', { text: jsDate.toString() }],

                                    },
                                    {
                                        alignment: 'right',
                                        margin: [10, 0],
                                        text: [
                                            { text: page.toString(), italics: false },
                                            ' of ',
                                            { text: pages.toString(), italics: false }
                                        ]
                                    },
                                ],
                            }
                        });


                        let objLayout = {};
                        objLayout['width'] = function (i) { return 800; };
                        objLayout['hLineWidth'] = function (i) { return .5; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 4; };
                        objLayout['paddingRight'] = function (i) { return 4; };
                        doc.content[1].layout = objLayout;
                        doc.autoPrint = false;

                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: [0, 1, 2, 3,4 ]
                    },
                    messageTop: function () {
                        return '<h1 style="text-align:center;">SUB CATEGORY LIST</h1>';
                    },
                    title: "",
                    className: 'sm__outline__btn mb-3',
                    pagingType: "simple",
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="report-head"><img src="' + logo + '" style="position:relative; top:0; left:0;width:250px" /><p style="position:relative; top:0; left:0;"><span style="text-align:right;display:block;width:100%">' + new_date + '</span></p></div>'
                            );
                    },
                },
                ,
                {
                    text: 'Cancel',
                    className: 'sm__cancel__btn mb-3',
                    action: function (e, dt, button, config) {
                        window.location = '/sub-categories';
                    }
                }
            ],
            ajax: "/sub-categories/list/1",
            columns: [
                {
                    data: null, render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'category_code' },
                { data: 'category_name' }, 
                { data: 'parent_category_name' }, 

                { data: 'status'  },

            ],
            createdRow: function (row, data, dataIndex) {
                // Add a class to the first column (the serial number column)
                $('td', row).eq(0).addClass('serial-number-column');
            }
        });


        technology_report_Table = $("#technology_report_Table").DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            responsive: false,
            processing: true,
            searching: false,
            ordering: true,
            pagination: true,
            info: false,
            length: false,
            async: false,
            language: {
                processing: '<div class="spinner-border text-primary" role="status"></div>'
            },
            serverSide: true,
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 1, 2] },
            ],
            dom: 'fBlrtip', // Include buttons
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'TECHNOLOGY-LIST-' + current_date.toString() + current_time,
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    title: 'TECHNOLOGY LIST',
                    className: 'sm__btn mb-3',
                    orientation: 'landscape',
                    download: true,
                    customize: function (doc) {
                        doc.content[1].table.widths = ['10%', '40%', '50%'];
                        doc.styles.tableHeader.fillColor = '#004eaa';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 12;

                        doc['header'] = (function () {
                            return {
                                absolutePosition: { x: -80, y: -75 },
                                columns: [
                                    {
                                        image: logo_image,
                                        width: 300,
                                    }
                                ],
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    '',
                                    {
                                        alignment: 'left',
                                        margin: [-270, 0],
                                        text: ['', { text: jsDate.toString() }],

                                    },
                                    {
                                        alignment: 'right',
                                        margin: [10, 0],
                                        text: [
                                            { text: page.toString(), italics: false },
                                            ' of ',
                                            { text: pages.toString(), italics: false }
                                        ]
                                    },
                                ],
                            }
                        });


                        let objLayout = {};
                        objLayout['width'] = function (i) { return 800; };
                        objLayout['hLineWidth'] = function (i) { return .5; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 4; };
                        objLayout['paddingRight'] = function (i) { return 4; };
                        doc.content[1].layout = objLayout;
                        doc.autoPrint = false;

                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    messageTop: function () {
                        return '<h1 style="text-align:center;">TECHNOLOGY LIST</h1>';
                    },
                    title: "",
                    className: 'sm__outline__btn mb-3',
                    pagingType: "simple",
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="report-head"><img src="' + logo + '" style="position:relative; top:0; left:0;width:250px" /><p style="position:relative; top:0; left:0;"><span style="text-align:right;display:block;width:100%">' + new_date + '</span></p></div>'
                            );
                    },
                },
                ,
                {
                    text: 'Cancel',
                    className: 'sm__cancel__btn mb-3',
                    action: function (e, dt, button, config) {
                        window.location = '/technology';
                    }
                }
            ],
            ajax: "/technology/list/1",
            columns: [
                {
                    data: null, render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'technology_name' },
                { data: 'status'  },

            ],
            createdRow: function (row, data, dataIndex) {
                // Add a class to the first column (the serial number column)
                $('td', row).eq(0).addClass('serial-number-column');
            }
        });
       
        designation_report_Table = $("#designation_report_Table").DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            responsive: false,
            processing: true,
            searching: false,
            ordering: true,
            pagination: true,
            info: false,
            length: false,
            async: false,
            language: {
                processing: '<div class="spinner-border text-primary" role="status"></div>'
            },
            serverSide: true,
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 1, 2 , 3] },
            ],
            dom: 'fBlrtip', // Include buttons
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'DESIGNATION-LIST-' + current_date.toString() + current_time,
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    title: 'DESIGNATION LIST',
                    className: 'sm__btn mb-3',
                    orientation: 'landscape',
                    download: true,
                    customize: function (doc) {
                        doc.content[1].table.widths = ['10%', '30%', '40%', '20%'];
                        doc.styles.tableHeader.fillColor = '#004eaa';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 12;

                        doc['header'] = (function () {
                            return {
                                absolutePosition: { x: -80, y: -75 },
                                columns: [
                                    {
                                        image: logo_image,
                                        width: 300,
                                    }
                                ],
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    '',
                                    {
                                        alignment: 'left',
                                        margin: [-270, 0],
                                        text: ['', { text: jsDate.toString() }],

                                    },
                                    {
                                        alignment: 'right',
                                        margin: [10, 0],
                                        text: [
                                            { text: page.toString(), italics: false },
                                            ' of ',
                                            { text: pages.toString(), italics: false }
                                        ]
                                    },
                                ],
                            }
                        });


                        let objLayout = {};
                        objLayout['width'] = function (i) { return 800; };
                        objLayout['hLineWidth'] = function (i) { return .5; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 4; };
                        objLayout['paddingRight'] = function (i) { return 4; };
                        doc.content[1].layout = objLayout;
                        doc.autoPrint = false;

                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: [0, 1, 2,3]
                    },
                    messageTop: function () {
                        return '<h1 style="text-align:center;">DESIGNATION LIST</h1>';
                    },
                    title: "",
                    className: 'sm__outline__btn mb-3',
                    pagingType: "simple",
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="report-head"><img src="' + logo + '" style="position:relative; top:0; left:0;width:250px" /><p style="position:relative; top:0; left:0;"><span style="text-align:right;display:block;width:100%">' + new_date + '</span></p></div>'
                            );
                    },
                },
                ,
                {
                    text: 'Cancel',
                    className: 'sm__cancel__btn mb-3',
                    action: function (e, dt, button, config) {
                        window.location = '/designation';
                    }
                }
            ],
            ajax: "/designation/list/1",
            columns: [
                {
                    data: null, render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'designation_code' },
                { data: 'designation_name' },
                { data: 'status'  },

            ],
            createdRow: function (row, data, dataIndex) {
                // Add a class to the first column (the serial number column)
                $('td', row).eq(0).addClass('serial-number-column');
            }
        });

        skill_report_Table = $("#skill_report_Table").DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            responsive: false,
            processing: true,
            searching: false,
            ordering: true,
            pagination: true,
            info: false,
            length: false,
            async: false,
            language: {
                processing: '<div class="spinner-border text-primary" role="status"></div>'
            },
            serverSide: true,
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 1, 2] },
            ],
            dom: 'fBlrtip', // Include buttons
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'SKILL-LIST-' + current_date.toString() + current_time,
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    title: 'SKILL LIST',
                    className: 'sm__btn mb-3',
                    orientation: 'landscape',
                    download: true,
                    customize: function (doc) {
                        doc.content[1].table.widths = ['10%', '30%', '40%', '20%'];
                        doc.styles.tableHeader.fillColor = '#004eaa';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 12;

                        doc['header'] = (function () {
                            return {
                                absolutePosition: { x: -80, y: -75 },
                                columns: [
                                    {
                                        image: logo_image,
                                        width: 300,
                                    }
                                ],
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    '',
                                    {
                                        alignment: 'left',
                                        margin: [-270, 0],
                                        text: ['', { text: jsDate.toString() }],

                                    },
                                    {
                                        alignment: 'right',
                                        margin: [10, 0],
                                        text: [
                                            { text: page.toString(), italics: false },
                                            ' of ',
                                            { text: pages.toString(), italics: false }
                                        ]
                                    },
                                ],
                            }
                        });


                        let objLayout = {};
                        objLayout['width'] = function (i) { return 800; };
                        objLayout['hLineWidth'] = function (i) { return .5; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 4; };
                        objLayout['paddingRight'] = function (i) { return 4; };
                        doc.content[1].layout = objLayout;
                        doc.autoPrint = false;

                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    messageTop: function () {
                        return '<h1 style="text-align:center;">SKILL LIST</h1>';
                    },
                    title: "",
                    className: 'sm__outline__btn mb-3',
                    pagingType: "simple",
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="report-head"><img src="' + logo + '" style="position:relative; top:0; left:0;width:250px" /><p style="position:relative; top:0; left:0;"><span style="text-align:right;display:block;width:100%">' + new_date + '</span></p></div>'
                            );
                    },
                },
                ,
                {
                    text: 'Cancel',
                    className: 'sm__cancel__btn mb-3',
                    action: function (e, dt, button, config) {
                        window.location = '/skill';
                    }
                }
            ],
            ajax: "/skill/list/1",
            columns: [
                {
                    data: null, render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'skill_name' },
                { data: 'status'  },

            ],
            createdRow: function (row, data, dataIndex) {
                // Add a class to the first column (the serial number column)
                $('td', row).eq(0).addClass('serial-number-column');
            }
        });
           
        leave_type_report_Table = $("#leave_type_report_Table").DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            responsive: false,
            processing: true,
            searching: false,
            ordering: true,
            pagination: true,
            info: false,
            length: false,
            async: false,
            language: {
                processing: '<div class="spinner-border text-primary" role="status"></div>'
            },
            serverSide: true,
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 1, 2 , 3] },
            ],
            dom: 'fBlrtip', // Include buttons
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'LEAVE-TYPE-LIST-' + current_date.toString() + current_time,
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    title: 'LEAVE-TYPE LIST',
                    className: 'sm__btn mb-3',
                    orientation: 'landscape',
                    download: true,
                    customize: function (doc) {
                        doc.content[1].table.widths = ['10%', '30%', '40%', '20%'];
                        doc.styles.tableHeader.fillColor = '#004eaa';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 12;

                        doc['header'] = (function () {
                            return {
                                absolutePosition: { x: -80, y: -75 },
                                columns: [
                                    {
                                        image: logo_image,
                                        width: 300,
                                    }
                                ],
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    '',
                                    {
                                        alignment: 'left',
                                        margin: [-270, 0],
                                        text: ['', { text: jsDate.toString() }],

                                    },
                                    {
                                        alignment: 'right',
                                        margin: [10, 0],
                                        text: [
                                            { text: page.toString(), italics: false },
                                            ' of ',
                                            { text: pages.toString(), italics: false }
                                        ]
                                    },
                                ],
                            }
                        });


                        let objLayout = {};
                        objLayout['width'] = function (i) { return 800; };
                        objLayout['hLineWidth'] = function (i) { return .5; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 4; };
                        objLayout['paddingRight'] = function (i) { return 4; };
                        doc.content[1].layout = objLayout;
                        doc.autoPrint = false;

                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: [0, 1, 2,3]
                    },
                    messageTop: function () {
                        return '<h1 style="text-align:center;">LEAVE-TYPE LIST</h1>';
                    },
                    title: "",
                    className: 'sm__outline__btn mb-3',
                    pagingType: "simple",
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="report-head"><img src="' + logo + '" style="position:relative; top:0; left:0;width:250px" /><p style="position:relative; top:0; left:0;"><span style="text-align:right;display:block;width:100%">' + new_date + '</span></p></div>'
                            );
                    },
                },
                ,
                {
                    text: 'Cancel',
                    className: 'sm__cancel__btn mb-3',
                    action: function (e, dt, button, config) {
                        window.location = '/leave_type';
                    }
                }
            ],
            ajax: "/leave_type/list/1",
            columns: [
                {
                    data: null, render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'leave_type_code' },
                { data: 'leave_type_name' },
                { data: 'status'  },

            ],
            createdRow: function (row, data, dataIndex) {
                // Add a class to the first column (the serial number column)
                $('td', row).eq(0).addClass('serial-number-column');
            }
        });

        job_role_report_Table = $("#job_role_report_Table").DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            responsive: false,
            processing: true,
            searching: false,
            ordering: true,
            pagination: true,
            info: false,
            length: false,
            async: false,
            language: {
                processing: '<div class="spinner-border text-primary" role="status"></div>'
            },
            serverSide: true,
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 1, 2] },
            ],
            dom: 'fBlrtip', // Include buttons
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'JOB-ROLE-LIST-' + current_date.toString() + current_time,
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    title: 'JOB-ROLE LIST',
                    className: 'sm__btn mb-3',
                    orientation: 'landscape',
                    download: true,
                    customize: function (doc) {
                        doc.content[1].table.widths = ['10%', '30%', '40%', '20%'];
                        doc.styles.tableHeader.fillColor = '#004eaa';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 12;

                        doc['header'] = (function () {
                            return {
                                absolutePosition: { x: -80, y: -75 },
                                columns: [
                                    {
                                        image: logo_image,
                                        width: 300,
                                    }
                                ],
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    '',
                                    {
                                        alignment: 'left',
                                        margin: [-270, 0],
                                        text: ['', { text: jsDate.toString() }],

                                    },
                                    {
                                        alignment: 'right',
                                        margin: [10, 0],
                                        text: [
                                            { text: page.toString(), italics: false },
                                            ' of ',
                                            { text: pages.toString(), italics: false }
                                        ]
                                    },
                                ],
                            }
                        });


                        let objLayout = {};
                        objLayout['width'] = function (i) { return 800; };
                        objLayout['hLineWidth'] = function (i) { return .5; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 4; };
                        objLayout['paddingRight'] = function (i) { return 4; };
                        doc.content[1].layout = objLayout;
                        doc.autoPrint = false;

                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    messageTop: function () {
                        return '<h1 style="text-align:center;">JOB-ROLE LIST</h1>';
                    },
                    title: "",
                    className: 'sm__outline__btn mb-3',
                    pagingType: "simple",
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="report-head"><img src="' + logo + '" style="position:relative; top:0; left:0;width:250px" /><p style="position:relative; top:0; left:0;"><span style="text-align:right;display:block;width:100%">' + new_date + '</span></p></div>'
                            );
                    },
                },
                ,
                {
                    text: 'Cancel',
                    className: 'sm__cancel__btn mb-3',
                    action: function (e, dt, button, config) {
                        window.location = '/job_role';
                    }
                }
            ],
            ajax: "/job_role/list/1",
            columns: [
                {
                    data: null, render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'job_role_name' },
                { data: 'status'  },

            ],
            createdRow: function (row, data, dataIndex) {
                // Add a class to the first column (the serial number column)
                $('td', row).eq(0).addClass('serial-number-column');
            }
        });
        department_report_Table = $("#department_report_Table").DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            responsive: false,
            processing: true,
            searching: false,
            ordering: true,
            pagination: true,
            info: false,
            length: false,
            async: false,
            language: {
                processing: '<div class="spinner-border text-primary" role="status"></div>'
            },
            serverSide: true,
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 1, 2 , 3] },
            ],
            dom: 'fBlrtip', // Include buttons
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'DEPARTMENT-LIST-' + current_date.toString() + current_time,
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    title: 'DEPARTMENT LIST',
                    className: 'sm__btn mb-3',
                    orientation: 'landscape',
                    download: true,
                    customize: function (doc) {
                        doc.content[1].table.widths = ['10%', '30%', '40%', '20%'];
                        doc.styles.tableHeader.fillColor = '#004eaa';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 12;

                        doc['header'] = (function () {
                            return {
                                absolutePosition: { x: -80, y: -75 },
                                columns: [
                                    {
                                        image: logo_image,
                                        width: 300,
                                    }
                                ],
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    '',
                                    {
                                        alignment: 'left',
                                        margin: [-270, 0],
                                        text: ['', { text: jsDate.toString() }],

                                    },
                                    {
                                        alignment: 'right',
                                        margin: [10, 0],
                                        text: [
                                            { text: page.toString(), italics: false },
                                            ' of ',
                                            { text: pages.toString(), italics: false }
                                        ]
                                    },
                                ],
                            }
                        });


                        let objLayout = {};
                        objLayout['width'] = function (i) { return 800; };
                        objLayout['hLineWidth'] = function (i) { return .5; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 4; };
                        objLayout['paddingRight'] = function (i) { return 4; };
                        doc.content[1].layout = objLayout;
                        doc.autoPrint = false;

                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    },
                    messageTop: function () {
                        return '<h1 style="text-align:center;">DEPARTMENT LIST</h1>';
                    },
                    title: "",
                    className: 'sm__outline__btn mb-3',
                    pagingType: "simple",
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="report-head"><img src="' + logo + '" style="position:relative; top:0; left:0;width:250px" /><p style="position:relative; top:0; left:0;"><span style="text-align:right;display:block;width:100%">' + new_date + '</span></p></div>'
                            );
                    },
                },
                ,
                {
                    text: 'Cancel',
                    className: 'sm__cancel__btn mb-3',
                    action: function (e, dt, button, config) {
                        window.location = '/department';
                    }
                }
            ],
            ajax: "/department/list/1",
            columns: [
                {
                    data: null, render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'department_code' },
                { data: 'department_name' },
                { data: 'status'  },

            ],
            createdRow: function (row, data, dataIndex) {
                // Add a class to the first column (the serial number column)
                $('td', row).eq(0).addClass('serial-number-column');
            }
        });

        employee_report_Table = $("#employee_report_Table").DataTable({
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            pageLength: 10,
            responsive: false,
            processing: true,
            searching: false,
            ordering: true,
            pagination: true,
            info: false,
            length: false,
            async: false,
            language: {
                processing: '<div class="spinner-border text-primary" role="status"></div>'
            },
            serverSide: true,
            order: [],
            columnDefs: [
                { orderable: false, targets: [0, 1, 2 , 3] },
            ],
            dom: 'fBlrtip', // Include buttons
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'EMPLOYEE-LIST-' + current_date.toString() + current_time,
                    exportOptions: {
                        columns:  [0, 1, 2, 3, 4, 5]
                    },
                    title: 'EMPLOYEE LIST',
                    className: 'sm__btn mb-3',
                    orientation: 'landscape',
                    download: true,
                    customize: function (doc) {
                        doc.content[1].table.widths = ['10%', '15%', '30%','25%',  '10%', '10%'];
                        doc.styles.tableHeader.fillColor = '#004eaa';
                        var now = new Date();
                        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                        doc.pageMargins = [20, 60, 20, 30];
                        doc.defaultStyle.fontSize = 12;
                        doc.styles.tableHeader.fontSize = 12;

                        doc['header'] = (function () {
                            return {
                                absolutePosition: { x: -80, y: -75 },
                                columns: [
                                    {
                                        image: logo_image,
                                        width: 300,
                                    }
                                ],
                            }
                        });
                        doc['footer'] = (function (page, pages) {
                            return {
                                columns: [
                                    '',
                                    {
                                        alignment: 'left',
                                        margin: [-270, 0],
                                        text: ['', { text: jsDate.toString() }],

                                    },
                                    {
                                        alignment: 'right',
                                        margin: [10, 0],
                                        text: [
                                            { text: page.toString(), italics: false },
                                            ' of ',
                                            { text: pages.toString(), italics: false }
                                        ]
                                    },
                                ],
                            }
                        });


                        let objLayout = {};
                        objLayout['width'] = function (i) { return 800; };
                        objLayout['hLineWidth'] = function (i) { return .5; };
                        objLayout['vLineWidth'] = function (i) { return .5; };
                        objLayout['hLineColor'] = function (i) { return '#aaa'; };
                        objLayout['vLineColor'] = function (i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function (i) { return 4; };
                        objLayout['paddingRight'] = function (i) { return 4; };
                        doc.content[1].layout = objLayout;
                        doc.autoPrint = false;

                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    messageTop: function () {
                        return '<h1 style="text-align:center;">EMPLOYEE LIST</h1>';
                    },
                    title: "",
                    className: 'sm__outline__btn mb-3',
                    pagingType: "simple",
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div class="report-head"><img src="' + logo + '" style="position:relative; top:0; left:0;width:250px" /><p style="position:relative; top:0; left:0;"><span style="text-align:right;display:block;width:100%">' + new_date + '</span></p></div>'
                            );
                    },
                },
                ,
                {
                    text: 'Cancel',
                    className: 'sm__cancel__btn mb-3',
                    action: function (e, dt, button, config) {
                        window.location = '/employee-list';
                    }
                }
            ],
            ajax: "/employee/list",
            columns: [
                {
                    data: null, render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: 'employee_code' },
                { data: 'name' },
                { data: 'designation_name' },
                { data: 'date_of_joining' },
                { data: 'status' },

            ],
            createdRow: function (row, data, dataIndex) {
                // Add a class to the first column (the serial number column)
                $('td', row).eq(0).addClass('serial-number-column');
            }
        });
    }

   

});



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