@extends('admin.layouts.index')
@section('content')
    <!--wrapper-->
    <div class="wrapper">

     
	 <!--start header wrapper-->	
     <div class="header-wrapper">
		<!--start header -->
		@include('admin.layouts.header')

		@extends('hr.hr_submenu')

		<!--end header -->
		<!--navigation-->
		<div class="primary-menu">
			<nav class="navbar navbar-expand-lg align-items-center">
			   <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
				 <div class="offcanvas-header border-bottom">
					 <div class="d-flex align-items-center">
						 <div class="">
							<a href="index.html"><img src="assets/images/NeorkProfile-logo.svg" class="logo-icon" alt="logo icon"></a>
						 </div>
						
					 </div>
				   <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				 </div>
				 <div class="offcanvas-body">
				   <ul class="navbar-nav align-items-center flex-grow-1">
					 
					   
					   
					   <li class="nav-item dropdown">
						 <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
							<div class="parent-icon"><i class='fa fa-cog'></i>
							</div>
							<div class="menu-title d-flex align-items-center"></div>
							<!-- <div class="ms-auto dropy-icon"><i class='fa fa-angle-down'></i></div> -->
						 </a>
						 <ul class="dropdown-menu stay_open">
							<li><a class="dropdown-item" href="table.html"><i class="fa fa-table"></i>Table</a></li>
							<li class="dropdown">
								<a class="dropdown-item dropdown-toggle  " href="javascript:;" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-table"></i>Table</a>
								<ul class="dropdown-menu submenu-new" aria-labelledby="dropdownMenuLink">
									<li><a class="dropdown-item" href="#">Action</a></li>
									<li><a class="dropdown-item" href="#">Something else here</a></li>
									<li><a class="dropdown-item" href="#">Something else here</a></li>
								</ul>
							</li>
							<li><a class="dropdown-item" href="forms.html"><i class="fa fa-file"></i>Forms</a></li>
							<li><a class="dropdown-item" href="tab.html"><i class="fa fa-tags"></i>Tabs</a></li>
							
						    <li><a class="dropdown-item" href="register.html"><i class="fa fa-table"></i>Register</a></li>
							<li><a class="dropdown-item" href="login.html"><i class="fa fa-file"></i>login</a></li>
							
							<li class="dropdown">
								<a class="dropdown-item dropdown-toggle  " href="javascript:;" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-table"></i>Table</a>
								<ul class="dropdown-menu submenu-new" aria-labelledby="dropdownMenuLink">
									<li><a class="dropdown-item" href="#">Action</a></li>
									<li><a class="dropdown-item" href="#">Something else here</a></li>
									<li><a class="dropdown-item" href="#">Something else here</a></li>
								</ul>
							</li>
						 </ul>
					   </li>
					   
				   </ul>
				 </div>
			   </div>
		   </nav>
	 </div>
		<!--end navigation-->
	   </div>
	   <!--end header wrapper-->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="page-header d-xl-flex d-block mb-3"> 
					<div class="page-leftheader">
						 <div class="page-title">Employee<span class="font-weight-normal text-muted ms-2">Dashboard</span></div>
						 
						 </div> 
						 </div>
				<div class="container-fluid">
				

					
<div class="row">
<div class="col-lg-12">
	<div class="row">

		<div class="col-lg-4 col-12">
			<div class="card radius-10">
				<div class="card-body">
					<div class="d-flex justify-content-between mb-3">
						<div>
							<span class="d-block text-dark fw-bold">Total Leave</span>
						</div>
						<div>
							<span class="text-success">100%</span>
						</div>
					</div>
					<h3 class="mb-3">12</h3>
					<div class="progress height-five mb-2">
						<div class="progress-bar bg-primary w-100" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<p class="mb-0">year of 2023</p>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-12">
			<div class="card radius-10">
				<div class="card-body">
					<div class="d-flex justify-content-between mb-3">
						<div>
							<span class="d-block text-dark fw-bold">Pending Leaves</span>
						</div>
						<div>
							<span class="text-success">30%</span>
						</div>
					</div>
					<h3 class="mb-3">3</h3>
					<div class="progress height-five mb-2">
						<div class="progress-bar bg-primary w-30" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<p class="mb-0">year of 2023</p>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-12">
			<div class="card radius-10">
				<div class="card-body">
					<div class="d-flex justify-content-between mb-3">
						<div>
							<span class="d-block text-dark fw-bold">Sick leaves pending</span>
						</div>
						<div>
							<span class="text-danger">0%</span>
						</div>
					</div>
					<h3 class="mb-3">0</h3>
					<div class="progress height-five mb-2">
						<div class="progress-bar bg-primary w-00" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<p class="mb-0">year of 2023</p>
				</div>
			</div>
		</div>
		
	</div>
