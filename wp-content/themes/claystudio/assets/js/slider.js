document.addEventListener("DOMContentLoaded", function () {
  // HERO SLIDER
  const heroSlider = document.querySelector(".hero-slider");

  if (heroSlider) {
    new Splide(heroSlider, {
      type: "loop",
      rewind: true,
      speed: 1000,
      autoplay: true,
      interval: 6000,
      pauseOnHover: false,
      arrows: true,
      pagination: true,
      drag: true,
    }).mount();
  }

  // TESTIMONIAL SLIDER
  const testimonialSlider = document.querySelector("#testimonial-slider");

  if (testimonialSlider) {
    new Splide(testimonialSlider, {
      type: "fade",
      rewind: true,
      speed: 800,
      pagination: false,
      arrows: true,
      drag: true,
    }).mount();
  }

  // ABOUT TESTIMONIAL SLIDER
  const aboutSlider = document.querySelector("#testimonial-slider-about");

  if (aboutSlider) {
    new Splide(aboutSlider, {
      type: "slide",
      gap: "30px",
      arrows: false,
      pagination: false,
      perPage: 3,
      drag: false,

      breakpoints: {
        1024: {
          perPage: 2,
          drag: true,
          arrows: true,
        },
        768: {
          perPage: 1,
          drag: true,
        },
      },
    }).mount();
  }

  // SOPHIE HERO CAROUSEL
  const sophieCarousel = document.querySelector("#sophie-hero-carousel");

  if (sophieCarousel) {
    new Splide(sophieCarousel, {
      type: "fade",
      rewind: true,
      speed: 1000,
      interval: 5000,
      autoplay: true,
      pauseOnHover: true,
      arrows: true,
      pagination: true,
    }).mount();
  }
});
