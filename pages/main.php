<link rel="stylesheet" href="./assets/css/main-style.css" />


<section class="hero" style>
  <!-- bootsrap carousel -->
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./assets/img/banner7.jpg" class="d-block w-100"/>
          </div>
          <div class="carousel-item">
            <img src="./assets/img/banner6.jpg" class="d-block w-100"/>
          </div>
          <div class="carousel-item">
            <img src="./assets/img/banner8.jpg" class="d-block w-100"/>
          </div>
          <div class="carousel-item">
            <img src="./assets/img/banner1.jpg" class="d-block w-100"/>
          </div>
          <div class="carousel-item">
            <img src="./assets/img/banner4.jpg" class="d-block w-100"/>
          </div>
          <div class="carousel-item">
            <img src="./assets/img/banner3.jpg" class="d-block w-100"/>
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
      <div class="our-collection">
        <div class="container">
          <h2 class="section-title">Our Collections</h2>
          <div class="ourcollection-grid">
            <div class="ourcollection-card">

              <div class="ourcollection-image-1">
                <i class="fa-brands fa-playstation"></i>
              </div>
              <h3>PS4 & PS5</h3>
              <p>Complete Game titles for PlayStation consoles !</p>
              <button class="ourcollection-btn" onclick="scrollToSection('menu')">
                View Details
              </button>
            </div>

            <div class="ourcollection-card">
              <div class="ourcollection-image-2">
                <i class="fa-solid fa-gamepad"></i>
              </div>
              <h3>Nintendo Switch 2</h3>
              <p>Variety of games available for the Nintendo console !</p>
              <button class="ourcollection-btn" onclick="scrollToSection('menu')">
                Pre-Order
              </button>
            </div>

            <div class="ourcollection-card">
              <div class="ourcollection-image-3">
                <i class="fas fa-star"></i>
              </div>
              <h3>Newest Games</h3>
              <p>Explore the latest and greatest game titles !</p>
              <button class="ourcollection-btn" onclick="scrollToSection('menu')">
                Browse All
              </button>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- NEW ARRIVAL -->
    <div class="container">
      <div class="new-arrival">
        <div class="arrival-left-banner">
          <h3>NEW<br />ARRIVAL</h3>
          <p>Be the first to own new items !</p>
          <button onclick="location.href='index.php?page=product'" class="arrival-left-btn">Go to Products</button>
        </div>

        <div class="arrival-right-grid">
          <div class="arrival-right-card">
            <div class="arrival-right-image">
              <img src="./assets/img/nba.jpg" class="arrival-right-innerimage"> <span class="badge playstation">PLAYSTATION</span>
            </div>
            <h3>NBA 2K26 </h3>
            <p class="arrival-right-price">Rp 815.000</p>
            <button class="see-more" onclick="location.href='index.php?page=product'">See More</button>
          </div>

          <div class="arrival-right-card">
            <div class="arrival-right-image">
              <img src="./assets/img/ninja.jpg" class="arrival-right-innerimage"> <span class="badge playstation">PLAYSTATION</span>
            </div>
            <h3>Ninja Gaiden 4</h3>
            <p class="arrival-right-price">Rp 1.024.000</p>
            <button class="see-more" onclick="location.href='index.php?page=product'">See More</button>
          </div>

          <div class="arrival-right-card">
            <div class="arrival-right-image">
              <img src="./assets/img/fc26.jpg" class="arrival-right-innerimage"> <span class="badge switch2">SWITCH 2</span>
            </div>
            <h3>FC 26</h3>
            <p class="arrival-right-price">Rp 760.000</p>
            <button class="see-more" onclick="location.href='index.php?page=product'">See More</button>
          </div>

          <div class="arrival-right-card">
            <div class="arrival-right-image">
              <img src="./assets/img/yotei.jpg" class="arrival-right-innerimage"> <span class="badge playstation">PLAYSTATION</span>
            </div>
            <h3>Ghost of Yōtei</h3>
            <p class="arrival-right-price">Rp 1.029.000</p>
            <button class="see-more" onclick="location.href='index.php?page=product'">See More</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Galery Section -->
      <div class="container">
        <h2 class="section-title">Best-Selling Games</h2>
            <div class="game-grid-container">

              <div class="grid-column-left">
                <div class="grid-item large-left">
                  <a href="index.php?page=gameview&id=11">
                    <img src="./assets/img/spidermanmiles.png"/>
                  </a>
                </div>
              </div>

              <div class="grid-column-right">
                <div class="grid-item small-right-top">
                  <a href="index.php?page=gameview&id=8">
                    <img src="./assets/img/gow.png"/>
                  </a>
                </div>
                
                <div class="grid-item small-right-bottom">
                  <a href="index.php?page=gameview&id=7">
                    <img src="./assets/img/tlou1.png"/>
                  </a>
                </div>
              </div>
            </div>

            <div class="grid-item">
              <a href="index.php?page=gameview&id=20">
                <img src="./assets/img/banner2.jpg"/>
              </a>
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
              <div class="feature-card">
                <i class="fas fa-shipping-fast" style="color: #ff3441ff"></i>
                <h4>Fast Delivery</h4>
                <p>Quick and reliable shipping nationwide</p>
              </div>
              <div class="feature-card">
                <i class="fas fa-circle-check" style="color: #44ef86ff"></i>
                <h4>Authentic Products</h4>
                <p>100% genuine PlayStation products</p>
              </div>
              <div class="feature-card">
                <i class="fas fa-headset" style="color: #fbbf24"></i>
                <h4>24/7 Support</h4>
                <p>Customer support whenever you need it</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTACT  -->
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
          <div class="map-card">
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

    