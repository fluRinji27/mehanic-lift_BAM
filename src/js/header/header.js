const searchIcon = document.body.querySelector('.search');
const menuButton = document.body.querySelector('.drop-menu');


const searchModal = new Modal(`
    <form action="/catalog/search" method="post" class="modal__search-form">
    <input placeholder="Ведите артикул или наименование..." type="text" name="search" class="modal__input modal__input-inner">
    <input class="search-form__button search-form__button-inner" type="submit" value="Найти">
    </form>`);

const menuModal = new Modal(`<nav class="navigation">
        <ul class="nav-list owl-carousel__footer nav-list_theme_modal">
            <li class="nav-list__item footer__inner">
                <a href="#" class="nav-list__link">
                    продукция
                </a>
            </li>
            <li class="nav-list__item footer__inner">
                <a href="#" class="nav-list__link">
                    комплектующие
                </a>
            </li>
            <li class="nav-list__item footer__inner">
                <a href="#" class="nav-list__link">
                    о компании
                </a>
            </li>
            <li class="nav-list__item footer__inner">
                <a href="#" class="nav-list__link">
                    услуги
                </a>
            </li>
            <li class="nav-list__item footer__inner">
                <a href="#" class="nav-list__link">
                    стоимость
                </a>
            </li>
            <li class="nav-list__item footer__inner">
                <a href="#" class="nav-list__link">
                    проекты
                </a>
            </li>
            <li class="nav-list__item footer__inner">
                <a href="#" class="nav-list__link">
                    контакты
                </a>
            </li>
        </ul>
    </nav>`);

searchIcon.addEventListener('click', () => createModal(searchModal));
menuButton.addEventListener('click', () => createModal(menuModal));


const animateHeaderTitle = () => {
    firstTitle.innerText = '';
    secondTitle.innerText = '';
    setTimeout(() => {
        renderText(firstTitleText, '.first_title');
        setTimeout(() => renderText(secondTitleText, '.second_title'), 1300)
    }, 1000)

};
const animateHeaderLogo = () => {
    const logo = document.querySelector('.header__logo');
    logo.style.position = 'relative';
    logo.style.animationName = 'animationBottomToTop';
    logo.style.animationDuration = '1.5s';
}

window.onload = () => {

    document.body.classList.add('loaded_hiding');
    window.setTimeout(function () {
        document.body.classList.add('loaded');
        document.body.classList.remove('loaded_hiding');
    }, 500);
    animateHeaderLogo();
    setTimeout(() => animateHeaderTitle(), 1500)
}




