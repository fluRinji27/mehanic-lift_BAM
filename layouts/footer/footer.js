// owl-carousel
$(function () {
    let owl = $(".owl-carousel__footer");
    owl.owlCarousel({
        items: 6,
        loop: true,
        dots: false,
        autoWidth: true,
        autoplay: true,
        mouseDrag: true,
        touchDrag: false,
        autoplayTimeout: 3500,
        smartSpeed: 5500,
        slideTransition: 'linear',
        autoplayHoverPause: true,

    });
});