$(".header--theme-button").on("click", function() {

    
    $(".header--theme-button").removeClass("active");
    $(this).addClass("active");

    var primaryColor = $(this).css("--theme-primary");
    var secondaryColor = $(this).css("--theme-secondary");
    primaryColor = sessionStorage.setItem('bg', primaryColor);
    secondaryColor = sessionStorage.setItem('cc', secondaryColor);

        if (sessionStorage.getItem('bg') === primaryColor) {
            sessionStorage.setItem('bg', primaryColor);
            sessionStorage.setItem('cc', secondaryColor);

        }
        else if (sessionStorage.getItem('bg') == null || undefined) {
            sessionStorage.setItem('bg', 'rgb(6, 23, 37)');
            sessionStorage.setItem('cc', '#777');
        }
    document.body.style.backgroundColor = sessionStorage.getItem('bg');
    document.body.style.color = sessionStorage.getItem('cc');

    $(document.body).css("--primary-color", primaryColor);
    $(document.body).css('--secondary-color', secondaryColor);

});

