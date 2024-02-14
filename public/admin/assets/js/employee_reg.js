
$(document).ready(function () {
    $("#dob").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0", // Allow selection of the last 100 years
        maxDate: "-18Y",      // Restrict selection to users who are at least 18 years old
        onSelect: function (selectedDate) {
              removeErrClass(this, 'invalid');
            // Your custom validation logic here (if needed)
            validateAge(selectedDate);
        }
    });
    
    $(".lve_from-date,.lve_to-date").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,    // Restrict selection to users who are at least 18 years old
        onSelect: function (selectedDate) {
              validateLveDateRanges();
              removeErrClass(this, 'invalid');                                    
            // Your custom validation logic here (if needed)
        }
    });
    $(".from-date,.to-date,#date_of_joining,#relieving_date").datepicker({
        dateFormat: "dd-mm-yy",
        maxDate:1,
        changeMonth: true,
        changeYear: true,    // Restrict selection to users who are at least 18 years old
        onSelect: function (selectedDate) {
            if(currentTab == 1) $msg = "edu_div";
            if(currentTab == 2) $msg = "exp_div";
              validateEduDateRanges($msg);
              removeErrClass(this, 'invalid');                                    
            // Your custom validation logic here (if needed)
        }
    });
    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#aadhaar").on('focusout', function () {
        if($("#aadhaar").val()){
            $val = isValidAadhaar($("#aadhaar").val());
            if(!$val){
                $("#aadhaar").addClass("invalid");
                $("#aadhaar_error").text("Invalid AADHAAR.");
            }
        }
    });
    $("#email").on('focusout', function () {
        if($("#email").val()){
            $val = validEmail($("#email").val());
            if(!$val){
                $("#email").addClass("invalid");
                $("#email_error").text("Invalid Email format.");
            }
        }
    });
    $("#company_mail").on('focusout', function () {
        validateEmail($("#company_mail").val());
    });
    $("#phone,#emergency_contact_phone_1,#emergency_contact_phone_2").on('focusout', function () {
        $val = validatePhone($(this).val());
        if(!$val){
            id = $(this).attr("id");
            $("#"+id).addClass("invalid");
            $("#"+id+"_error").text("Invalid phone number.");
        }
    });
    $(".file-upload").on('change', function () {
        readURL(this);
    });
    
    $(".edu_clear").on('click', function () {
        $(".file-upload").click();
    });
    $(".upload-button").on('click', function () {
        $(".file-upload").click();
    });
    $(".stepIndicator").on('click', function () {
        if($("#user_id").val()){
            currentTab = $(this).prop("id");
            showTab($(this).prop("id"));
        }
    });
    /*************Education tab *****************/
    // Click event for the edu_add_first button
    $(document).on("click", ".edu_add", function () {

        // Check if mandatory fields are filled in the current edu_div
        var isValid = validateData($(this).closest(".edu_div"));

        if (isValid) {
            var clonedDiv = $(".edu_div").last().clone();
            $(".form-control", clonedDiv).val(''); 
            $("#edu_count").val(parseInt($("#edu_count").val()) + 1);
            // Find all input elements inside the cloned div
            clonedDiv.find('input').each(function (i) {
                // Update id and name attributes
                var originalId = $(this).attr('id');
                var originalName = $(this).attr('name');
                // Extract the number after the underscore
                var matches = originalId.match(/_(\d+)$/);
                if (matches) {
                    var index = parseInt(matches[1], 10) + 1;
                }

                // Modify the id and name attributes based on your logic
                var newId = originalId.replace(/_\d+$/, '_' + (index));
                var newName = originalName.replace(/_\d+$/, '_' + (index));

                // Update id and name attributes in the cloned input element
                $(this).attr('id', newId);
                $(this).attr('name', newName);
            });
            // Initialize datepicker for the new date field
            clonedDiv.find('.from-date, .to-date').removeClass('hasDatepicker').datepicker({
                dateFormat: 'dd-mm-yy',// Restrict selection to users who are at least 18 years old
                maxDate:1,
                onSelect: function (selectedDate) {
                      removeErrClass(this, 'invalid');
                    // Your custom validation logic here (if needed)
                }
                // Other datepicker options if needed
            });
            // Hide the edu_add_next div in the original div
            $(".edu_add_next", clonedDiv).addClass("d-none");

            // Append the cloned div after the current one
            $(".edu_div").last().after(clonedDiv);

            // Show the edu_add_next div in the cloned div and hide edu_add_first
            $(".edu_add_first", clonedDiv).addClass("d-none");
            $(".edu_add_next", clonedDiv).removeClass("d-none");
            // Hide the "Add" button in the previous div
            $(this).closest(".edu_div").find(" .edu_add").addClass("d-none");
        }
    });
    // Click event for the edu_delete button
    $(document).on("click", ".edu_delete", function () {


        // Show the "Add" button in the previous div
        var prevDiv = $(this).closest(".edu_div").prev();
        // Check if the deleted div contains an "Add" button
        var deletedDiv = $(this).closest(".edu_div");
        var hasVisibleAddButton = $(".edu_add:visible", $(this).closest(".edu_div")).length > 0;
        // Remove the corresponding cloned div
        deletedDiv.remove();
        $("#edu_count").val(parseInt($("#edu_count").val()) - 1);

        // Show the "Add" button in the previous div if the deleted div had an "Add" button
        if (hasVisibleAddButton) {
            $(".edu_add", prevDiv).removeClass("d-none");
        }
    });
    /*************End Education tab *****************/

    /*************Experience tab *****************/
    // Click event for the exp_add_first button
    $(document).on("click", ".exp_add", function () {

        // Check if mandatory fields are filled in the current exp_div
        var isValid = validateData($(this).closest(".exp_div"));

        if (isValid) {
            var clonedDiv = $(".exp_div").last().clone();
            $(".form-control", clonedDiv).val('');
            $("#exp_count").val(parseInt($("#exp_count").val()) + 1);
            // Find all input elements inside the cloned div
            clonedDiv.find('input').each(function (i) {
                // Update id and name attributes
                var originalId = $(this).attr('id');
                var originalName = $(this).attr('name');
                // Extract the number after the underscore
                var matches = originalId.match(/_(\d+)$/);
                if (matches) {
                    var index = parseInt(matches[1], 10) + 1;
                }

                // Modify the id and name attributes based on your logic
                var newId = originalId.replace(/_\d+$/, '_' + (index));
                var newName = originalName.replace(/_\d+$/, '_' + (index));

                // Update id and name attributes in the cloned input element
                $(this).attr('id', newId);
                $(this).attr('name', newName);
            });
            // Initialize datepicker for the new date field
            clonedDiv.find('.from-date, .to-date').removeClass('hasDatepicker').datepicker({
                maxDate:1,
                dateFormat: 'dd-mm-yy',// Restrict selection to users who are at least 18 years old
                onSelect: function (selectedDate) {
                      removeErrClass(this, 'invalid');
                    // Your custom validation logic here (if needed)
                }
                // Other datepicker options if needed
            });
            // Hide the exp_add_next div in the original div
            $(".exp_add_next", clonedDiv).addClass("d-none");

            // Append the cloned div after the current one
            $(".exp_div").last().after(clonedDiv);

            // Show the exp_add_next div in the cloned div and hide exp_add_first
            $(".exp_add_first", clonedDiv).addClass("d-none");
            $(".exp_add_next", clonedDiv).removeClass("d-none");
            // Hide the "Add" button in the previous div
            $(this).closest(".exp_div").find(" .exp_add").addClass("d-none");
        }
    });
    // Click event for the exp_delete button
    $(document).on("click", ".exp_delete", function () {


        // Show the "Add" button in the previous div
        var prevDiv = $(this).closest(".exp_div").prev();
        // Check if the deleted div contains an "Add" button
        var deletedDiv = $(this).closest(".exp_div");
        var hasVisibleAddButton = $(".exp_add:visible", $(this).closest(".exp_div")).length > 0;
        // Remove the corresponding cloned div
        deletedDiv.remove();
        $("#exp_count").val(parseInt($("#exp_count").val()) - 1);

        // Show the "Add" button in the previous div if the deleted div had an "Add" button
        if (hasVisibleAddButton) {
            $(".exp_add", prevDiv).removeClass("d-none");
        }
    });
    /*************End Experience tab *****************/

    /*************Document tab *****************/
    // Click event for the doc_add_first button
    $(document).on("click", ".doc_add", function () {

        // Check if mandatory fields are filled in the current doc_div
        var isValid = validateData($(this).closest(".doc_div"));

        if (isValid) {
            var clonedDiv = $(".doc_div").last().clone();
            $(".form-control", clonedDiv).val('');
            $("#doc_count").val(parseInt($("#doc_count").val()) + 1);
            // Find all input elements inside the cloned div
            clonedDiv.find('input,select').each(function (i) {
                // Update id and name attributes
                var originalId = $(this).attr('id');
                var originalName = $(this).attr('name');
                // Extract the number after the underscore
                var matches = originalId.match(/_(\d+)$/);
                if (matches) {
                    var index = parseInt(matches[1], 10) + 1;
                }

                // Modify the id and name attributes based on your logic
                var newId = originalId.replace(/_\d+$/, '_' + (index));
                var newName = originalName.replace(/_\d+$/, '_' + (index));

                // Update id and name attributes in the cloned input element
                $(this).attr('id', newId);
                $(this).attr('name', newName);
            });
            // Hide the doc_add_next div in the original div
            $(".doc_add_next", clonedDiv).addClass("d-none");

            // Append the cloned div after the current one
            $(".doc_div").last().after(clonedDiv);

            // Show the doc_add_next div in the cloned div and hide doc_add_first
            $(".doc_add_first", clonedDiv).addClass("d-none");
            $(".doc_add_next", clonedDiv).removeClass("d-none");
            // Hide the "Add" button in the previous div
            $(this).closest(".doc_div").find(" .doc_add").addClass("d-none");
        }
    });
    // Click event for the doc_delete button
    $(document).on("click", ".doc_delete", function () {


        // Show the "Add" button in the previous div
        var prevDiv = $(this).closest(".doc_div").prev();
        // Check if the deleted div contains an "Add" button
        var deletedDiv = $(this).closest(".doc_div");
        var hasVisibleAddButton = $(".doc_add:visible", $(this).closest(".doc_div")).length > 0;
        // Remove the corresponding cloned div
        deletedDiv.remove();

        $("#doc_count").val(parseInt($("#doc_count").val()) - 1);
        // Show the "Add" button in the previous div if the deleted div had an "Add" button
        if (hasVisibleAddButton) {
            $(".doc_add", prevDiv).removeClass("d-none");
        }
    });
    /*************End Document tab *****************/
    /*************Leave tab *****************/
    // Click event for the lve_add_first button
    $(document).on("click", ".lve_add", function () {

        var isValid = validateData($(this).closest(".lve_div"));

        if (isValid) {
            var clonedDiv = $(".lve_div").last().clone();
            $(".form-control", clonedDiv).val('');
            $("#lve_count").val(parseInt($("#lve_count").val()) + 1);
            // Find all input elements inside the cloned div
            clonedDiv.find('input,select').each(function (i) {
                // Update id and name attributes
                var originalId = $(this).attr('id');
                var originalName = $(this).attr('name');
                // Extract the number after the underscore
                var matches = originalId.match(/_(\d+)$/);
                if (matches) {
                    var index = parseInt(matches[1], 10) + 1;
                }

                // Modify the id and name attributes based on your logic
                var newId = originalId.replace(/_\d+$/, '_' + (index));
                var newName = originalName.replace(/_\d+$/, '_' + (index));

                // Update id and name attributes in the cloned input element
                $(this).attr('id', newId);
                $(this).attr('name', newName);
            });
            // Hide the lve_add_next div in the original div
            $(".lve_add_next", clonedDiv).addClass("d-none");

            // Append the cloned div after the current one
            $(".lve_div").last().after(clonedDiv);
            // Initialize datepicker for the new date field
            clonedDiv.find('.from-date, .to-date').removeClass('hasDatepicker').datepicker({
                maxDate:1,
                dateFormat: 'dd-mm-yy',// Restrict selection to users who are at least 18 years old
                onSelect: function (selectedDate) {
                      removeErrClass(this, 'invalid');
                    // Your custom validation logic here (if needed)
                }
                // Other datepicker options if needed
            });

            // Show the lve_add_next div in the cloned div and hide lve_add_first
            $(".lve_add_first", clonedDiv).addClass("d-none");
            $(".lve_add_next", clonedDiv).removeClass("d-none");
            // Hide the "Add" button in the previous div
            $(this).closest(".lve_div").find(" .lve_add").addClass("d-none");
        }
    });
    // Click event for the lve_delete button
    $(document).on("click", ".lve_delete", function () {


        // Show the "Add" button in the previous div
        var prevDiv = $(this).closest(".lve_div").prev();
        // Check if the deleted div contains an "Add" button
        var deletedDiv = $(this).closest(".lve_div");
        var hasVisibleAddButton = $(".lve_add:visible", $(this).closest(".lve_div")).length > 0;
        // Remove the corresponding cloned div
        deletedDiv.remove();

        $("#lve_count").val(parseInt($("#lve_count").val()) - 1);
        // Show the "Add" button in the previous div if the deleted div had an "Add" button
        if (hasVisibleAddButton) {
            $(".lve_add", prevDiv).removeClass("d-none");
        }
    });
    /*************End Leave tab *****************/
    $(document).on("click", "#successModalOk", function () {
        window.location.href = "/employee-list";
    });

    $(document).on("click", ".delete_employee_btn", function () {
        let id = $(this).data('id');
        $("#dltModal #employee_id").val(id);
    });

});  // Set the max attribute of the date input to current year - 18
var currentDate = new Date();
var maxDate = new Date(currentDate.getFullYear() - 18, currentDate.getMonth(), currentDate.getDate());

