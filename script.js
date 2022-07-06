const menuButton = document.querySelector('nav span');
const menuElement = document.querySelector('nav ul');
const products = document.querySelectorAll('.product');
const swiperContainers = document.querySelectorAll('.swiper__container');
const productSwipers = document.querySelectorAll('.swiper__product');
const backdrop = document.querySelector('#backdrop');
const accordionsGate = document.querySelectorAll('.calculator__gates .calculator__accordion.gate .tile');
const addNewGateButton = document.querySelector('.calculator__gates .addButton');
const addNewSmallButton = document.querySelector('.calculator__smallGates .addButton');

let gatesArray = [];

/* FUNCTIONS */
const toggleMenu = () => {
    menuElement.classList.toggle('visible');

    if (menuElement.classList.contains('visible')) {
        menuButton.innerHTML = 'ZAVRIEŤ MENU'
    } else {
        menuButton.innerHTML = 'MENU'
    }
}

const toggleBackdrop = () => {
    backdrop.classList.toggle('visible');
}

const toggleSwiper = (order) => {
    productSwipers[order].closest('.swiper__container').classList.toggle('visible');
}

const hideBackdropAndSwipers = () => {
    swiperContainers.forEach((swiperContainer) => {
        swiperContainer.classList.remove('visible');
    })
    backdrop.classList.remove('visible');
}


/* LISTENERS */
menuButton.addEventListener('click', toggleMenu);
backdrop.addEventListener('click', hideBackdropAndSwipers);

products.forEach((product) => {
    product.querySelector('img').addEventListener('click', () => {

        let productOrder = Number(product.getAttribute('data-product'));

        if (productOrder <= productSwipers.length) {
            toggleBackdrop();
            toggleSwiper(productOrder - 1);
        }
    })
})

if (addNewGateButton != null) {
    addNewGateButton.addEventListener('click', () => {
        const containerGates = document.querySelector('.container__gates');
        let counter = 2;

        renderNewCalcElement(gatesArray.length, 'gate', uuidv4(), 'Brána', containerGates, deleteGateHandler);
    })
}

if (addNewSmallButton != null) {
    addNewSmallButton.addEventListener('click', () => {
        const containerSmallGates = document.querySelector('.container__smallGates');
        let counter = 2;
        renderNewCalcElement(gatesArray.length, 'smallGate', uuidv4(), 'Bránička', containerSmallGates, deleteSmallGateHandler);
    })
}

// accordionsGate.forEach((accordion, index, array) => {
//     if (index === array.length - 1) {
//         accordion.querySelector('h3').innerText = "Pridať Bránu"
//     }

//     accordion.addEventListener('click', event => {
//         console.log(gatesArray);
//         accordion.parentNode.remove();
//         const tile = accordion.parentElement;
//         const info = accordion.nextElementSibling;
//         const tileTitleText = accordion.querySelector('h3');

//         console.log(`index: ${index}`)
//         console.log(`array.length - 1: ${array.length - 1}`)

//         if (index !== array.length - 1) {
//             console.log('not last');
//             // const activeTile = document.querySelector('.calculator__accordion.active');
//             // console.log(activeTile);
//             // if (activeTile && activeTile !== tile) {
//             //     activeTile.classList.toggle('active');
//             //     activeTile.nextElementSibling.style.maxHeight = 0;
//             // }

//             tile.classList.toggle('active');
//             if (tile.classList.contains('active')) {
//                 info.style.maxHeight = info.scrollHeight + 15 + 'px';
//                 info.style.marginTop = "1rem";
//             } else {
//                 info.style.maxHeight = 0;
//                 info.style.marginTop = 0;
//             }
//         }

//         if (index === array.length - 1) {
//             console.log('placeholder');


//             renderNewCalcElement(array.length - 1)

//             // let newGateElement = document.createElement('div');
//             // newGateElement.innerHTML = renderNewCalcElement(1);

//             // let newGate = renderNewCalcElement(array.length - 1);
//             // const listRoot = document.querySelector('.container__gates');
//             // listRoot.append(newGateElement);
//             // accordion.parentNode.insertAdjacentHTML('beforebegin', newGate);
//         }

//         // if (index === array.length - 1) {
//         //     tileTitleText.innerText = "Brána"
//         //     let newGate = document.createElement('div');
//         //     newGate.innerHTML = renderNewCalcElement(1);
//         //     accordion.parentElement.querySelector('.info').appendChild(newGate);

//         //     console.log(`index: ${index}`)
//         //     console.log(`array.length - 1: ${array.length - 1}`)
//         // }

//         if (index === array.length) {
//             tileTitleText.innerText = "Pridať Bránu"
//         }


//     })
// });



window.addEventListener('load', () => {

    // only for recapitulation
    if (window.location.href.includes('rekapitulacia')) {
        const url = window.location.search;

        options = url.searchParams.getAll('gates');
        console.log(options);

        const urlParams = new URLSearchParams(url);
        const urlParamsEntries = urlParams.entries();

        let entries = [];

        for (const urlParamEntry of urlParamsEntries) {
            entries.push(urlParamEntry);
        }

        const entriesObject = Object.fromEntries(entries);

        console.log(entriesObject);
        const fencing = document.getElementById('fencing');
        const gate1count = document.getElementById('gate1count');
        const gate1height = document.getElementById('gate1height');
        const gate1width = document.getElementById('gate1width');
        const gate1type = document.getElementById('gate1type');

        gate1count.innerHTML = entriesObject["calc_gate_1_count"];
        gate1height.innerHTML = entriesObject["calc_gate_1_height"];
        gate1width.innerHTML = entriesObject["calc_gate_1_width"];
        gate1type.innerHTML = entriesObject["calc_gate_1_type"];
    }
})


