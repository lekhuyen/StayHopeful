@extends('frontend.adminpage.index')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('feedbackcss/sensitive.css') }}">

    <a href="{{ route('feedback.index') }}" style="display: inline-block; margin-bottom: 10px; text-decoration: none;">
        <i class="fa fa-long-arrow-left"> Go Back</i></a>

    <div class="container mt-3">

        <h1>Feedback Detail</h1>
        <button class="btn btn-danger d-none btn-bad-feedback">Bad Feedback</button>

        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Content</th>
                    <th>Star</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $feedback->email }}</td>
                    <td>{{ $feedback->content }}</td>
                    <td> {{ $feedback->star }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        const wordSensitives = @json($words);
        const row = document.querySelector('.content');
        const btnBadFeedback = document.querySelector('.btn-bad-feedback');
        let text = row.textContent.toLowerCase();
        wordSensitives.forEach(word => {
            if (text.includes(word)) {
                text = text.replace(word, `<b style="color:red">${word}</b>`);
                btnBadFeedback.classList.remove('d-none');
            }
        });
        row.innerHTML = text;
    </script>

    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')
@endsection
