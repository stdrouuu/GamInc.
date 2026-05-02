// Load gameview details from database on page load
$(document).ready(function () {
  loadGameview();
});

// Get product id from URL
function getProductIdFromURL() {
  var params = new URLSearchParams(window.location.search);
  return Number(params.get("id"));
}

// Load product details using AJAX
function loadGameview() {
  var productId = getProductIdFromURL();

  $.ajax({
    url: 'api/products.php?action=getOne&id=' + productId,
    type: 'GET',
    dataType: 'json',
    success: function (product) {
      $('#mainProductImage').attr('src', product.image);
      $('#mainProductImage').attr('alt', product.name);
      $('#productTitle').text(product.name);
      $('#productPrice').text('Rp ' + parseInt(product.price).toLocaleString('id-ID'));
      $('#description').text(product.description);
      $('#sku').text('ITEM-ID-' + product.id);
      $('#category').text(product.label);
      $('#tags').text(product.label + ', Games');

      // Set brand text based on label
      if (product.label == 'PLAYSTATION') {
        $('#productBrand').text('PlayStation');
      } else if (product.label == 'SWITCH 2') {
        $('#productBrand').text('Nintendo Switch 2');
      } else {
        $('#productBrand').text('Other');
      }

      // Check if this product is favorited
      checkFavoriteStatus(product.id);
    }
  });
}

// Add to cart from gameview page
function addToCart() {
  var productId = getProductIdFromURL();

  $.ajax({
    url: 'api/cart.php',
    type: 'POST',
    data: {
      action: 'addToCart',
      product_id: productId
    },
    dataType: 'json',
    success: function (response) {
      if (response.success) {
        notifAlert('Product added to cart!');
      }
    }
  });
}

// Toggle favorite
function toggleFavorite() {
  var productId = getProductIdFromURL();

  $.ajax({
    url: 'api/favorites.php',
    type: 'POST',
    data: {
      action: 'toggleFavorite',
      product_id: productId
    },
    dataType: 'json',
    success: function (response) {
      if (response.status == 'added') {
        $('#favIcon').removeClass('fa-regular').addClass('fa-solid');
        $('#favIcon').css('color', '#ff4d4d');
        notifAlert('Added to Favorites!');
      } else {
        $('#favIcon').removeClass('fa-solid').addClass('fa-regular');
        $('#favIcon').css('color', '');
        notifAlert('Removed from Favorites');
      }
    }
  });
}

// Check if product is already favorited
function checkFavoriteStatus(productId) {
  $.ajax({
    url: 'api/favorites.php?action=checkFavorite&product_id=' + productId,
    type: 'GET',
    dataType: 'json',
    success: function (response) {
      if (response.isFavorited) {
        $('#favIcon').removeClass('fa-regular').addClass('fa-solid');
        $('#favIcon').css('color', '#ff4d4d');
      }
    }
  });
}

// Notification alert
function notifAlert(message) {
  var container = $('#notifContainer');
  var box = $('<div class="notifAlert">' + message + '</div>');
  container.append(box);

  setTimeout(function () {
    box.addClass('show');
  }, 20);

  setTimeout(function () {
    box.removeClass('show');
    setTimeout(function () { box.remove(); }, 300);
  }, 3000);
}