function uuidv4() {
    return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    );
}

console.log(uuidv4());


/* CREATE NEW GATE ELEMENT */
const renderNewCalcElement = (id, type, number, name, selector, deleteGates) => {
    const newGateElement = document.createElement('div');
    newGateElement.className = 'calculator__accordion gate active';
    newGateElement.innerHTML =
        `
            <div class="tile">
                <h3>${name}</h3>
            </div>
            <div class="info">
                <div class="row">
                    <div class="wrapper">
                        <span>Počet kusov</span>
                        <input type="number" name="calc_${type}_${number}_count" id="calc_${type}_${number}_count" required>
                    </div>
                </div>
                <div class="row">
                    <div class="wrapper">
                        <span>Výška (cm)</span>
                        <p>Zadajte hodnotu medzi 0cm - 220cm</p>
                        <input type="number" name="calc_${type}_${number}_height" id="calc_${type}_${number}_height" pattern="\d+"
                            step="1" min="0" max="220" required>
                    </div>
                    <div class="wrapper">
                        <span>Šírka (cm)</span>
                        <p>Zadajte hodnotu medzi 0cm - 600cm</p>
                        <input type="number" name="calc_${type}_${number}_width" id="calc_${type}_${number}_width" pattern="\d+"
                            step="1" min="0" max="600" required>
                    </div>
                </div>
                <div class="row types">
                    <span>Typy brán</span>
                    <div class="grid">
                        <div class="wrapper">
                            <input type="radio" id="calc_${type}_${number}_type_1" name="calc_${type}_${number}_type"
                                value="samonosna">
                            <label for="calc_${type}_${number}_type_1">Samonosná</label>
                        </div>
                        <div class="wrapper">
                            <input type="radio" id="calc_${type}_${number}_type_2" name="calc_${type}_${number}_type"
                                value="kolajova">
                            <label for="calc_${type}_${number}_type_2">Koľajová</label>
                        </div>
                        <div class="wrapper">
                            <input type="radio" id="calc_${type}_${number}_type_3" name="calc_${type}_${number}_type"
                                value="kridlova">
                            <label for="calc_${type}_${number}_type_3">Krídlová</label>
                        </div>
                        <div class="wrapper">
                            <input type="radio" id="calc_${type}_${number}_type_4" name="calc_${type}_${number}_type"
                                value="kridlovaNaHlinikovychStlpoch">
                            <label for="calc_${type}_${number}_type_4">Krídlová na hliníkových stĺpoch</label>
                        </div>
                    </div>
                </div>
            </div>
        `
        ;
    newGateElement.setAttribute('data-gatenumber', number);
    newGateElement.querySelector('h3').addEventListener('click', deleteGates.bind(null, id));

    selector.append(newGateElement);

    gatesArray.push({ id, newGateElement });

    return newGateElement;
}

const deleteGateHandler = (gateId) => {
    console.log('clicked Item: ' + gateId);
    console.log('gatesArray:' + gatesArray.length);
    let gateIndex = 0;

    for (const gate of gatesArray) {
        if (gate.id === gateId) {
            break;
        }
        gateIndex++;
    }

    console.log('gateIndex: ' + gateIndex)
    gatesArray.splice(gateId, 1);

    const gatesListItems = document.querySelectorAll('.container__gates .calculator__accordion:not(:first-of-type)');
    // console.log(gatesList);
    // console.log('gateIndex: ' + gatesList[gateIndex]);
    console.log(gatesListItems);
    gatesListItems[gateIndex].remove();
}

const deleteSmallGateHandler = (smallGateId) => {
    console.log('clicked Item: ' + smallGateId);
    console.log('gatesArray:' + gatesArray.length);
    let gateIndex = 0;

    for (const gate of gatesArray) {
        if (gate.id === smallGateId) {
            break;
        }
        gateIndex++;
    }

    console.log('gateIndex: ' + gateIndex)
    gatesArray.splice(smallGateId, 1);

    const smallGatesListItems = document.querySelectorAll('.container__smallGates .calculator__accordion');
    // console.log(gatesList);
    // console.log('gateIndex: ' + gatesList[gateIndex]);
    console.log(smallGatesListItems);
    smallGatesListItems[gateIndex].remove();
}














/* SWIPER */
const swiper = new Swiper('.swiper.swiper__references', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 3,
    spaceBetween: 32,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        300: {
            slidesPerView: 2,
            spaceBetween: 16
        },
        576: {
            slidesPerView: 2,
            spaceBetween: 16
        },
        768: {
            slidesPerView: 3
        }
    }
});

/* SWIPER PRODUCT */
const initSwiper = (order, type) => {
    const swiper = new Swiper(`.swiper.swiper__${type}`, {
        direction: 'horizontal',
        loop: false,
        slidesPerView: 1,
        spaceBetween: 32,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });
}

swiperContainers.forEach((index) => {
    initSwiper(index, 'product');
})