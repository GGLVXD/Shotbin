<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-header.header></x-header.header>
<h1>{{ $file->name }} | {{ \App\Models\Files::formatFileSize($file) }}</h1>
<a href="/view/{{ $file->url_id }}/download">
    <button>Download</button>
</a>
</body>
</html>