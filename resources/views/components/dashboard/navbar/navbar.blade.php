<!-- Navbar -->
<div class="drawer lg:drawer-open">
  <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">
    <nav class="navbar w-full bg-base-300">
      <label for="my-drawer-4" aria-label="open sidebar" class="btn btn-square btn-ghost">
        <!-- Sidebar toggle icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" class="my-1.5 inline-block size-4"><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M9 4v16"></path><path d="M14 10l2 2l-2 2"></path></svg>
      </label>
      <!-- Profile avatar/icon -->
      <div onclick="shwwwowProfileMenu()" style="cursor: pointer;" class="avatar top-0 right-0 absolute mt-2 mr-2">
        <div class="w-12 rounded-full object-center justify-center items-center">
          <img src="https://img.daisyui.com/images/profile/demo/yellingcat@192.webp" height="32" width="32" />
        </div>
      </div>
      <div style="display:none" id="menu">
        <ul class="menu bg-base-200 rounded-box w-56">
          <li class="menu-title">Title</li>
          <li><a>Item 1</a></li>
          <li><a>Item 2</a></li>
          <li><a>Item 3</a></li>
        </ul>
      </div>
    </nav>
    <div class="p-4">
      {{ $slot }}
    </div>
  </div>
  <x-dashboard.sidebar />
</div>