<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Register Email</title>
</head>
<body>
    <div>
        <p style="text-align: center;color:black;font-weight: bold">{!! $messageMail !!}</p>
        <a href="{{route("auth.register.verify.email")}}">Confirm Verify Email</a>   
    </div>
</body>
</html>