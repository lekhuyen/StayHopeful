@extends('frontend.adminpage.index')
@section('title', 'Feedback List')
<link rel="stylesheet" href="{{ asset('feedbackcss/feedback_detail.css') }}">
@section('admin_content')
    <h4 class="fb-detail-title">Feedback List</h4>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Content</th>
                <th>Star</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedback as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="fb-content">{{ $item->content }}</td>
                    <td>{{ $item->star }}</td>
                    <td><a href="{{ route('feedback.detail', $item->id) }}" class="btn btn-warning">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p id="countBadfb"></p>
    {{ $feedback->links() }}
    <div class="fb__sensitive">
        <a class="btn btn-primary" href="{{route('sensitive.create')}}">Add a Sensitive Word</a>
        <a class="btn btn-primary" href="{{route('sensitive.index')}}">Sensitive Word List</a>
    </div>
    <script>
        const wordSensitives = @json($words);
        const rows = document.querySelectorAll('.fb-content');

        const countBadfb = document.querySelector("#countBadfb");
        console.log("rocountBadfbws", countBadfb);
        let countBadfeedback = 0;
        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            wordSensitives.forEach(word => {
                if (text.includes(word)) {
                    countBadfeedback += 1;
                    text = text.replace(word, `<b style = "color: red">${word}</b>`)
                }
            });
            row.innerHTML = text;
            countBadfb.innerHTML = `<b>Tong so bad feed back : ${countBadfeedback}</b>`;
        });
    </script>

@endsection
