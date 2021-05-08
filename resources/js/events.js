export function navOpen() {
    // Nav button action
    const navToggle = document.querySelector("#nav-toggle");
    const header = document.querySelector("#header");
    const burger = document.querySelector(".burger");
    const navMobileLinks = document.querySelectorAll("#nav-mobile-list a");

    // Nav button action
    navToggle.addEventListener("click", (e) => {
        e.preventDefault();
        header.classList.toggle("nav-open");
        burger.classList.toggle("open");

        navMobileLinks.forEach(
            (link, index) =>
                (link.style.animationDelay = `${
                    index / navMobileLinks.length + 0.3
                }s`)
        );
    });
}

export function productDataToggle() {}
