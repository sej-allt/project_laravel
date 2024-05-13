<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateUserDataController extends Controller
{
    public function showUpdateForm()
    {
        return view('updateUserDetails.updateName');
    }
 public function showUpdateEmailForm()
    {
        return view('updateUserDetails.updateEmail');
    }

     public function showUpdatePhoneForm()
    {
        return view('updateUserDetails.updatePhone');
    }

    public function showUpdateFNameForm()
    {
        return view('updateUserDetails.updateFatherName');
    }
    public function showUpdateAdrForm()
    {
        return view('updateUserDetails.updateAddress');
    }
    public function showUpdateMarksForm()
    {
        return view('updateUserDetails.updateMarks');
    }

    public function updateName(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'student_id' => 'required',
            'student_name' => 'required',
            'password' => 'required',
        ]);

        // Retrieve the form data
        $studentId = $request->input('student_id');
        $studentName = $request->input('student_name');
        $password = $request->input('password');

        $user=DB::table('logins')
        ->where('stu_id',$studentId)
        ->first();
        if(!$user)
        {
            return redirect()->back()->with('error', 'User not found');
        }
        if($user->password !=md5($password))
        {
            return redirect()->back()->with('error', 'Incorrect Password');

        }


        
        DB::table('students')
            ->where('student_id', $studentId)
            ->update(['student_name' => $studentName]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Name updated successfully');
    }


    public function updateEmail(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'student_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Retrieve the form data
        $studentId = $request->input('student_id');
        $email = $request->input('email');
        $password = $request->input('password');

        $user=DB::table('logins')
        ->where('stu_id',$studentId)
        ->first();
        if(!$user)
        {
            return redirect()->back()->with('error', 'User not found');
        }
        if($user->password !=md5($password))
        {
            return redirect()->back()->with('error', 'Incorrect Password');

        }

        DB::table('students')
            ->where('student_id', $studentId)
            ->update(['email' => $email]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Email updated successfully');
    }

    
    public function updatePhone(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'student_id' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        // Retrieve the form data
        $studentId = $request->input('student_id');
        $phone_number = $request->input('phone_number');
        $password = $request->input('password');

        $user=DB::table('logins')
        ->where('stu_id',$studentId)
        ->first();
        if(!$user)
        {
            return redirect()->back()->with('error', 'User not found');
        }
        if($user->password !=md5($password))
        {
            return redirect()->back()->with('error', 'Incorrect Password');

        }

        DB::table('students')
            ->where('student_id', $studentId)
            ->update(['phone_number' => $phone_number]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Phone Number updated successfully');
    }

     public function updateFName(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'student_id' => 'required',
            'father_name' => 'required',
            'password' => 'required',
        ]);

        // Retrieve the form data
        $studentId = $request->input('student_id');
        $fatherName = $request->input('father_name');
        $password = $request->input('password');

        $user=DB::table('logins')
        ->where('stu_id',$studentId)
        ->first();
        if(!$user)
        {
            return redirect()->back()->with('error', 'User not found');
        }
        if($user->password !=md5($password))
        {
            return redirect()->back()->with('error', 'Incorrect Password');

        }


        
        DB::table('students')
            ->where('student_id', $studentId)
            ->update(['father_name' => $fatherName]);

        // Redirect back with success message
        return redirect()->back()->with('success', "Father's Name updated successfully");
    }

    
    public function updateAddress(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'student_id' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        // Retrieve the form data
        $studentId = $request->input('student_id');
        $address = $request->input('address');
        $password = $request->input('password');

        $user=DB::table('logins')
        ->where('stu_id',$studentId)
        ->first();
        if(!$user)
        {
            return redirect()->back()->with('error', 'User not found');
        }
        if($user->password !=md5($password))
        {
            return redirect()->back()->with('error', 'Incorrect Password');

        }


        
        DB::table('students')
            ->where('student_id', $studentId)
            ->update(['address' => $address]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Address updated successfully');
    }
 
    public function updateMarks(Request $request)
    {
        // Validate the request data if necessary

        // Retrieve the approval ID and status from the request
        $approvalId = $request->input('approval_id');
        $status = $request->input('status');

        // Find the update approval record by ID
       $approval = DB::table('update_approvals')->where('id', $approvalId)->first();


        // Check if the approval record exists
        if ($approval) {

            DB::table('update_approvals')
   
    ->where('id', $approvalId)
    ->update(['delete' => 1]);
            // If the status is 'approve', update the marks in the students table
            if ($status === 'approve') 
            {
                    
                 DB::table('update_approvals')
            ->where('id', $approvalId)
             ->where('delete',1)
            ->update(['approve/disapprove'=>1]);

            $updatewhat = DB::table('update_approvals')
    ->where('id', $approvalId)
    ->where('delete', 1)
    ->value('update_type');
    

    $studentId = DB::table('update_approvals')
    ->where('id', $approvalId)
    ->where('delete', 1)
    ->value('stu_id');
    

    $marks=DB::table('update_approvals')
    ->where('id', $approvalId)
    ->where('delete', 1)
     
    ->value($updatewhat);

                DB::table('students')
            ->where('student_id', $studentId)
            ->update([$updatewhat => $marks]);
 return redirect()->route('updateMarks')->with('success', 'Update approved');




                

               
            }

           
           
           
        

         else{
                 DB::table('update_approvals')
                ->where('id', $approvalId)
                ->where('delete',1)
                ->update(['approve/disapprove'=>1]);

                return redirect()->route('updateMarks')->with('error', 'Update disapproved');

            }

        // Redirect back or to any other route after handling the approval
       return redirect()->route('updateMarks')->with('success', 'Update approved/disapproved successfully');

    }
}




}