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


    var owl = $('#w0');

    $('.arrow-left-doctor').on('click', function() {
        console.log('1');owl.trigger('next.owl.carousel');
    });
    $('.arrow-right-doctor').on('click', function() {
        console.log('2');owl.trigger('prev.owl.carousel');
    });

    var owl2 = $('#w1');
    $('.arrow-left-review').on('click', function() {
        console.log('11');owl2.trigger('next.owl.carousel');
    });
    $('.arrow-right-review').on('click', function() {
        console.log('22');owl2.trigger('prev.owl.carousel');
    });


});
