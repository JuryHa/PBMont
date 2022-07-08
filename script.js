let swiperInstances = [];
const backdrop = document.querySelector("#backdrop");
const swiperContainers = document.querySelectorAll(".swiper__container");

const products = document.querySelectorAll(".product");
const productSwipers = document.querySelectorAll(".swiper__product");

products.forEach((product) => {
    product.querySelector(".container__image").addEventListener("click", () => {
        let productOrder = Number(product.getAttribute("data-product"));

        if (productOrder <= productSwipers.length) {
            toggleBackdrop();
            toggleSwiper(productOrder - 1);
        }
    });
});

const toggleBackdrop = () => {
    backdrop.classList.toggle("visible");
};

const hideBackdropAndSwipers = () => {
    swiperContainers.forEach((swiperContainer) => {
        swiperContainer.classList.remove("visible");
    });
    toggleBackdrop();
};

if (backdrop) {
    backdrop.addEventListener("click", hideBackdropAndSwipers);
}

const toggleSwiper = (order) => {
    productSwipers[order].closest(".swiper__container").classList.toggle("visible");
};

const initSwiper = (type) => {
    swiperInstances.push(
        new Swiper(`.swiper.swiper__${type}`, {
            direction: "horizontal",
            loop: false,
            slidesPerView: 1,
            spaceBetween: 32,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        })
    );
};

swiperContainers.forEach(() => {
    initSwiper("product");
});

const swiper = new Swiper(".swiper.swiper__references", {
    direction: "horizontal",
    loop: false,
    slidesPerView: 3,
    spaceBetween: 32,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        300: {
            slidesPerView: 2,
            spaceBetween: 16,
        },
        576: {
            slidesPerView: 2,
            spaceBetween: 16,
        },
        768: {
            slidesPerView: 3,
        },
    },
});

const menuButton = document.querySelector("nav span");
const menuElement = document.querySelector("nav ul");

const toggleMenu = () => {
    menuElement.classList.toggle("visible");

    if (menuElement.classList.contains("visible")) {
        menuButton.innerHTML = "ZAVRIEŤ MENU";
    } else {
        menuButton.innerHTML = "MENU";
    }
};

menuButton.addEventListener("click", toggleMenu);

$(document).ready(function () {
    let form = $("form:not(.container)"),
        message = $(".submit__message"),
        form_data;

    function success(response) {
        message.fadeIn().removeClass("danger").addClass("success");
        message.text(response);
        setTimeout(function () {
            message.fadeOut();
        }, 5000);
        form.find('input:not([type="submit"]), textarea').val("");
    }

    function fail(data) {
        message.fadeIn().removeClass("success").addClass("danger");
        message.text(data.responseText);
        setTimeout(function () {
            message.fadeOut();
        }, 5000);
    }

    form.submit(function (e) {
        e.preventDefault();
        var form_data = new FormData(this);

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form_data,
            processData: false,
            contentType: false,
        })
            .done(success)
            .fail(fail);
    });
});

const addNewButton2 = document.querySelector(".calculator__step.step_2 .addButton");

let calcElementsIterator2 = 0;

if (addNewButton2 != null) {
    addNewButton2.addEventListener("click", () => {
        const container = document.querySelector(".calculator__step.step_2 .step__container");

        calcElementsIterator2++;
        renderNewCalcElement2(calcElementsIterator2, container);
    });
}

const renderNewCalcElement2 = (iterator, selector) => {
    const newCalcElement2 = document.createElement("div");
    newCalcElement2.className = "calculator__accordion";

    newCalcElement2.innerHTML = `
        <div class="tile">
            <h3>Brána</h3>
        </div>
        <div class="info">
            <div class="row">
                <div class="wrapper">
                    <span>Počet kusov</span>
                    <input type="number" name="gate_count_${iterator}" id="gate_count_${iterator}" required />
                </div>
            </div>
            <div class="row">
                <div class="wrapper">
                    <span>Výška (cm)</span>
                    <p>Zadajte hodnotu medzi 0cm - 220cm</p>
                    <input type="number" name="gate_height_${iterator}" id="gate_height_${iterator}" pattern="\d+" step="1" min="0" max="220" required />
                </div>
                <div class="wrapper">
                    <span>Šírka (cm)</span>
                    <p>Zadajte hodnotu medzi 0cm - 600cm</p>
                    <input type="number" name="gate_width_${iterator}" id="gate_width_${iterator}" pattern="\d+" step="1" min="0" max="600" required />
                </div>
            </div>
            <div class="row types">
                <span>Typy brán</span>
                <div class="grid">
                    <div class="wrapper">
                        <input type="radio" name="gate_type_${iterator}" id="gate_${iterator}_type_1" value="1" />
                        <label for="gate_${iterator}_type_1">Samonosná</label>
                    </div>
                    <div class="wrapper">
                        <input type="radio" name="gate_type_${iterator}" id="gate_${iterator}_type_2" value="2" />
                        <label for="gate_${iterator}_type_2">Koľajová</label>
                    </div>
                    <div class="wrapper">
                        <input type="radio" name="gate_type_${iterator}" id="gate_${iterator}_type_3" value="3" />
                        <label for="gate_${iterator}_type_3">Krídlová</label>
                    </div>
                    <div class="wrapper">
                        <input type="radio" name="gate_type_${iterator}" id="gate_${iterator}_type_4" value="4" />
                        <label for="gate_${iterator}_type_4">Krídlová na hliníkových stĺpoch</label>
                    </div>
                </div>
            </div>
        </div>        
    `;

    selector.append(newCalcElement2);

    newCalcElement2.querySelector("h3").addEventListener("click", removeCalcElement);
};

const removeCalcElement = (event) => {
    event.target.parentElement.parentElement.remove();
};
