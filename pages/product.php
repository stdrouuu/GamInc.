<link rel="stylesheet" href="./assets/css/product-style.css" />

  
<!-- Menu/Products Section -->
    <section id="menu" class="products">
      <div class="container">
        <h2 class="section-title"><br>Our Products</h2>
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
              <!-- Item 1 -->
              <tr class="cart-item">
                <td class="item-info">
                  <img src="./assets/img/nba.jpg">
                  <span>NBA 2K26</span>
                </td>

                <td>Rp 815.000</td>

                <td>
                  <div class="qty-box">
                    <button>-</button>
                      <span class="qty-input">1</span>
                    <button>+</button>
                  </div>
                </td>

                <td>Rp 815.000</td>

                <td><i class="fa-solid fa-trash" style="color: #d52525"></i></td>
              </tr>

              <!-- Item 2 -->
              <tr class="cart-item">
                <td class="item-info">
                  <img src="./assets/img/yotei.jpg">
                  <span>Ghost of Yōtei</span>
                </td>

                <td>Rp 1.029.000</td>

                <td>
                  <div class="qty-box">
                    <button>-</button>
                      <span class="qty-input">1</span>
                    <button>+</button>
                  </div>
                </td>

                <td>Rp 1.029.000</td>

                <td><i class="fa-solid fa-trash" style="color: #d52525"></i></td>
              </tr>
            </tbody>
          </table>
      </div>

          
          <div class="cart-summary">
            <h3>Order Summary</h3>
            <div class="summary-row">
              <span>Subtotal:</span>
              <span id="subtotal">Rp 1.844.000</span>
            </div>
            <div class="summary-row">
              <span>Shipping Fee (GoSend):</span>
              <span id="tax">Rp 24.000</span>
            </div>
            <div class="summary-row total">
              <span>Total:</span>
              <span id="total">Rp 1.868.400</span>
            </div>
            <button class="checkout-button">Proceed to Checkout</button>
          </div>
        </div>
      </div>
    </section>
    
    <div id="notifContainer"></div>


    <script src="assets/js/array.js"></script>
    <script src="assets/js/product.js"></script>