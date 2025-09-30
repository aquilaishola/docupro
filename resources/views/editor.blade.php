<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF-gen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        body { font-family: DejaVu Sans, sans-serif; padding: 32px; background: #f9fafb; color: #1f2937; }
        .container { max-width: 800px; margin: auto; }
        #editor { height: 400px; background: white; }
        button { margin-top: 16px; padding: 10px 20px; background: #2563eb; color: white; border: none; cursor: pointer; border-radius: 4px; }
        button:hover { background: #1d4ed8; }
    </style>
</head>
<body>
<div class="container">
    <h1>Live PDF Editor</h1>
    <p>Edit your content below. When ready, click "Generate PDF".</p>
   
    <!-- Quill editor container -->
    <div id="editor">
        <h1>Hello from Live Editor!</h1>
        <p>This content will be converted into a PDF.</p>
    </div>

    <button id="generate-pdf">Generate PDF</button>
</div>

<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    document.getElementById('generate-pdf').addEventListener('click', () => {
        const content = quill.root.innerHTML;

        fetch('/pdf/generate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'  // works if Blade template
            },
            body: JSON.stringify({ content: content })
        })
        .then(res => res.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'my-pdf.pdf';
            a.click();
            window.URL.revokeObjectURL(url);
        });
    });
</script>
</body>
</html>