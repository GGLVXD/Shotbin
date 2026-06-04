<!DOCTYPE html>
<html data-theme="light">
<head>
    <title>File Upload</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen px-4 py-6 sm:px-6 lg:px-8">

    <x-header></x-header>

    <main class="max-w-2xl mx-auto mt-8">
        <h2 class="text-3xl font-bold mb-2">Upload a File</h2>
        <p class="text-gray-500 mb-6">Select a file and upload it to the server.</p>

        @if(session('files'))
            <div class="mt-4">
                <p class="text-green-600">{{ session('success') }}</p>

                <ul class="mt-2 text-sm">
                    @foreach(session('files') as $file)
                        <li>{{ $file }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="upload-form" class="space-y-4">
            @csrf

            <input
                type="file"
                name="files[]"
                id="files"
                multiple
                class="file-input w-full"
            >

            <ul id="file-list" class="space-y-2"></ul>

            <button
                type="submit"
                class="btn btn-primary w-full sm:w-auto"
            >
                Upload Files
            </button>
        </form>

        @error('files')
            <p class="text-red-500 mt-3">{{ $message }}</p>
        @enderror

        @error('files.*')
            <p class="text-red-500 mt-3">{{ $message }}</p>
        @enderror

        @error('file')
            <p class="text-red-500 mt-3">{{ $message }}</p>
        @enderror
    </main>

</body>
</html>
<script>
const form = document.getElementById('upload-form');
const fileInput = document.getElementById('files');
const fileList = document.getElementById('file-list');

let fileElements = [];

fileInput.addEventListener('change', () => {
    fileList.innerHTML = '';
    fileElements = [];

    Array.from(fileInput.files).forEach((file, index) => {
        const li = document.createElement('li');

        li.innerHTML = `
            <span class="filename">${file.name}</span>
            <span class="progress ml-2 bg-transparent p-0 rounded-none text-current">0%</span>
        `;

        fileList.appendChild(li);

        fileElements[index] = {
            li,
            progress: li.querySelector('.progress'),
            filename: li.querySelector('.filename')
        };
    });
});

form.addEventListener('submit', (e) => {
    e.preventDefault();

    const formData = new FormData();

    Array.from(fileInput.files).forEach(file => {
        formData.append('files[]', file);
    });

    formData.append(
        '_token',
        document.querySelector('input[name="_token"]').value
    );

    const xhr = new XMLHttpRequest();

    xhr.open('POST', '{{ route("file.upload") }}');

    xhr.upload.addEventListener('progress', (e) => {
        if (!e.lengthComputable) return;

        const percent = Math.round((e.loaded / e.total) * 100);

        fileElements.forEach(item => {
            item.progress.textContent = `${percent}%`;
        });
    });

    xhr.onload = () => {
        if (xhr.status !== 200) {
            alert('Upload failed');
            return;
        }

        const response = JSON.parse(xhr.responseText);

        response.files.forEach((file, index) => {
            fileElements[index].filename.classList.add('text-green-600');

            fileElements[index].progress.innerHTML = `
                <a
                    href="/view/${file.url_id}"
                    class="text-blue-600 underline"
                >
                    View
                </a>
            `;
        });
    };

    xhr.send(formData);
});
</script>