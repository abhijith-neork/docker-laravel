@extends('admin.layouts.index')
@extends('admin.master_submenu')
@section('content')
    <!--wrapper-->
    <!--start page wrapper -->

    <div class="page-wrapper">
        <div class="page-content">

            <div class="container-fluid">

                <!--breadcrumb-->
                <div class="page-breadcrumb  d-flex align-items-center mb-3">

                    <div class="ps-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Departments</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="btm-for mb-4 text-lg-end">
                            <div class="ms-auto">
                                <div class="btn-group">
                                    @if (hasPermission('department.store'))
                                        <button type="button" class="btn template-btn px-5" data-bs-toggle="offcanvas"
                                            href="#offcanvasExample1" role="button" aria-controls="offcanvasExample1">Add
                                        </button>
                                    @endif


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="title-head d-flex justify-content-between">
                    <h6 class="mb-0 text-uppercase">Departments</h6>

                </div>

                <hr />

                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <ul>
                                {{ session('success') }}
                            </ul>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <ul>
                                {{ session('error') }}
                            </ul>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="table-responsive">


                            <table id="department_Table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="bxs" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                        <th>#</th>

                                        <th>Department Code</th>
                                        <th>Department Name</th>
                                        <th>Status</th>
                                        <th>Action

                                            <a href="{{route('department.report')}}">
                                                <i class="fa fa-print fa-6" aria-hidden="true"></i>                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- <tr class="bxshod"> --}}

                                </tbody>
                            </table>


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
                        <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i
                                class='bx bx-search'></i></span>
                    </div>
                    <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

            </div>
        </div>
    </div>
    <!-- end search modal -->


    <!-- Modal  delete-->
    <div class="modal fade department-modal" id="dltModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 style="text-align: center;font-size: 22px;"> Do you want to delete Department?
                    </h2>
                </div>
                <div class="modal-footer text-center">
                    <form name="delete-department" id="delete-department" action="{{ route('department.destroy') }}" method="post">
                        @csrf

                        <input type="hidden" name="department_id" id="dlt_department_id">
                        <button type="submit" class="btn template-btn">Yes</button>
                        <button type="button" class="btn template-btn" data-bs-dismiss="modal">No</button>

                    </form>

                </div>
            </div>
        </div>
    </div>





    @include('master.department.create')
    @include('master.department.edit')


@endsection
