@extends('admin.master')
@section('title')
    Index
@endsection


@section('content')
    <main id="main" class="main">


        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div><!-- End Page Title -->

        <!-- Employee Card -->
        <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title"> Total Employee</h5>
                    <div class="d-flex align-items-center">
                        <div class="ps-3">
                            <h4>{{ $employee_count }}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- End Employee Card -->

        <!-- Present Employees Card -->
        <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Total Present Employees</h5>
                    <div class="d-flex align-items-center">
                        <div class="ps-3">
                            <h4>5</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- End Present Employees Card -->


    </main><!-- End #main -->
@endsection

@section('footer')
@endsection

@section('script')
    <script></script>
@endsection




{{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a> --}}
