<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- part of navbar monstrocity -->
    <!-- Navbar -->
    <x-dashboard.navbar>
    <x-dashboard.filelist></x-dashboard.filelist>
    </x-dashboard.navbar>
  <!-- part of navbar monstrocity -->
  </div>
  <!-- Sidebar -->
  <x-dashboard.sidebar></x-dashboard.sidebar>
</div>
</body>
</html>