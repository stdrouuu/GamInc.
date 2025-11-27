document.addEventListener("DOMContentLoaded", function () {
  initializeWebsite();
  initializeSlideshow();
});

const products = [
  {
    id: 1,
    name: "NBA 2K26",
    price: 815000,
    image: "./assets/img/nba.jpg",
    category: "console",
  },
  {
    id: 2,
    name: "SpongeBob: Titans of the Tide",
    price: 479000,
    image: "./assets/img/spongebob.jpg",
    category: "game",
  },
  {
    id: 3,
    name: "Kirby Air Riders",
    price: 950000,
    image: "./assets/img/kirby.jpg",
    category: "accessory",
  },
  {
    id: 4,
    name: "Call of Duty: Black Ops 7",
    price: 999000,
    image: "./assets/img/codbo7.jpg",
    category: "game",
  },
  {
    id: 5,
    name: "Ninja Gaiden 4",
    price: 1045000,
    image: "./assets/img/ninja.jpg",
    category: "accessory",
  },
  {
    id: 6,
    name: "Ghost Of Yotei",
    price: 350000,
    image: "./assets/img/yotei.jpg",
    category: "game",
  },
  {
    id: 7,
    name: "The Last of Us Part I",
    price: 700000,
    image: "./assets/img/tlou1.png",
    category: "game",
  },
  {
    id: 8,
    name: "God of War Ragnarök",
    price: 703200,
    image: "./assets/img/gow.png",
    category: "console",
  },
  {
    id: 9,
    name: "Red Dead Redemption 2",
    price: 3000,
    image: "./assets/img/rdr2.png",
    category: "game",
  },
  {
    id: 10,
    name: "The Last of Us Part II",
    price: 850000,
    image: "./assets/img/tlou2.png",
    category: "game",
  },
  {
    id: 11,
    name: "Spiderman: Miles Morales",
    price: 350000,
    image: "./assets/img/spidermanmiles.png",
    category: "game",
  },
  {
    id: 12,
    name: "Lynked: Banner of the Spark",
    price: 119999,
    image: "./assets/img/lynked.jpg",
    category: "game",
  },
  {
    id: 13,
    name: "Jurassic World: Evolution 2",
    price: 749000,
    image: "./assets/img/jurrasic.jpg",
    category: "game",
  },
  {
    id: 14,
    name: "Red Dead Redemption 2",
    price: 350000,
    image: "./assets/img/rdr2.png",
    category: "game",
  },
  {
    id: 15,
    name: "Red Dead Redemption 2",
    price: 350000,
    image: "./assets/img/rdr2.png",
    category: "game",
  },
  {
    id: 16,
    name: "PlayStation 5/PS5 Console Digital Edition [Slim] - 1TB",
    price: 8199000,
    image: "./assets/img/ps5.jpg",
    category: "game",
  },
  {
    id: 17,
    name: "Nintendo Switch 2 Console / NS2 Console",
    price: 8099000,
    image: "./assets/img/switch2.jpg",
    category: "game",
  },
  {
    id: 18,
    name: "Nintendo Switch JoyCon Controllers - Neon Green/Pink",
    price: 350000,
    image: "./assets/img/switch2joycon.jpg",
    category: "game",
  },
  {
    id: 19,
    name: "DualSense Wireless Controller - Starlight Blue",
    price: 1499000,
    image: "./assets/img/dualsense.jpg",
    category: "game",
  },
  {
    id: 20,
    name: "PlayStation Pulse Elite Wireless Headset - Black",
    price: 2498000,
    image: "./assets/img/headset.jpg",
    category: "game",
  },
  {
    id: 21,
    name: "KontrolFreek Performance Grips for PS4 - Inferno Red",
    price: 240000,
      image: "./assets/img/grips.jpg",
    category: "game",
  },
      {
    id: 21,
    name: "Nintendo Eshop Card USD $20 - (Digital) ",
    price: 609000,
    image: "./assets/img/mario.jpg",
    category: "game",
  },
    {
    id: 21,
    name: "Nintendo Eshop Card USD $35 - (Digital) ",
    price: 609000,
    image: "./assets/img/princess.jpg",
    category: "game",
  },
  {
    id: 21,
    name: "Nintendo Eshop Card USD $50 - (Digital) ",
    price: 844000,
    image: "./assets/img/bowser.jpg",
    category: "game",
  },
  {
    id: 21,
    name: "Steam Wallet Gift Card (IDR. 60.000) - (Digital) ",
    price: 63300,
    image: "./assets/img/steam.jpg",
    category: "game",
  },
  {
    id: 21,
    name: "PlayStation Network / PSN Card IDR 200rb - (Digital)",
    price: 303300,
    image: "./assets/img/psstore.jpg",
    category: "game",
  },
  {
    id: 21,
    name: "PlayStation Network / PSN Card IDR 200rb - (Digital)",
    price: 303300,
    image: "./assets/img/steam.jpg",
    category: "game",
  },
];

// Shopping cart
let cart = JSON.parse(localStorage.getItem("gaminc_cart")) || [];

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
  link.href = `index.php?page=gameview&id=${product.id}`;
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
                            <img src="${item.image}" alt="${
      item.name
    }" style="width: 50px; height: 50px; object-fit: cover;">
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

    cart = [];
    saveCart();
    updateCartCount();
    updateCartDisplay();
    showNotification(
      "Order placed successfully! Thank you for shopping with GamInc.!"
    );
  }
});
