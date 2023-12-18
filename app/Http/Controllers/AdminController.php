<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\employee;
use App\Models\job;
use App\Serviceas\EmployeeInsertService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class AdminController extends Controller
{
    public EmployeeInsertService $employeeInsertService;
    public function __construct(EmployeeInsertService $employeeInsertService)
    {
        $this->employeeInsertService = $employeeInsertService;
    }
    public function index()
    {
        $employee_count = employee::all()->count();

        // return view('Admin.index', compact('user_count', 'active_users_count', 'inactive_users_count', 'deleted_users_count', 'brand_count', 'bill_count'));
        return view("admin.index", compact("employee_count"));
    }

    public function add_employee()
    {

        $randomNumber = str_pad(mt_rand(1, 999999999), 9, '0', STR_PAD_LEFT);
        // Construct the employee ID
        $emp_id = 'EMP' . $randomNumber;

        $job_title = job::where('status', 'active')->get();

        return view('admin.add_employee', ['emp_id' => $emp_id], compact('job_title'));
    }

    public function add_employee_method(Request $request)
    {
        $data = $this->employeeInsertService->add_employee($request);
        if ($data->save()) {
            session()->flash('success', 'Employee Add Successfully.');
            return redirect()->route('admin.manage_employee');
        } else {
            session()->flash('error', 'Employee Add is fail.');
        }
    }

    public function manage_employee(Request $request)
    {
        if ($request->ajax() || $request->isXmlHttpRequest() || $request->wantsJson()) {
            $data = employee::all();

            return DataTables::of($data)
                ->addColumn('edit', function ($id) {
                    return '<span class="badge badge-sm bg-warning"><a href="' . route('admin.edit_employee', ['employee_id' => $id->employee_id]) . '" class="text-white">EDIT</a></span>';
                })
                ->addColumn('delete', function ($id) {
                    return '<span class="badge badge-sm bg-danger"><a href="' . route('admin.delete_employee', ['employee_id' => $id->employee_id]) . '" class="text-white">DELETE</a></span>';
                })
                ->addColumn('action', function ($id) {
                    $btn = '';
                    if ($id->status == 'active') {
                        $btn = '<span class="badge badge-sm bg-danger"><a href="' . route('admin.inactive_employee', ['employee_id' => $id->employee_id]) . '"class="text-white">Deactivate</a></span>';
                    } else if ($id->status == 'inactive') {
                        $btn = $btn . '<span class="badge badge-sm bg-success"><a href="' . route('admin.active_employee', ['employee_id' => $id->employee_id]) . '"class="text-white">Activate</a></span>';

                    } else {
                        $btn = $btn . '<span class="badge badge-sm bg-secondary"><a href="' . route('admin.active_employee', ['employee_id' => $id->employee_id]) . '"class="text-white">Reactivate</a></span>';

                    }
                    return $btn;
                })
                ->escapeColumns([])
                ->rawColumns(['edit', 'delete', 'action'])
                ->make(true);
        }


        // dd($prod);
        return view("admin.manage_employee");
    }

    public function fetch_data_for_edit_employee($employee_id)
    {
        $job_title = job::where('status', 'active')->get();

        $employee_data = employee::where('employee_id', $employee_id)->first();
        return view('admin.edit_employee', compact('employee_data', 'job_title'));
    }
    public function delete_employee($employee_id)
    {
        $data = employee::where('employee_id', $employee_id)->update(array('status' => 'delete'));
        if ($data) {
            session()->flash('success', 'Data Delete Successfully.');
            return redirect()->route('admin.manage_employee');
        }
    }
    public function activate_employee($employee_id)
    {
        $data = employee::where('employee_id', $employee_id)->update(array('status' => 'active'));
        if ($data) {
            session()->flash('success', 'Data Active Successfully.');
            return redirect()->route('admin.manage_employee');
        }
    }
    public function inactivate_employee($employee_id)
    {
        $data = employee::where('employee_id', $employee_id)->update(array('status' => 'inactive'));
        if ($data) {
            session()->flash('success', 'Data Inactive Successfully.');
            return redirect()->route('admin.manage_employee');
        }
    }

    public function edit_employee_action(Request $request)
    {
        $rules = [
            'date' => 'required',
            'name' => 'required|min:3|max:40',
            'mobile' => 'required|digits:10',
            'job_title' => 'required',
            // 'gender' => 'required',
            'pwd' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'pwd_confirmation' => 'required',
        ];
        $error_msg = [
            'date.required' => 'Date Field cannot be empty',

            'name.required' => 'Name name cannot be empty',
            'name.max' => 'Name name must be at maximum 40 chracters',
            'name.min' => 'Name name must be at lethan 3 characters',

            'mobile.required' => 'Mobile number cannot be empty',
            'mobile.digits' => 'Mobile number must contain only 10 digits',

            'job_title.required' => 'Job Field cannot be empty',

            // 'gender.required' => 'gender Field cannot be empty',

            'pwd.required' => 'Password cannot be empty',
            'pwd.regex' => 'Password must contain one digit,one character both upper and lower and a special character',
            'pwd.confirmed' => 'Password and Confirm Password must match',

            'pwd_confirmation.required' => 'Confirm Password cannot be empty',

        ];
        $request->validate($rules, $error_msg);

        $data = employee::where('employee_id', $request->employee_id)->first();
        // dd($data);
        $data->where('employee_id', $request->employee_id)->update(
            array(
                'joining_date' => $request->date,
                'name' => $request->name,
                'mobile' => $request->mobile,
                'job_title' => $request->job_title,
                'gender' => $request->gender,
                'password' => $request->pwd_confirmation,
            )
        );

        if ($data) {
            session()->flash('success', 'Data Updated Successfully.');
            return redirect()->route('admin.manage_employee');
        } else {
            session()->flash('error', 'Error in updating job.');
            return redirect()->route('admin.edit_employee', ['employee_id' => $request->employee_id]);
        }

    }

    public function add_job_title()
    {
        return view("admin.add_job_title");
    }


    // * JOb Title
    public function add_job_method(Request $request)
    {
        $data = $this->employeeInsertService->add_job($request);
        if ($data->save()) {
            session()->flash('success', 'Job Title Add Successfully.');
            return redirect()->route('admin.manage_job');
        } else {
            session()->flash('error', 'Job Titles Add is fail.');
        }
    }

    public function manage_job(Request $request)
    {

        if ($request->ajax() || $request->isXmlHttpRequest() || $request->wantsJson()) {
            $data = job::all();

            return DataTables::of($data)
                ->addColumn('edit', function ($id) {
                    return '<span class="badge badge-sm bg-warning"><a href="' . route('admin.edit_job', ['id' => $id->id]) . '" class="text-white">EDIT</a></span>';
                })
                ->addColumn('delete', function ($id) {
                    return '<span class="badge badge-sm bg-danger"><a href="' . route('admin.delete_job', ['id' => $id->id]) . '" class="text-white">DELETE</a></span>';
                })
                ->addColumn('action', function ($book) {
                    $btn = '';
                    if ($book->status == 'active') {
                        $btn = '<span class="badge badge-sm bg-danger"><a href="' . route('admin.inactive_job', ['id' => $book->id]) . '"class="text-white">Deactivate</a></span>';
                    } else if ($book->status == 'inactive') {
                        $btn = $btn . '<span class="badge badge-sm bg-success"><a href="' . route('admin.active_job', ['id' => $book->id]) . '"class="text-white">Activate</a></span>';

                    } else {
                        $btn = $btn . '<span class="badge badge-sm bg-secondary"><a href="' . route('admin.active_job', ['id' => $book->id]) . '"class="text-white">Reactivate</a></span>';

                    }
                    return $btn;
                })
                ->escapeColumns([])
                ->rawColumns(['edit', 'delete', 'action'])
                ->make(true);
        }
        return view("admin.manage_job");
    }

    public function fetch_data_for_edit_job($id)
    {
        $job_data = job::where('id', $id)->first();
        return view('admin.edit_job', compact('job_data'));
    }

    public function edit_job_action(Request $request)
    {
        $rules = [
            'job' => 'required',
            'job_date' => 'required',
        ];
        $error_msg = [
            'job_date.required' => 'Date Field cannot be empty',

            'job.required' => 'Job name cannot be empty',


        ];
        $request->validate($rules, $error_msg);

        $data = job::where('id', $request->id)->first();
        // dd($data);
        $data->where('id', $request->id)->update(
            array(
                'job_title' => $request->job,
                'date' => $request->job_date,
            )
        );

        if ($data) {
            session()->flash('success', 'Job Data Updated Successfully.');
            return redirect()->route('admin.manage_job');
        } else {
            session()->flash('error', 'Error in updating job.');
            return redirect()->route('admin.edit_job', ['id' => $request->id]);
        }
    }

    public function activate_job($id)
    {
        $data = job::where('id', $id)->update(array('status' => 'active'));
        if ($data) {
            session()->flash('success', 'Data Delete Successfully.');
            return redirect()->route('admin.manage_job');
        }
    }

    public function delete_job($id)
    {
        $data = job::where('id', $id)->update(array('status' => 'deleted'));
        if ($data) {
            session()->flash('success', 'Data Delete Successfully.');
            return redirect()->route('admin.manage_job');
        }
    }
    public function inactivate_job($id)
    {
        $data = job::where('id', $id)->update(array('status' => 'inactive'));
        if ($data) {
            session()->flash('success', 'Data inactive Successfully.');
            return redirect()->route('admin.manage_job');
        }
    }

    public function manage_attendance(Request $request)
    {
        if ($request->ajax() || $request->isXmlHttpRequest() || $request->wantsJson()) {
            $data = attendance::all();

            return DataTables::of($data)
                // ->addColumn('edit', function ($id) {
                //     return '<span class="badge badge-sm bg-warning"><a href="' . route('admin.edit_job', ['id' => $id->id]) . '" class="text-white">EDIT</a></span>';
                // })
                // ->addColumn('delete', function ($id) {
                //     return '<span class="badge badge-sm bg-danger"><a href="' . route('admin.delete_job', ['id' => $id->id]) . '" class="text-white">DELETE</a></span>';
                // })
                // ->addColumn('action', function ($book) {
                //     $btn = '';
                //     if ($book->status == 'active') {
                //         $btn = '<span class="badge badge-sm bg-danger"><a href="' . route('admin.inactive_job', ['id' => $book->id]) . '"class="text-white">Deactivate</a></span>';
                //     } else if ($book->status == 'inactive') {
                //         $btn = $btn . '<span class="badge badge-sm bg-success"><a href="' . route('admin.active_job', ['id' => $book->id]) . '"class="text-white">Activate</a></span>';

                //     } else {
                //         $btn = $btn . '<span class="badge badge-sm bg-secondary"><a href="' . route('admin.active_job', ['id' => $book->id]) . '"class="text-white">Reactivate</a></span>';

                //     }
                //     return $btn;
                // })
                // ->escapeColumns([])
                // ->rawColumns(['edit', 'delete', 'action'])
                ->make(true);
        }
        return view("admin.manage_attendance");
    }


    public function add_attendance(Request $request)
    {
        $emp_id = $request->emp_id;
        $data1 = employee::where('employee_id', $emp_id)->first();

        $currentDate = Carbon::now()->toDateString();
        // $currentTime = Carbon::now()->timestamp();
        $var = Carbon::now('Asia/Kolkata');
        $currentTime = $var->toTimeString();

        // dd($currentDate,$currentTime);
        // Check if the employee has any attendance record for the current date
        $existingAttendance = attendance::where('employee_id', $emp_id)
            ->whereDate('current_date', $currentDate)
            ->first();

        if (!$existingAttendance) {
            // If no attendance record for the current date, create a new one
            $attendance = new attendance();
            $attendance->employee_id = $emp_id;
            $attendance->employee_name = $data1->name;
            $attendance->current_date = $currentDate;
            $attendance->current_in_time = $currentTime;
            // $attendance->current_out_time = $currentTime;
            $attendance->count = 1;
            $attendance->save();
            session(['val' => [$attendance]]);
            session()->flash('insert', 'attendance added Successfully.');
            return redirect('/');
        } else {
            $data = attendance::where('employee_id', $emp_id)->get();
            $data12 = attendance::where('employee_id', $emp_id)->first();

            foreach ($data as $value) {

                if ($value['current_out_time'] == '00:00:00') {
                    $null_val = $value;
                    // dd($null_val);
                }
            }
            if ($value['current_out_time'] != '00:00:00') {
                $attendance = new attendance();
                $attendance->employee_id = $emp_id;
                $attendance->employee_name = $data1->name;
                $attendance->current_date = $currentDate;
                $attendance->current_in_time = $currentTime;
                // $attendance->current_out_time = $currentTime;
                $attendance->count = 1;
                $attendance->save();
                // session()->put('val',$attendance);
                session(['val' => [$attendance]]);
                session()->flash('insert', 'attendance added Successfully.');
                return redirect('/');

            } else {
                // dd($null_val->current_out_time);
                $data12->where('employee_id', $emp_id)->where('current_out_time', $null_val->current_out_time)->update(
                    array(
                        'current_out_time' => $currentTime,
                        'count' => 2,
                    )
                );

                session(['val' => [$data12]]);
                session()->flash('check_out', 'checked out Successfully.');
                return redirect('/');
            }
        }
    }


    // public function add_attendance(Request $request)
    // {
    //     $emp_id = $request->emp_id;
    //     $data = employee::where('employee_id', $emp_id)->first();

    //     $currentDate = Carbon::now()->toDateString();
    //     $currentTime = Carbon::now()->toTimeString();
    //     $count = attendance::where('employee_id', $emp_id)->first();
    //     $count1 = attendance::where('employee_id')->first();

    //     if (!$count1->employee_id) {

    //         $attendance = new attendance();
    //         $attendance->employee_id = $emp_id;
    //         $attendance->employee_name = $data->name;
    //         $attendance->current_date = $currentDate;
    //         $attendance->current_in_time = $currentTime;
    //         // $attendance->current_out_time = $currentTime;
    //         $attendance->count = 1;
    //         dd($attendance);
    //     }
    //     else{
    //         dd('dk');
    //     }
    // }
}
