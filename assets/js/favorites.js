$(document).ready(function () {
  loadFavorites();
});

// Ambil daftar favorit dari database
function loadFavorites() {
  $.ajax({
    url: "api/favorites.php?action=getFavorites",
    type: "GET",
    dataType: "json",
    success: function (items) {
      var grid = $("#favoritesGrid");
      grid.empty();

      if (items.length == 0) {
        grid.html(
          '<div class="empty-favorites"><i class="fa-regular fa-heart"></i><p>You have no favorite items yet.<br>Click the heart icon on a product to add it here!</p></div>',
        );
        return;
      }

      items.forEach(function (item) {
        var card = '<div class="product-item">';
        card += '<a href="product/' + item.id + '" class="product-img-wrapper">';
        card += '<img src="' + item.image + '" alt="' + item.name + '">';
        card += '</a>';
        card += '<div class="product-info">';
        card += '<a href="product/' + item.id + '"><h3>' + item.name + '</h3></a>';
        card += '<p class="product-price">Rp ' + parseInt(item.price).toLocaleString("id-ID") + '</p>';
        card += '<div class="product-actions">';
        card += '<a href="product/' + item.id + '" class="btn-list" style="text-decoration:none;">View</a>';
        card += '<button class="btn-fav" style="color: #ef4444;" onclick="removeFavorite(' + item.fav_id + ')"><i class="fa-solid fa-trash"></i></button>';
        card += '</div>';
        card += '</div>';
        card += '</div>';

        grid.append(card);
      });
    },
  });
}

// Hapus dari favorit
function removeFavorite(favId) {
  $.ajax({
    url: "api/favorites.php",
    type: "POST",
    data: {
      action: "removeFavorite",
      fav_id: favId,
    },
    dataType: "json",
    success: function (response) {
      if (response.success) {
        loadFavorites();
        notifAlert("Removed from favorites");
      }
    },
  });
}

function notifAlert(message) {
  var container = $("#notifContainer");
  var box = $('<div class="notifAlert">' + message + "</div>");
  container.append(box);
  setTimeout(function () {
    box.addClass("show");
  }, 20);
  setTimeout(function () {
    box.removeClass("show");
    setTimeout(function () {
      box.remove();
    }, 300);
  }, 3000);
}