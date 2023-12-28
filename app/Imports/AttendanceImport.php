<?php

namespace App\Imports;

use App\Models\attendance;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendanceImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        try {
            $employeeId = $row[0];
            $employeeName = $row[1];

            // Assuming $row[2] contains the Excel date value
            $currentDate = Carbon::create(1900, 1, 1)->addDays($row[2]);
            $currentDate = Carbon::create(1900, 1, 1)->addDays($row[2]);


            // Assuming $row[3] and $row[4] contain numeric values representing hours
            $currentInTime = Carbon::createFromTime(0, 0)->addHours($row[3] * 24);
            $currentOutTime = Carbon::createFromTime(0, 0)->addHours($row[4] * 24);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }

        // dd($row);
        return new Attendance([
            "employee_id" => $employeeId,
            "employee_name" => $employeeName,
            "current_date" => $currentDate->format('Y-m-d'),
            "current_in_time" => $currentInTime->format('H:i:s'),
            "current_out_time" => $currentOutTime->format('H:i:s'),
        ]);
    }
}
