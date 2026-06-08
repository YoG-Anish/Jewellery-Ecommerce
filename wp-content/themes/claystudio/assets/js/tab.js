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

jQuery(document).ready(function ($) {
  // Function to handle grid change
  $(".switch-btn").on("click", function (e) {
    e.preventDefault();
    var cols = $(this).data("cols");

    // 1. Highlight active button
    $(".switch-btn").removeClass("active");
    $(this).addClass("active");

    // 2. Change product list columns
    // We remove standard WC column classes and our custom ones
    $("ul.products")
      .removeClass(
        "columns-1 columns-2 columns-3 columns-4 cols-2 cols-3 cols-4",
      )
      .addClass("cols-" + cols);

    // 3. Save to local storage
    localStorage.setItem("woo_grid_pref", cols);
  });

  // On Load: Check for saved preference
  var savedGrid = localStorage.getItem("woo_grid_pref");
  if (savedGrid) {
    // Find the button and click it to restore state
    $('.switch-btn[data-cols="' + savedGrid + '"]').trigger("click");
  }
});
document.addEventListener("DOMContentLoaded", () => {
  const shopTrigger = document.getElementById("shopFilterTrigger");
  const shopSidebar = document.getElementById("shopSidebar");
  const shopOverlay = document.getElementById("shopSidebarOverlay");
  const shopCloseBtn = document.getElementById("closeShopSidebar");

  if (shopTrigger && shopSidebar && shopOverlay) {
    const openShopSidebar = (e) => {
      e.preventDefault();
      shopSidebar.classList.add("shop-active");
      shopOverlay.classList.add("shop-active");
      document.body.classList.add("no-scroll");
      console.log("Shop sidebar opened");
    };

    const closeShopSidebar = () => {
      shopSidebar.classList.remove("shop-active");
      shopOverlay.classList.remove("shop-active");
      document.body.classList.remove("no-scroll");
      console.log("Shop sidebar closed");
    };

    shopTrigger.addEventListener("click", openShopSidebar);
    if (shopCloseBtn) shopCloseBtn.addEventListener("click", closeShopSidebar);
    shopOverlay.addEventListener("click", closeShopSidebar);

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") closeShopSidebar();
    });
  }
});
