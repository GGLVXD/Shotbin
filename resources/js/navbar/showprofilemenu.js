function showProfileMenu() {
    const menu = document.getElementById("menu");

    const isHidden = menu.style.display === "none" || menu.style.display === "";

    menu.style.display = isHidden ? "block" : "none";
}

window.showProfileMenu = showProfileMenu;