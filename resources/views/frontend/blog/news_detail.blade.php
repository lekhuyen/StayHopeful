@extends('frontend.site')

@section('main')
    <div class="container">
        <div class="row"  style="margin-top: 130px">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 post-detail-1" style="background-color: rgb(248,248,248); 
                                                        padding: 30px; 
                                                        border-radius: 3px; 
                                                        border: 1px solid #f3e7e7">
                <h4>{{$new->title}}</h4>
                @if($new->images->count() > 0)
                    @foreach ($new->images as $image)
                        <img src="{{asset($image->image)}}" alt="" width="100%" height="500px">
                    @endforeach
                @endif
                <span>{{strip_tags($new->description)}}</span>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    
    @include("frontend/login/login")
    <script src="{{asset('js/countdonate.js')}}"></script>
    
@endsection
