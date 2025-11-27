<link rel="stylesheet" href="./assets/css/navbar.css" />

<nav class="navbar">
      <div class="nav-container">
        <div class="nav-logo"><i class="fa-solid fa-puzzle-piece"></i> <strong>Gam<span style="color:aqua">Inc.</span></strong></div>
        <ul class="nav-menu">
          <li class="nav-item">
            <a href="index.php?page=main" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=main#about" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=main#contact" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=product" class="nav-link">Products</a>
          </li>
          <li class="nav-item">
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
            <span class="cart-count" id="cartCount">0</span>
          </a>
        </div>

        <div class="nav-user">
          <a href="index.php?page=user"><i class="fa-regular fa-user"></i></a>
        </div>

        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </div>
    </nav>
