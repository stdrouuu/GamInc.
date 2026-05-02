<link rel="stylesheet" href="./assets/css/product-style.css" />

<style>
    .favorites-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 100px 20px 60px;
    }
    .favorites-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }
    .fav-card {
        background: var(--card-bg, #1a1a1a);
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        border: 1px solid var(--card-border, #333);
        transition: all 0.3s ease;
    }
    .fav-card:hover {
        transform: translateY(-5px);
        border-color: var(--accent-color, #00e6e0);
    }
    .fav-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 1rem;
    }
    .fav-card h3 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: var(--text-main, #fff);
    }
    .fav-card .fav-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--accent-color, #00e6e0);
        margin-bottom: 1rem;
    }
    .fav-actions {
        display: flex;
        gap: 10px;
        justify-content: center;
    }
    .btn-view {
        background: transparent;
        color: var(--accent-color, #00e6e0);
        border: 2px solid var(--accent-color, #00e6e0);
        padding: 8px 18px;
        border-radius: 25px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    .btn-view:hover {
        background: var(--accent-color, #00e6e0);
        color: #000;
    }
    .btn-remove-fav {
        background: transparent;
        color: #ff4d4d;
        border: 2px solid #ff4d4d;
        padding: 8px 18px;
        border-radius: 25px;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    .btn-remove-fav:hover {
        background: #ff4d4d;
        color: #fff;
    }
    .empty-favorites {
        text-align: center;
        padding: 60px 20px;
        color: #aaa;
    }
    .empty-favorites i {
        font-size: 4rem;
        color: #333;
        margin-bottom: 15px;
    }
    .empty-favorites p {
        font-size: 1.1rem;
    }
    .back-button {
        position: fixed;
        top: 25px;
        left: 20px;
        z-index: 900;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        color: #fff;
        padding: 10px 15px;
        border-radius: 8px;
        background-color: rgba(0, 230, 224, 0.1);
        border: none;
        transition: all 0.3s ease;
    }
    .back-button i {
        color: #00e6e0;
    }
    .back-button:hover {
        background-color: rgba(0, 230, 224, 0.3);
        color: #00e6e0;
        transform: translateX(-3px);
    }
</style>

    <a href="index.php?page=product" class="back-button">
        <i class="fas fa-arrow-left"></i>
        <span>Back</span>
    </a>

<div class="favorites-container">
    <h2 class="section-title">My Favorites</h2>
    
    <div class="favorites-grid" id="favoritesGrid">
        <!-- favorites loaded via AJAX -->
    </div>
</div>

<div id="notifContainer"></div>

<script>
    $(document).ready(function() {
        loadFavorites();
    });

    // Load favorites from database
    function loadFavorites() {
        $.ajax({
            url: 'api/favorites.php?action=getFavorites',
            type: 'GET',
            dataType: 'json',
            success: function(items) {
                var grid = $('#favoritesGrid');
                grid.empty();

                if (items.length == 0) {
                    grid.html('<div class="empty-favorites"><i class="fa-regular fa-heart"></i><p>You have no favorite items yet.<br>Click the heart icon on a product to add it here!</p></div>');
                    return;
                }

                items.forEach(function(item) {
                    var card = '<div class="fav-card">';
                    card += '<img src="' + item.image + '" alt="' + item.name + '">';
                    card += '<h3>' + item.name + '</h3>';
                    card += '<div class="fav-price">Rp ' + parseInt(item.price).toLocaleString('id-ID') + '</div>';
                    card += '<div class="fav-actions">';
                    card += '<a href="index.php?page=gameview&id=' + item.id + '" class="btn-view">View</a>';
                    card += '<button class="btn-remove-fav" onclick="removeFavorite(' + item.fav_id + ')"><i class="fas fa-trash"></i> Remove</button>';
                    card += '</div>';
                    card += '</div>';

                    grid.append(card);
                });
            }
        });
    }

    // Remove from favorites
    function removeFavorite(favId) {
        $.ajax({
            url: 'api/favorites.php',
            type: 'POST',
            data: {
                action: 'removeFavorite',
                fav_id: favId
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    loadFavorites();
                    notifAlert('Removed from favorites');
                }
            }
        });
    }

    // Notification
    function notifAlert(message) {
        var container = $('#notifContainer');
        var box = $('<div class="notifAlert">' + message + '</div>');
        container.append(box);
        setTimeout(function() { box.addClass('show'); }, 20);
        setTimeout(function() {
            box.removeClass('show');
            setTimeout(function() { box.remove(); }, 300);
        }, 3000);
    }
</script>

<script src="assets/js/thtoggle.js"></script>
