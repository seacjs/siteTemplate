$(document).ready(function(){

    $(".go-to-form").click(function() {
        $('html, body').animate({
            scrollTop: $(".callback-block").offset().top
        }, 500);
    });

    $('.navbar-nav a').click(function() {
        var href = $(this).attr('href');
        $('html, body').stop().animate({
            scrollTop: $(href).offset().top - 70
        }, 500);

        if($('.navbar-toggle').css('display') != 'none') {
            $('.navbar-toggle').click();
        }
    });

    // $("#phone").mask("(999) 999-9999");

});
