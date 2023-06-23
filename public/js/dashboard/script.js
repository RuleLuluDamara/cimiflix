"use strict";

/**
 * toggle active class on header
 * when clicked nav-toggle-btn
 */

const header = document.querySelector("[data-header]");
const navToggleBtn = document.querySelector("[data-menu-toggle-btn]");

navToggleBtn.addEventListener("click", function () {
    header.classList.toggle("active");
});

/**
 * toggle ctx-menu when click on card-menu-btn
 */

const menuBtn = document.querySelectorAll("[data-menu-btn]");

for (let i = 0; i < menuBtn.length; i++) {
    menuBtn[i].addEventListener("click", function () {
        this.nextElementSibling.classList.toggle("active");
    });
}

/**
 * load more btn loading spin toggle
 */

const loadMoreBtn = document.querySelector("[data-load-more]");

loadMoreBtn.addEventListener("click", function () {
    this.classList.toggle("active");
});

// Memperoleh elemen toggle button dan menu dropdown
const toggleButton = document.querySelector(".menu-toggle-btn");
const dropdownMenu = document.querySelector(".dropdown-menu");

// Menambahkan event listener pada toggle button
toggleButton.addEventListener("click", () => {
    // Mengubah status tampilan menu dropdown
    dropdownMenu.classList.toggle("show");
});

// Menutup menu dropdown saat mengklik di luar menu
document.addEventListener("click", (event) => {
    const targetElement = event.target;

    if (!targetElement.closest(".navbar")) {
        dropdownMenu.classList.remove("show");
    }
});
