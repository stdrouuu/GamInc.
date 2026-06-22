<link rel="stylesheet" href="./assets/css/product-style.css" />

<link rel="stylesheet" href="./assets/css/favorites-style.css" />

    <a href="product" class="back-button">
        <i class="fas fa-arrow-left"></i>
        <span>Back</span>
    </a>

<div class="favorites-container">
    <div class="catalog-header" style="text-align: left; margin-bottom: 40px;">
        <h1 class="catalog-title" style="font-size: 2.5rem;">My Favorites</h1>
        <p class="catalog-desc">Your curated list of essential gear.</p>
    </div>
    
    <div class="products-grid" id="favoritesGrid">
        <!-- favorites loaded via AJAX -->
    </div>
</div>

<div id="notifContainer"></div>

<script src="assets/js/favorites.js"></script>

