document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("menu-toggle").addEventListener("click", function(e) {
        e.preventDefault();
        const wrapper = document.getElementById("wrapper");
        wrapper.classList.toggle("toggled");
    });
});



$(document).ready(function() {
    $("#show").click(function() {
        $("#password").attr("type", "text");
        $("#show").addClass("d-none");
        $("#hide").removeClass("d-none");
    });

    $("#hide").click(function() {
        $("#password").attr("type", "password");
        $("#hide").addClass("d-none");
        $("#show").removeClass("d-none");
    });
});

