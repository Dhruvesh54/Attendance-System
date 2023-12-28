@extends('admin.master')
@section('title')
    Update Employee
@endsection


@section('content')
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-5">
                {{-- <div class="container"> --}}
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="{{ URL::to('/') }}/assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Attendance Management</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Update an Account</h5>
                                </div>

                                <form class="row g-3" action="{{ Route('admin.update_employee_method') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Employee Id</label>
                                        <input type="text" name="employee_id" class="form-control" id="emp_id1"
                                            value="{{ $employee_data->employee_id }}" readonly>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Joining Date</label>
                                        <input type="date" name="date" class="form-control" id="date1"
                                            value="{{ $employee_data->joining_date }}">
                                        <span style="color: red">
                                            @error('date')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="nam1"
                                            value="{{ $employee_data->name }}">
                                        <span style="color: red">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email1"
                                            value="{{ $employee_data->email }}" readonly>
                                        <span style="color: red">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Mobile No.</label>
                                        <input type="text" name="mobile" class="form-control" id="mobile1"
                                            value="{{ $employee_data->mobile }}">
                                        <span style="color: red">
                                            @error('mobile')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Job Title</label>
                                        <select class="product_code form-select" aria-label="Default select example"
                                            name="job_title" id="job_title1">
                                            <option class="m-0" value="{{ $employee_data->job_title }}" disabled="false" selected="true" >{{ $employee_data->job_title }}</option>
                                            @foreach ($job_title as $cat)
                                            <option value="{{ $cat->job_title }}">
                                                {{ $cat->job_title }}
                                            </option>
                                        @endforeach
                                        </select>

                                        <span style="color: red">
                                            @error('job_title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="col-12">
                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-6 pt-0">Select Gender</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="gender1" value="Male"
                                                        {{ $employee_data->gender == 'Male' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="gender2" value="Female"
                                                        {{ $employee_data->gender == 'Female' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios2">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="pwd" class="form-control" id="pwd1"
                                            value="{{ $employee_data->password }}">
                                        <span style="color: red">
                                            @error('pwd')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="pwd_confirmation" class="form-control"
                                            id="pwd1" value="{{ $employee_data->password }}">
                                        <span style="color: red">
                                            @error('pwd_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                {{-- </div> --}}

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
