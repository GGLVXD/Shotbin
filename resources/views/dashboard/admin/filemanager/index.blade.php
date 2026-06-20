
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Files</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-dashboard.admin.navbar>
        <x-dashboard.admin.filelist :files="$files"></x-dashboard.admin.filelist>
    </x-dashboard.admin.navbar>
    <script src="/js/showprofilemenu.js"></script>
</body>
</html>