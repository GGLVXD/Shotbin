@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="navbar bg-base-100 shadow-sm">
  <div class="navbar-start">
    <a href="/" class="btn btn-ghost text-xl">Shotbin</a>
  </div>
  <div class="navbar-end">
    <a class="btn mr-10" href="/upload">
      <img src="/icons/upload.png" alt="Upload" class="h-5 w-5" />
      <span class="hidden sm:inline">Upload</span>
    </a>
    @if(auth()->user())
      <x-header.profile></x-header.profile>
    @endif
    @if(!auth()->user())
    <a class="btn mr-2" href="/signup">Register</a>
    <a class="btn" href="/signin">Login</a>
    @endif
  </div>
</div>