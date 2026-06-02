document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.querySelector(".mobile-menu-toggle");
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("sidebarOverlay");
  const closeBtn = document.getElementById("closeSidebar");

  // Function to open sidebar
  const openSidebar = (e) => {
    e.preventDefault(); // Stop /menu link from navigating
    sidebar.classList.add("active");
    overlay.classList.add("active");
    document.body.classList.add("no-scroll");
  };

  // Function to close sidebar
  const closeSidebar = () => {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
    document.body.classList.remove("no-scroll");
  };

  // Event Listeners
  menuToggle.addEventListener("click", openSidebar);
  closeBtn.addEventListener("click", closeSidebar);

  // Close when clicking outside (on the overlay)
  overlay.addEventListener("click", closeSidebar);

  // Close with Escape key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeSidebar();
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth >= 992) {
      closeSidebar();
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const searchTriggers = document.querySelectorAll(".search-trigger");
  const searchPopup = document.getElementById("searchPopup");
  const closeSearch = document.getElementById("closeSearch");
  const overlay = document.getElementById("sidebarOverlay"); // Reuse sidebar overlay
  const searchInput = searchPopup.querySelector(".search-input");

  const openSearch = (e) => {
    e.preventDefault();
    searchPopup.classList.add("active");
    overlay.classList.add("active"); // Darken background

    // Auto-focus the input field after a small delay for animation
    setTimeout(() => searchInput.focus(), 400);
  };

  const hideSearch = () => {
    searchPopup.classList.remove("active");
    // Only remove overlay if Sidebar isn't also open
    if (!document.getElementById("sidebar").classList.contains("active")) {
      overlay.classList.remove("active");
    }
  };

  // Click Events
  searchTriggers.forEach((trigger) => {
    trigger.addEventListener("click", openSearch);
  });

  closeSearch.addEventListener("click", hideSearch);

  // Close if clicking the background overlay
  overlay.addEventListener("click", hideSearch);

  // Close on Escape Key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") hideSearch();
  });
});
