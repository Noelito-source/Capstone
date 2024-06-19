"use strict";
const CLASS_NAME = "main-nav__item", doc = document, items = doc.querySelectorAll(`.${CLASS_NAME}`);
const CLASS_ACTIVE_NAME = `${CLASS_NAME}--active`;
items.forEach((item) => item.addEventListener("click", function (e) {
    doc
        .querySelector(`.${CLASS_ACTIVE_NAME}`)
        .classList.remove(CLASS_ACTIVE_NAME);
    item.classList.toggle(CLASS_ACTIVE_NAME);
}));