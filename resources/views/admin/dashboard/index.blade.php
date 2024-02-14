@extends('admin.layouts.index')
@section('content')
    <!--wrapper-->
    <div class="wrapper">

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <div class="container-fluid">

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">

                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Revenue</p>
                                            <h4 class="my-1">$4805</h4>
                                            <p class="mb-0 font-13 text-success"><i
                                                    class="bx bxs-up-arrow align-middle"></i>$34 from last week</p>
                                        </div>
                                        <div class="widgets-icons rounded-circle text-white ms-auto bg-gradient-burning"><i
                                                class="bx bxs-wallet"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Total Customers</p>
                                            <h4 class="my-1">8.4K</h4>
                                            <p class="mb-0 font-13 text-danger"><i
                                                    class="bx bxs-down-arrow align-middle"></i>$24 from last week</p>
                                        </div>
                                        <div class="widgets-icons rounded-circle text-white ms-auto bg-gradient-burning"><i
                                                class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Store Visitors</p>
                                            <h4 class="my-1">59K</h4>
                                            <p class="mb-0 font-13 text-success"><i
                                                    class="bx bxs-up-arrow align-middle"></i>$34 from last week</p>
                                        </div>
                                        <div class="widgets-icons rounded-circle text-white ms-auto bg-gradient-burning"><i
                                                class="bx bxs-binoculars"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Bounce Rate</p>
                                            <h4 class="my-1">34.46%</h4>
                                            <p class="mb-0 font-13 text-danger"><i
                                                    class="bx bxs-down-arrow align-middle"></i>12.2% from last week</p>
                                        </div>
                                        <div class="widgets-icons rounded-circle text-white ms-auto bg-gradient-burning"><i
                                                class="bx bx-line-chart-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                

                </div>

            </div>
        </div>
        <!--end page wrapper -->


        <!-- search modal -->
        <div class="modal" id="SearchModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header gap-2">
                        <div class="position-relative popup-search w-100">
                            <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                                placeholder="Search">
                            <span
                                class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i
                                    class='bx bx-search'></i></span>
                        </div>
                        <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                </div>
            </div>
        </div>
        <!-- end search modal -->






    </div>
@endsection

<!--end wrapper-->

{{-- <!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script>
	$('.dp-btn .button').click(function(){
	  $('.dp-btn .button span').toggleClass("rotate");
	});
	  $('.dp-btn ul li .first').click(function(){
		$('.dp-btn ul li .first span').toggleClass("rotate");
	  });
	  $('.dp-btn ul li .second').click(function(){
		$('.dp-btn ul li .second span').toggleClass("rotate");
	  });
 </script>
<!--app JS-->
<script src="assets/js/app.js"></script>

</body>

</html> --}}
