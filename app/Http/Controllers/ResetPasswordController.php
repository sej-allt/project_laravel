<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ResetPasswordController extends Controller
{
    


    /**
     * Show the password reset form.
     *
     * @return \Illuminate\View\View
     */
    public function showResetForm($stu_id, $token)
    {
        return view('ResetPasswordLink', ['stu_id' => $stu_id , 'token'=> $token]);
    }

    /**
     * Process the password reset request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    


public function reset(Request $request, $stu_id, $token)
{



$us=DB::table('logins')
            ->where('stu_id', '=', $stu_id)
            ->first();


$ttl=$us->TTL;
    
    // Retrieve the token from the database
    $resetToken = DB::table('password_reset_tokens')
        ->where('token', $token)
        ->where('created_at', '>=', now()->subMinutes($ttl))
        ->first();

    if (!$resetToken) {
        // Token not found or expired, reject the request
   return redirect()->back()->with('error', 'Link has expired. Please request a new password reset link.');
    }
    
    // $expiration=$resetToken->expiration;
    // if(now()>$expiration)
    // {
    //      return redirect()->back()->with('error', 'Token has expired. Please request a new password reset link.');
    // }

    else{


    $request->validate([
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], [
        'password_confirmation' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    if($request->password == $request->password_confirmation)
    {
       
        DB::table('logins')
            ->where('stu_id', '=', $stu_id)
            ->update(['password' =>md5($request->password)]);

            DB::table('password_reset_tokens')
        ->where('token', $token)
        ->delete();
        // You may want to remove or comment this line as it's the same as the next line
        // dd(DB::table('logins')->where('stu_id', '=', $stu_id)->update(['password' => $request->password]));
          //Session::flash('success', 'Password reset successfully.');

          return redirect()->route('login')->with('success', 'Password reset successfully');
        //return redirect()->back()->with('success', 'Password reset successfully');

    }
    else {

        DB::table('password_reset_tokens')
        ->where('token', $token)
        ->delete();
        return redirect()->back()->with('error', 'The password and confirmation do not match');
    }
}
}

}


