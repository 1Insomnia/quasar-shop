import Swiper, { Navigation } from "swiper";
import "swiper/swiper-bundle.css";

import "aos/dist/aos.css";

function carousel() {
    Swiper.use([Navigation]);

    const swiper = new Swiper(".swiper-container", {
        // Optional parameters
        loop: true,

        pagination: {
            el: ".swiper-pagination",
            type: "bullets",
        },

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        effect: "cube",
        cubeEffect: {
            slideShadows: true,
        },

        // And if we need scrollbar
        direction: "horizontal",
    });
}


export { carousel };
