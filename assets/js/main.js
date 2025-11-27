const overlay = document.getElementById("welcomeOverlay");
const welcomeText = document.getElementById("welcomeText");
const continueBtn = document.getElementById("continueBtn");

continueBtn.addEventListener("click", () => {
  overlay.style.display = "none";
  localStorage.removeItem("loginName");
});

document.addEventListener("DOMContentLoaded", function () {
  initializeWebsite();
  initializeSlideshow();
});

// Shopping cart
let cart = JSON.parse(localStorage.getItem("gaminc_cart")) || [];

// Slideshow variables
let currentSlideIndex = 0;
let slideInterval;
const slides = document.querySelectorAll(".slide");
const indicators = document.querySelectorAll(".indicator");

// Initialize website
function initializeWebsite() {
  setupNavigation();
  loadProducts();
  updateCartDisplay();
  updateCartCount();
}

// Initialize slideshow
function initializeSlideshow() {
  if (slides.length > 0) {
    showSlide(0);
    startAutoSlide();

    // Pause auto-slide on hover
    const slideshowContainer = document.querySelector(".slideshow-container");
    if (slideshowContainer) {
      slideshowContainer.addEventListener("mouseenter", stopAutoSlide);
      slideshowContainer.addEventListener("mouseleave", startAutoSlide);
    }
  }
}

// Slideshow functions
function showSlide(index) {
  // Hide all slides
  slides.forEach((slide) => slide.classList.remove("active"));
  indicators.forEach((indicator) => indicator.classList.remove("active"));

  // Show current slide
  if (slides[index]) {
    slides[index].classList.add("active");
  }
  if (indicators[index]) {
    indicators[index].classList.add("active");
  }

  currentSlideIndex = index;
}

function changeSlide(direction) {
  let newIndex = currentSlideIndex + direction;

  if (newIndex >= slides.length) {
    newIndex = 0;
  } else if (newIndex < 0) {
    newIndex = slides.length - 1;
  }

  showSlide(newIndex);
}

function currentSlide(index) {
  showSlide(index - 1);
}

function startAutoSlide() {
  stopAutoSlide(); // Clear any existing interval
  slideInterval = setInterval(() => {
    changeSlide(1);
  }, 5000); // Change slide every 5 seconds
}

function stopAutoSlide() {
  if (slideInterval) {
    clearInterval(slideInterval);
  }
}

// Navigation functionality
function setupNavigation() {
  // Mobile menu toggle
  const hamburger = document.querySelector(".hamburger");
  const navMenu = document.querySelector(".nav-menu");

  if (hamburger && navMenu) {
    hamburger.addEventListener("click", function () {
      hamburger.classList.toggle("active");
      navMenu.classList.toggle("active");
    });
  }

  // Close mobile menu when clicking on nav links
  const navLinks = document.querySelectorAll(".nav-link");
  navLinks.forEach((link) => {
    link.addEventListener("click", function () {
      hamburger.classList.remove("active");
      navMenu.classList.remove("active");
    });
  });

  // Smooth scrolling for navigation links
  navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href");
      const targetSection = document.querySelector(targetId);

      if (targetSection) {
        targetSection.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });
}

// Load products into the grid
function loadProducts() {
  const productsGrid = document.getElementById("productsGrid");
  if (!productsGrid) return;

  productsGrid.innerHTML = "";

  products.forEach((product) => {
    const productCard = createProductCard(product);
    productsGrid.appendChild(productCard);
  });
}

// Create product card element
// main.js - Fungsi createProductCard yang dimodifikasi

