$(document.body).css("--primary-color", localStorage.getItem('bg'));
$(document.body).css('--secondary-color', localStorage.getItem('cc'));

$(".header--theme-button").on("click", function() {
    var primaryColor = $(this).css("--theme-primary");
    var secondaryColor = $(this).css("--theme-secondary");
    primaryColor = localStorage.setItem('bg', primaryColor);
    secondaryColor = localStorage.setItem('cc', secondaryColor);


    $(".header--theme-button").removeClass("active");
    $(this).addClass("active");

    if (localStorage.getItem('bg') === primaryColor) {
        localStorage.setItem('bg', primaryColor);
        localStorage.setItem('cc', secondaryColor);
    }

    $(document.body).css("--primary-color", localStorage.getItem('bg'));
    $(document.body).css('--secondary-color', localStorage.getItem('cc'));

});

