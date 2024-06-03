let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let sideContent = document.querySelector("#sideContent");

closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    sideContent.classList.toggle("open");
    menuBtnChange();
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        btn.innerText = "menu_open"; // mengganti teks menjadi "menu"
    } else {
        btn.innerText = "menu"; // mengganti teks menjadi "menu"
    }
}
