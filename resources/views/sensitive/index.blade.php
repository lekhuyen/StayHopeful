<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<a href="{{ route('sensitive.create') }}" class="btn btn-primary">Add sensitive word</a>

<div class="container mt-3">

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Word</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sensitives as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->word }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
