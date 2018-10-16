let eventadd = document.getElementById('eventform');
let btn = document.getElementById('addevent');



btn.addEventListener('click', function () {
    if (eventadd.classList.contains('hidden')) {
        eventadd.classList.replace('hidden', 'show');
    } else {
        eventadd.classList.replace('show', 'hidden');
    }
});