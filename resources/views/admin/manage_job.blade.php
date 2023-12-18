@extends('admin.master')
@section('title')
    Manage Job
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
            <h1>Manage Job</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <table id="user-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>ststus</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
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
    <script>
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.manage_job') }}",
                type: 'GET',
            },
            columns: [
                {
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
