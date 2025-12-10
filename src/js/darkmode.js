document.addEventListener("DOMContentLoaded", function() {
    darkMode();
});

function darkMode() {
    let mode = localStorage.getItem("mode");

    if (mode == "dark") {
        document.body.classList.add("dark-mode");
    }

    const darkmode_button = document.querySelector(".dark-mode-button");
    darkmode_button.addEventListener("click", function() {
        document.body.classList.toggle("dark-mode");
        mode = document.body.classList.contains("dark-mode") ? "dark" : "light";
        localStorage.setItem("mode", mode);
    });
}