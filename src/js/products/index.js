// Продукция
$(function () {
    let owl = $(".owl-carousel__products");
    owl.owlCarousel({
        items: 4,
        loop: true,
        dots: false,
        autoWidth: false,
        autoplay: true,
        mergeFit: true,
        mouseDrag: true,
        touchDrag: true,
        autoplayTimeout: 3500,
        smartSpeed: 5500,
        slideTransition: 'linear',
        autoplayHoverPause: true,
        responsive: {
            320: {
                items: 1,
                smartSpeed: 2500,
                autoplayTimeout: 2500,
            },
            480: {
                items: 1,
                smartSpeed: 2500,
                autoplayTimeout: 2500,
            },
            // breakpoint from 768 up
            768: {
                items: 2,
                smartSpeed: 2500,
                autoplayTimeout: 2500,
            },
            800: {
                items: 3
            },
            1024: {
                items: 3
            },
            1280: {
                items: 3
            },
            1366: {
                items: 4
            }
        }

    });
});