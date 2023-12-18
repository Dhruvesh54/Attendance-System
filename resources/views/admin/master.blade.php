<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
    @yield('navbar')
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">

                <img src="{{ URL::to('/') }}/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Attendance System</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{Route('admin.logout')}}">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                </li>
            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->



    <!-- ======= Sidebar ======= -->
    {{-- <aside id="sidebar" class="sidebar">
        
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link text-black {{ request()->routeIs('admin.index') ? 'active bg-gradient-primary' : '' }}"href="{{ route('admin.index') }}">

                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="/">
                    <i class="bi bi-menu-button-wide"></i><span>Employee Details</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a
                            class="nav-link text-black {{ request()->routeIs('admin.add_employee') ? 'active bg-gradient-primary' : '' }}"href="{{ route('admin.add_employee') }}">
                            <i class="bi bi-circle"></i><span>Add Employee</span>
                        </a>
                    </li>
                    <li>
                        <a
                            class="nav-link text-black {{ request()->routeIs('admin.manage_employee') ? 'active bg-gradient-primary' : '' }}"href="{{ route('admin.manage_employee') }}">
                            <i class="bi bi-circle"></i><span>Manage Employee</span>
                        </a>
                    </li>
                    <li>
                        <a
                            class="nav-link text-black {{ request()->routeIs('admin.add_job_title') ? 'active bg-gradient-primary' : '' }}"href="{{ route('admin.add_job_title') }}">
                            <i class="bi bi-circle"></i><span>Add Job Title</span>
                        </a>
                    </li>
                    <li>
                        <a
                            class="nav-link text-black {{ request()->routeIs('admin.manage_job') ? 'active bg-gradient-primary' : '' }}"href="{{ route('admin.manage_job') }}">
                            <i class="bi bi-circle"></i><span>Manage Job</span>
                        </a>
                    </li>


                </ul>
            </li><!-- End Components Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <a
                        class="nav-link text-black {{ request()->routeIs('admin.manage_attendance') ? 'active bg-gradient-primary' : '' }}"href="{{ route('admin.manage_attendance') }}">
                        <i class="bi bi-grid"></i>
                        <span>Manage Attendance</span>
                    </a>
            </li><!-- End Dashboard Nav -->

        </ul>

    </aside><!-- End Sidebar--> --}}

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link text-black {{ request()->routeIs('admin.index') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('admin.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#employee-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i>
                    <span>Employee Details</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="employee-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="nav-link text-black {{ request()->routeIs('admin.add_employee') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.add_employee') }}">
                            <i class="bi bi-circle"></i>
                            <span>Add Employee</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-black {{ request()->routeIs('admin.manage_employee') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.manage_employee') }}">
                            <i class="bi bi-circle"></i>
                            <span>Manage Employee</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-black {{ request()->routeIs('admin.add_job_title') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.add_job_title') }}">
                            <i class="bi bi-circle"></i>
                            <span>Add Job Title</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-black {{ request()->routeIs('admin.manage_job') ? 'active bg-gradient-primary' : '' }}"
                            href="{{ route('admin.manage_job') }}">
                            <i class="bi bi-circle"></i>
                            <span>Manage Job</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link text-black {{ request()->routeIs('admin.manage_attendance') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('admin.manage_attendance') }}">
                    <i class="bi bi-grid"></i>
                    <span>Manage Attendance</span>
                </a>
            </li> --}}
            <li class="nav-item">
                {{-- <a class="nav-link collapsed" href="users-profile.html"> --}}
                <a class="nav-link collapsed text-black {{ request()->routeIs('admin.manage_attendance') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ route('admin.manage_attendance') }}">
                    <i class="bi bi-grid"></i>
                    <span>Manage Attendance</span>
                </a>
            </li><!-- End Profile Page Nav -->
        </ul>
    </aside>


    @yield('content')


    @yield('footer')
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; <strong><span>Dk</span></strong>. Patel
        </div>
    </footer><!-- End Footer -->


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
@yield('script')

</html>
