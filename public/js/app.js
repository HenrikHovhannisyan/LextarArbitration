document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("menu-toggle").addEventListener("click", function(e) {
        e.preventDefault();
        const wrapper = document.getElementById("wrapper");
        wrapper.classList.toggle("toggled");
    });
});

