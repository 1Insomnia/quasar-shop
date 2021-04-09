require("./bootstrap");

import { carousel, animateOnScroll } from "./animations";
import { navOpen, productDataToggle } from "./events";

function main() {
    navOpen();
    carousel();
    animateOnScroll();
    productDataToggle();
}

window.onload = main;
