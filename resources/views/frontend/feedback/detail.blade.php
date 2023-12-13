@extends('frontend.adminpage.index')
@section('admin_content')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('feedbackcss/sensitive.css') }}">
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    {{-- css --}}

    <div class="btn__back">
        <a href="{{ route('feedback.index') }}" class="btn__go_back"><i class="fa fa-long-arrow-left"> </i>GO BACK</a>
    </div>

    <div class="container mt-3">
        <h1>Feedback Detail</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Content</th>
                    <th>Star</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->content }}</td>
                    <td>{{ $feedback->star }}</td>
                    <td>
                        <button class="btn btn-danger d-none btn-bad-feedback">Bad Feedback</button>
                    </td>
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
