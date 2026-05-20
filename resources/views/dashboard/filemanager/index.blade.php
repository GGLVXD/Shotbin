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
    <div class="drawer lg:drawer-open">
  <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
    <!-- Navbar -->
    <x-dashboard.navbar></x-dashboard.navbar>
    <!-- Page content -->
    <x-dashboard.filelist></x-dashboard.filelist>
  <!-- part of navbar monstrocity -->
  </div>
  <!-- Sidebar -->
  <x-dashboard.sidebar></x-dashboard.sidebar>
</div>
</body>
</html>