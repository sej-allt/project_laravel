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
use App\Models\EmailContent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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
        $user = DB::table('students')->where('email', $request->email)->first();
        // dd($user);

        // $user = User::where('email', $request->email)->first();

    // If user is not found, display error message
    if (!$user) {
        return redirect()->back()->with('error', 'No user found with that email.');
    }
        $email = $user->email;
        $stu_id = $user->stu_id;
        $stu_name =$user->student_name;
        // echo $email;
        //is email pe mail bhejdo
        //  Mail::to($email)->send(new resetPasswordEmail($student_id));

        //   DB::table('logins')
        //     ->where('stu_id', '=', $student_id)
        //     ->update(['TTL' => 1]);

        $token = Str::random(32); // Adjust the length as needed

    // Retrieve TTL value from the logins table
    $ttl = DB::table('logins')->where('stu_id', $stu_id)->value('TTL');

    // Define the expiration timestamp based on TTL
    $expiration = now()->addMinutes(2); // Adjust as needed

//     // Store the token in the database with the user's ID and expiration timestamp
//     DB::table('password_reset_tokens')->insert([
//     'email' => $email,
//     'token' => $token,
//     'created_at' => now(),
// ]);

$existingRecord = DB::table('password_reset_tokens')
    ->where('email', $email)
    ->first();

if ($existingRecord) {
    // If a record exists, you may choose to update it or delete it and insert a new record
    DB::table('password_reset_tokens')
        ->where('email', $email)
        ->update([
            'token' => $token,
            'created_at' => now(),
        ]);

}
else {
    // If no record exists, insert a new record
    DB::table('password_reset_tokens')->insert([
        'email' => $email,
        'token' => $token,
        'created_at' => now(),
    ]);
}
$newttl=1;

// Update the TTL in the logins table
DB::table('logins')
    ->where('stu_id', $stu_id) // Assuming email is the unique identifier for a user
    ->update(['TTL' => $newttl]);
    $emailContent = EmailContent::where('type', 'password reset')->first();
    Mail::to($email)->send(new resetPasswordEmail($stu_name,$stu_id, $token,$emailContent));


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



