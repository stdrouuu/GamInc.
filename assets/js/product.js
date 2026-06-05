// Load products from database on page load
$(document).ready(function () {
  // Check if there is a search keyword in URL
  var params = new URLSearchParams(window.location.search);
  var searchKeyword = params.get("search");

  if (searchKeyword) {
    searchProducts(searchKeyword);
    // Also set the search bar value
    $("#searchInput").val(searchKeyword);
  } else {
    loadProducts();
  }

  updateCartCount();
});

// Load all products from database using AJAX
function loadProducts() {
  $.ajax({
    url: "api/products.php?action=getAll",
    type: "GET",
    dataType: "json",
    success: function (products) {
      var grid = $("#productsGrid");
      grid.empty();

      products.forEach(function (product) {
        var card = createProductCard(product);
        grid.append(card);
      });
    },
  });
}

// Search products from database
function searchProducts(keyword) {
  $.ajax({
    url:
      "api/products.php?action=search&keyword=" + encodeURIComponent(keyword),
    type: "GET",
    dataType: "json",
    success: function (products) {
      var grid = $("#productsGrid");
      grid.empty();

      if (products.length == 0) {
        grid.html(
          '<p style="text-align:center; color:#aaa; grid-column: 1/-1; padding:40px;">No products found for "' +
            keyword +
            '"</p>',
        );
        return;
      }

      products.forEach(function (product) {
        var card = createProductCard(product);
        grid.append(card);
      });
    },
  });
}

// Create a product card HTML
function createProductCard(product) {
  var badge = "";
  if (product.label == "PLAYSTATION") {
    badge = '<span class="badge playstation">PLAYSTATION</span>';
  } else if (product.label == "SWITCH 2") {
    badge = '<span class="badge switch2">SWITCH 2</span>';
  } else if (product.label == "OTHER") {
    badge = '<span class="badge other">OTHER</span>';
  }

  var html =
    '<a href="index.php?page=gameview&id=' +
    product.id +
    '" class="product-card-link">';
  html += '<div class="product-card">';
  html += '<div class="product-image">';
  html +=
    '<img src="' +
    product.image +
    '" alt="' +
    product.name +
    '" class="product-img">';
  html += badge;
  html += "</div>";
  html += "<h3>" + product.name + "</h3>";
  html +=
    '<div class="product-price">Rp ' +
    parseInt(product.price).toLocaleString("id-ID") +
    "</div>";
  html +=
    '<button class="add-to-cart" onclick="addToCart(' +
    product.id +
    '); return false;">Add to Cart</button>';
  html += "</div></a>";

  return html;
}

// Add to cart using AJAX
function addToCart(productId) {
  $.ajax({
    url: "api/cart.php",
    type: "POST",
    data: {
      action: "addToCart",
      product_id: productId,
    },
    dataType: "json",
    success: function (response) {
      if (response.success) {
        // Update cart count in navbar
        $(".cart-count").text(response.cartCount);
        notifAlert("Product added to cart!");
        // Automatically slide open the global Cart Sidebar Drawer
        if (typeof openCartSidebar === "function") {
          openCartSidebar();
        }
      }
    },
  });
}

// Update cart count in navbar
function updateCartCount() {
  $.ajax({
    url: "api/cart.php?action=getCount",
    type: "GET",
    dataType: "json",
    success: function (response) {
      $(".cart-count").text(response.cartCount);
    },
  });
}

// Load cart items from database
function loadCart() {
  $.ajax({
    url: "api/cart.php?action=getCart",
    type: "GET",
    dataType: "json",
    success: function (items) {
      var tbody = $(".cart-table tbody");
      tbody.empty();

      var subtotal = 0;

      if (items.length == 0) {
        tbody.html(
          '<tr><td colspan="5" style="text-align:center; color:#aaa; padding:30px;">Your cart is empty</td></tr>',
        );
      } else {
        items.forEach(function (item) {
          var itemTotal = parseInt(item.price) * parseInt(item.qty);
          subtotal += itemTotal;

          var row = '<tr class="cart-item">';
          row += '<td class="item-info">';
          row += '<img src="' + item.image + '">';
          row += "<span>" + item.name + "</span>";
          row += "</td>";
          row +=
            "<td>Rp " + parseInt(item.price).toLocaleString("id-ID") + "</td>";
          row += "<td>";
          row += '<div class="qty-box">';
          row +=
            '<button onclick="updateCartQty(' +
            item.cart_id +
            ", " +
            (parseInt(item.qty) - 1) +
            ')">-</button>';
          row += '<span class="qty-input">' + item.qty + "</span>";
          row +=
            '<button onclick="updateCartQty(' +
            item.cart_id +
            ", " +
            (parseInt(item.qty) + 1) +
            ')">+</button>';
          row += "</div>";
          row += "</td>";
          row += "<td>Rp " + itemTotal.toLocaleString("id-ID") + "</td>";
          row +=
            '<td><i class="fa-solid fa-trash" style="color: #d52525; cursor:pointer;" onclick="removeFromCart(' +
            item.cart_id +
            ')"></i></td>';
          row += "</tr>";

          tbody.append(row);
        });
      }

      // Update summary
      var shipping = 24000;
      var total = subtotal + shipping;
      $("#subtotal").text("Rp " + subtotal.toLocaleString("id-ID"));
      $("#tax").text("Rp " + shipping.toLocaleString("id-ID"));
      $("#total").text("Rp " + total.toLocaleString("id-ID"));
    },
  });
}

// Update cart quantity
function updateCartQty(cartId, newQty) {
  $.ajax({
    url: "api/cart.php",
    type: "POST",
    data: {
      action: "updateQty",
      cart_id: cartId,
      qty: newQty,
    },
    dataType: "json",
    success: function () {
      loadCart();
      updateCartCount();
    },
  });
}

// Remove from cart
function removeFromCart(cartId) {
  $.ajax({
    url: "api/cart.php",
    type: "POST",
    data: {
      action: "removeFromCart",
      cart_id: cartId,
    },
    dataType: "json",
    success: function () {
      loadCart();
      updateCartCount();
    },
  });
}

// Notification alert
function notifAlert(message) {
  var container = $("#notifContainer");
  var box = $('<div class="notifAlert">' + message + "</div>");
  container.append(box);

  setTimeout(function () {
    box.addClass("show");
  }, 20);

  // Remove after 3 seconds
  setTimeout(function () {
    box.removeClass("show");
    setTimeout(function () {
      box.remove();
    }, 300);
  }, 3000);
}
