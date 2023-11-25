<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<a href="{{ route('sensitive.index') }}" class="btn btn-light"></a>
@if (session('success'))
    <div class="alert alert-success">
        <strong class="text-success">{{ session('success') }}</strong>
    </div>
@endif
<form action="{{ route('sensitive.store') }}" method="post">
    @csrf
    <div class="mb-3 mt-3">
        <label for="word">Word:</label>
        <input type="text" class="form-control" id="word" value="{{ old('word') }}" placeholder="Enter word"
            name="word">
        @error('word')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input type="radio" class="form-check-input" id="radio1" {{ old('status') == '1' ? 'checked' : '' }}
                name="status" value="1" checked>
            <label class="form-check-label" for="radio1">Active</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" {{ old('status') == '0' ? 'checked' : '' }} id="radio2"
                name="status" value="0">
            <label class="form-check-label" for="radio2">Deactive</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
