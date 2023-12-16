@extends('frontend.adminpage.index')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('feedbackcss/sensitive.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/mailbox.css') }}">
    {{-- css --}}

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="form-table">
                    <h1>Mail List</h1>
                    <table class="table table-striper">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Sent Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mail as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @if ($item->status == 0)
                                            <button class="badge rounded-pill bg-danger status__mailbox">Not
                                                Approved</button>
                                        @else
                                            <button class="badge  rounded-pill bg-success status__mailbox">Approved</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 0)
                                            <a href="{{ route('admin.getreplymail', $item->id) }}"
                                                class="btn btn-outline-dark btn-md"><i class="fas fa-reply"></i></a>
                                        @else
                                            <button disabled class="btn btn-outline-dark btn-md"><i
                                                    class="fas fa-reply"></i></button>
                                            <a href="{{ route('admin.viewmaildetail', $item->id) }}"
                                                class="btn btn-outline-info btn-lg"><i class="fa-solid fa-info"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
