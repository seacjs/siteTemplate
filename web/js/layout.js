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

    var owl = $('#exampleCarousel');
    $(document).on('click','.example-arrows .review-carousel-arrow-right', function() {
        owl.trigger('prev.owl.carousel');
    });
    $(document).on('click', '.example-arrows .review-carousel-arrow-left', function() {
        owl.trigger('next.owl.carousel');
    });

    var owl2 = $('#reviewCarousel');
    $(document).on('click','.review-arrows .review-carousel-arrow-right', function() {
        owl2.trigger('prev.owl.carousel');
    });
    $(document).on('click', '.review-arrows .review-carousel-arrow-left', function() {
        owl2.trigger('next.owl.carousel');
    });

    // top menu dropdown

    $(document).on('mouseenter', '.dropdown', function() {
        $(this).addClass('open');
    });
    $(document).on('mouseleave', '.dropdown', function() {
        $(this).removeClass('open');
    });






    // var owl = $('#w0');
    //
    // $('.arrow-left-doctor').on('click', function() {
    //     console.log('1');owl.trigger('next.owl.carousel');
    // });
    // $('.arrow-right-doctor').on('click', function() {
    //     console.log('2');owl.trigger('prev.owl.carousel');
    // });
    //



});
