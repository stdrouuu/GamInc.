<link rel="stylesheet" href="./assets/css/navbar.css" />

<nav class="navbar">
      <div class="nav-container">
        <div class="nav-logo">
          <i class="fa-solid fa-puzzle-piece"></i>
          <strong>Gam<span style="color:aqua">Inc.</span></strong>
        </div>
     
        <div class="nav-user">
          <a href="index.php?page=user" class="user-icon">
            <i class="fa-solid fa-toggle-off"></i>
          </a>
        </div>

        <ul class="nav-menu">
          <li>
            <a href="index.php?page=main" class="nav-link">Home</a>
          </li>
          <li>
            <a href="index.php?page=main#about" class="nav-link">About</a>
          </li>
          <li>
            <a href="index.php?page=main#contact" class="nav-link">Contact</a>
          </li>
          <li>
            <a href="index.php?page=product" class="nav-link">Products</a>
          </li>
          <li>
            <a href="index.php?page=credits" class="nav-link">Credits</a>
          </li>
        </ul>
             


        <div class="search-bar">
          <input type="text" placeholder="Cari game, item, atau top-up..." />
          <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <div class="nav-cart">
          <a href="index.php?page=product#cart" class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count">2</span>
          </a>
        </div>

        <div class="nav-user">
          <a href="index.php?page=user" class="user-icon">
            <i class="fa-regular fa-user"></i>
          </a>
        </div>

        <div class="nav-hamburger">
          <div class="hamburger-icon">
            <i class="fa-solid fa-bars"></i>
          </div>
        </div>
      </div>
    </nav>

    <div class="mobile-overlay">
      <div class="mobile-menu">
          <a href="index.php?page=main">Home</a>
          <a href="index.php?page=main#about">About</a>
          <a href="index.php?page=main#contact">Contact</a>
          <a href="index.php?page=product">Products</a>
          <a href="index.php?page=credits">Credits</a>
      </div>
    </div>


    <script src="assets/js/navhamburger.js"></script>
