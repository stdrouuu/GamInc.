document.addEventListener("DOMContentLoaded", function () {
  loadProducts();
});

// const product

function createProductCard(product) {
  const link = document.createElement("a");
  link.href = `index.php?page=gameview&id=${product.id}`;
  link.className = "product-card-link";

  const card = document.createElement("div");
  card.className = "product-card";

  let badge = "";
  if (product.category === "Playstation") {
    badge = `<span class="badge playstation">PLAYSTATION</span>`;
  } else if (product.category === "Switch2") {
    badge = `<span class="badge switch2">SWITCH 2</span>`;
  }

  card.innerHTML = `
    <div class="product-image">
      <img src="${product.image}" alt="${product.name}" class="product-img">
      ${badge}
    </div>

    <h3>${product.name}</h3>

    <div class="product-price">Rp ${product.price.toLocaleString("id-ID")}</div>
    <button class="add-to-cart" onclick="addToCart(${product.id}); return false;"> Add to Cart </button>
  `;

  link.appendChild(card);
  return link;
}

function loadProducts() {
  const productsGrid = document.getElementById("productsGrid");
  productsGrid.innerHTML = "";

  products.forEach((product) => {
    const productCard = createProductCard(product);
    productsGrid.appendChild(productCard);
  });
}

function addToCart(productId) {
  const product = products.find(item => item.id === productId);
  notifAlert(`Added: "${product.name}" to cart!`);
}

function notifAlert(message) {
  const container = document.getElementById("notifContainer");

  const box = document.createElement("div");
  box.className = "notifAlert";
  box.innerHTML = message;

  container.appendChild(box);

  setTimeout(() => {
    box.classList.add("show");
  }, 20);

  // Hapus setelah 3 detik
  setTimeout(() => {
    box.classList.remove("show");
    setTimeout(() => box.remove(), 300);
  }, 3000);
}