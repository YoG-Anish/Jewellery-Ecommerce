document.addEventListener("DOMContentLoaded", () => {
  const update = (field) => {
    const group = field.closest(".field-group");
    if (!group) return;

    group.classList.toggle("active", field.value.trim() !== "");
  };

  document.addEventListener("input", (e) => {
    if (e.target.matches("input, select, textarea")) {
      update(e.target);
    }
  });

  document.addEventListener("change", (e) => {
    if (e.target.matches("input, select, textarea")) {
      update(e.target);
    }
  });

  document.querySelectorAll("input, select, textarea").forEach(update);
});

// Accordion
document.querySelectorAll(".accordion-header").forEach((button) => {
  button.addEventListener("click", () => {
    const accordionItem = button.parentElement;
    const isOpen = accordionItem.classList.contains("active");

    // Optional: Close all other items (Single-open behavior)
    document.querySelectorAll(".accordion-item").forEach((item) => {
      item.classList.remove("active");
    });

    // Toggle current item
    if (!isOpen) {
      accordionItem.classList.add("active");
    }
  });
});

// Colection Grid

document.querySelectorAll(".collection-grid-item").forEach((item) => {
  item.addEventListener("mouseenter", () => {
    const index = item.getAttribute("data-index");

    // Remove active class from all images
    document
      .querySelectorAll(".background-overlay-collection img")
      .forEach((img) => {
        img.classList.remove("active");
      });

    // Add active class to the specific image
    document.getElementById(`img-${index}`).classList.add("active");
  });
});
