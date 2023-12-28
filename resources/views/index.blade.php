<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Index</title>

    <link href="{{ URL::to('/') }}/assets/img/logo.png" rel="icon">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .particles-js-canvas-el {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 1;
            left: 0;
        }
    </style>
</head>

<body class="bg-dark">

    <div class="container" id="particles-js">
        <div class="row justify-content-center">
            <div class="card bg-dark mb-3 text-white" style="min-width: 25rem;min-height: 12.5rem;">
                <form action="{{ route('add_attendance') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label for="job1" class="form-label">Employ ID</label>
                        <input type="text" name="emp_id" class="form-control " id="job1">

                        <input type="submit" value="submit" class="d-none">
                    </div>
                </form>

                {{-- <h1>{{ $value['employee_name'] }}</h1> --}}
                <div class="card-body employee-info" id="timer">
                    @if (session()->has('insert'))
                        <div class="alert alert-success alert-dismissible fade show m" role="alert">
                            {{-- <i class="bi bi-check-circle me-1"></i> --}}
                            {{ session('insert') }}
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                        </div>
                    @endif
                    @if (session()->has('check_out'))
                        <div class="alert alert-danger alert-dismissible fade show m" role="alert">
                            {{-- <i class="bi bi-exclamation-octagon me-1"></i> --}}
                            {{ session('check_out') }}
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                        </div>
                    @endif
                    {{-- @foreach (session('val') as $value)
                        <div class="card-header">Employee ID: {{ $value['employee_id'] }}</div>
                        <h5 class="card-title">Name: {{ $value['employee_name'] }}</h5>
                        <h6>Date: {{ $value['current_date'] }}</h6>
                        <h6>Time: {{ $value['current_in_time'] }}</h6>
                    @endforeach
                    @if (session()->forget('val') and session()->has('val'))
                    @else
                        <h5 class="card-title">Name:</h5>
                        <h6>Date:</h6>
                        <h6>Time:</h6>
                    @endif --}}

                    @if (session()->has('val'))
                        @foreach (session('val') as $value)
                            <div class="card-header">Employee ID: {{ $value['employee_id'] }}</div>
                            <h5 class="card-title">Name: {{ $value['employee_name'] }}</h5>
                            <h6>Date: {{ $value['current_date'] }}</h6>
                            <h6>Time: {{ $value['current_in_time'] }}</h6>
                        @endforeach
                    @else
                        <h2>No data Found</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ URL::to('/') }}/assets/js/particles.js"></script>
<script src="{{ URL::to('/') }}/assets/js/app.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $.ajax({
                    url: "{{ route('admin.destroySession') }}",
                    type: "GET",
                    contentType: false,
                    processData: false,
                    success: response => {
                        location.reload();
                    },

                    error: response => {
                        console.log("error occured");
                    }
                });
            }, 2000);
        });
    </script>
</body>

</html>
