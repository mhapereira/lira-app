import './bootstrap';
import 'bootstrap';



import Swiper from 'swiper';
const swiper = new Swiper('.swiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 5000,
    },
    breakpoints: {
        768: {
            slidesPerView: 3,
        },
    },
});

import 'lightbox2/dist/css/lightbox.min.css';

// Importa o Lightbox2 e o jQuery
import lightbox from 'lightbox2';
import $ from 'jquery';

// Certifique-se de que o jQuery está disponível globalmente
window.$ = window.jQuery = $;

// Verifique se o lightbox está definido e configure as opções
document.addEventListener('DOMContentLoaded', function () {
    if (typeof lightbox !== 'undefined') {
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'maxHeight': 600
        });
    } else {
        console.error('Lightbox2 não está definido');
    }
});