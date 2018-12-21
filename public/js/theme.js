$(document.body).css("--primary-color", sessionStorage.getItem('bg'));
$(document.body).css('--secondary-color', sessionStorage.getItem('cc'));
sessionStorage.getItem('current');
$(".header--theme-button").on("click", function() {
    var primaryColor = $(this).css("--theme-primary");
    var secondaryColor = $(this).css("--theme-secondary");
    primaryColor = sessionStorage.setItem('bg', primaryColor);
    secondaryColor = sessionStorage.setItem('cc', secondaryColor);



    $(".header--theme-button").removeClass("active");
    $(this).addClass("active");
    let test = $(this).classList.contains('set');
    console.log(test);
    let current = sessionStorage.getItem('current');
    current = sessionStorage.setItem('current', selected);
    $('.set-' + current).each(item => {
        $(item).addClass('active');
    });


        if (sessionStorage.getItem('bg') === primaryColor) {
            sessionStorage.setItem('bg', primaryColor);
            sessionStorage.setItem('cc', secondaryColor);
        }

    $(document.body).css("--primary-color", sessionStorage.getItem('bg'));
    $(document.body).css('--secondary-color', sessionStorage.getItem('cc'));

});

