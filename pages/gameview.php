<link rel="stylesheet" href="./assets/css/gameview-style.css">

<a href="index.php?page=product" class="back-button">
    <i class="fas fa-arrow-left"></i>
    <span>Back</span>
</a>

<div class="product-card">
    <div class="product-gallery">
        <div class="main-image">
            <img src="" alt="Product Image" id="mainProductImage">
        </div>
    </div>

    <div class="product-details">
        <p class="product-brand" id="productBrand">Product Brand</p>

        <h1 class="product-title" id="productTitle">Product Title</h1>

        <div class="price-section">
            <p class="current-price" id="productPrice">Rp -</p>
        </div>

        <hr>

        <p class="description" id="description">-</p>

        <button class="add-to-cart" id="addToCart" onclick=addToCart();>ADD TO CART</button>

        <hr>

        <div class="metadata">
            <p><strong>SKU:</strong> <span class="sku" id="sku">-</span></p>
            <p><strong>CATEGORIES:</strong> <span class="category" id="category">-</span></p>
            <p><strong>TAGS:</strong> <span class="tags" id="tags">-</span></p>
        </div>

        <div class="social-share">
            <a href="#"><i class="fa-regular fa-heart"></i></a>
            <a href="index.php?page=product#cart"><i class="fa-solid fa-shopping-cart"></i></a>
            <a href="#"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
    </div>
</div>

<div id="notifContainer"></div>

<script src="assets/js/array.js"></script>
<script src="assets/js/gameview.js"></script>