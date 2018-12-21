$(".header--theme-button").on("click", function() {
    var primaryColor = $(this).css("--theme-primary");
    var secondaryColor = $(this).css("--theme-secondary");


    $(".header--theme-button").removeClass("active");
    $(this).addClass("active");

    $(document.body).css("--primary-color", primaryColor);
    $(document.body).css("--secondary-color", secondaryColor);
});

localStorage.setItem('primaryCol', primaryColor);
localStorage.setItem('secondCol', secondaryColor);
console.log('nuggest');