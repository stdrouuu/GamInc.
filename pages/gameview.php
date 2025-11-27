<link rel="stylesheet" href="./assets/css/gameview-style.css">

<a href="index.php?page=product" class="back-button">
    <i class="fas fa-arrow-left"></i>
    <span>Back</span>
</a>

<div class="product-container">

    <div class="product-gallery">
        <div class="main-image">
            <img src="{{product.image}}" alt="{{product.name}}" id="mainProductImage">
        </div>
    </div>

    <div class="product-details">
        <p class="product-brand">Product Brand / <b>PlayStation</b></p>

        <h1 class="product-title">{{product.name}}</h1>

        <div class="price-section">
            <p class="old-price">{{product.oldPrice}}</p>
            <p class="current-price">{{product.price}}</p>
        </div>

        <hr>

        <p class="enhancements">
            {{product.enhancements}}
        </p>

        <button class="add-to-cart" id="addToCartBtn">ADD TO CART</button>

        <hr>

        <div class="metadata">
            <p><strong>SKU:</strong> <span>{{product.sku}}</span></p>
            <p><strong>CATEGORIES:</strong> <span>{{product.category}}</span></p>
            <p><strong>TAGS:</strong> <span>{{product.tags}}</span></p>
        </div>
    </div>
</div>

<script src="/assets/js/gameview.js"></script>
