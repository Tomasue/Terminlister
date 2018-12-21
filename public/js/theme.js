$(".header--theme-button").on("click", function() {
    var primaryColor = $(this).css("--theme-primary");
    var secondaryColor = $(this).css("--theme-secondary");
    localStorage.setItem('prime', primaryColor);
    localStorage.setItem('second', secondaryColor);
    console.log('nuggest');

    $(".header--theme-button").removeClass("active");
    $(this).addClass("active");
    

    if (localStorage.getItem('prime')) {
        $(document.body).css("--primary-color", localStorage.getItem('prime'));
        $(document.body).css("--secondary-color", localStorage.getItem('second'));
    } else {
        $(document.body).css("--primary-color", primaryColor);
        $(document.body).css("--secondary-color", secondaryColor);
    }
});

