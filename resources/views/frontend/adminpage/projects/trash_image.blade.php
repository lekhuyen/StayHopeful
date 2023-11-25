<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Trash</h1>
    <a href="{{route('projectAd.index')}}">Clist</a>
    @foreach($projects as $image)
    <img src="{{asset($image->image)}}" alt="" width="100">
    <a class="btn btn-primary" href="{{route('projectAd-untrash',$image->id)}}">Phuc hoi</a>
    <a class="btn btn-primary" href="{{route('projectAd-forcedelete',$image->id)}}">Xoa vinh vien</a>
    @endforeach
</body>
</html>