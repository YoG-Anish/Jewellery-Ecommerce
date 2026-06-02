document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".tab-btn");
  const products = document.querySelectorAll(".product-card");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      // 1. Remove active class from all tabs
      tabs.forEach((t) => t.classList.remove("active"));
      // 2. Add active class to clicked tab
      tab.classList.add("active");

      const target = tab.getAttribute("data-target");

      // 3. Filter products
      products.forEach((product) => {
        if (target === "all" || product.classList.contains(target)) {
          product.style.display = "block";
          setTimeout(() => (product.style.opacity = "1"), 10);
        } else {
          product.style.opacity = "0";
          setTimeout(() => (product.style.display = "none"), 400);
        }
      });
    });
  });
});
