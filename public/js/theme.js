$(document.body).css("--primary-color", sessionStorage.getItem('bg'));
$(document.body).css('--secondary-color', sessionStorage.getItem('cc'));

$(".header--theme-button").on("click", function() {
    var primaryColor = $(this).css("--theme-primary");
    var secondaryColor = $(this).css("--theme-secondary");
    primaryColor = sessionStorage.setItem('bg', primaryColor);
    secondaryColor = sessionStorage.setItem('cc', secondaryColor);


    $(".header--theme-button").removeClass("active");
    $(this).addClass("active");

    if (sessionStorage.getItem('bg') === primaryColor) {
        sessionStorage.setItem('bg', primaryColor);
        sessionStorage.setItem('cc', secondaryColor);
    }

    $(document.body).css("--primary-color", sessionStorage.getItem('bg'));
    $(document.body).css('--secondary-color', sessionStorage.getItem('cc'));

});

