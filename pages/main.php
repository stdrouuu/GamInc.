<link rel="stylesheet" href="./assets/css/main-style.css?v=<?= time(); ?>" />

    <!-- Premium Hero Section (Left text, right image, dark tech) -->
    <section class="hero-section">
      <div class="container hero-container">
        <div class="hero-grid">
          <div class="hero-content">
            <span class="hero-badge">Toko Game Terlengkap</span>
            <h1 class="hero-title">Mainkan Game<br>Impianmu.</h1>
            <p class="hero-desc">
              GamInc hadir sebagai surga belanja gamer. Dapatkan rilisan PlayStation & Switch terpopuler, 100% original, dengan pengiriman instan.
            </p>
            <div class="hero-buttons">
              <a href="product" class="btn-primary">Eksplor Game</a>
              <a href="#testimonials" class="btn-ghost">Lihat Ulasan</a>
            </div>
          </div>
          <div class="hero-visual">
            <img src="./assets/img/banner10.jpeg" alt="Latest Gaming Console" class="hero-img">
            <div class="hero-glow"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Asymmetrical Bento Grid: New Arrival -->
    <section class="bento-section">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">New Arrivals</h2>
        </div>
        
        <div class="bento-grid">
          <!-- Large Feature Cell -->
          <a href="product/nba2k26" class="bento-cell bento-large">
            <img src="./assets/img/nba.jpg" alt="NBA 2K26" class="bento-img">
            <div class="bento-overlay">
              <span class="badge playstation">PLAYSTATION</span>
              <div class="bento-meta">
                <h3>NBA 2K26</h3>
                <p>Rp 815.000</p>
              </div>
            </div>
          </a>

          <!-- Medium Vertical Cell -->
          <a href="product/ghost" class="bento-cell bento-medium">
            <img src="./assets/img/yotei.jpg" alt="Ghost of Yotei" class="bento-img">
            <div class="bento-overlay">
              <span class="badge playstation">PLAYSTATION</span>
              <div class="bento-meta">
                <h3>Ghost of Yōtei</h3>
                <p>Rp 1.029.000</p>
              </div>
            </div>
          </a>

          <!-- Two Small Cells Stacked -->
          <div class="bento-stack">
            <a href="product/ninja" class="bento-cell bento-small">
              <img src="./assets/img/ninja.jpg" alt="Ninja Gaiden 4" class="bento-img">
              <div class="bento-overlay">
                <span class="badge playstation">PS5</span>
                <div class="bento-meta">
                  <h3>Ninja Gaiden 4</h3>
                  <p>Rp 1.024.000</p>
                </div>
              </div>
            </a>
            <a href="product/fc26" class="bento-cell bento-small">
              <img src="./assets/img/fc26.jpg" alt="FC 26" class="bento-img">
              <div class="bento-overlay">
                <span class="badge switch2">SWITCH 2</span>
                <div class="bento-meta">
                  <h3>FC 26</h3>
                  <p>Rp 760.000</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Best Selling Horizontal Scroll / Stagger List -->
    <section class="bestseller-section">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Best Selling</h2>
        </div>
        
        <div class="list-layout">
          <div class="list-item">
            <div class="list-img-wrapper">
              <img src="./assets/img/tlou2.png" alt="The Last of Us Part II">
            </div>
            <div class="list-content">
              <h3>The Last of Us Part II</h3>
              <p class="list-price">Rp 850.000</p>
            </div>
            <a href="product/10" class="btn-list">Beli Sekarang</a>
          </div>

          <div class="list-item">
            <div class="list-img-wrapper">
              <img src="./assets/img/kirby.jpg" alt="Kirby: Air Riders">
            </div>
            <div class="list-content">
              <h3>Kirby: Air Riders</h3>
              <p class="list-price">Rp 950.000</p>
            </div>
            <a href="product/3" class="btn-list">Beli Sekarang</a>
          </div>

          <div class="list-item">
            <div class="list-img-wrapper">
              <img src="./assets/img/spidermanmiles.png" alt="Spiderman: Miles Morales">
            </div>
            <div class="list-content">
              <h3>Spiderman: Miles Morales</h3>
              <p class="list-price">Rp 350.000</p>
            </div>
            <a href="product/11" class="btn-list">Beli Sekarang</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Split Text / Quote Section for Testimonials -->
    <section id="testimonials" class="quote-section">
      <div class="container">
        <div class="quote-grid">
          <div class="quote-text">
            <h2>Gamer Puas, Kami Senang.</h2>
            <p>Ribuan gamer di Indonesia telah mempercayai GamInc sebagai destinasi belanja game original terbaik mereka.</p>
          </div>
          <div class="quote-cards">
            <div class="quote-card">
              <p class="q-body">"Pelayanan super cepat! Game yang saya pesan sampai dalam 2 hari dan semuanya original. Pasti bakal belanja lagi."</p>
              <div class="q-author">
                <h4>Rizky Pratama</h4>
                <span>Verified Buyer</span>
              </div>
            </div>
            <div class="quote-card">
              <p class="q-body">"Koleksi gamenya lengkap banget, dari PS5 sampai Switch 2 semua ada. Harga juga bersaing."</p>
              <div class="q-author">
                <h4>Anisa Dewi</h4>
                <span>Verified Buyer</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Community Minimalist Banner -->
    <section class="community-minimal">
      <div class="container">
        <div class="community-wrapper">
          <div class="community-content">
            <h2>Mabar Lebih Seru Bareng Komunitas.</h2>
            <p>Dapatkan info promo eksklusif, cari teman mabar, dan ikuti giveaway menarik di server Discord kami.</p>
            <a href="https://discord.gg" target="_blank" class="btn-primary">
              Gabung Discord
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer Contact -->
    <section id="contact" class="footer-contact">
      <div class="container">
        <div class="footer-grid">
          <div class="footer-brand">
            <h2>GamInc.</h2>
            <p>Jl. Gaminc Center No. 123<br>Jakarta Barat, Indonesia</p>
            <p class="mt-4 text-muted">support@gaminc.com</p>
          </div>
          <div class="footer-links">
            <div class="link-col">
              <h4>Social</h4>
              <a href="#">Instagram</a>
              <a href="#">Twitter</a>
              <a href="#">YouTube</a>
            </div>
            <div class="link-col">
              <h4>Legal</h4>
              <a href="#">Privacy Policy</a>
              <a href="#">Terms of Service</a>
            </div>
          </div>
        </div>
      </div>
    </section>

<script src="assets/js/thtoggle.js"></script>>