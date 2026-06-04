<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $file->name }} - Shotbin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    <x-header.header></x-header.header>

    <main class="max-w-3xl mx-auto px-4 py-8">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
            <h1 class="text-2xl font-semibold text-gray-900 break-all">
                {{ $file->name }}
            </h1>

            <div class="mt-6 space-y-3">
                <div class="flex justify-between border-b border-gray-100 pb-2">
                    <span class="text-gray-500">File Size</span>
                    <span class="font-medium text-gray-900">
                        {{ \App\Models\Files::formatFileSize($file) }}
                    </span>
                </div>

                @if(isset($file->created_at))
                <div class="flex justify-between border-b border-gray-100 pb-2">
                    <span class="text-gray-500">Uploaded</span>
                    <span class="font-medium text-gray-900">
                        {{ $file->created_at->format('d M Y H:i') }}
                    </span>
                </div>
                @endif

                <div class="flex justify-between">
                    <span class="text-gray-500">File ID</span>
                    <span class="font-medium text-gray-900">
                        {{ $file->url_id }}
                    </span>
                </div>
            </div>

            <div class="mt-8">
                <a href="/view/{{ $file->url_id }}/download" class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Download File
                </a>
            </div>
        </div>
    </main>
</body>
</html>