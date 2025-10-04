<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create PDF') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-3 text-sm text-gray-500 dark:text-gray-400">
                        Type your content below. When ready, click “Generate PDF”.
                    </p>

                    <div id="editor" class="bg-white text-black rounded-md" style="height: 400px;">
                        <h1>Hello from DocuPro!</h1>
                        <p>This content will be converted into a PDF.</p>
                    </div>

                    <button id="generate-pdf" 
                        class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                        Generate PDF
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor', { theme: 'snow' });

            document.getElementById('generate-pdf').addEventListener('click', () => {
                const content = quill.root.innerHTML;

                fetch('{{ route("pdf.generate") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
        });
    </script>
</x-app-layout>