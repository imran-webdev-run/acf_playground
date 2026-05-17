jQuery(document).ready(function ($) {

    $('.carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 3000,
        centerMode: true,
    });

    $('.slide').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 3000,
    });

    // $(".accordion-item").first().addClass("active");

    $(".accordion-item").on("click", function () {

        $(".accordion-item").removeClass("active"); 
        $(this).addClass("active"); 
        });
    

});

