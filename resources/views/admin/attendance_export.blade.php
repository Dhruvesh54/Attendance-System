<html>

<head>
    <style></style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="5" style="text-align: center; font-size: 20px;">
                    <h1>RFID Punching System</h1>
                </th>
            </tr>
            <tr>
                <th></th>
            </tr>
            <tr>
                <th>Employee Id</th>
                <th>Employee Name</th>
                <th>Employee Gender</th>
                <th>Joining Date</th>
                <th>Job Title</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th></th>
            </tr>
            @foreach ($data as $employee)
                <tr>
                    <td style="text-align: left;">{{ $employee->employee_id }}</td>
                    <td>{{ $employee->employee_name }}</td>
                    <td>{{ $employee->current_date }}</td>
                    <td>{{ $employee->current_in_time }}</td>
                    <td>{{ $employee->current_out_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
