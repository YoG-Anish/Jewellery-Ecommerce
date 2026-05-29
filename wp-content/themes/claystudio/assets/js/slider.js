document.addEventListener("DOMContentLoaded", function () {
  var splide = new Splide(".hero-slider", {
    type: "loop", // "fade" is elegant for high-end fashion/bridal
    rewind: true,
    speed: 1000, // Duration of the transition
    autoplay: true, // Auto-play the slides
    interval: 6000, // 6 seconds per slide
    pauseOnHover: false,
    arrows: true, // Show side arrows
    pagination: true, // Show dots at the bottom
    drag: true,
  });

  splide.mount();

  // --- TESTIMONIAL SLIDER ---
  const testimonialSplide = new Splide("#testimonial-slider", {
    type: "fade", // Smooth fade transition like the image implies
    rewind: true,
    speed: 800,
    pagination: false, // No dots
    arrows: true, // We are using our custom ones in the HTML
    drag: true,
  });

  testimonialSplide.mount();
});
