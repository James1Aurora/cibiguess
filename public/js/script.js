var hamburger = document.getElementById("hamburger-btn");
var mobileMenu = document.getElementById("navbar-hamburger");

hamburger.addEventListener("click", function () {
    if (mobileMenu.classList.contains("hidden")) {
        mobileMenu.classList.remove("hidden");
        mobileMenu.classList.add("block");
    } else {
        mobileMenu.classList.remove("block");
        mobileMenu.classList.add("hidden");
    }
});
