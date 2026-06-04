<!DOCTYPE html>
<html data-theme="light">
<head>
    <title>Laravel File Upload</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-header></x-header>
    <h2>Upload a File</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        <p>File Path: {{ session('file') }}</p>
    @endif

    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data" class="fieldset">
        @csrf
        <input type="file" name="file" class="file-input">
        <button type="submit">Upload</button>
    </form>

    @error('file')
        <p style="color: red;">{{ $message }}</p>
    @enderror
</body>
</html>