function createProductCard(product) {
  // 1. Buat elemen <a> sebagai wadah utama untuk tautan
  const link = document.createElement("a");
  // Path: Keluar dari main (..) lalu masuk ke user/gameview.html?id=X
  link.href = `../gameview/gameview.html?id=${product.id}`;
  link.className = "product-card-link";

  // 2. Buat div card (seperti yang Anda miliki di CSS)
  const card = document.createElement("div");
  card.className = "product-card";

  // Tentukan konten image/icon
  let imageContent;

  // Cek apakah 'image' adalah path file (gunakan path gambar)
  if (product.image.includes("/") || product.image.includes(".")) {
    imageContent = `<img src="${product.image}" alt="${product.name}" class="product-img">`;
  } else {
    // Jika ini adalah class Font Awesome (untuk produk tanpa gambar)
    imageContent = `<i class="${product.image}"></i>`;
  }

  // 3. Isi Konten Card
  card.innerHTML = `
        <div class="product-image">
            ${imageContent}
        </div>
        <h3>${product.name}</h3>
        <div class="product-price">${formatPrice(product.price)}</div>
        <button class="add-to-cart" onclick="addToCart(${
          product.id
        }); return false;">
            Add to Cart
        </button>
    `;

  // 4. Masukkan Card ke dalam Link
  link.appendChild(card);

  // 5. Kembalikan link (yang sekarang menjadi kartu produk)
  return link;
}

// Add product to cart
function addToCart(productId) {
  const product = products.find((p) => p.id === productId);
  if (!product) return;

  const existingItem = cart.find((item) => item.id === productId);

  if (existingItem) {
    existingItem.quantity += 1;
  } else {
    cart.push({
      ...product,
      quantity: 1,
    });
  }

  saveCart();
  updateCartCount();
  updateCartDisplay();

  // Show feedback
  showNotification(`${product.name} added to cart!`);
}

// Remove product from cart
function removeFromCart(productId) {
  cart = cart.filter((item) => item.id !== productId);
  saveCart();
  updateCartCount();
  updateCartDisplay();
}

// Update product quantity in cart
function updateQuantity(productId, newQuantity) {
  const item = cart.find((item) => item.id === productId);
  if (!item) return;

  if (newQuantity <= 0) {
    removeFromCart(productId);
  } else {
    item.quantity = newQuantity;
    saveCart();
    updateCartDisplay();
  }
}

// Save cart to localStorage
function saveCart() {
  localStorage.setItem("gaminc_cart", JSON.stringify(cart));
}

// Update cart count in navigation
function updateCartCount() {
  const cartCount = document.getElementById("cartCount");
  if (cartCount) {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;
  }
}

