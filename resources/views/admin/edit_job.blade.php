@extends('admin.master')
@section('title')
    Update
@endsection


@section('content')
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="{{ URL::to('/') }}/assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Attendance Management</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Update Job</h5>
                                    {{-- <p class="text-center small">Enter Job Title</p> --}}
                                </div>

                                <form class="row g-3" action="{{ route('admin.update_job_method') }}" method="POST">
                                    @csrf
                                    <input type="text" name="id" class="form-control d-none" id="job1" value="{{ $job_data->id }}">

                                    <div class="col-12">
                                        <label for="job1" class="form-label">Enter Job Title</label>
                                        <input type="text" name="job" class="form-control" id="job1"
                                            value="{{ $job_data->job_title }}">
                                        <span style="color: red">
                                            @error('job')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <label for="job1" class="form-label">Enter New Job Date</label>
                                        <input type="date" name="job_date" class="form-control" id="job_date1"
                                            value="{{ $job_data->date }}">
                                        <span style="color: red">
                                            @error('job_date')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main><!-- End #main -->
@endsection

@section('footer')
@endsection

@section('script')
    <script></script>
@endsection




{{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a> --}}
