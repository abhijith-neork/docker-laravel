@extends('admin.layouts.index')
@section('content')
<!--wrapper--> 
<div class="wrapper">
    <!--start header wrapper-->
    <div class="header-wrapper">
        <!--start header -->
        @include('admin.layouts.header')

        @extends('hr.hr_submenu')

    <div class="page-wrapper">
        <div class="page-content">

            <div class="container-fluid">

                <div class="title-head d-flex justify-content-between">
                    <h6 class="mb-0 text-uppercase">EMPLOYEE LIST</h6>

                </div>

                <hr />

                <div class="row">
                    <div class="col-lg-12">
                        <div class="btm-for mb-4 text-lg-end">
                            <div class="ms-auto">
                                <div class="btn-group">
                                    <!-- @if (hasPermission('designation.store')) -->
                                        <a class="btn template-btn px-5" 
                                        href="{{ route('add-employee') }}" >Add
</a>
                                    <!-- @endif -->


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

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


                            <table id="employee_Table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="bxs" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                        <th>#</th>

                                        <th>EMP-CODE</th>
                                        <th>NAME</th>
                                        <th>DESIGNATION</th>
                                        <th>JOINED DATE</th>
                                        <th>STATUS</th>
                                        <th>Action

                                            <a href="{{ route('employee.report') }}">
                                                <i class="fa fa-print fa-6" aria-hidden="true"></i> </a>
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
    <div class="modal fade user-modal" id="dltModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 style="text-align: center;font-size: 22px;"> Do you want to delete this Employee?
                    </h2>
                </div>
                <div class="modal-footer text-center">
                    <form name="delete-employee-cat" action="{{ route('employee.destroy') }}" method="post">
                        @csrf

                        <input type="hidden" name="employee_id" id="employee_id">
                        <button type="submit" class="btn template-btn">Yes</button>
                        <button type="button" class="btn template-btn" data-bs-dismiss="modal">No</button>

                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection
