<?php

namespace App\Imports;

use App\Models\employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class EmployeeImport implements ToModel
{

    public function model(array $row)
    {
        return new employee([
            "employee_id" => $row[0],
            "joining_date" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1])->format('Y-m-d'),
            "name" => $row[2],
            "email" => $row[3],
            "mobile" => $row[4],
            "job_title" => $row[5],
            "gender" => $row[6],
            "password" => $row[7],
        ]);
    }
}
