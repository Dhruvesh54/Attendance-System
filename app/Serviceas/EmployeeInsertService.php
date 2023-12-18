<?php
namespace App\Serviceas;

use App\Models\employee;
use App\Models\job;
use Illuminate\Http\Request;

class EmployeeInsertService
{
    public function add_employee(Request $request)
    {
        $rules = [
            'date' => 'required',
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:employee,email',
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

            'email.required' => 'Email address cannot be empty',
            'email.email' => 'Invalid email address',
            'email.unique' => 'Email address already registered',

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

        $employee = new employee();

        $employee->employee_id = $request->emp_id;
        $employee->joining_date = $request->date;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->job_title = $request->job_title;
        $employee->gender = $request->gender;
        $employee->password = $request->pwd_confirmation;

        return $employee;
    }

    public function add_job(Request $request)
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
        $job = new job();

        $job->job_title = $request->job;
        $job->date = $request->job_date;

        return $job;
    }
}