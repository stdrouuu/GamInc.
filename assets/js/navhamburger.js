document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger-icon");
  const overlay = document.querySelector(".mobile-overlay");
  const links = document.querySelectorAll(".mobile-menu a");

  const openMenu = () => {
    overlay.classList.add("active");
  };

  const closeMenu = () => {
    overlay.classList.remove("active");
  };

  // Buka ketika klik hamburger
  hamburger.addEventListener("click", openMenu);

  // Klik area hitam = close
  overlay.addEventListener("click", (e) => {
    if (e.target === overlay) {
      closeMenu();
    }
  });

  // Klik link = close
  links.forEach(link => link.addEventListener("click", closeMenu));
});
