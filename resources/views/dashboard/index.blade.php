<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- Navbar -->
    <x-dashboard.navbar>
    <!-- Page content -->
    <div class="p-4">
      Welcome {{ Auth::user()->name }}
    </div>
  </x-dashboard.navbar>
  <!-- part of navbar monstrocity -->
  <!-- Sidebar -->
  <x-dashboard.sidebar></x-dashboard.sidebar>
</body>
</html>