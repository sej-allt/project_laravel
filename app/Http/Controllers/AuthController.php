<?php

namespace App\Http\Controllers;

// namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AuthController extends Controller
{
    public function login()
    {
        session()->forget('user_id');
        return view('Auth.Login');
    }

    public function loginreq(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'stu_id' => 'required',
            'password' => 'required'

        ]);

        // $error = Auth::check();
        // echo $error;
        // dd($credentials);
        $student_id = $credentials['stu_id'];
        $student_password = $credentials['password'];
        // dd($student_id);
        $user = DB::table('logins')->where('stu_id', '=', $student_id)->first();
        // dd($user);
        if ($user) {
            $a_password = $user->password;
            $a_type = $user->type;
            if ($a_password == $student_password) {

                if ($a_type == 0) {
                    session(['user_type' => $a_type]);
                    return redirect()->route('home');
                } else {
                    session(['user_type' => $a_type]);
                    return redirect()->route('admin');
                }
            } else
                return redirect()->route('welcome');
        }
        // if (Auth::attempt($request->only('stu_id', 'password'))) {

        //     return view('home');
        // } else
        //     return view('welcome');
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
        if(!empty($user))
        {
            $user->remember_token= Str::random(40);
            $user->save();
        }
        else
        {
            return redirect()->back()->with('error',"Email not found");
        }
    }
}
