@extends('frontend.adminpage.index')
@section('admin_content')

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    <link rel="stylesheet" href="{{ asset('feedbackcss/feedback_detail.css') }}">
    {{-- css --}}

    <h1 class="fb-detail-title">Feedback List</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Content</th>
                <th>Star</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedback as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="fb-content">{{ $item->content }}</td>
                    <td>{{ $item->star }}</td>
                    <td><a href="{{ route('feedback.detail', $item->id) }}" class="btn btn-outline-info btn-lg"><i
                                class="fa-solid fa-info"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p id="countBadfb">Total Bad Feedback: {{ $count }}/{{ $feedbacks->count() }}</p>
    <div class="general__pagination">
        {{ $feedback->links() }}
    </div>
    <div class="fb__sensitive">
        <a class="btn btn-primary btn-add-1" href="{{ route('frontend.sensitive.index') }}">Sensitive Word List</a>
        <a class="btn btn-primary btn-add-2" href="{{ route('sensitive.create') }}">Add New Sensitive Word</a>
    </div>
    <script>
        const wordSensitives = @json($words);
        const rows = document.querySelectorAll('.fb-content');
        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            wordSensitives.forEach(word => {
                if (text.includes(word)) {
                    text = text.replace(word, `<b style = "color: red">${word}</b>`)
                }
            });
            row.innerHTML = text;
        });
    </script>

@endsection
