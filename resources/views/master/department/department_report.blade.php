@extends('admin.layouts.index')
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
                                <li class="breadcrumb-item active" aria-current="page">Department</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->

            </div>

            <div class="title-head d-flex justify-content-between">
                <h6 class="mb-0 text-uppercase">Department Report</h6>

            </div>



            <hr />
            <div class="row">
                <div class="col-12">
                    <a href="javascript:void(0)" class="home__icon">
                        <i title="Back" onclick="window.location.href='/department';" class="fa fa-arrow-left"></i>
                    </a>
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


                        <table id="department_report_Table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr class="bxs" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                    <th>#</th>

                                    <th>Department Code</th>
                                    <th>Department Name</th>
                                    <th>Status</th>

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




@endsection
