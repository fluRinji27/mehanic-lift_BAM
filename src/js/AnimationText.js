let firstTitle = document.body.querySelector('.first_title');
let secondTitle = document.body.querySelector('.second_title');

const splitText = text => {
    let innerText = text.innerHTML;
    return innerText.split('')
};

const firstTitleText = splitText(firstTitle);
const secondTitleText = splitText(secondTitle);

const renderText = (text, div) => {
    const elementInBody = document.body.querySelector(div);
    for (let i = 0; i < text.length; i++) {
        setTimeout(() => {
            elementInBody.insertAdjacentHTML('beforeend', `${text[i]}`);
        }, 75 * i)
    }
};





