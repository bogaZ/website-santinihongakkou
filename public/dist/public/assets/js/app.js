/* Template Name: Dorsin - Tailwindcss Landing Page Template
   Author: Themesbrand
   Version: 1.1.0
   File Description: Main Js file of the template
*/
function isResponsiveAtResolution(targetResolution) {
    // Get the current viewport width
    var viewportWidth =
        window.innerWidth || document.documentElement.clientWidth;

    // Check if the viewport width is equal to or greater than the target resolution
    return viewportWidth >= targetResolution;
}
function windowScroll() {
    const navbar = document.getElementById("navbar");
    const logoMobile = document.querySelector(".js-logo-mobile");
    const logoDesktop = document.querySelector(".js-logo-desktop");
    const isResponsive = isResponsiveAtResolution(1200);
    if (
        document.body.scrollTop >= 50 ||
        document.documentElement.scrollTop >= 50
    ) {
        navbar.classList.add("is-sticky");
        if (isResponsive) {
            logoDesktop.classList.remove("xl:block");
            logoMobile.classList.remove("xl:hidden");
        }
    } else {
        if (isResponsive) {
            logoDesktop.classList.add("xl:block");
            logoMobile.classList.add("xl:hidden");
        }
        navbar.classList.remove("is-sticky");
    }
}

window.addEventListener("scroll", (ev) => {
    ev.preventDefault();
    windowScroll();
});

// Navbar Active Class

var spy = new Gumshoe("#navbar-navlist a", {
    // Active classes
    navClass: "active", // applied to the nav list item
    contentClass: "active", // applied to the content
    offset: 70,
});

// Smooth scroll
var scroll = new SmoothScroll("#navbar-navlist a", {
    speed: 500,
    offset: 70,
});

// Menu Collapse

const toggleCollapse = (elementId, show = true) => {
    const collapseEl = document.getElementById(elementId);
    if (show) {
        collapseEl.classList.remove("hidden");
    } else {
        collapseEl.classList.add("hidden");
    }
};

document.addEventListener("DOMContentLoaded", () => {
    // Toggle target elements using [data-collapse]
    document
        .querySelectorAll("[data-collapse]")
        .forEach(function (collapseToggleEl) {
            var collapseId = collapseToggleEl.getAttribute("data-collapse");

            collapseToggleEl.addEventListener("click", function () {
                toggleCollapse(
                    collapseId,
                    document
                        .getElementById(collapseId)
                        .classList.contains("hidden")
                );
            });
        });
});

window.toggleCollapse = toggleCollapse;

//
//Dropdown
//

document.addEventListener("DOMContentLoaded", () => {
    // Toggle dropdown elements using [data-dropdown-toggle]
    document
        .querySelectorAll("[data-dropdown-toggle]")
        .forEach(function (dropdownToggleEl) {
            const dropdownMenuId = dropdownToggleEl.getAttribute(
                "data-dropdown-toggle"
            );
            const dropdownMenuEl = document.getElementById(dropdownMenuId);

            // options
            const placement = dropdownToggleEl.getAttribute(
                "data-dropdown-placement"
            );

            dropdownToggleEl.addEventListener("click", function (event) {
                var element = event.target;

                // toggle when click on the button
                dropdownMenuEl.classList.toggle("show");

                function handleDropdownOutsideClick(event) {
                    var targetElement = event.target; // clicked element
                    if (
                        targetElement !== dropdownMenuEl &&
                        targetElement !== dropdownToggleEl &&
                        !dropdownToggleEl.contains(targetElement)
                    ) {
                        dropdownMenuEl.classList.remove("show");
                        document.body.removeEventListener(
                            "click",
                            handleDropdownOutsideClick,
                            true
                        );
                    }
                }

                // hide popper when clicking outside the element
                document.body.addEventListener(
                    "click",
                    handleDropdownOutsideClick,
                    true
                );
            });
        });
});
