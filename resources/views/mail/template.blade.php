<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="width: 400px; padding: 10px; background: #FFC0D9; border-radius: 10px">
        <h1 style="text-align: center; color: deeppink;">You have received a gift.</h1>
        <div>
            <img width="100%"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkqnVSrepctO_TzCaW23UOMZP-iriQotD-akcLdz7B5x1lr6-1UTecRz5cOI9KSqkhxV4&usqp=CAU" />
            <p style="color:crimson; text-align:center;">Thanks for being a part of us and enroll in {!! $messageMail !!} Project.</p>
            <a style="background-color:lightpink; color:cornflowerblue; border: none; padding: 5px;
            text-align: center; text-decoration: none; margin: 4px 2px; display: block;
            cursor: pointer; border-radius: 5px; font-size: 16px;"
                href="{{ route('detail.post', [$projectId, Str::slug($messageMail) . '.html']) }}">Click for more
                Details</a>
        </div>
    </div>
</body>

</html>
