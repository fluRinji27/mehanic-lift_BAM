// Анимация навигации в подвале
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

// Анимация звона колокольчика
const animateBell = () => {
    callbackImage.style.animationName = 'icon-bell';
    callbackImage.style.animationDuration = '1s';
    callbackImage.style.animationTimingFunction = 'linear';
    callbackImage.style.animationIterationCount = '1';
    setTimeout(() => {
        callbackImage.style.animation = 'none';
    }, 1001)

};

callbackButton.addEventListener('mouseenter', animateBell);

const callbackModal = new Modal(`
    <form action="/callback" method="post" class="modal__callback">
    <input placeholder="Ваше имя.." type="text" name="name" class="modal__input modal__input-inner">
    <input placeholder="Ваш телефон или почта.." type="text" name="phoneOrEmail" class="modal__input modal__input-inner">
    <textarea placeholder="Ваш вопрос.." class="modal__textarea modal__input-inner" name="message" ></textarea>
    <input class="search-form__button search-form__button-inner" type="submit" value="Отправить">
    </form>`);


callbackButton.addEventListener('click', () => createModal(callbackModal));

