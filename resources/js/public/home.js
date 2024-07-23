const elementScroll = document.querySelector(".animate-scroll");
if (elementScroll != null) {
    const elementScrollItems = Array.from(elementScroll.children);
    elementScrollItems.forEach((items) => {
        const duplicateItem = items.cloneNode(true);
        duplicateItem.setAttribute("aria-hidden", true);
        elementScroll.appendChild(duplicateItem);
    });
}
