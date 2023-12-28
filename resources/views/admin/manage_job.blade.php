@extends('admin.master')
@section('title')
    Manage Job
@endsection


@section('content')
    @php
        $time = $employee_id->last_login_time;
        $dateTime = new \DateTime($time);
        // $date = $dateTime->format('Y-m-d');
        $date = $dateTime->format('d-m-Y');
        $time = $dateTime->format('h:i:s A');
    @endphp
    @extends('admin.alerts')
    {{-- *Info MOdal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-info" id="exampleModalLabel">Login Employee Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="display: flex;">
                        <h5 class="fw-bold">Employee Id : </h5>
                        <h5> {{ $employee_id->employee_id }}</h5>
                    </div>
                    <div style="display: flex;">
                        <h5 class="fw-bold">Employee Email : </h5>
                        <h5> {{ $employee_id->email }}</h5>
                    </div>
                    <div style="display: flex;">
                        <h5 class="fw-bold">Name : </h5>
                        <h5>{{ $employee_id->name }}</h5>
                    </div>
                    <div style="display: flex;">
                        <h5 class="fw-bold">Last Login Ip Address: </h5>
                        <h5>{{ $employee_id->ip_address }}</h5>
                    </div>
                    <div style="display: flex;">
                        <h5 class="fw-bold">Last Login Date : </h5>
                        <h5>{{ $date }}</h5>
                    </div>
                    <div style="display: flex;">
                        <h5 class="fw-bold">Last Login Time : </h5>
                        <h5>{{ $time }}</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <main id="main" class="main">
        {{-- @if (session()->has('success'))
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
        @endif --}}
        <div class="pagetitle">
            <h1>Manage Designation</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                {{-- <div class="excel-container">
                    <button id="excelButton" class="btn btn-excel" style="background: #21A366;  margin: 10px">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="20"
                            viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <g transform="scale(5.12,5.12)">
                                    <path
                                        d="M28.875,0c-0.01953,0.00781 -0.04297,0.01953 -0.0625,0.03125l-28,5.3125c-0.47656,0.08984 -0.82031,0.51172 -0.8125,1v37.3125c-0.00781,0.48828 0.33594,0.91016 0.8125,1l28,5.3125c0.28906,0.05469 0.58984,-0.01953 0.82031,-0.20703c0.22656,-0.1875 0.36328,-0.46484 0.36719,-0.76172v-5h17c1.09375,0 2,-0.90625 2,-2v-34c0,-1.09375 -0.90625,-2 -2,-2h-17v-5c0.00391,-0.28906 -0.12109,-0.5625 -0.33594,-0.75391c-0.21484,-0.19141 -0.50391,-0.28125 -0.78906,-0.24609zM28,2.1875v4.34375c-0.13281,0.27734 -0.13281,0.59766 0,0.875v35.40625c-0.02734,0.13281 -0.02734,0.27344 0,0.40625v4.59375l-26,-4.96875v-35.6875zM30,8h17v34h-17v-5h4v-2h-4v-6h4v-2h-4v-5h4v-2h-4v-5h4v-2h-4zM36,13v2h8v-2zM6.6875,15.6875l5.46875,9.34375l-5.96875,9.34375h5l3.25,-6.03125c0.22656,-0.58203 0.375,-1.02734 0.4375,-1.3125h0.03125c0.12891,0.60938 0.25391,1.02344 0.375,1.25l3.25,6.09375h4.96875l-5.75,-9.4375l5.59375,-9.25h-4.6875l-2.96875,5.53125c-0.28516,0.72266 -0.48828,1.29297 -0.59375,1.65625h-0.03125c-0.16406,-0.60937 -0.35156,-1.15234 -0.5625,-1.59375l-2.6875,-5.59375zM36,20v2h8v-2zM36,27v2h8v-2zM36,35v2h8v-2z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </button>
                </div> --}}
                <div class="excel-container">
                    {{-- *Download Excel Button --}}
                    <button id="excelButton" class="btn btn-excel" style="background: #21A366;  margin: 10px">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="20"
                            viewBox="0,0,256,256">
                            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <g transform="scale(5.12,5.12)">
                                    <path
                                        d="M28.875,0c-0.01953,0.00781 -0.04297,0.01953 -0.0625,0.03125l-28,5.3125c-0.47656,0.08984 -0.82031,0.51172 -0.8125,1v37.3125c-0.00781,0.48828 0.33594,0.91016 0.8125,1l28,5.3125c0.28906,0.05469 0.58984,-0.01953 0.82031,-0.20703c0.22656,-0.1875 0.36328,-0.46484 0.36719,-0.76172v-5h17c1.09375,0 2,-0.90625 2,-2v-34c0,-1.09375 -0.90625,-2 -2,-2h-17v-5c0.00391,-0.28906 -0.12109,-0.5625 -0.33594,-0.75391c-0.21484,-0.19141 -0.50391,-0.28125 -0.78906,-0.24609zM28,2.1875v4.34375c-0.13281,0.27734 -0.13281,0.59766 0,0.875v35.40625c-0.02734,0.13281 -0.02734,0.27344 0,0.40625v4.59375l-26,-4.96875v-35.6875zM30,8h17v34h-17v-5h4v-2h-4v-6h4v-2h-4v-5h4v-2h-4v-5h4v-2h-4zM36,13v2h8v-2zM6.6875,15.6875l5.46875,9.34375l-5.96875,9.34375h5l3.25,-6.03125c0.22656,-0.58203 0.375,-1.02734 0.4375,-1.3125h0.03125c0.12891,0.60938 0.25391,1.02344 0.375,1.25l3.25,6.09375h4.96875l-5.75,-9.4375l5.59375,-9.25h-4.6875l-2.96875,5.53125c-0.28516,0.72266 -0.48828,1.29297 -0.59375,1.65625h-0.03125c-0.16406,-0.60937 -0.35156,-1.15234 -0.5625,-1.59375l-2.6875,-5.59375zM36,20v2h8v-2zM36,27v2h8v-2zM36,35v2h8v-2z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </button>
                    {{-- * Info BUtton --}}
                    <button id="excelButton" class="btn btn-excel" style="background: #25B7D3;  margin: 10px"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="20"
                            viewBox="0 0 50 50">
                            <path
                                d="M 25 2 C 12.264481 2 2 12.264481 2 25 C 2 37.735519 12.264481 48 25 48 C 37.735519 48 48 37.735519 48 25 C 48 12.264481 37.735519 2 25 2 z M 25 4 C 36.664481 4 46 13.335519 46 25 C 46 36.664481 36.664481 46 25 46 C 13.335519 46 4 36.664481 4 25 C 4 13.335519 13.335519 4 25 4 z M 25 11 A 3 3 0 0 0 25 17 A 3 3 0 0 0 25 11 z M 21 21 L 21 23 L 23 23 L 23 36 L 21 36 L 21 38 L 29 38 L 29 36 L 27 36 L 27 21 L 21 21 z">
                            </path>
                        </svg>
                    </button>

                </div>
                <div class="col-lg-12">

                    <div class="card" style="padding: 2rem;">
                        <div class="card-body">
                            <table id="user-table" class="table">
                                <thead>
                                    {{-- <div class="buttons-container">
                                        <button class="btn btn-success buttons-excel">
                                            <i class="fas fa-file-excel"></i> Export to Excel
                                        </button>
                                    </div> --}}
                                    <tr>
                                        <th>
                                            <input type="search" id="search" name="search" placeholder="Search Title">
                                        </th>
                                        <th>
                                            <input type="search" id="search" name="search" placeholder="Search Date">
                                        </th>
                                        <th>
                                            <input type="search" id="search" name="search" placeholder="Search Status">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>ststus</th>
                                        {{-- <th>Edit</th>
                                        <th>Delete</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <th>
                                        <input type="search" id="search" name="search" placeholder="Search Title">
                                    </th>
                                    <th>
                                        <input type="search" id="search" name="search" placeholder="Search Date">
                                    </th>
                                    <th>
                                        <input type="search" id="search" name="search" placeholder="Search Status">
                                    </th>
                                </tfoot> --}}
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@section('footer')
@endsection

@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.flash.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js">
    </script>

    <script>
        $(document).ready(function() {


            var dataTable = $('#user-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.manage_job') }}",
                    type: 'GET',
                },

                buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="material-icons">cloud_download</i> Excel',
                    exportOptions: {
                        columns: [0, 1],
                    },
                }, ],
                columns: [{
                        data: 'job_title',
                        name: 'job_title',
                    },
                    {
                        data: 'date',
                        name: 'date',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    },
                ],


            });

            $('#excelButton').on('click', function() {
                dataTable.button(0).trigger();
            });

            // Handle search for each column
            $('#user-table tr th input').on('keyup change', function() {
                var index = $(this).parent().index();
                dataTable.column(index).search(this.value).draw();
            });

            // Handle global search
            $('#user_table_filter input').on('keyup change', function() {
                dataTable.search(this.value).draw();
            });

            $(document).on('change', '.select-action', function() {
                var selectedValue = $(this).val();
                var id = $(this).data('id');
            });

            $(document).on('change', '.select-action', function() {
                var selectedValue = $(this).val();
                var id = $(this).data('id');

                // Handle the selected value based on the employee ID
                if (selectedValue === 'edit_job') {
                    window.location.replace(`edit_job/${id}`);
                } else if (selectedValue === 'delete_job') {
                    // Handle delete action
                    window.location.replace(`delete_job/${id}`);
                } else if (selectedValue === 'deactivate_job') {
                    window.location.replace(`inactivate_job/${id}`);
                } else if (selectedValue === 'active_job') {
                    window.location.replace(`activate_job/${id}`);
                } else {
                    window.location.replace(`activate_job/${id}`);
                }
            });
        });
    </script>
@endsection
