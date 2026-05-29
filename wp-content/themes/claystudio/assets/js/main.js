document.addEventListener("DOMContentLoaded", function () {
  // --- 1. SETUP VARIATION SLIDER (Ticker Style) ---
  const variationList = document.querySelector(
    "#variation-slider .splide__list",
  );
  if (variationList) {
    const originalItems = variationList.innerHTML;
    // Clone items to ensure no gaps on wide screens
    for (let i = 0; i < 10; i++) {
      variationList.innerHTML += originalItems;
    }

    const variationSplide = new Splide("#variation-slider", {
      type: "loop",
      drag: false,
      arrows: false,
      pagination: false,
      clones: 20,
      autoWidth: true,
      gap: 0, // Added a gap between words
      autoScroll: {
        speed: 1, // Adjust speed here
        pauseOnHover: false,
        pauseOnFocus: false,
      },
    });
    variationSplide.mount(window.splide.Extensions);
  }

  // --- 2. SETUP ANNOUNCEMENT SLIDER (If it exists on the page) ---
  const announcementSlider = document.querySelector("#announcement-slider");
  if (announcementSlider) {
    const announcementSplide = new Splide("#announcement-slider", {
      type: "loop",
      drag: false,
      arrows: false,
      pagination: false,
      clones: 20,
      autoWidth: true,
      gap: 0,
      autoScroll: {
        speed: 1,
        pauseOnHover: false,
        pauseOnFocus: false,
      },
    });
    announcementSplide.mount(window.splide.Extensions);
  }
});

// --- 3. HEADER SCROLL LOGIC ---
let lastScrollTop = 0;
const header = document.querySelector(".site-header");
const announcementHeight = 36;

window.addEventListener("scroll", function () {
  let scrollTop = window.scrollY || document.documentElement.scrollTop;

  // Lock header and make solid
  if (scrollTop > announcementHeight) {
    header.classList.add("header-scrolled");
  } else {
    header.classList.remove("header-scrolled");
  }

  // Hide on scroll down, show on scroll up
  if (scrollTop > lastScrollTop && scrollTop > announcementHeight + 60) {
    header.classList.add("header-hidden");
  } else {
    header.classList.remove("header-hidden");
  }

  lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
});
