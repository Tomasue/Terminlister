$(".header--theme-button").on("click", function() {
    var primaryColor = $(this).css("--theme-primary");
    var secondaryColor = $(this).css("--theme-secondary");
    let theme = document.getElementsByClassName('active');
    localStorage.setItem('theme', theme);


    $(".header--theme-button").removeClass("active");
    $(this).addClass("active");


    if (typeof(Storage) !== "undefined") {
        $(document.body).css("--primary-color, --secondary-color", localStorage.theme);
    } 
});