</div>
	<div class=" col-xl-6 col-lg-12 clg-md-12 col-sm-12">

		<div class="row">
			<div class="col-md-12">
				<div class="card punch-status">
					<div class="card-body">
						<h5 class="card-title">Timesheet <small class="text-muted">11 Mar 2019</small></h5>
						<div class="punch-det">
							<h6>Punch In at</h6>
							<p>Wed, 11th Mar 2019 10.00 AM</p>
						</div>
						<div class="punchout-reason  mb-2">
							<textarea class="form-control" id="input11" placeholder="reason for punchout" rows="1"></textarea>
						</div>
						<div class="punch-info">
							<div class="punch-hours">
								<span>3.45 hrs</span>
							</div>
						</div>
						<div class="punch-btn-section">
							<button type="button" id="punch-btn-in-out" class="btn btn-primary punch-btn">Punch Out</button>
						</div>
						<div class="statistics">
							<div class="row">
								<div class="col-md-6 col-6 text-center">
									<div class="stats-box">
										<p>Break</p>
										<h6>1.21 hrs</h6>
									</div>
								</div>
								<div class="col-md-6 col-6 text-center">
									<div class="stats-box">
										<p>Overtime</p>
										<h6>3 hrs</h6>
									</div>
								</div>
							</div>
						</div>

						
					</div>
				</div>
			</div>
		
			
			<div class="col-md-12">
				<div class="card recent-activity">
					<div class="card-body">
						<h5 class="card-title">Today Activity</h5>
						<ul class="res-activity-list">
							<li>
								<p class="mb-0">Punch In at</p>
								<p class="res-activity-time">
									
									10.00 AM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch Out at</p>
								<p class="res-activity-time">
									
									11.00 AM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch In at</p>
								<p class="res-activity-time">
									
									11.15 AM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch Out at</p>
								<p class="res-activity-time">
									
									1.30 PM.
								</p>
							</li><li>
								<p class="mb-0">Punch Out at</p>
								<p class="res-activity-time">
									
									1.30 PM.
								</p>
							</li><li>
								<p class="mb-0">Punch Out at</p>
								<p class="res-activity-time">
									
									1.30 PM.
								</p>
							</li><li>
								<p class="mb-0">Punch Out at</p>
								<p class="res-activity-time">
									
									1.30 PM.
								</p>
							</li><li>
								<p class="mb-0">Punch Out at</p>
								<p class="res-activity-time">
									
									1.30 PM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch In at</p>
								<p class="res-activity-time">
									
									2.00 PM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch In at</p>
								<p class="res-activity-time">
									
									2.00 PM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch Out at</p>
								<p class="res-activity-time">
									
									7.30 PM.
								</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		

		<div class="row">
			
		</div>
	
	</div>
	<div class="col-xl-6 col-lg-12 clg-md-12 col-sm-12">
		<div class="row">
			
			<div class="col-12">
				<div class="card mb-3">
					<div class="card-body">
						<h5 class="card-title">Holiday List</h5>
						<table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Holiday Day</th>
									<th>Holiday Date</th>
									<th>Holiday Name</th>
									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-danger">01</td>
									<td class="text-danger">Tuesday</td>
									<td class="text-danger">January 26, 2021</td>
									<td class="text-danger">Republic Day</td>
									
								</tr>
								<tr>
									<td class="text-danger">02</td>
									<td class="text-danger">Friday</td>
									<td class="text-danger">April 2, 2021</td>
									<td class="text-danger">Good Friday</td>
									
								</tr>
								<tr>
									<td class="text-danger">03</td>
									<td class="text-danger">Monday</td>
									<td class="text-danger">April 30, 2021</td>
									<td class="text-danger">Memorial Day</td>
									
								</tr>  
								<tr>
									<td class="text-success">04</td>
									<td class="text-success">Wednesday</td>
									<td class="text-success">August 15, 2021</td>
									<td class="text-success">Independence Day</td>
									
								</tr>
								<tr>
									<td>05</td>
									<td>Wednesday</td>
									<td>August 22, 2021</td>
									<td>Bakrid</td>
									
								</tr>
								<tr>
									<td>06</td>
									<td>Monday</td>
									<td>September 3, 2021</td>
									<td>Janmashtami</td>
									
								</tr>
								<tr>
									<td>07</td>
									<td>Tuesday</td>
									<td>October 2, 2021</td>
									<td>Gandhi Jayanti</td>
									
								</tr>
								<tr>
									<td>08</td>
									<td>Wednesday</td>
									<td>November 7, 2021</td>
									<td>Diwali</td>
									
								</tr>
								<tr>
									<td>09</td>
									<td>Tuesday</td>
									<td>December 25, 2021</td>
									<td>Christmas Day</td>
									
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card mb-3">
					<div class="card-body">
						<h5 class="card-title">Employess leaves</h5>
						<table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Designation</th>
									<th>Status</th>
									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="">01</td>
									<td class="">Anoop </td>
									<td class="">Ui developer</td>
									<td class="text-danger">leave</td>
									
								</tr>
								<tr>
									<td class="">01</td>
									<td class="">Anoop </td>
									<td class="">Ui developer</td>
									<td class="text-danger">leave</td>
									
								</tr><tr>
									<td class="">01</td>
									<td class="">Anoop </td>
									<td class="">Ui developer</td>
									<td class="text-success">present </td>
									
								</tr><tr>
									<td class="">01</td>
									<td class="">Anoop </td>
									<td class="">Ui developer</td>
									<td class="text-danger">leave</td>
									
								</tr><tr>
									<td class="">01</td>
									<td class="">Anoop </td>
									<td class="">Ui developer</td>
									<td class="text-danger">leave</td>
									
								</tr><tr>
									<td class="">01</td>
									<td class="">Anoop </td>
									<td class="">Ui developer</td>
									<td class="text-danger">leave</td>
									
								</tr><tr>
									<td class="">01</td>
									<td class="">Anoop </td>
									<td class="">Ui developer</td>
									<td class="text-danger">leave</td>
									
								</tr>
							</tbody>
						</table>
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
