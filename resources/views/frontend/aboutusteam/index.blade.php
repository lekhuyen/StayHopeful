@extends('frontend.adminpage.index')
@section('admin_content')
@section('title', 'Team Member List')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">

    <div class="container mt-3">
        <h1>Team Member List</h1>
        <div class="d-flex justify-content-center btn__center">
            <a href="{{ route('aboutusteam.create') }}" class="btn btn-primary">Add New Member</a>
        </div>
        <!-- Search Form -->
        <form action="{{ route('aboutusteam.search') }}" method="GET" class="mt-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Input Name to search">
                <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>

        <table class="table table-hover mt-3 text-center" id="teamTable">
            <thead>
                <tr>
                    <th onclick="sortTable(0)">Id</th>
                    <th onclick="sortTable(1)">Name</th>
                    <th onclick="sortTable(2)">Age</th>
                    <th onclick="sortTable(3)">Email</th>
                    <th onclick="sortTable(6)">Image</th>
                    <th onclick="sortTable(4)">Skill</th>
                    <th onclick="sortTable(5)">Status</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>


            <tbody>
                @foreach ($aboutusteams as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->age }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if ($item->images->count() > 0)
                                <img src="{{ asset($item->images[0]->url_image) }}" width="100" class="img-thumbnail"
                                    alt="Image" />
                            @endif
                        </td>
                        <td>{{ $item->skill }}</td>
                        <td>
                            @if ($item->status)
                                <span class="badge rounded-pill bg-success status__about">Active</span>
                            @else
                                <span class="badge rounded-pill bg-danger status__about">Deactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('aboutusteam.edit_aboutus', $item->id) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('aboutusteam.delete', $item->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this team member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Below your table -->

        <div class="general__pagination">
            {{ $aboutusteams->links() }}
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
