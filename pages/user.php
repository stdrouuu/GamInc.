<link rel="stylesheet" href="./assets/css/user-style.css" />

    <a href="?page=main" class="back-button">
        <i class="fas fa-arrow-left"></i>
        <span>Back</span>
    </a>
    
    <div class="user-page-container">
        
        <div class="account-header">
            <div class="profile-info">
                <div class="avatar">B</div>
                <div class="details">
                    <div class="user-name">Brandon</div>
                    <div class="level-badge">Quest: Level 1</div>
                </div>
            </div>
            
            <div class="stats-bar">
                <div class="stat-item">
                    <i class="fas fa-coins neon-blue"></i>
                    <span>0 Token</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-ticket neon-blue"></i>
                    <span>0 Kupon</span>
                </div>
            </div>

            <div class="exp-bar">
                <div class="exp-text">0/- EXP</div>
                <div class="exp-progress">
                    <div class="progress-fill"></div>
                </div>
                <i class="fas fa-box-open exp-chest"></i>
            </div>
        </div>

        <div class="wallet-section card-box">
            <div class="wallet-item">
                <i class="fas fa-credit-card icon-dana"></i>
                <span>DANA</span>
                <button class="btn-link">Hubungkan</button>
            </div>
            <div class="wallet-item">
                <i class="fas fa-credit-card icon-ovo"></i>
                <span>OVO</span>
                <button class="btn-link">Hubungkan</button>
            </div>
            <div class="wallet-item">
                <i class="fas fa-wallet icon-dompetku"></i>
                <span>Dompetku</span>
                <span class="balance">Rp0</span>
            </div>
        </div>

        <div class="action-and-info-section">
            

            <div class="info-alert">
                <i class="fas fa-exclamation-circle text-red"></i>
                <p>Saldo anda kurang</p>
                <div class="alert-actions">
                    <a href="#">Ingatkan Nanti</a>
                    <button class="btn-agree">Top-up sekarang</button>
                </div>
            </div>
        </div>

        <div class="activity-section">
            <div class="section-title-row">
                <h3>Riwayat Aktivitas</h3>
                <a href="#">Lihat Semua <i class="fas fa-chevron-right small-icon"></i></a>
            </div>

            <div class="activity-grid">
                <div class="activity-item card-box">
                    <i class="fas fa-clock activity-icon"></i>
                    <span>Menunggu Pembayaran</span>
                </div>
                <div class="activity-item card-box">
                    <i class="fas fa-truck activity-icon"></i>
                    <span>Menunggu Dikirim</span>
                </div>
                <div class="activity-item card-box">
                    <i class="fas fa-box-check activity-icon"></i>
                    <span>Sudah Terkirim</span>
                </div>
                <div class="activity-item card-box">
                    <i class="fas fa-check-circle activity-icon"></i>
                    <span>Selesai</span>
                </div>
            </div>
        </div>

        <div class="list-menu-section">
            <a href="#" class="menu-list-item">
                <i class="fas fa-heart menu-icon"></i>
                <span>Favorit</span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a>
        </div>
        
        <div class="help-section">
            <h3>Bantuan</h3>
            <a href="#" class="menu-list-item">
                <i class="fas fa-headset menu-icon"></i>
                <span>Kendala Pesanan</span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a>
            <a href="#" class="menu-list-item">
                <i class="fas fa-question-circle menu-icon"></i>
                <span>Pusat Bantuan</span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a>
            <a href="#" class="menu-list-item">
                <i class="fas fa-file-alt menu-icon"></i>
                <span>Daftar Komplain</span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a>

            <a href="index.php?page=auth" class="menu-list-item" id="logoutBtn">
                <i class="fas fa-sign-out-alt menu-icon" style="color: var(--red-alert);"></i>
                <span>Logout</span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a> 
        </div>

    </div>
    <script src="/assets/js/user.js"></script>

    