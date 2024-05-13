
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
     <style>
        body {
            color: black !important; /* Set default text color to black */
        }
        a {
            color: blue !important; /* Set link color to blue */
            text-decoration: underline; /* Add underline to links */
        }

         p {
            color: black !important; /* Set paragraph text color to black */
        }
    </style>
</head>
<body>
    <p>Dear Student,</p>
    <p>You've requested a password reset for your account. To proceed with resetting your password, please click on the link below:</p>
    <p><a href="{{ route('reset-password', ['stu_id' => $stu_id, 'token' => $token]) }}">Click to change password</a></p>
    <p>If the link does not work, please copy and paste the following URL into your browser's address bar:</p>
   <p>{{ route('reset-password', ['stu_id' => $stu_id, 'token' => $token]) }}</p>
    <p>If you didn't request this password reset, please contact us immediately at [Contact Email/Phone Number].</p>
    <p>Thank you,</p>
    <p>[Your Organization]</p>
    <p><strong>This is a system-generated email. Please do not reply.</strong></p>
</body>
</html>
