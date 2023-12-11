@extends('frontend.adminpage.index')
@section('admin_content')
<link rel="stylesheet" href="{{ asset('feedbackcss/sensitive.css') }}">
<h1>Detail Mail</h1>
    {!! $mail->message !!}
@endsection
