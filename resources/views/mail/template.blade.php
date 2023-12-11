<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- @dd($projectId); --}}
    <div style="width: 200px;padding: 10px;background: #FFC0D9;border-radius: 10px">
        <h4 style="text-align: center">Thong bao su kien</h4>
        <div>
            <img width="100%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkqnVSrepctO_TzCaW23UOMZP-iriQotD-akcLdz7B5x1lr6-1UTecRz5cOI9KSqkhxV4&usqp=CAU"/>
            <p>{!! $messageMail !!}</p>
            <a style="width: 100px;padding: 5px;border-radius: 3px"  href="{{route('detail.post', [$projectId, Str::slug($messageMail).'.html'])}}">Details</a>
        </div>
    </div>
</body>

</html>
