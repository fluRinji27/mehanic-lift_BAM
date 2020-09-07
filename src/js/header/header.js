const searchIcon = document.body.querySelector('.search');
const menuButton = document.body.querySelector('.drop-menu');
let modalState = false;


const searchModal = new Modal(`
    <form action="/catalog/search" method="post" class="modal__search-form">
    <input placeholder="Ведите артикул или наименование..." type="text" name="search" class="modal__input search-form__input-inner">
    <input class="search-form__button search-form__button-inner" type="submit" value="Найти">
    </form>`);

const menuModal = new Modal(`    <nav class="navigation">
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

const createModal = body => {
    if (!modalState) {
        modalState = true;

        body.createModal();

        let modalCloseBtn = document.body.querySelector('.modal__close-btn');

        modalCloseBtn.addEventListener('click', () => {
            body.destroyModal();
            modalState = false;
        })
    }
}


searchIcon.addEventListener('click', () => createModal(searchModal));
menuButton.addEventListener('click', () => createModal(menuModal));
