<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div style="
     width: 180px;
     height: 45px; 
     background: blue; 
     border-radius: 5px; 
     display:flex; 
     align-items: center; 
     justify-content: center;
     ">
    <a href="{{route("auth.verified_email", $verify_token)}}" style="
    text-decoration: none; 
    color: white;">Click here to confirm</a>
    </div>
</body>
</html>