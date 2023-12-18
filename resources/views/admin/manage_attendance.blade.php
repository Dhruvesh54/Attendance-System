@extends('admin.master')
@section('title')
    Manage Attendance
@endsection


@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage Attendance</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table id="user-table" class="table">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">#</th> --}}
                                        <th scope="col">Employee ID</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">In Time</th>
                                        <th scope="col">Out Time</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    <tr>
                                        <td>IMP-00001</td>
                                        <td>DK Patel</td>
                                        <td>2023-12-14</td>
                                        <td>10:00:00</td>
                                        <td>07:00:00</td>
                                    </tr>
                                    <tr>
                                        <td>IMP-00002</td>
                                        <td>Monil</td>
                                        <td>2023-12-14</td>
                                        <td>10:00:00</td>
                                        <td>07:00:00</td>
                                    </tr>
                                    <tr>
                                        <td>IMP-00002</td>
                                        <td>Harpal</td>
                                        <td>2023-12-14</td>
                                        <td>10:00:00</td>
                                        <td>07:00:00</td>
                                    </tr>
                                </tbody> --}}
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
                url: "{{ route('admin.manage_attendance') }}",
                type: 'GET',
            },
            columns: [
                {
                    data: 'employee_id',
                    name: 'employee_id',
                },
                {
                    data: 'employee_name',
                    name: 'employee_name',
                },
                {
                    data: 'current_date',
                    name: 'current_date',
                },
                {
                    data: 'current_in_time',
                    name: 'current_in_time',
                },
                {
                    data: 'current_out_time',
                    name: 'current_out_time',
                },
            ],

        });
    </script>
@endsection
