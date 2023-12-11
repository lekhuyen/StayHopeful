@extends('frontend.adminpage.index')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('volunteercss/volunteer_list.css') }}">

    <div class="volunteer-detail">
        <h1>Project Volunteer</h1>
        <div class="container mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                @foreach ($summedCounts as $key => $itemPro)

                                    @if ($item->id == $key)
                                        @if ($item->quantity == $itemPro)
                                            <span>Da full</span>
                                            <a class="btn btn-info">View List Volunteer</a>
                                        @break
                                        @endif
                                    @else
                                        <span>Con tuyen</span>
                                        <a class="btn btn-info">View List Volunteer</a>
                                    @break
                                @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
</div>
@endsection
{{-- @foreach ($summedCounts as $key => $itemPro)
@if ($item->id == $key)
    @if ($item->quantity == $itemPro)
        <td>Da full</td>
        <td><a class="btn btn-info">View List Volunteer</a></td>
    @break

@else
    <td>Dang nhan</td>
    <td><a class="btn btn-info">View List Volunteer</a></td>
@break

@endif
@endforeach --}}
