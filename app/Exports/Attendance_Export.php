<?php

namespace App\Exports;

use App\Models\attendance;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;

class Attendance_Export implements  FromView, ShouldAutoSize
{
    public function headings(): array
    {
        return [
            'employee_id',
            'employee_name',
            'current_date',
            'current_in_time',
            'current_out_time'
        ];
    }

    public function view(): View
    {
        // Retrieve data to export to Excel
        $data = Attendance::select('employee_id', 'employee_name', 'current_date', 'current_in_time', 'current_out_time')->get();
        // $data = attendance::all();
        $extraSentence = "Employee Data";

        return view('admin.attendance_export', [
            'data' => $data,
            'extraSentence' => $extraSentence
        ]);
    }

    // public function collection()
    // {
    //     // $data = Attendance::get('employee_id', 'employee_name', 'current_date', 'current_in_time', 'current_out_time');
    //     // return $data;
    //     $data = Attendance::select('employee_id', 'employee_name', 'current_date', 'current_in_time', 'current_out_time')->get();
    //     return collect($data);
    // }


//     public function registerEvents(): array
//     {
//         return [
//             AfterSheet::class => function (AfterSheet $event) {
//                 // Apply cell styling for specific cells or range
//                 $event->sheet->getDelegate()->getStyle('A1:B1')->applyFromArray([
//                     'font' => [
//                         'bold' => true,
//                         'color' => ['rgb' => 'fe7c96'], // Change color here (e.g., Red: FF0000)
//                     ],
//                     'fill' => [
//                         'fillType' => 'solid',
//                         'startColor' => ['rgb' => 'aaaaaa'], // Change fill color here (e.g., Yellow: FFFF00)
//                     ],
//                 ]);
//                 $event->sheet->getDelegate()->getStyle('A3:E2085')->applyFromArray([
//                     'font' => [
//                         'bold' => true,
//                         'color' => ['rgb' => 'c183ff'], // Change color here (e.g., Red: FF0000)
//                     ],
//                     'fill' => [
//                         'fillType' => 'solid',
//                         'startColor' => ['rgb' => '000000'], // Change fill color here (e.g., Yellow: FFFF00)
//                     ],
//                 ]);
//             },
//         ];
    // }
}
