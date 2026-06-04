<!-- Navbar -->
<div class="drawer lg:drawer-open">
  <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />

  <div class="drawer-content">
    <nav class="navbar w-full bg-base-300 relative">

      <!-- Sidebar toggle -->
      <label for="my-drawer-4" aria-label="open sidebar" class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-linejoin="round"
          stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"
          class="my-1.5 inline-block size-4">
          <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
          <path d="M9 4v16"></path>
          <path d="M14 10l2 2l-2 2"></path>
        </svg>
      </label>

      <!-- Profile wrapper -->
      <div class="relative ml-auto">

        <!-- Avatar -->
        <div onclick="showProfileMenu()"
             class="avatar cursor-pointer mt-2 mr-2">
          <div class="w-12 rounded-full">
            <img src="https://img.daisyui.com/images/profile/demo/yellingcat@192.webp" />
          </div>
        </div>

        <!-- Dropdown menu -->
        <div id="menu" class="hidden absolute right-0 top-full mt-1 mr-2 z-50">
          <ul class="menu bg-base-200 rounded-box w-56 shadow-lg">
            <li><a>Profile</a></li>
            <form action="/signout" method="POST">
              <button><li><a>Logout</a></li></button>
            </form>
          </ul>
        </div>

      </div>
    </nav>

    <div class="p-4">
      {{ $slot }}
    </div>
  </div>

  <x-dashboard.sidebar />
</div>
