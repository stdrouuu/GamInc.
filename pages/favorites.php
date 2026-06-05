<link rel="stylesheet" href="./assets/css/product-style.css?v=<?= time(); ?>" />

<style>
    .favorites-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 120px 30px 60px;
    }
    .favorites-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 24px;
        margin-top: 2rem;
    }
    .fav-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 24px;
        text-align: left;
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
    }
    .fav-card:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.06);
    }
    .fav-card img {
        width: 100%;
        height: 380px;
        object-fit: cover;
        border-radius: 16px;
        margin-bottom: 20px;
    }
    .fav-card h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--text-main, #fff);
    }
    .fav-card .fav-price {
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--text-muted, #a1a1aa);
        margin-bottom: 24px;
    }
    .fav-actions {
        display: flex;
        gap: 12px;
        justify-content: stretch;
        margin-top: auto;
    }
    .btn-view {
        background: rgba(255,255,255,0.05);
        color: var(--text-main, #fff);
        border: none;
        padding: 12px 20px;
        border-radius: 24px;
        cursor: pointer;
        font-weight: 500;
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        flex: 1;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .btn-view:hover {
        background: var(--text-main, #fff);
        color: var(--bg-body, #0d0f12);
    }
    .btn-remove-fav {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        border: none;
        padding: 12px 20px;
        border-radius: 24px;
        cursor: pointer;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .btn-remove-fav:hover {
        background: #ef4444;
        color: #fff;
    }
    .empty-favorites {
        text-align: center;
        padding: 80px 20px;
        color: var(--text-muted, #a1a1aa);
        grid-column: 1 / -1;
    }
    .empty-favorites i {
        font-size: 4rem;
        color: var(--text-muted, #a1a1aa);
        margin-bottom: 20px;
    }
    .empty-favorites p {
        font-size: 1.1rem;
        line-height: 1.6;
    }
    .back-button {
        position: fixed;
        top: 30px;
        left: 30px;
        z-index: 900;
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        font-weight: 500;
        font-size: 1rem;
        color: var(--text-main, #fff);
        padding: 12px 20px;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease;
    }
    .back-button i {
        color: var(--text-main, #fff);
    }
    .back-button:hover {
        background-color: var(--text-main, #fff);
        color: var(--bg-body, #0d0f12);
        transform: translateX(-3px);
    }
    .back-button:hover i {
        color: var(--bg-body, #0d0f12);
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
