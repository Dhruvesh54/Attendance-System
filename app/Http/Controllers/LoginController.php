<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\jession;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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

    public function logout()
    {
        session()->forget('admin');
        session()->flash('success', 'Your account was logged out successfully');
        return redirect('login');
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
}
