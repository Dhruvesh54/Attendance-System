@extends('admin.master')

@section('title')
    Employee Info
@endsection

{{-- @section('page-title')
    Employee Info
@endsection --}}

@section('content')
    <style>
        .flex {
            display: flex;
            /* justify-content: center; */
            align-items: center;
            /* flex-direction: column; */
            gap: 1rem;
        }
    </style>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Employee Info</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card" style="padding: 2rem;">
                        <div class="card-body">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="flex">
                                                <h5 class="fw-bold">Employee Id : </h5>
                                                <h5>{{ $employee_data->employee_id }}</h5>
                                            </div>
                                            <div class="flex">
                                                <h5 class="fw-bold">Joining_date: </h5>
                                                <h5>{{ $employee_data->joining_date }}</h5>
                                            </div>
                                            <div class="flex">
                                                <h5 class="fw-bold">Name: </h5>
                                                <h5>{{ $employee_data->name }}</h5>
                                            </div>
                                            <div class="flex">
                                                <h5 class="fw-bold">Email:</h5>
                                                <h5>{{ $employee_data->email }}</h5>
                                            </div>
                                            <div class="flex">
                                                <h5 class="fw-bold">Job_title:</h5>
                                                <h5>{{ $employee_data->job_title }}</h5>
                                            </div>
                                            <div class="flex">
                                                <h5 class="fw-bold">Mobile_number: </h5>
                                                <h5>{{ $employee_data->mobile }}</h5>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center p-2">
                                                <a href="{{ route('admin.manage_employee') }}"><button
                                                        class="btn btn-outline-primary">Go back</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
