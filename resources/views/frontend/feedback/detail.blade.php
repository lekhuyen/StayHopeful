<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
{{-- <link rel="stylesheet" href="{{asset('frontend.')}}"> --}}

<div class="container mt-3">
    <h2>Feedback Detail</h2>
    <button class="btn btn-danger d-none btn-bad-feedback">Bad Feedback</button>
    <div class="row">
        <p>Email: {{$feedback->email}}</p>
        <p class="content">Content: {{$feedback->content}}</p>
        <p>Star: {{$feedback->star}}</p>
    </div>
</div>
<script>
    const wordSensitives = @json($words);
    const row = document.querySelector('.content');
    const btnBadFeedback = document.querySelector('.btn-bad-feedback');
    let text = row.textContent.toLowerCase();
    wordSensitives.forEach(word => {
        if (text.includes(word)) {
            text = text.replace(word,`<b style="color:red">${word}</b>`);
            btnBadFeedback.classList.remove('d-none');
        }
    });
    row.innerHTML = text;
</script>