// Update cart display
function updateCartDisplay() {
  const cartItems = document.getElementById("cartItems");
  const cartSummary = document.getElementById("cartSummary");
  const emptyCart = document.getElementById("emptyCart");

  if (!cartItems) return;

  if (cart.length === 0) {
    if (emptyCart) emptyCart.style.display = "block";
    if (cartSummary) cartSummary.style.display = "none";
    cartItems.innerHTML = `
            <div class="empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <p>Your cart is empty</p>
                <button class="cta-button" onclick="scrollToSection('menu')">Start Shopping</button>
            </div>
        `;
    return;
  }

  if (emptyCart) emptyCart.style.display = "none";
  if (cartSummary) cartSummary.style.display = "block";

  // Create cart table
  let cartHTML = `
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    `;

  cart.forEach((item) => {
    const itemTotal = item.price * item.quantity;
    cartHTML += `
            <tr class="cart-item">
                <td>
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div class="cart-item-image">
                            <i class="${item.image}"></i>
                        </div>
                        <span>${item.name}</span>
                    </div>
                </td>
                <td>${formatPrice(item.price)}</td>
                <td>
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="updateQuantity(${
                          item.id
                        }, ${item.quantity - 1})">-</button>
                        <input type="number" class="quantity-input" value="${
                          item.quantity
                        }" 
                               onchange="updateQuantity(${
                                 item.id
                               }, parseInt(this.value))" min="1">
                        <button class="quantity-btn" onclick="updateQuantity(${
                          item.id
                        }, ${item.quantity + 1})">+</button>
                    </div>
                </td>
                <td>${formatPrice(itemTotal)}</td>
                <td>
                    <button class="remove-btn" onclick="removeFromCart(${
                      item.id
                    })">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
  });

  cartHTML += `
            </tbody>
        </table>
    `;

  cartItems.innerHTML = cartHTML;

  // Update cart summary
  updateCartSummary();
}

// Update cart summary
function updateCartSummary() {
  const subtotalElement = document.getElementById("subtotal");
  const taxElement = document.getElementById("tax");
  const totalElement = document.getElementById("total");

  if (!subtotalElement || !taxElement || !totalElement) return;

  const subtotal = cart.reduce(
    (sum, item) => sum + item.price * item.quantity,
    0
  );
  const tax = subtotal * 0.1; // 10% tax
  const total = subtotal + tax;

  subtotalElement.textContent = formatPrice(subtotal);
  taxElement.textContent = formatPrice(tax);
  totalElement.textContent = formatPrice(total);
}

// Format price to Rupiah
function formatPrice(price) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(price);
}

// Scroll to section
function scrollToSection(sectionId) {
  const section = document.getElementById(sectionId);
  if (section) {
    section.scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
  }
}

// Show notification
function showNotification(message) {
  // Create notification element
  const notification = document.createElement("div");
  notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: linear-gradient(135deg, #2dd4bf 0%, #14b8a6 100%);
        color: #0a0a0a;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        z-index: 10000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        box-shadow: 0 4px 15px rgba(45, 212, 191, 0.3);
    `;
  notification.textContent = message;

  document.body.appendChild(notification);

  // Animate in
  setTimeout(() => {
    notification.style.transform = "translateX(0)";
  }, 100);

  // Remove after 3 seconds
  setTimeout(() => {
    notification.style.transform = "translateX(100%)";
    setTimeout(() => {
      document.body.removeChild(notification);
    }, 300);
  }, 3000);
}

// Checkout functionality
document.addEventListener("click", function (e) {
  if (e.target.classList.contains("checkout-button")) {
    if (cart.length === 0) {
      showNotification("Your cart is empty!");
      return;
    }

    // Simple checkout simulation
    const total =
      cart.reduce((sum, item) => sum + item.price * item.quantity, 0) * 1.1; // Including tax

    if (confirm(`Proceed with checkout? Total: ${formatPrice(total)}`)) {
      // Clear cart
      cart = [];
      saveCart();
      updateCartCount();
      updateCartDisplay();

      showNotification(
        "Order placed successfully! Thank you for shopping with GamInc.!"
      );
    }
  }
});

// Navbar scroll effect
window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");
  if (window.scrollY > 50) {
    navbar.style.background = "rgba(10, 10, 10, 0.98)";
  } else {
    navbar.style.background = "rgba(10, 10, 10, 0.95)";
  }
});

// Active navigation link highlighting
window.addEventListener("scroll", function () {
  const sections = document.querySelectorAll("section[id]");
  const navLinks = document.querySelectorAll(".nav-link");

  let current = "";
  sections.forEach((section) => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.clientHeight;
    if (window.scrollY >= sectionTop - 200) {
      current = section.getAttribute("id");
    }
  });

  navLinks.forEach((link) => {
    link.classList.remove("active");
    if (link.getAttribute("href") === `#${current}`) {
      link.classList.add("active");
    }
  });
});

// Keyboard navigation for slideshow
document.addEventListener("keydown", function (e) {
  if (e.key === "ArrowLeft") {
    changeSlide(-1);
  } else if (e.key === "ArrowRight") {
    changeSlide(1);
  }
});

// Touch/swipe support for mobile slideshow
let touchStartX = 0;
let touchEndX = 0;

const slideshowContainer = document.querySelector(".slideshow-container");
if (slideshowContainer) {
  slideshowContainer.addEventListener("touchstart", function (e) {
    touchStartX = e.changedTouches[0].screenX;
  });

  slideshowContainer.addEventListener("touchend", function (e) {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
  });
}

function handleSwipe() {
  const swipeThreshold = 50;
  const diff = touchStartX - touchEndX;

  if (Math.abs(diff) > swipeThreshold) {
    if (diff > 0) {
      // Swipe left - next slide
      changeSlide(1);
    } else {
      // Swipe right - previous slide
      changeSlide(-1);
    }
  }
}
