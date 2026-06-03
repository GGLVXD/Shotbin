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
        <x-dashboard.filelist></x-dashboard.filelist>
    </x-dashboard.navbar>
    <script src="/js/showprofilemenu.js"></script>
</body>
</html>