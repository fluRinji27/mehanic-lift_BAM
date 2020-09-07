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

// Анимация звона колокольчика в кнопке обратной связи
let callbackButton = document.querySelector('.callback');
let callbackImage = document.querySelector('.callback__img');
const animateBell = () => {
    callbackImage.style.animationName = 'icon-bell';
    callbackImage.style.animationDuration = '1s';
    callbackImage.style.animationTimingFunction = 'linear';
    callbackImage.style.animationIterationCount = '1';
    console.log('hover')
};

callbackButton.addEventListener('mouseenter', animateBell);

const searchIcon = document.body.querySelector('.search');
const menuButton = document.body.querySelector('.drop-menu');
let modalState = false;


const callbackModal = new Modal(`
    <form action="/callback" method="post" class="modal__callback">
    <input placeholder="Ваше имя.." type="text" name="name" class="modal__input">
    <input class="search-form__button search-form__button-inner" type="submit" value="Найти">
    </form>`);


searchIcon.addEventListener('click', () => createModal(searchModal));
menuButton.addEventListener('click', () => createModal(menuModal));

