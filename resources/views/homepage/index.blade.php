<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shotbin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <x-header></x-header>

    <main class="max-w-4xl mx-auto px-6 py-20 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            Simple File Sharing
        </h1>

        <p class="text-lg text-gray-600 mb-8">
            Shotbin is an easy to use file sharing service. Upload files,
            share a link instantly, and access your content from anywhere.
            No unnecessary complexity — just fast and simple file sharing.
        </p>

        <div class="flex justify-center gap-4">
            <a href="/upload" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"> Upload File</a>
        </div>
    </main>
</body>
</html>