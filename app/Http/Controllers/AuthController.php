<?php

namespace App\Http\Controllers;

// namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        session()->forget('user_id');
        return view('Auth.Login');
    }

    public function loginreq(Request $request)
    {
        $credentials = $request->validate([
            'stu_id' => 'required',
            'password' => 'required'

        ]);

        // $error = Auth::check();
        // echo $error;
        // dd($credentials);
        $user_id = $credentials['stu_id'];
        $user_password = md5($credentials['password']);
        // dd($student_id);
        $user = DB::table('logins')->where('user_id', '=', $user_id)->first();
        // dd($user);
        if ($user) {
            $a_password = $user->password;
            $a_type = $user->type;
            $a_id = $user->user_id;
            if ($a_password == $user_password) {

                if ($a_type == 0) {
                    session(['student_id' => $a_id]);
                    session(['user_type' => $a_type]);
                    return redirect()->route('home');
                } else {
                    session(['student_id' => $a_id]);
                    session(['user_type' => $a_type]);
                    return redirect()->route('admin');
                }
            } else
                return redirect()->route('welcome');
        }
    }

    public function logout()
    {
        session()->forget('user_type');
        return redirect()->route('login');
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function forgot_password(Request $request)
    {
        $user = DB::table('emails')->where('email', '=', $request->email)->first();
        if (!empty($user)) {
            $user->remember_token = Str::random(40);
            $user->save();
        } else {
            return redirect()->back()->with('error', "Email not found");
        }
    }


    public function home()
    {
        // after login
        $student_id = session('student_id');
        $user = DB::table('students')
            ->select('student_name')
            ->where('student_id', '=', $student_id)
            ->first();

        // dd($user);
        $student_name = $user->student_name ?? null;

        return view('home')->with('student_name', $student_name);
    }


    public function profile()
    {
        //user profile
        $student_id = session('student_id');
        $user = DB::table('students')->where('student_id', '=', $student_id)->first();
        return view('profile')->with('user', $user);
    }
}

