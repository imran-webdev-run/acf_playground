jQuery(document).ready(function ($) {

    function initClientSlider() {
        if ($(window).width() <= 768) {

            if (!$('.community-clients-logos').hasClass('slick-initialized')) {

                $('.community-clients-logos')
                    .addClass('mobile-slider')
                    .slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false,
                        infinite: true,
                        autoplay: true,
						centerMode: true,
    					centerPadding: '0px'
                    });
            }

        } else {

            if ($('.community-clients-logos').hasClass('slick-initialized')) {
                $('.community-clients-logos').slick('unslick');
                $('.community-clients-logos').removeClass('mobile-slider');
            }

        }
    }

    initClientSlider();

    $(window).on('resize', function () {
        initClientSlider();
    });

    $('.post-carousel').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        infinite: true,
        autoplay: true,
        prevArrow: $('.carousel-prev'),
        nextArrow: $('.carousel-next'),
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    autoplay: true,
                    centerMode: true,
                    centerPadding: '0px'
                }
            }
        ]
    });

});





document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll(".wellbeing-card");

  if (cards.length === 0) return;
  
  const isMobile = window.innerWidth <= 768; 
  if (isMobile) return;


  function setDynamicHeight(card) {
    const img = card.querySelector(".wellbeing-card-image-wrapper");
    const content = card.querySelector(".wellbeing-card-content");

    if (!img || !content) return;

    const height = img.offsetHeight;

    content.style.setProperty("--img-height", `${height}px`);
  }

  // set height for all cards
  cards.forEach(card => {
    setDynamicHeight(card);
  });
  

  // middle detect
  const middleIndex = Math.floor(cards.length / 2);
  const middleImage = cards[middleIndex].querySelector(".wellbeing-card-image-wrapper");
  const middleContent = cards[middleIndex].querySelector(".wellbeing-card-content");

  // default active
  middleImage.classList.add("active");
  middleContent.classList.add("active");

  cards.forEach(card => {
    card.addEventListener("mouseenter", () => {
      const img = card.querySelector(".wellbeing-card-image-wrapper");
      const content = card.querySelector(".wellbeing-card-content");

      middleImage.classList.remove("active");
      middleContent.classList.remove("active");
    });

    card.addEventListener("mouseleave", () => {
      const img = card.querySelector(".wellbeing-card-image-wrapper");
      const content = card.querySelector(".wellbeing-card-content");

      middleImage.classList.add("active");
      middleContent.classList.add("active");
    });
  });
});