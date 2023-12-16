@extends('frontend.adminpage.index')
@section('admin_content')
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
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{!! $mail->name !!}</td>
                        <td>{!! $mail->phone !!}</td>
                        <td>{!! $mail->email !!}</td>
                        <td>{!! $mail->message !!}</td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection
