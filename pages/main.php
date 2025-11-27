<link rel="stylesheet" href="./assets/css/main-style.css" />


<section id="home" class="hero" style>
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./assets/img/banner7.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="./assets/img/banner8.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="./assets/img/banner1.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="./assets/img/banner6.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="./assets/img/banner4.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="./assets/img/banner3.jpg" class="d-block w-100" alt="..." />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="prev"
          style="color: #00FFFF; font-size: 3rem;"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>

        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="next"
          style="color: #00FFFF; font-size: 3rem;"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>

      <!-- Featured Games Grid -->
      <div class="featured-games">
        <div class="container">
          <h2>Our Collections</h2>
          <div class="featured-grid">
            <div class="featured-card">
              <div class="featured-image">
                <i class="fa-brands fa-playstation"></i>
              </div>
              <h3>PS4 & PS5</h3>
              <p>Complete Game titles for PlayStation consoles !</p>
              <button class="featured-btn" onclick="scrollToSection('menu')">
                View Details
              </button>
            </div>
            <div class="featured-card">
              <div class="featured-image switch">
                <i class="fa-solid fa-gamepad"></i>
              </div>
              <h3>Nintendo Switch 2</h3>
              <p>Variety of games available for the Nintendo console !</p>
              <button class="featured-btn" onclick="scrollToSection('menu')">
                Pre-Order
              </button>
            </div>
            <div class="featured-card">
              <div class="featured-image preorder">
                <i class="fas fa-star"></i>
              </div>
              <h3>Newest Games</h3>
              <p>Explore the latest and greatest game titles !</p>
              <button class="featured-btn" onclick="scrollToSection('menu')">
                Browse All
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- newArivval -->
    <div class="container">
      <div class="new-arrival-section">
        <div class="arrival-banner-card">
          <h3>NEW<br />ARRIVAL</h3>
          <p>Be the first to own new items !</p>
          <button onclick="location.href='index.php?page=product'" class="arrival-btn">Go to Products</button>
        </div>

        <div class="arrival-products-grid">
          <div class="product-card">
            <div class="product-image">
              <img src="./assets/img/nba.jpg" alt="" class="product-img"> <span class="badge playstation">PS 5</span>
            </div>
            <h3>NBA 2K26 </h3>
            <p class="product-price">Rp 815.000</p>
            <button class="add-to-cart" onclick="location.href='index.php?page=product'">See More</button>
          </div>

          <div class="product-card">
            <div class="product-image">
              <img src="./assets/img/ninja.jpg" alt="" class="product-img"> <span class="badge playstation">PS 5</span>
            </div>
            <h3>Ninja Gaiden 4</h3>
            <p class="product-price">Rp 1.024.000</p>
            <button class="add-to-cart" onclick="location.href='index.php?page=product'">See More</button>
          </div>

          <div class="product-card">
            <div class="product-image">
              <img src="./assets/img/fc26.jpg" alt="" class="product-img"> <span class="badge switch2">SWITCH 2</span>
            </div>
            <h3>FC 26</h3>
            <p class="product-price">Rp 760.000</p>
            <button class="add-to-cart" onclick="location.href='index.php?page=product'">See More</button>
          </div>

          <div class="product-card">
            <div class="product-image">
              <img src="./assets/img/yotei.jpg" alt="" class="product-img"> <span class="badge playstation">PS 5</span>
            </div>
            <h3>Ghost of Yōtei</h3>
            <p class="product-price">Rp 1.029.000</p>
            <button class="add-to-cart" onclick="location.href='index.php?page=product'">See More</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Galery Section -->
      <div class="container">
        <h2 class="section-title">Best-Selling Games</h2>
        <div class="about-content">
          <div class="about-text">
            <div class="game-grid-container">
              <div class="grid-column-left">
                <div class="grid-item large-left">
                  <img
                    src="./assets/img/spidermanmiles.png"
                    alt="Spiderman Miles Morales"
                  />
                </div>
              </div>

              <div class="grid-column-right">
                <div class="grid-item small-right-top">
                  <img src="./assets/img/gow.png" alt="God of War" />
                </div>
                <div class="grid-item small-right-bottom">
                  <img src="./assets/img/tlou1.png" alt="The Last of Us Part 1" />
                </div>
              </div>
            </div>

            <div class="banner-full-width">
              <img
                src="./assets/img/banner2.jpg"
                alt="Portable Retro Game Console Banner"
              />
            </div>
          </div>
        </div>
      </div>

    <!-- About Section -->
    <section id="about" class="about">
      <div class="container">
        <h2 class="section-title">About GamInc.</h2>
        <div class="about-content">
          <div class="about-text">
            <p>
              GamInc. is your premier destination for PlayStation & Nintendo gaming
              products. We specialize in providing the latest games, consoles,
              and accessories to enhance your gaming experience.
            </p>
            <p>
              With a passion for gaming and commitment to quality, we ensure
              that every product meets the highest standards. Our mission is to
              make gaming accessible and enjoyable for everyone.
            </p>
            <div class="features">
              <div class="feature">
                <i class="fas fa-shipping-fast"></i>
                <h4>Fast Delivery</h4>
                <p>Quick and reliable shipping nationwide</p>
              </div>
              <div class="feature">
                <i class="fas fa-circle-check" style="color: #44ef86ff"></i>
                <h4>Authentic Products</h4>
                <p>100% genuine PlayStation products</p>
              </div>
              <div class="feature">
                <i class="fas fa-headset" style="color: #fbbf24"></i>
                <h4>24/7 Support</h4>
                <p>Customer support whenever you need it</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact/Footer Section -->
    <section id="contact" class="contact">
      <div class="container">
        <h2 class="section-title">Contact Us</h2>
        <div class="contact-content">
          <div class="contact-info">
            <div class="contact-item">
              <i class="fas fa-envelope"></i>
              <div>
                <h4>Email</h4>
                <p>support.gaminc@gaminc.com</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fas fa-phone"></i>
              <div>
                <h4>Phone</h4>
                <p>+62 812-3456-7890</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fas fa-map-marker-alt"></i>
              <div>
                <h4>Address</h4>
                <p>Jl. Gaminc Center No. 123, Jakarta Barat, Indonesia</p>
              </div>
            </div>
          </div>
          <div class="map-container">
            <h4>Find Us</h4>
            <div class="map-wrapper">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.4799741033162!2d106.82356565026629!3d-6.136083819383487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1e02081711a1%3A0xab408191f954d871!2sITC%20Mangga%20Dua!5e0!3m2!1sid!2sid!4v1762317099020!5m2!1sid!2sid"
                width="100%"
                height="300"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
        </div>
        <div class="social-media">
          <h4>Follow Us</h4>
          <div class="social-icons">
            <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-youtube" ></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter" ></i></a>
          </div>
        </div>
      </div>
    </section>
