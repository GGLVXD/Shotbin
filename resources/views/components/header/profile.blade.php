<div onclick="showProfileMenu()"
        class="avatar cursor-pointer mt-2 mr-2">
    <div class="w-12 rounded-full">
    <img src="https://img.daisyui.com/images/profile/demo/yellingcat@192.webp" />
    </div>
</div>
        <div id="menu" class="hidden absolute right-0 top-full mt-1 mr-2 z-50">
    <ul class="menu bg-base-200 rounded-box w-56 shadow-lg">
    <button><li><a href="/dashboard">Dashboard</a></li></button>
    <form action="/signout" method="POST">
        <button><li><a>Logout</a></li></button>
    </form>
    </ul>
</div>