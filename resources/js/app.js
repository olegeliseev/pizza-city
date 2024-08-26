import $ from 'jquery';
window.jQuery = window.$ = $;

import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
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
$(".burger-menu ").on("click",".bar",function(){
    $(".burger-menu__categories").slideToggle();
    $(".bar").toggleClass('change');
    $(".burger-menu__categories li").slideRight();
});
