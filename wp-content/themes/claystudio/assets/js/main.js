document.addEventListener("DOMContentLoaded", function () {
  // --- 1. SETUP VARIATION SLIDER (Ticker Style) ---
  const variationList = document.querySelector("#variation-slider .splide__list");
  if (variationList) {
    const originalItems = variationList.innerHTML;
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
      gap: 0,
      autoScroll: {
        speed: 1,
        pauseOnHover: false,
        pauseOnFocus: false,
      },
    });
    variationSplide.mount(window.splide.Extensions);
  }

  // --- 2. SETUP ANNOUNCEMENT SLIDER ---
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

  // --- 3. GO TO TOP LOGIC (Fixed Safety Check) ---
  const progressWrap = document.querySelector(".progress-wrap");
  const progressPath = document.querySelector(".progress-wrap path");

  // ONLY run this if the progress button actually exists on the page
  if (progressWrap && progressPath) {
    const pathLength = progressPath.getTotalLength();

    progressPath.style.transition = progressPath.style.WebkitTransition = "none";
    progressPath.style.strokeDasharray = pathLength + " " + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = "stroke-dashoffset 10ms linear";

    const updateProgress = function () {
      const scroll = window.scrollY;
      const height = document.documentElement.scrollHeight - window.innerHeight;
      const progress = pathLength - (scroll * pathLength) / height;
      progressPath.style.strokeDashoffset = progress;
    };

    updateProgress();
    window.addEventListener("scroll", updateProgress);

    const offset = 150;

    window.addEventListener("scroll", function () {
      if (window.scrollY > offset) {
        progressWrap.classList.add("active-progress");
      } else {
        progressWrap.classList.remove("active-progress");
      }
    });

    progressWrap.addEventListener("click", function (event) {
      event.preventDefault();
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }
});

// --- 4. HEADER SCROLL LOGIC ---
let lastScrollTop = 0;
const header = document.querySelector(".site-header");
const announcementHeight = 36;

if (header) {
  window.addEventListener("scroll", function () {
    let scrollTop = window.scrollY || document.documentElement.scrollTop;

    if (scrollTop > announcementHeight) {
      header.classList.add("header-scrolled");
    } else {
      header.classList.remove("header-scrolled");
    }

    if (scrollTop > lastScrollTop && scrollTop > announcementHeight + 60) {
      header.classList.add("header-hidden");
    } else {
      header.classList.remove("header-hidden");
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
  });
}

// --- 5. QUANTITY PLUS/MINUS BUTTONS ---
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('plus') || e.target.classList.contains('minus')) {
        const qtyInput = e.target.parentElement.querySelector('.qty');
        if (!qtyInput) return;

        let val = parseFloat(qtyInput.value);
        let max = parseFloat(qtyInput.getAttribute('max'));
        let min = parseFloat(qtyInput.getAttribute('min'));
        let step = parseFloat(qtyInput.getAttribute('step'));

        if (e.target.classList.contains('plus')) {
            if (max && (max <= val)) {
                qtyInput.value = max;
            } else {
                qtyInput.value = val + step;
            }
        } else {
            if (min && (min >= val)) {
                qtyInput.value = min;
            } else if (val > 0) {
                qtyInput.value = val - step;
            }
        }
        
        qtyInput.dispatchEvent(new Event('change', { bubbles: true }));
    }
});

