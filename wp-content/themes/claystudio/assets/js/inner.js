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
// Accordion (Multi-open version)
document.querySelectorAll(".accordion-header").forEach((button) => {
  button.addEventListener("click", () => {
    const accordionItem = button.parentElement;

    // Simply toggle the "active" class on the clicked item
    accordionItem.classList.toggle("active");
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
