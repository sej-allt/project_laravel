<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
</head>
<body>
    
    <p>Click on this link to Reset Password</p>
        <p>Your STUDENT ID is:{{$stu_id}} </p>
   
      <li>GO TO <a href="{{ route('reset-password', ['stu_id' => $stu_id, 'token' => $token]) }}">click to change password</a></li>

        <li>CLICK ON FORGOT PASSWORD TO RESET AND SAVE YOUR NEW PASSWORD.</li>
    </ol>
   
</body>
</html>
