<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Email</title>
</head>
<body>
        <p>Dear Recepeint,</p>
        <p>Your University Roll No. is:{{$stu_id}} </p>
        <p>{!! nl2br(preg_replace('/\R/', "\n", $body)) !!}</p>
      <li>GO TO <a href="{{ route('reset-password', ['stu_id' => $stu_id, 'token' => $token]) }}">click to change password</a></li>

        <!-- <li>CLICK ON FORGOT PASSWORD TO RESET AND SAVE YOUR NEW PASSWORD.</li> -->
    </ol>
    @if($conclusion)
        <p>{!! nl2br(preg_replace('/\R/', "\n", $conclusion)) !!}</p>
    @endif
</body>
</html>
