<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lgin</title>
    <!-- Favicons -->
    <link href="{{ URL::to('/') }}/assets/img/logo.png" rel="icon">
    {{-- <link href="{{ URL::to('/') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    {{-- *Data Table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::to('/') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::to('/') }}/assets/css/style.css" rel="stylesheet">

</head>

<body>
    <main>

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
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-5">
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
                                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                    {{-- <p class="text-center small">Enter Job Title</p> --}}
                                </div>

                                <form class="row g-3" action="{{ URL::to('/') }}/login_authentication" method="POST">
                                    @csrf <!-- Add this line for CSRF protection -->
                                    <div class="col-12">
                                        <label for="job1" class="form-label">Username</label>
                                        <input type="text" name="em" class="form-control" id="job1">
                                        <span style="color: red">
                                            @error('em')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <label for="job1" class="form-label">Password</label>
                                        <input type="password" name="pwd" class="form-control" id="job_date1">
                                        <span style="color: red">
                                            @error('pwd')
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

    <!-- Vendor JS Files -->
    <script src="{{ URL::to('/') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/vendor/chart.js/chart.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/vendor/echarts/echarts.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/vendor/quill/quill.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ URL::to('/') }}/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ URL::to('/') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ URL::to('/') }}/assets/js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</body>

</html>
