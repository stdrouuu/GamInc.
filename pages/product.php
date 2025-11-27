<link rel="stylesheet" href="./assets/css/product-style.css" />

  
<!-- Menu/Products Section -->
    <section id="menu" class="products">
      <div class="container">
        <h2 class="section-title">Our Products</h2>
        <div class="products-grid" id="productsGrid">
          <!-- Products will be dynamically loaded here -->
        </div>
      </div>
    </section>

    <section id="cart" class="cart-section">
      <div class="container">
        <h2 class="section-title">Shopping Cart</h2>
        <div class="cart-content">
          <div class="cart-items" id="cartItems">
            <div class="empty-cart" id="emptyCart">
              <i class="fas fa-shopping-cart"></i>
              <p>Your cart is empty</p>
              <button class="cta-button" onclick="scrollToSection('menu')">
                Start Shopping
              </button>
            </div>
          </div>
          <div class="cart-summary" id="cartSummary" style="display: none">
            <h3>Order Summary</h3>
            <div class="summary-row">
              <span>Subtotal:</span>
              <span id="subtotal">Rp 0</span>
            </div>
            <div class="summary-row">
              <span>Tax (10%):</span>
              <span id="tax">Rp 0</span>
            </div>
            <div class="summary-row total">
              <span>Total:</span>
              <span id="total">Rp 0</span>
            </div>
            <button class="checkout-button">Proceed to Checkout</button>
          </div>
        </div>
      </div>
    </section>
    
    <script src="assets/js/product.js"></script>