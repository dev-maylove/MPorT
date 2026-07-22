"use strict";

document.addEventListener("DOMContentLoaded", () => {

    // Reveal Animation
    const revealItems = document.querySelectorAll(".reveal");

    if ("IntersectionObserver" in window) {

        const observer = new IntersectionObserver((entries) => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add("active");
                    observer.unobserve(entry.target);

                }

            });

        }, {
            threshold: 0.15
        });

        revealItems.forEach(item => observer.observe(item));

    } else {

        revealItems.forEach(item => item.classList.add("active"));

    }

    // Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(link => {

        link.addEventListener("click", function(e) {

            const target = document.querySelector(this.getAttribute("href"));

            if (!target) return;

            e.preventDefault();

            target.scrollIntoView({
                behavior: "smooth"
            });

        });

    });

    // Navbar Shadow
    const nav = document.querySelector("header");

    if (nav) {

        window.addEventListener("scroll", () => {

            if (window.scrollY > 20) {
                nav.classList.add("scrolled");
            } else {
                nav.classList.remove("scrolled");
            }

        });

    }

    // Counter Animation
    document.querySelectorAll("[data-count]").forEach(el => {

        const target = parseInt(el.dataset.count || "0");
        let value = 0;

        const speed = Math.max(1, Math.floor(target / 100));

        const timer = setInterval(() => {

            value += speed;

            if (value >= target) {

                value = target;
                clearInterval(timer);

            }

            el.textContent = value;

        }, 20);

    });

});

console.log("MandalaNet ISP 2026 Ready");
