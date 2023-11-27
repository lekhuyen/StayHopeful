<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<h4>Feedback List</h4>
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
                <td class="content">{{ $item->content }}</td>
                <td>{{ $item->star }}</td>
                <td><a href="{{ route('feedback.detail',$item->id) }}" class="btn btn-warning">Detail</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    const wordSensitives = @json($words);
    const rows = document.querySelectorAll('.content');
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
