@extends('frontend.adminpage.index')
@section('admin_content')
<h1>Detail Mail</h1>
    {!! $mail->message !!}
@endsection
