<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
</head>
<body>
    <p>Dear {{$studentName}},</p>
    <p>{!! nl2br(preg_replace('/\R/', "\n", $body)) !!}</p>
    @if ($link)
        <p><a href="{{ $link }}" target="_blank">Click here to visit</a></p>
    @endif
    @if($conclusion)
        <p>{!! nl2br(preg_replace('/\R/', "\n", $conclusion)) !!}</p>
    @endif
</body>
</html>
