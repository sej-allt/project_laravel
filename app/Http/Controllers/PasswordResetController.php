<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
//use Illuminate\Http\RedirectResponse;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Models\Email;
use App\Models\User;
// use App\Http\Mail;
use Mail;

use App\Mail\resetPasswordEmail;



class PasswordResetController extends Controller
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
       
        $request->validate(['email' => 'required|email']);
        $user = DB::table('emails')->where('email', $request->email)->first();
        // dd($user);
        $email = $user->email;
        $student_id = $user->stu_id;
        // echo $email;
        //is email pe mail bhejdo 
         Mail::to($email)->send(new resetPasswordEmail($student_id));

    }
}
// if (!$email) {
//         return back()->withErrors(['email' => 'Email not found']);
//     }

    


    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );

    //     return $status === Password::RESET_LINK_SENT
    //                 ? back()->with(['status' => __($status)])
    //                 : back()->withErrors(['email' => __($status)]);
    // }



