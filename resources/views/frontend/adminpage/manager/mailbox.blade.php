@extends('frontend.adminpage.index')
@section('admin_content')
<link rel="stylesheet" href="{{asset('admincss/mailbox.css')}}">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="form-table">
                <table class="table table-striper">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Sent Day</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mail as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>@if ($item->status == 0)
                                    <div class="text-danger">Not Approved</div>
                                    @else
                                    <div class="text-success">Approved</div>
                                @endif</td>
                                <td>@if ($item->status == 0)
                                    <a href="{{route('admin.getreplymail', $item->id)}}" class="btn btn-warning">Reply</a>
                                    @else
                                    <a href="{{route('admin.getreplymail', $item->id)}}" class="btn btn-warning">Reply</a>
                                    <a href="{{route('admin.viewmaildetail', $item->id)}}" class="btn btn-primary">Detail</a>
                                @endif</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection