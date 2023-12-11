<div class="btn-search">
    <form action="{{ route('search_project') }}" method="POST">
        @csrf
        <div class="btn-search-1">
            <input type="text" name="keywork" placeholder="Search..">
            <div class="search-icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
    </form>
</div>
<div class="menu-bar">
    <div class="item">
        <a href="{{ route('/') }}" class="menu-title-a">HOME</a>
    </div>
    <div class="item">
        <a class="menu-title-a">ABOUT</a>
        <i class="fas fa-angle-right dropdown"></i>
        <div class="sub-menu">
            <a href="{{ route('aboutus.index') }}" class="sub-item">About Us</a>
            <a href="{{ route('contact.index') }}" class="sub-item">Location</a>
            <a href="{{ route('aboutus.aboutus_whoweare') }}" class="sub-item">Our Story</a>
        </div>
    </div>
    <div class="item">
        <a href="{{ route('contact.index') }}" class="menu-title-a">EXPLORE</a>
        <i class="fas fa-angle-right dropdown"></i>
        <div class="sub-menu">
            <a href="{{ route('contact.index') }}" class="sub-item">Contact</a>
            <a href="{{ route('feedback.create') }}" class="sub-item">Feedback</a>
            <a href="{{ route('volunteer.create') }}" class="sub-item">Vonlunteer</a>
        </div>
    </div>
    <div class="item">
        <a class="menu-title-a">DONORS</a>
        <i class="fas fa-angle-right dropdown"></i>
        <div class="sub-menu">
            <a href="{{ route('detail.donate') }}" class="sub-item">Donate Form</a>
            <a href="{{ route('detail.listdonate') }}" class="sub-item">Donate List</a>
        </div>
    </div>
    <div class="item">
        <a class="menu-title-a">OUR PROJECT</a>
        <i class="fas fa-angle-right dropdown"></i>
        <div class="sub-menu">
            @foreach ($categories as $category)
                <a href="{{ route('project.post', $category->id) }}" class="sub-item">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</div>


<h2 class="title-middle">RELATED ARTICLES</h2>
@foreach ($projects as $project)
    <div class="post_related">
        <div>
            <img src="{{ asset($project->images[0]->image) }}" alt="">
        </div>
        <div class="post-title-child">
            <a href="{{ route('detail.post', [$project->id, Str::slug($project->title).'.html']) }}">{{ $project->title }}</a>
        </div>
    </div>
@endforeach

<script>
    // menu bar
    $('.item').click(function() {
        $('.item .sub-menu').not($(this).find('.sub-menu')).slideUp();
        $(this).find('.sub-menu').slideToggle();
        $(this).find('.dropdown').toggleClass('rotate-slide');
    })
</script>
