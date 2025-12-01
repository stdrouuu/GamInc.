document.addEventListener("DOMContentLoaded", function () {
  loadGameview();
});

// const product

function getProductIdFromURL() {
  const params = new URLSearchParams(window.location.search);
  return Number(params.get("id"))
  ;
}

function loadGameview() {
  const productId = getProductIdFromURL();
  const product = products.find(item => item.id === productId);

  const mainImage = document.getElementById("mainProductImage");
  mainImage.src = product.image;
  mainImage.alt = product.name;

  document.getElementById("productTitle").innerText = product.name;

  document.getElementById("productPrice").innerText =
    "Rp " + product.price.toLocaleString("id-ID");
    
  document.getElementById("description").innerText = `${product.description}`;

  document.getElementById("sku").innerText = `ITEM-ID-${product.id}`;
  document.getElementById("category").innerText = product.category;
  document.getElementById("tags").innerText = `${product.category}, Games`;

  document.getElementById("addToCart").addEventListener("click", () => {
    notifAlert(`Added "${product.name}" to cart!`);
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



