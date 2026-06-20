<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-dashboard.admin.navbar>
    <div class="p-6 space-y-6">

        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold">
                Hello, Adminstrator!
            </h1>
        </div>

        @php
            $userId = Auth::user()->id;

            $totalFiles = \App\Models\Files::get()->count();

            $totalSizeBytes = \App\Models\Files::get()->sum('size');

            $totalUsers = \App\Models\User::get()->count();

            $totalSizeGB = number_format($totalSizeBytes / 1024 / 1024 / 1024, 2);
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

            <!-- Files -->
            <div class="bg-white rounded-xl shadow-sm border-l-4 border-blue-500 p-5 flex items-center gap-4">
                <div class="text-blue-500 text-3xl"><img height="32px" width="32px" src="/icons/file.png"></img></div>
                <div>
                    <div class="text-sm text-gray-500 uppercase">Total Files</div>
                    <div class="text-2xl font-bold">{{ $totalFiles }}</div>
                </div>
            </div>


            <!-- Storage -->
            <div class="bg-white rounded-xl shadow-sm border-l-4 border-blue-500 p-5 flex items-center gap-4">
                <div class="text-blue-500 text-3xl"><img height="32px" width="32px" src="/icons/database.png"></img></div>
                <div>
                    <div class="text-sm text-gray-500 uppercase">Storage Used</div>
                    <div class="text-2xl font-bold">{{ $totalSizeGB }} GB</div>
                </div>
            </div>

            <!-- Users -->
            <div class="bg-white rounded-xl shadow-sm border-l-4 border-blue-500 p-5 flex items-center gap-4">
                <div class="text-blue-500 text-3xl"><img height="32px" width="32px" src="/icons/user.png"></img></div>
                <div>
                    <div class="text-sm text-gray-500 uppercase">Users</div>
                    <div class="text-2xl font-bold">{{ $totalUsers }}</div>
                </div>
            </div>

        </div>

    </div>
</x-dashboard.admin.navbar>
    <script src="/js/showprofilemenu.js"></script>
</body>
</html>