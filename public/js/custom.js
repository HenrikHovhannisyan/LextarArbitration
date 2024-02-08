document.addEventListener('DOMContentLoaded', function() {
    let rulesTab = document.getElementById('arbitration-rules');
    let formsTab = document.getElementById('arbitration-forms');
    let rulesContent = document.getElementById('arbitration-rules-content');
    let formsContent = document.getElementById('arbitration-forms-content');

    formsTab.addEventListener('click', function() {
        rulesContent.classList.add('d-none');
        formsContent.classList.remove('d-none');

        rulesTab.classList.remove('active');
        formsTab.classList.add('active');
    });

    rulesTab.addEventListener('click', function() {
        formsContent.classList.add('d-none');
        rulesContent.classList.remove('d-none');

        formsTab.classList.remove('active');
        rulesTab.classList.add('active');
    });

});
