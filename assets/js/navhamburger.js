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

  hamburger.addEventListener("click", openMenu);

  overlay.addEventListener("click", (e) => {
    if (e.target === overlay) {
      closeMenu();
    }
  });

  links.forEach(link => link.addEventListener("click", closeMenu));
});
