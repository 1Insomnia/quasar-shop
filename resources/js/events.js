// Burger Menu Toggle
export function navOpen() {
    // Button Element
    const navToggle = document.querySelector("#nav-toggle");
    // Lines inside Button Element
    const burger = document.querySelector(".burger");
    // Navigation Links
    const navMobileLinks = document.querySelectorAll("#nav-mobile-list a");
    // Wrapper around previous elements
    const header = document.querySelector("#header");

    navToggle.addEventListener("click", (e) => {
        e.preventDefault();
        // Toggle nav-open class on click
        header.classList.toggle("nav-open");
        // Toggle open class on click
        burger.classList.toggle("open");
        // For each navigation links add a different animation delay
        navMobileLinks.forEach(
            (link, index) =>
                (link.style.animationDelay = `${
                    index / navMobileLinks.length + 0.3
                }s`)
        );
    });
}
