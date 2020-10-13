let modalPrice = document.body.querySelector('.modal__price');
console.log(modalPrice)
const priceModal = new Modal(`
    <form method="post" id="price-form" class="modal__callback">
    <input type="hidden" name="project_name" value="Механик">
    <input type="hidden" name="admin_email" value="director@mehanic-lift.ru">
    <input type="hidden" name="form_subject" value="Стоимость">
    <input type="hidden" name="product" value="<?php echo $productItems['name'] ?>">
    <input type="hidden" name="articul" value="<?php echo $productItems['articul'] ?>">
    <input placeholder="Ваше имя.." type="text" name="name" class="modal__input modal__input-inner">
    <input placeholder="Ваш телефон или почта.." type="text" name="phoneOrEmail" class="modal__input modal__input-inner">
    <input class="search-form__button search-form__button-inner" type="submit" value="Запросить..">
    </form>`);

modalPrice.addEventListener('click', () => createModal(priceModal))
