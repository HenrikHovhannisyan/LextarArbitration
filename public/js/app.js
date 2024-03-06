
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
    // Function to show/hide password
    $("#showPassword").click(function () {
        $("#password").attr("type", "text");
        $("#showPassword").addClass("d-none");
        $("#hidePassword").removeClass("d-none");
    });

    $("#hidePassword").click(function () {
        $("#password").attr("type", "password");
        $("#hidePassword").addClass("d-none");
        $("#showPassword").removeClass("d-none");
    });

    // Function to show/hide confirm password
    $("#showConfirmPassword").click(function () {
        $("#confirm_password").attr("type", "text");
        $("#showConfirmPassword").addClass("d-none");
        $("#hideConfirmPassword").removeClass("d-none");
    });

    $("#hideConfirmPassword").click(function () {
        $("#confirm_password").attr("type", "password");
        $("#hideConfirmPassword").addClass("d-none");
        $("#showConfirmPassword").removeClass("d-none");
    });
});






let currentStep = 1;
const form = document.getElementById("multiStepForm");

function nextStep(step) {
    document.getElementById(`step${step}`).classList.add('d-none');
    document.getElementById(`step${step + 1}`).classList.remove('d-none');
    currentStep = step + 1;
}

function prevStep(step) {
    document.getElementById(`step${step}`).classList.add('d-none');
    document.getElementById(`step${step - 1}`).classList.remove('d-none');
    currentStep = step - 1;
}

form.addEventListener("submit", function(e) {
    e.preventDefault();
    // You can add form submission logic here
    // For demonstration, we'll just show an alert
    alert("Registration submitted successfully!");
});