// Format the maxDate as YYYY-MM-DD
var formattedMaxDate = maxDate.toISOString().split('T')[0];

// Set the max attribute of the date input
document.getElementById("dob").setAttribute("max", formattedMaxDate);

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("step");
    for(i=0;i<=6;i++){
        x[i].style.display = "none";
    }
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    $(".alert-danger").hide();
    $(".alert-success").hide();
    $ret = true;
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("step");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // document.getElementById("add-profile-form").submit();
    if (n == 1) {
        var formData = new FormData($("#add-profile-form")[0]); // Create a FormData object from the form

        $.ajax({
            data: formData,
            processData: false, // Important! Do not process the data
            contentType: false, // Important! Set contentType to false
            type: "post",
            url: $("#add-profile-form").attr("action"),
            dataType: 'json',
            async: false,
            success: function (data) {
                if (data.success == true) {
                    $("#user_id").val(data.id);
                    $(".alert-success").fadeIn().delay(2000).fadeOut('slow');
                    if(currentTab == 0) $msg = "Personal Details saved successfully";
                    if(currentTab == 1) $msg = "Educational Details saved successfully";
                    if(currentTab == 2) $msg = "Experience Details saved successfully";
                    if(currentTab == 3) $msg = "Documents uploaded successfully";
                    if(currentTab == 4) $msg = "Professional Details saved successfully";
                    if(currentTab == 5) $msg = "Salary Details saved successfully";
                    if(currentTab == 6) $msg = "Leave Details saved successfully";
                    $(".message_p").html($msg);
                }
                else { 
                    $(".alert-danger").fadeIn().delay(2000).fadeOut('slow');
                    $(".message_p").html("Save failed.");
                    $ret = false; }
            }
        });
    }
    if ($ret == false) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = parseInt(currentTab) + parseInt(n);
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        if($("#edu_id").val()>0 &&
         $("#exp_id").val()>0 &&
         $("#doc_id").val()>0 &&
         $("#prof_id").val()>0 &&
         $("#sal_id").val()>0 )
        {
            $("#successModal").modal("show");
            $("#msg_success").text("Employee registration completed successfully");
        }
        else {
            var text = "";
            $("#edu_id").val()==0?text +="Education ":text +="";
            $("#exp_id").val()==0?text +="Experience ":text +="";
            $("#doc_id").val()==0?text +="Document upload ":text +="";
            $("#prof_id").val()==0?text +="Professional ":text +="";
            $("#sal_id").val()==0?text +="Salary ":text +="";
            $("#successModal").modal("show");
            $("#msg_success").text("Registration Partially completed.Please enter "+ text+ " details");
        }
        // ... the form gets submitted:
        // return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, z, i, valid = true;
    x = document.getElementsByClassName("step");
    y = x[currentTab].getElementsByTagName("input");
    z = x[currentTab].getElementsByClassName("required-field");
    w = x[currentTab].getElementsByClassName("invalid");
    if (w.length > 0) {
        return false;
    }
    // A loop that checks every input field in the current tab:
    for (i = 0; i < z.length; i++) {
        // If a field is empty...
        if (z[i].value == "") {
            // add an "invalid" class to the field:
            z[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("stepIndicator");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}
// Function to validate mandatory fields in an edu_div
function validateData(eduDiv) {
    var isValid = true;

    // Add your validation logic here
    // For example, check if mandatory fields are filled
    // Check for required fields
    $(".required-field", eduDiv).each(function () {
        if ($(this).prop("required") && !$(this).val()) {
            isValid = false;
            $(this).addClass("invalid");
        }
        else if ($(this).hasClass("invalid")) {
            isValid = false;
        }
        else {
            $(this).removeClass("invalid");
        }
    });


    // if (!isValid) {
    //     alert("Please fill in all mandatory fields.");
    // }

    return isValid;
}

function removeErrClass(element, classToRemove) {
    // Check if the element has the specified class
    if (element.classList.contains(classToRemove)) {
        // Remove the specified class
        element.classList.remove(classToRemove);
        id = $(element).attr("id");
        $("#"+id+"_error").text("");
    }
}

function validateEduDateRanges(div) {
    var dateRanges = [];
    // Collect date ranges from input values
    $("."+div).each(function () {
        var fromDate = $(this).find('.from-date').val();
        var toDate = $(this).find('.to-date').val();

        if (fromDate && toDate) {
            // Check for date order and overlapping
            if (new Date(fromDate) >= new Date(toDate)) {
                isValid = false;
                markFieldAsInvalid($(this).find('.from-date'));
                markFieldAsInvalid($(this).find('.to-date'));
            } else {
                markFieldAsValid($(this).find('.from-date'));
                markFieldAsValid($(this).find('.to-date'));
            }
        }
    });

}
function validateLveDateRanges() {

    isValid = true;
    // Collect date ranges from input values
    $(".lve_div").each(function () {
        var fromDate = $(this).find('.lve_from-date').val();
        var toDate = $(this).find('.lve_to-date').val();

        if (fromDate && toDate) {
            // Check for date order and overlapping
            if (new Date(fromDate) >= new Date(toDate)) {
                isValid = false;
                markFieldAsInvalid($(this).find('.lve_from-date'));
                markFieldAsInvalid($(this).find('.lve_to-date'));
            } else {
                markFieldAsValid($(this).find('.lve_from-date'));
                markFieldAsValid($(this).find('.lve_to-date'));
            }
        }
    });
}
function markFieldAsInvalid(element) {
    element.addClass('invalid');
}

function markFieldAsValid(element) {
    element.removeClass('invalid');
}
function hasDateRangeOverlap(dateRanges) {
    for (var i = 0; i < dateRanges.length - 1; i++) {
        for (var j = i + 1; j < dateRanges.length; j++) {
            if (
                (dateRanges[i].from <= dateRanges[j].to && dateRanges[i].to >= dateRanges[j].from) ||
                (dateRanges[j].from <= dateRanges[i].to && dateRanges[j].to >= dateRanges[i].from)
            ) {
                // Overlapping date ranges found
                return true;
            }
        }
    }

    // No overlapping date ranges found
    return false;
}

function validateAge(selectedDate) {
    var currentDate = new Date();
    var selectedDOB = new Date(selectedDate);

    // Calculate age difference in years
    var ageDiff = currentDate.getFullYear() - selectedDOB.getFullYear();

    if (ageDiff < 18) {
        // Display an error or handle the age restriction violation
        alert("Age must be 18 or older.");
        // Clear the input or take appropriate action
        $("#dob").val("");
    }
}
function validateNumber(event) {
    const inputValue = event.key;
    const pattern = /^\d+(\.\d{1,2})?$/;

    // Check if the input matches the pattern
    if (!pattern.test(inputValue)) {
        event.preventDefault();
        return false;
    }

    return true;
}

function validateEmail(email) {
    if(email!=""){
        $val = validEmail(email);
        if(!$val){
            $("#company_mail").addClass("invalid");
            $("#company_mail_error").text("Invalid Email format.");
            return result;
        }
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
            data: { 'email': email, 'id': id },
            success: function (data) {
                if (data.status == 1) {
                    $("#company_mail").addClass("invalid");
                    $("#company_mail_error").text("Email already exists");
                    result = false;
                }
            }
        });
        return result;
    }
}
function validatePhone(value){

    if (value == '') {
        return true;
    }
    else {
        return /^(?!0+$)\d{10}$/.test(value);
    }
}
function validEmail(value){

    return /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/.test(value);
}
function isValidAadhaar(aadhaar) {
    // Regular expression pattern for Aadhaar validation
    var aadhaarPattern = /^\d{12}$/;

    // Check if Aadhaar number matches the pattern
    if (aadhaarPattern.test(aadhaar)) {
        // Additional checks based on structure (optional)
        var areaCode = aadhaar.substring(0, 3);
        var subDistrictCode = aadhaar.substring(3, 5);
        var uniqueNumber = aadhaar.substring(5, 9);
        var checksum = aadhaar.substring(9);

        // Additional checks or logic based on area code, sub-district code, etc.
        
        return true; // Valid Aadhaar number
    } else {
        return false; // Invalid Aadhaar number
    }
}
