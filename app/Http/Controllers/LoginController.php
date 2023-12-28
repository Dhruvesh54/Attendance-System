<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\employee;
use App\Models\jession;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Tratis\saveFile;
use Maatwebsite\Excel\Facades\Excel;

class LoginController extends Controller
{
    use saveFile;
    public function Login_authentication(Request $request)
    {
        $rules = [
            'em' => 'required|email',
            'pwd' => 'required'
        ];
        $errors = [
            'em.required' => 'Email address can not be empty',
            'em.email' => 'Enter a valid email address',
            'pwd.required' => 'Password field cannot be empty'
        ];
        $validator = validator::make($request->all(), $rules, $errors);
        if ($validator->fails()) {
            return redirect('login')->withErrors($validator);
            // return redirect()->route('student.login')->withErrors($validator);
        } else {
            $count = employee::where('email', $request->em)->where('password', $request->pwd)->count();
            if ($count == 1) {
                $result = employee::where('email', $request->em)->first();
                if ($result->role == "admin") {
                    // echo "User";
                    session()->put('admin', $result->email);
                    return redirect()->route('admin.index');
                }
                // else {
                //     // session()->put('adminuser', $result->email);
                //     return redirect()->route('admin.add_book');
                // }
                // }
            } else {
                session()->flash('error', 'Invalid email or password');
                // return redirect()->route('student.login');
                return redirect('login');
            }
        }
    }

    public function logout(Request $request)
    {
        $employee_email = session()->get("admin");
        $employee_id = employee::where("email", $employee_email)->first()->employee_id;


        $data = employee::where('employee_id', $employee_id)->first();
        $data->where('employee_id', $employee_id)->update(
            array(
                'ip_address' => $request->ip(),
                'last_login_time' => Carbon::now('Asia/Kolkata')->format('Y-m-d h:i:s A'),
            )
        );

        session()->forget('admin');
        session()->flash('success', 'Your account was logged out successfully');
        return redirect('login');


        // $data->where('employee_id', $employee_id)->update(
        //     array(
        //         'ip_address' => $request->ip(),
        //         // 'last_accessed' => Carbon::now('Asia/Kolkata')->toDateTimeString(),
        //         'last_accessed' => Carbon::now('Asia/Kolkata')->format('Y-m-d h:i:s A'),
        //     )
        // );
    }

    public function create_post()
    {

        $data = [
            'title' => "i'm a title",
            'data' => [
                'dhruvesh' => 'tester',
                'monil' => 'developer',
            ],
        ];
        // dd($data);
        $posts = jession::create($data);
        // foreach ($posts->data as $key => $value) {
        //     dump($key, $value);
        // }
    }

    public function saveImage(Request $request)
    {

        $data = Excel::import(new UsersImport,$request->file('image'));

        if($data){
            return "Done";
        }
        else{
            return "Error";
        }


    }
}
