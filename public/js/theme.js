$(".header--theme-button").on("click", function() {
    var primaryColor = $(this).css("--theme-primary");
    var secondaryColor = $(this).css("--theme-secondary");
    localStorage.primary = primaryColor;
    localStorage.second = secondaryColor;


    $(".header--theme-button").removeClass("active");
    $(this).addClass("active");


    if (typeof(Storage) !== "undefined") {
        $(document.body).css("--primary-color", localStorage.primary);
        $(document.body).css("--secondary-color", localStorage.second);
    } else {
        $(document.body).css("--primary-color", primaryColor);
        $(document.body).css("--secondary-color", secondaryColor);
    }
});

