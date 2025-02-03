import $ from 'jquery';

window.jQuery = window.$ = $;

import Swiper from 'swiper/bundle';
import {Navigation, Pagination} from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Карусель на главной странице
const swiper_main = new Swiper('.swiper_main', {
    modules: [Navigation, Pagination],
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
        clickable: true,
    },
    autoplay: {
        delay: 5000,
    },
});

// Карусель на странице товара
const swiper_product = new Swiper('.swiper_product', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    autoplay: {
        delay: 3000,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        725: {
            slidesPerView: 1,
        },
        1025: {
            slidesPerView: 3,
        },
    },
});

// Меню-бургер в мобильной версии
$(".burger-menu ").on("click", ".bar", function () {
    $(".burger-menu__categories").slideToggle();
    $(".bar").toggleClass('change');
    $(".burger-menu__categories li").slideRight();
});

// Уменьшение количества товара на единицу
$(document).on("click", ".cart-block__quantity-btn[data-action='decrease']", function (e) {
    e.preventDefault();
    updateCart($(this), "decrease");
});

// Увеличение количества товара на единицу
$(document).on("click", ".cart-block__quantity-btn[data-action='increase']", function (e) {
    e.preventDefault();
    updateCart($(this), "increase");
});

// Кнопка в карточке меню
$(document).on("click", ".product-card__btn", function (e) {
    e.preventDefault();
    let linkText = "product-card__btn product-card__btn-reverse";
    addCartItem($(this), linkText);
});

// Основная кнопка на странице товара
$(document).on("click", ".buy-block__btn", function (e) {
    e.preventDefault();
    let linkText = "buy-block__btn buy-block__btn-reverse";
    addCartItem($(this), linkText);
});

// Кнопка в карточке рекомендованного товара
$(document).on("click", ".recommended-card__btn", function (e) {
    e.preventDefault();
    let linkText = "recommended-card__btn recommended-card__btn-reverse";
    addCartItem($(this), linkText);
});

$(document).on("click", "a.product-card__btn, a.buy-block__btn, a.recommended-card__btn", function (e) {
    e.preventDefault();
    window.location.href = $(this).attr("href");
});

// Добавление товара в корзину из меню, страницы товара или карточки рекомендованных товаров
function addCartItem(button, linkText) {
    let form = button.closest("form");
    let productId = form.data("id");

    $.ajax({
        url: `/cart/add/${productId}`,
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content")
        },
        success: function (response) {
            if (response.addedToCart) {
                let svgContent = button.find("svg").prop('outerHTML');
                if (!svgContent) {
                    button.replaceWith(`<a href="${response.cartUrl}" class="${linkText}">В корзине</a>`);
                } else {
                    button.replaceWith(`<a href="${response.cartUrl}" class="${linkText}">${svgContent}<span>В корзинe</span></a>`);
                }
            }

            $('.user-fields__cart').text(response.newCartCount);
        }
    });
}

// Изменение количества товара в корзине
function updateCart(button, action) {
    let form = button.closest("form");
    let productId = form.find("input[name='quantity']").data("id");

    $.ajax({
        url: `/cart/update/${productId}`,
        type: "PATCH",
        data: {
            action: action,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            $(`.cart-block__input[data-id='${response.itemId}']`).val(response.newQuantity);
            $(`.cart-item-price[data-id='${response.itemId}']`).text(response.newPrice);
            $('.cart-block__total__price').text(response.newTotalPrice);
            $('.user-fields__cart').text(response.newCartCount);
        },
    });
}

// Удаление товара из корзины
$(document).on("click", ".cart-block__delete-btn", function (e) {
    e.preventDefault();
    let form = $(this).parent("form");
    let productId = form.data("id");

    $.ajax({
        url: `/cart/delete/${productId}`,
        type: "DELETE",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content")
        },
        success: function (response) {
            if (response.cartEmpty) {
                location.reload();
            } else {
                $(`tr[data-id='${productId}']`).remove();
                $('.cart-block__total__price').text(response.newTotalPrice);
                $('.user-fields__cart').text(response.newCartCount);
            }
        },
    });
});
