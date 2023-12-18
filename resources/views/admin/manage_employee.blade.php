@extends('admin.master')
@section('title')
    Manage Employee
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
            <h1>Manage Employee</h1>
        </div><!-- End Page Title -->

        {{-- <section class="section"> --}}
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table id="user-table" class="table">
                            <thead>
                                <tr>
                                    <th>Employee Id</th>
                                    <th>Joining Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Job Title</th>
                                    <th>Gender</th>
                                    <th>Password</th>
                                    <th>status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>

            </div>
        </div>
        {{-- </section> --}}

    </main><!-- End #main -->
@endsection

@section('footer')
@endsection

@section('script')
    <script>
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.manage_employee') }}",
                type: 'GET',
            },
            columns: [{
                    data: 'employee_id',
                    name: 'employee_id',
                },
                {
                    data: 'joining_date',
                    name: 'joining_date',
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'mobile',
                    name: 'mobile',
                },
                {
                    data: 'job_title',
                    name: 'job_title',
                },
                {
                    data: 'gender',
                    name: 'gender',
                },
                {
                    data: 'password',
                    name: 'password',
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'edit',
                    name: 'edit',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'delete',
                    name: 'delete',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                },
            ],

        });
    </script>
@endsection




{{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a> --}}
