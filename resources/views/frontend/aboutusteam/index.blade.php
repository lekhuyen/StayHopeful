@extends('frontend.adminpage.index')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('feedbackcss/sensitive.css') }}">


    <div class="container mt-3">
        <h1>Team Member List</h1>
        <a href="{{ route('aboutusteam.create') }}" class="btn btn-primary">New Team</a>

        <!-- Search Form -->
        <form action="{{ route('aboutusteam.search') }}" method="GET" class="mt-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name">
                <button type="submit" class="btn btn-secondary">Search</button>
            </div>
        </form>

        <table class="table table-dark mt-3 text-center" id="teamTable">
            <thead>
                <tr>
                    <th onclick="sortTable(0)">Id</th>
                    <th onclick="sortTable(1)">Name</th>
                    <th onclick="sortTable(2)">Age</th>
                    <th onclick="sortTable(3)">Email</th>
                    <th onclick="sortTable(4)">Skill</th>
                    <th onclick="sortTable(5)">Status</th>
                    <th onclick="sortTable(6)">Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>


            <tbody>
                @foreach ($aboutusteams as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->age }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->skill }}</td>
                        <td>
                            @if ($item->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->images->count() > 0)
                                <img src="{{ asset($item->images[0]->url_image) }}" width="100" class="img-thumbnail"
                                    alt="Image" />
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('aboutusteam.edit_aboutus', $item->id) }}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('aboutusteam.delete', $item->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this team member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-info">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <!-- Below your table -->
        <div class="d-flex justify-content-between mt-3">
            <div>
                <ul class="pagination">
                    @if ($aboutusteams->currentPage() > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $aboutusteams->previousPageUrl() }}" rel="prev">Previous</a>
                        </li>
                    @endif

                    @foreach (range(1, $aboutusteams->lastPage()) as $page)
                        @if ($page == $aboutusteams->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $aboutusteams->url($page) }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    @if ($aboutusteams->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $aboutusteams->nextPageUrl() }}" rel="next">Next</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
        function convertToNumber(value) {
            return isNaN(value) ? value : parseFloat(value);
        }

        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("teamTable");
            switching = true;
            dir = "asc";

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i < rows.length - 1; i++) {
                    shouldSwitch = false;
                    x = convertToNumber(rows[i].getElementsByTagName("TD")[n].innerHTML);
                    y = convertToNumber(rows[i + 1].getElementsByTagName("TD")[n].innerHTML);

                    if (dir == "asc") {
                        if (x > y) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x < y) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

        $("#teamTable th").click(function() {
            var index = $(this).index();
            sortTable(index);
        });
    });
    </script>

    @include('frontend/login/login')
@endsection
