<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{asset('admin/assets/minjs/jquery-ui.js')}}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('admin/assets/js/jquery.validate.js') }}"></script>
<script src="{{ asset('admin/assets/minjs/multiselect.min.js') }}"></script>

<script src="{{ asset('admin/assets/js/admin_script.js') }}"></script>
<script src="{{ asset('admin/assets/js/master_script.js') }}"></script>

<script src="{{ asset('admin/assets/js/admin_validate_script.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{ asset('admin/assets/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('admin/assets/js/ellipsis.js')}}"></script>
<script src="{{asset('admin/assets/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('admin/assets/datatable/js/dataTables.buttons.min.js')}}"></script>

{{-- <script src="{{ asset('admin/assets/js/app.js') }}"></script> --}}
<script src="{{ asset('admin/assets/js/datatables.js') }}"></script>
<script src="{{ asset('admin/assets/js/reports.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('admin/assets/js/employee_reg.js') }}"></script>

<script>
var searchValUser= '<?php echo isset($_SESSION['searchValUser'])?$_SESSION['searchValUser']:''; ?>';
var searchValMainCat= '<?php echo isset($_SESSION['searchValMainCat'])?$_SESSION['searchValMainCat']:''; ?>';
var searchValSubCat= '<?php echo isset($_SESSION['searchValSubCat'])?$_SESSION['searchValSubCat']:''; ?>';
var searchValTechnology = '<?php echo isset($_SESSION['searchValTechnology'])?$_SESSION['searchValTechnology']:''; ?>';
var searchValJobRole = '<?php echo isset($_SESSION['searchValJobRole'])?$_SESSION['searchValJobRole']:''; ?>';
var searchValSkill = '<?php echo isset($_SESSION['searchValSkill'])?$_SESSION['searchValSkill']:''; ?>';
var searchValDesignation = '<?php echo isset($_SESSION['searchValDesignation'])?$_SESSION['searchValDesignation']:''; ?>';
var searchValLeaveType = '<?php echo isset($_SESSION['searchValLeaveType'])?$_SESSION['searchValLeaveType']:''; ?>';
var searchValDepartment = '<?php echo isset($_SESSION['searchValDepartment'])?$_SESSION['searchValDepartment']:''; ?>';
var searchValNotification = '<?php echo isset($_SESSION['searchValNotification'])?$_SESSION['searchValNotification']:''; ?>';
var searchValPolicy = '<?php echo isset($_SESSION['searchValPolicy'])?$_SESSION['searchValPolicy']:''; ?>';
var searchValEmployee = '<?php echo isset($_SESSION['searchValEmployee'])?$_SESSION['searchValEmployee']:''; ?>';



</script>


{{-- {!! RecaptchaV3::initJs() !!} --}}

<!--Password show & hide js -->
<script>
    $(document).ready(function() {

            $(document).on('click', '.dropdown-item', function() {
                var url = $(this).attr('href');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                if(url!=undefined){
                $.ajax({
                    url: '/clear_filter_session',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the headers
                    },
                    success: function(response) {
                        window.location.href = url;
                        console.log('' + response);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error clearing session variable: ' + error);
                    }
                });
            }
            });


        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
        $("#show_hide_password-c a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password-c input').attr("type") == "text") {
                $('#show_hide_password-c input').attr('type', 'password');
                $('#show_hide_password-c i').addClass("bx-hide");
                $('#show_hide_password-c i').removeClass("bx-show");
            } else if ($('#show_hide_password-c input').attr("type") == "password") {
                $('#show_hide_password-c input').attr('type', 'text');
                $('#show_hide_password-c i').removeClass("bx-hide");
                $('#show_hide_password-c i').addClass("bx-show");
            }
        });
    });
</script>

<script>
    function printmsg() {
        const usr_input = document
            .getElementById("submit").value;

        // Check whether the input is equal
        // to generated captcha or not
        if (usr_input == captcha.innerHTML) {
            let s = document.getElementById("key")
                .innerHTML = "Matched";
            generate();
        } else {
            let s = document.getElementById("key")
                .innerHTML = "not Matched";
            generate();
        }
    }


    $(".btn-refresh").click(function() {
        $.ajax({
            type: 'GET',
            url: '/refresh_captcha',
            success: function(data) {
                $(".captcha").html(data.captcha);
            }
        });
    });
</script>
<!--app JS-->

<script>
    let captcha;

    function generate() {
        // Clear old input
        document.getElementById("submit").value = "";

        // Access the element to store
        // the generated captcha
        captcha = document.getElementById("image");
        let uniquechar = "";

        const randomchar =
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        // Generate captcha for length of
        // 5 with random character
        for (let i = 1; i < 5; i++) {
            uniquechar += randomchar.charAt(
                Math.random() * randomchar.length)
        }

        // Store generated input
        captcha.innerHTML = uniquechar;
    }
</script>

<script type="text/javascript">
	$.fn.select2.amd.require([
	  "select2/core",
	  "select2/utils"
	], function (Select2, Utils, oldMatcher) {
	  var $basicSingle = $(".js-example-basic-single");
	  var $basicMultiple = $(".js-example-basic-multiple");
  
	  $.fn.select2.defaults.set("width", "100%");
  
	  $basicSingle.select2();
	  $basicMultiple.select2();
  
	  function formatState (state) {
		if (!state.id) {
		  return state.text;
		}
		var $state = $(
		  '<span>' +
			'<img src="vendor/images/flags/' +
			  state.element.value.toLowerCase() +
			'.png" class="img-flag" /> ' +
			state.text +
		  '</span>'
		);
		return $state;
	  };
	});
  
  </script>