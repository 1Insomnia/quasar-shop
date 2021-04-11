export function navOpen() {
    // Nav button action
    const navToggle = document.querySelector("#nav-toggle");
    const header = document.querySelector("#header");
    const burger = document.querySelector(".burger");
    const navMobileList = document.querySelector('#nav-mobile-list');
    const navMobileLinks = document.querySelectorAll('#nav-mobile-list a');

    // Nav button action
    navToggle.addEventListener("click", (e) => {
        e.preventDefault();
        header.classList.toggle("nav-open");
        burger.classList.toggle("open");

        navMobileLinks.forEach((link, index ) => link.style.animationDelay = `${index / navMobileLinks.length + .3}s`);
    });
}

export function productDataToggle() {
    const productDataBtn = document.querySelectorAll("#productDataBtn");

    productDataBtn.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const currentProductDisplay = e.currentTarget.parentNode;
            const productData = currentProductDisplay.childNodes[3];
            const currentProductDataBtn = currentProductDisplay.childNodes[1];
            const currentSvg = currentProductDataBtn.childNodes[3];

            currentSvg.classList.toggle("rotate-inverse-z");
            productData.classList.toggle("hidden");
        });
    });
}

