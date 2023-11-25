<div class="btn-search">
    <div class="btn-search-1">
        <input type="text">
        <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
    </div>
</div>
<div class="menu-bar">
    <div class="item">
        <a href="{{ route('/') }}" class="menu-title-a">TRANG CHỦ</a>
    </div>
    <div class="item">
        <a class="menu-title-a">GIỚI THIỆU</a>
        <i class="fas fa-angle-right dropdown"></i>
        <div class="sub-menu">
            <a href="" class="sub-item">Tin tuc 1</a>
            <a href="" class="sub-item">Tin tuc 2</a>
            <a href="" class="sub-item">Tin tuc 3</a>
        </div>
    </div>

    <div class="item">
        <a class="menu-title-a">ĐÓNG GÓP</a>
        <i class="fas fa-angle-right dropdown"></i>
        <div class="sub-menu">
            <a href="" class="sub-item">Tin tuc 1</a>
            <a href="" class="sub-item">Tin tuc 2</a>
            <a href="" class="sub-item">Tin tuc 3</a>
        </div>
    </div>
    <div class="item">
        <a class="menu-title-a">TIN TỨC</a>
    </div>
    <div class="item">
        <a class="menu-title-a">CHƯƠNG TRÌNH</a>
        <i class="fas fa-angle-right dropdown"></i>
        <div class="sub-menu">
            @foreach ($categories as $category)
                <a href="{{route('project.post',$category->id)}}" class="sub-item">{{$category->name}}</a>
            @endforeach
        </div>
    </div>
</div>


<h2 class="title-middle">BÀI VIẾT LIÊN QUAN</h2>
@foreach ($projects as $project)
    <div class="post_related">
            <div>
                <img src="{{ asset($project->images[0]->image) }}" alt="">
            </div>
        <div class="post-title-child">
            <a href="{{route('detail.post',$project->id)}}">{{$project->title}}</a>
        </div>
    </div>
@endforeach



<script>
// menu bar 
$('.item').click(function(){
    $('.item .sub-menu').not($(this).find('.sub-menu')).slideUp();
    $(this).find('.sub-menu').slideToggle();
    $(this).find('.dropdown').toggleClass('rotate-slide');
})
</script>