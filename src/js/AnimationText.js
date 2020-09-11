let firstTitle = document.body.querySelector('.first_title');
let secondTitle = document.body.querySelector('.second_title');

const splitText = text => {
    let innerText = text.innerHTML;
    console.log('innerText', innerText);
    return innerText.split('')
};

const firstTitleText = splitText(firstTitle);
const secondTitleText = splitText(secondTitle);

const renderText = (text, div) => {

    const elementInBody = document.body.querySelector(div);
    for (let i = 0; i < text.length; i++) {
        setTimeout(() => {
            elementInBody.insertAdjacentHTML('beforeend', `${text[i]}`);
            console.log(text[i])
        }, 75 * i)
    }
};

let foo = () => {
    firstTitle.innerText = '';
    secondTitle.innerText = '';
    setTimeout(() => {
        renderText(firstTitleText, '.first_title');
        setTimeout(() => renderText(secondTitleText, '.second_title'), 1300)
    }, 1000)

};
foo();




