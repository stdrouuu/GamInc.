<link rel="stylesheet" href="./assets/css/product-style.css" />

  
<!-- product -->
    <section class="products" id="menu">
      <div class="container">
        <h2 class="section-title"><br>Our Products</h2>
        <div class="products-grid" id="productsGrid">
          <!-- products loaded here via AJAX -->
        </div>
      </div>
    </section>

    <section class="cart-section" id="cart">
      <div class="container">
        <h2 class="section-title">Shopping Cart</h2>
        <div class="cart-content">

          <div class="cart-items" id="cartItems">
            <table class="cart-table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <!-- cart items loaded via AJAX -->
              </tbody>
            </table>
          </div>

          <div class="cart-summary">
            <h3>Order Summary</h3>
              <div class="summary-row">
                <span>Subtotal:</span>
                <span id="subtotal">Rp 0</span>
              </div>
              
              <div class="summary-row">
                <span>Shipping Fee (GoSend):</span>
                <span id="tax">Rp 24.000</span>
              </div>

              <div class="summary-row total">
                <span>Total:</span>
                <span id="total">Rp 24.000</span>
              </div>
            <button class="checkout-button" onclick="alert('Checkout feature coming soon!')">Proceed to Checkout</button>
          </div>
        </div>
      </div>
    </section>
    
  <div id="notifContainer"></div>

  <script src="assets/js/product.js"></script>
  <script>
    // Load cart when page loads (after product.js is loaded)
    $(document).ready(function() {
      loadCart();
    });
  </script>