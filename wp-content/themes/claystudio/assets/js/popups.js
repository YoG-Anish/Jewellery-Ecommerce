document.addEventListener("DOMContentLoaded", () => {
  // --- SIDEBAR LOGIC ---
  const menuToggle = document.querySelector(".mobile-menu-toggle");
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("sidebarOverlay");
  const closeBtn = document.getElementById("closeSidebar");

  // Only run sidebar logic if these elements exist on the current page
  if (menuToggle && sidebar && overlay && closeBtn) {
    const openSidebar = (e) => {
      e.preventDefault();
      sidebar.classList.add("active");
      overlay.classList.add("active");
      document.body.classList.add("no-scroll");
    };

    const closeSidebar = () => {
      sidebar.classList.remove("active");
      overlay.classList.remove("active");
      document.body.classList.remove("no-scroll");
    };

    menuToggle.addEventListener("click", openSidebar);
    closeBtn.addEventListener("click", closeSidebar);
    overlay.addEventListener("click", closeSidebar);

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") closeSidebar();
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth >= 992) closeSidebar();
    });
  }

  // --- SEARCH LOGIC ---
  const searchTriggers = document.querySelectorAll(".search-trigger");
  const searchPopup = document.getElementById("searchPopup");
  const closeSearch = document.getElementById("closeSearch");
  // overlay was already defined above, but we check it again here for safety

  if (searchTriggers.length > 0 && searchPopup && closeSearch && overlay) {
    const searchInput = searchPopup.querySelector(".search-input");

    const openSearch = (e) => {
      e.preventDefault();
      searchPopup.classList.add("active");
      overlay.classList.add("active");
      if (searchInput) setTimeout(() => searchInput.focus(), 400);
    };

    const hideSearch = () => {
      searchPopup.classList.remove("active");
      // Only remove overlay if Sidebar isn't also open
      if (sidebar && !sidebar.classList.contains("active")) {
        overlay.classList.remove("active");
      }
    };

    searchTriggers.forEach((trigger) => {
      trigger.addEventListener("click", openSearch);
    });

    closeSearch.addEventListener("click", hideSearch);
    overlay.addEventListener("click", hideSearch);

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") hideSearch();
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  // Target only the sidebar/mobile navigation
  const sidebarLinks = document.querySelectorAll(
    ".sidebar-nav .menu-item-has-children > a",
  );

  sidebarLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      // Check if we are in a mobile/sidebar view
      // You can adjust the 1024px to match your mobile breakpoint
      if (window.innerWidth <= 1024) {
        e.preventDefault(); // Stop the link from navigating

        const parentLi = this.parentElement;

        // Toggle the 'is-open' class
        parentLi.classList.toggle("is-open");

        // Optional: Close other open menus (Accordion style)
        sidebarLinks.forEach((otherLink) => {
          if (otherLink !== link) {
            otherLink.parentElement.classList.remove("is-open");
          }
        });
      }
    });
  });
});
