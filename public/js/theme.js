$(document.body).css("--primary-color", sessionStorage.getItem('bg'));
$(document.body).css('--secondary-color', sessionStorage.getItem('cc'));


sessionStorage.getItem('current');
$(".header--theme-button").on("click", function() {
    var primaryColor = $(this).css("--theme-primary");
    var secondaryColor = $(this).css("--theme-secondary");
    primaryColor = sessionStorage.setItem('bg', primaryColor);
    secondaryColor = sessionStorage.setItem('cc', secondaryColor);

    if (sessionStorage.getItem('bg') === primaryColor) {
        sessionStorage.setItem('bg', primaryColor);
        sessionStorage.setItem('cc', secondaryColor);
    }
    let current = $(this).attr('class').toString();

    $('.set-' + current).each(item => {
        $(item).addClass('active');
        sessionStorage.setItem('current', current);
    });

    $(document.body).css("--primary-color", sessionStorage.getItem('bg'));
    $(document.body).css('--secondary-color', sessionStorage.getItem('cc'));

});

