const menuButton = document.querySelector('nav span');
const menuElement = document.querySelector('nav ul');
const products = document.querySelectorAll('.product');
const swiperContainers = document.querySelectorAll('.swiper__container');
const productSwipers = document.querySelectorAll('.swiper__product');
const backdrop = document.querySelector('#backdrop');
const accordions = document.querySelectorAll('.calculator__accordion .tile');


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

accordions.forEach(accordion => {
    accordion.addEventListener('click', event => {
        const accordion = accordion.parentElement;
        const info = accordion.nextElementSibling;
        // const activeTile = document.querySelector('.tile.active');
        // if (activeTile && activeTile !== tile) {
        //     activeTile.classList.toggle('active');
        //     activeTile.nextElementSibling.style.maxHeight = 0;
        // }

        accordion.classList.toggle('active');
        if (accordion.classList.contains('active')) {
            info.style.maxHeight = info.scrollHeight + 15 + 'px';
            info.style.marginTop = "1rem";
        } else {
            info.style.maxHeight = 0;
            info.style.marginTop = 0;
        }
    })
});

window.addEventListener('load', () => {

    // only for recapitulation
    if (window.location.href.includes('rekapitulacia')) {
        const url = window.location.search;
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
            slidesPerView: 1,
            spaceBetween: 8
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