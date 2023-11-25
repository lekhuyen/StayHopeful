<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="container mt-3">
    <h2>Feedback Detail</h2>
    <div class="row">
        <p>Email: {{$feedback->email}}</p>
        <p class="content">Content: {{$feedback->content}}</p>
        <p>Star: {{$feedback->star}}</p>
    </div>
</div>
<script>
    const wordSensitives = @json($words);
    const row = document.querySelector('.content');
    let text = row.textContent.toLowerCase();
    wordSensitives.forEach(word => {
        if (text.includes(word)) {
            text = text.replace(word,`<b style="color:red">${words}</b>`);
        }
    });
    row.innerHTML = text;
</script>
