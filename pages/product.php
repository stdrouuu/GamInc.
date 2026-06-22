<link rel="stylesheet" href="./assets/css/product-style.css?v=<?= time(); ?>" />

<section class="products-catalog">
  <div class="container">
    <div class="catalog-header">
      <h1 class="catalog-title">Our Collection</h1>
      <p class="catalog-desc">Discover the latest arrivals and essential gear for your setup.</p>
    </div>
    
    <div class="products-grid" id="productsGrid">
      <!-- products loaded here via AJAX -->
    </div>
  </div>
</section>
<div id="notifContainer"></div>

<script src="assets/js/product.js"></script>