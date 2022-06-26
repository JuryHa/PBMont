const menuButton = document.querySelector('nav span');
const menuElement = document.querySelector('nav ul');
const products = document.querySelectorAll('.product');
const swiperContainers = document.querySelectorAll('.swiper__container');
const productSwipers = document.querySelectorAll('.swiper__product');
const backdrop = document.querySelector('#backdrop');

/* FUNCTIONS */
const toggleMenu = () => {
    menuElement.classList.toggle('visible');
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