function Modal(body) {
    this.body = body;
}

Modal.prototype.createModal = function () {
    // Создаем блок модального окна
    let modal = document.createElement('div');

    // Создаем шапку модального окна
    let modalHeader = document.createElement('div');

    // Создаем тело модального окна
    let modalBody = document.createElement('div');

    // Создаем подвал модального окна

    // Создаем кнопку закрытия модального окна
    let closeBtn = document.createElement('button');

    // Присваиваем класс блоку модального окна
    modal.classList.add('modal');
    modal.classList.add('modal_theme_light');
    // Присваиваем класс шапке модального окна
    modalHeader.classList.add('modal__header');

    // Присваиваем класс телу модального окна
    modalBody.classList.add('modal__body');

    // Присваиваем класс кнопке закрытия модального окна
    closeBtn.classList.add('modal__close-btn');


    // Добавляем в кнопку закртия модального окна знак Х
    closeBtn.insertAdjacentText('afterbegin', 'X');

    // Добавлям в шапку модального окна кнопку закрытия
    modalHeader.insertAdjacentElement('afterbegin', closeBtn);

    // Добавляем в блок элементы модального окна
    modal.insertAdjacentElement('afterbegin', modalBody);
    modal.insertAdjacentElement('afterbegin', modalHeader);

    // Вставляем в элементы модального окна верстку
    modalBody.insertAdjacentHTML("afterbegin", this.body);

    document.body.insertAdjacentElement('afterbegin', modal);

    return true
};

Modal.prototype.destroyModal = () => {
    let modal = document.querySelector('.modal');
    modal.style.animation = 'animationTopToBottom 1s ease-in-out';
    setTimeout(() => modal.remove(), 1000);


    return true
};

let modalState = false;

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