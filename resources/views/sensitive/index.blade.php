<a href="{{ route('sensitive.create') }}" class="btn btn-light">Create</a>

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
