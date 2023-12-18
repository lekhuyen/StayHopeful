@extends('frontend.adminpage.index')
@section('admin_content')
@section('title', 'Mail Detail')
{{-- css --}}
<link rel="stylesheet" href="{{ asset('general/general.css') }}">
{{-- css --}}

<div class="btn__back">
    <a href="{{ route('admin.viewmail') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
</div>

<div class="container mt-3">
    <h1>Mail Detail</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{!! $detail->name !!}</td>
                <td>{!! $detail->phone !!}</td>
                <td>{!! $detail->email !!}</td>
                <td>{!! $mail->message !!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
