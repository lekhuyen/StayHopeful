@extends('frontend.adminpage.index')
@section('admin_content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('general/general.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-QHhxXv+gHGDx4DIjMYG3UzUE8z2WfS10Iz//FTK9kl4pG1oRz6qwn6Klr8IxLhU8P1vnMCqyvlV5HAjRf/umUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
t

<div class="container mt-3">
    <h1>About Us Page</h1>
    <br>
    <br>
    <h4>Main Sector</h4>
    <a href="{{ route('aboutuspage.create_main') }}" class="btn btn-primary">Add Main sector</a>
    <table class="table table-dark mt-3" id="mainTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>View Description</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mainPages as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                  <a href="{{ route('aboutuspage.detail', $item->id) }}" class="btn btn-primary">View Description</a>
                </td>
                <td>
                    @if ($item->images->count() > 0)
                        <img src="{{ asset($item->images[0]->url_image) }}" width="100" class="img-thumbnail" alt="Image"/>
                    @endif
                </td>
                <td>
                    <a href="{{ route('aboutuspage.edit_main', $item->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="{{ route('aboutuspage.delete_main', $item->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this sector?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>

<div class="container mt-3">
    <h4>About us Sector</h4>
    <a href="{{ route('aboutuspage.create_aboutus') }}" class="btn btn-primary">Add logo sector</a>
    <table class="table table-dark mt-3" id="aboutUsTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>View Description</th> 
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aboutUsPages as $items)
                <tr>
                    <td>{{ $items->id }}</td>
                    <td>{{ $items->title }}</td>
                    <td>
                        <a href="{{ route('aboutuspage.detail', $items->id) }}" class="btn btn-primary">View Description</a>
                    </td>
                    <td>
                        @if ($items->images->count() > 0)
                            <img src="{{ asset($items->images[0]->url_image) }}" width="100" class="img-thumbnail" alt="Image"/>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('aboutuspage.edit_aboutus', $items->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('aboutuspage.delete_aboutus', $items->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this sector?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h4>Logo Sector</h4>
            <a href="{{ route('aboutuspage.create_logo') }}" class="btn btn-primary">Add Logo sector</a>
            <table class="table table-dark mt-3" id="combinedTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>View Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logoPages as $logoitems)
                        <tr>
                            <td>{{ $logoitems->id }}</td>
                            <td>
                                @if ($logoitems->images->count() > 0)
                                    <img src="{{ asset($logoitems->images[0]->url_image) }}" width="100" class="img-thumbnail" alt="Image"/>
                                @endif
                            </td>
                            <td>{{ $logoitems->title }}</td>
                            <td>
                                <a href="{{ route('aboutuspage.detail', $logoitems->id) }}" class="btn btn-primary">View Description</a>
                            </td>
                            <td>
                                <a href="{{ route('aboutuspage.edit_logo', $logoitems->id) }}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('aboutuspage.delete_logo', $logoitems->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this sector?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Join Us --}}
<div class="container mt-3">
    <h4>Join Us Sector</h4>
    <a href="{{ route('aboutuspage.create_introcall') }}" class="btn btn-primary">Add Intro Call Sector</a>
    <a href="{{ route('aboutuspage.create_leftcall') }}" class="btn btn-primary">Add Left Call Box</a>
    <div>

    </div>
    <table class="table table-dark mt-3" id="IntrocallTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>View Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($introcallPages as $introcallitem)
                <tr>
                    <td>{{ $introcallitem->id }}</td>
                    <td>{{ $introcallitem->title }}</td>
                    <td>
                        <a href="{{ route('aboutuspage.detail', $introcallitem->id) }}" class="btn btn-primary">View Description</a>
                    </td>
                    <td>
                        <a href="{{ route('aboutuspage.edit_introcall', $introcallitem->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('aboutuspage.delete_main', $introcallitem->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this sector?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>

<div class="container mt-3">
    <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col" data-aos="fade-left" data-aos-duration="1000">
            @foreach ($leftcallPages as $leftcallitem)
                <div class="col-md-4">
                    <div class="card h-100">
                        <br>
                        <div class="text-center">
                            <!-- Your SVG code here -->
                        </div>
                        <div class="card-body call_to_action_card">
                            <h5 class="card-title">{{ $leftcallitem->lefttitle }}</h5>
                            <p class="card-text card-text-p">{{ $leftcallitem->leftdescription }}</p>
                        </div>
                        <a href="{{ route('aboutuspage.edit_leftcall', $leftcallitem->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('aboutuspage.delete_main', $leftcallitem->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this sector?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
            <div class="card h-100">
                <br>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 512 512">
                        <style>
                            svg {
                                fill: #15b5f9
                            }
                        </style>
                        <path
                            d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9c.1-.2 .2-.3 .3-.5z" />
                    </svg>
                </div>
                <div class="card-body call_to_action_card">
                    <h5 class="card-title">Feedback</h5>
                    <p class="card-text card-text-p">We value your feedback and insights! You can helps us
                        understand your needs better and allows us to continuously enhance our projects and events to ser
                        our community better.</p>

                </div>
            </div>
        </div>

        <div class="col" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">

            <div class="card h-100">
                <br>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 640 512">
                        <style>
                            svg {
                                fill: #15b5f9
                            }
                        </style>
                        <path
                            d="M544 248v3.3l69.7-69.7c21.9-21.9 21.9-57.3 0-79.2L535.6 24.4c-21.9-21.9-57.3-21.9-79.2 0L416.3 64.5c-2.7-.3-5.5-.5-8.3-.5H296c-37.1 0-67.6 28-71.6 64H224V248c0 22.1 17.9 40 40 40s40-17.9 40-40V176c0 0 0-.1 0-.1V160l16 0 136 0c0 0 0 0 .1 0H464c44.2 0 80 35.8 80 80v8zM336 192v56c0 39.8-32.2 72-72 72s-72-32.2-72-72V129.4c-35.9 6.2-65.8 32.3-76 68.2L99.5 255.2 26.3 328.4c-21.9 21.9-21.9 57.3 0 79.2l78.1 78.1c21.9 21.9 57.3 21.9 79.2 0l37.7-37.7c.9 0 1.8 .1 2.7 .1H384c26.5 0 48-21.5 48-48c0-5.6-1-11-2.7-16H432c26.5 0 48-21.5 48-48c0-12.8-5-24.4-13.2-33c25.7-5 45.1-27.6 45.2-54.8v-.4c-.1-30.8-25.1-55.8-56-55.8c0 0 0 0 0 0l-120 0z" />
                    </svg>
                </div>

                <div class="card-body call_to_action_card">
                    <h5 class="card-title">Support Our Cause Volunteer Today</h5>
                    <p class="card-text card-text-p">Join us in supporting our cause and contribute to positive change.
                        Your dedication can help us bring hope, healing, and resilience to those who need it most.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <h4> Our Team Sector</h4>
    {{-- <a href="{{ route('aboutuspage.create_main') }}" class="btn btn-primary">Add Main sector</a> --}}
    <table class="table table-dark mt-3" id="mainTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>View Description</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mainPages as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                  <a href="{{ route('aboutuspage.detail', $item->id) }}" class="btn btn-primary">View Description</a>
                </td>
                <td>
                    @if ($item->images->count() > 0)
                        <img src="{{ asset($item->images[0]->url_image) }}" width="100" class="img-thumbnail" alt="Image"/>
                    @endif
                </td>
                <td>
                    <a href="{{ route('aboutuspage.edit_main', $item->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="{{ route('aboutuspage.delete_main', $item->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this sector?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('frontend/login/login')
@endsection