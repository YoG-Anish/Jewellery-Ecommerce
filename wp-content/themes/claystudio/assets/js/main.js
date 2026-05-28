document.addEventListener("DOMContentLoaded", function () {
  const list = document.getElementById("splide-list");
  const originalItems = list.innerHTML;

  // 1. Clone the items 10 times to ensure we fill even 8K wide screens
  // This prevents the "glitch" or empty space on wide displays
  for (let i = 0; i < 10; i++) {
    list.innerHTML += originalItems;
  }

  // 2. Initialize Splide
  const splide = new Splide("#announcement-slider", {
    type: "loop", // Infinite loop
    drag: false, // No manual dragging
    arrows: false, // No arrows
    pagination: false, // No dots
    clones: 20, // Extra buffer clones
    autoWidth: true, // Let the content dictate width
    gap: 0,
    autoScroll: {
      speed: 1, // Adjust for faster/slower scroll
      pauseOnHover: false,
      pauseOnFocus: false,
    },
  });

  splide.mount(window.splide.Extensions);
});
