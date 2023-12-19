<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="border: 1px solid #ccc; width: 800px; text-align: center; background-color: #9bbee6; margin: 0; padding: 20px; border-radius: 20px;">
        <div class="card-body" style="color: white">
            <h5 style="font-size: 25px; margin: 20px 0 0 0; color: #123b6a">STAYHOPEFUL</h5>
            <p style="font-size: 20px; margin: 10px;">We would like to inform that you've successfully sign up an account at our website - StayHopeful.</p>
            <p style="font-size: 20px; margin: 10px;">Please click the button below to confirm your email.</p>
            <div style="width: 50%; margin-left: 25%; background-color: #123b6a ; height: 30px; border-radius: 20px; text-align: center; padding-top: 10px">
                <a href="{{route("auth.verified_email", $verify_token)}}" style="
                text-decoration: none; 
                color: white;">Click here to confirm</a>
            </div>
        </div>
    </div>
</body>
</html>
