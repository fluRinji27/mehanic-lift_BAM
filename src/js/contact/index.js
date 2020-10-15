var myMap;

// Дождёмся загрузки API и готовности DOM.
ymaps.ready(init);

function init() {
    // Создание экземпляра карты и его привязка к контейнеру с
    // заданным id ("map").
    myMap = new ymaps.Map('map', {
        // При инициализации карты обязательно нужно указать
        // её центр и коэффициент масштабирования.
        center: [55.794953, 37.737515], // Москва
        zoom: 10,
        controls: ['smallMapDefaultSet']
    }, {
        searchControlProvider: 'yandex#search'
    });


    var myPlacemark = new ymaps.Placemark([55.794953, 37.737515], {}, {
        iconLayout: 'default#image',
        iconImageHref: '../../template/img/contact/map_placemark.svg',
        iconImageSize: [35, 35],
        iconImageOffset: [-40, 0]
    });
    myMap.geoObjects.add(myPlacemark);

}

