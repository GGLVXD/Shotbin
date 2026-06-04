<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-dashboard.navbar>
        Welcome {{ Auth::user()->name }} <br>
        <div class="w-32 h-16 box">
            Total files: {{ \App\Models\Files::countTotal(Auth::user()->id) }}
        </div>
    </x-dashboard.navbar>
    <script src="/js/showprofilemenu.js"></script>
</body>
</html>