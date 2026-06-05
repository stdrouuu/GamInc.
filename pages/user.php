<link rel="stylesheet" href="./assets/css/user-style.css?v=<?= time(); ?>" />

    <a href="index.php?page=main" class="back-button">
        <i class="fas fa-arrow-left"></i>
        <span>Back</span>
    </a>

    <div class="user-container">

        <!-- ── Profile Card ─────────────────────────────── -->
        <div class="profile-card card-box">
            <div class="profile-avatar" id="userAvatar">B</div>
            <div class="profile-info">
                <div class="profile-name" id="userName">Brandon</div>
                <div class="profile-badge"><i class="fas fa-gamepad"></i> GamInc. Member</div>
            </div>
            <div class="profile-theme-toggle" id="themeToggleBtn" title="Toggle Theme">
                <i class="fas fa-moon" id="themeIcon"></i>
            </div>
        </div>

        <!-- ── Order Summary Strip ──────────────────────── -->
        <a href="index.php?page=orders" class="orders-strip card-box">
            <div class="strip-title">
                <i class="fas fa-box-open"></i>
                <span>My Orders</span>
            </div>
            <div class="strip-statuses">
                <div class="strip-status">
                    <div class="strip-count" id="cnt-pending">—</div>
                    <div class="strip-label">Pending</div>
                </div>
                <div class="strip-divider"></div>
                <div class="strip-status">
                    <div class="strip-count" id="cnt-processing">—</div>
                    <div class="strip-label">Processing</div>
                </div>
                <div class="strip-divider"></div>
                <div class="strip-status">
                    <div class="strip-count" id="cnt-shipped">—</div>
                    <div class="strip-label">Shipped</div>
                </div>
                <div class="strip-divider"></div>
                <div class="strip-status">
                    <div class="strip-count" id="cnt-delivered">—</div>
                    <div class="strip-label">Delivered</div>
                </div>
            </div>
            <i class="fas fa-chevron-right strip-arrow"></i>
        </a>

        <!-- ── Quick Actions ────────────────────────────── -->
        <div class="quick-actions">
            <a href="index.php?page=orders" class="quick-action-item">
                <div class="qa-icon-wrap qa-blue"><i class="fas fa-receipt"></i></div>
                <span>My Orders</span>
            </a>
            <a href="index.php?page=favorites" class="quick-action-item">
                <div class="qa-icon-wrap qa-red"><i class="fas fa-heart"></i></div>
                <span>Favorites</span>
            </a>
            <a href="index.php?page=complaint" class="quick-action-item">
                <div class="qa-icon-wrap qa-yellow"><i class="fas fa-file-alt"></i></div>
                <span>Complaint</span>
            </a>
            <a href="index.php?page=faq" class="quick-action-item">
                <div class="qa-icon-wrap qa-green"><i class="fas fa-headset"></i></div>
                <span>Help & FAQ</span>
            </a>
        </div>

        <!-- ── Account Menu ─────────────────────────────── -->
        <div class="account-menu card-box">
            <a href="index.php?page=product&open_cart=1" class="menu-list-item">
                <div class="menu-icon-wrap"><i class="fas fa-shopping-cart"></i></div>
                <span>My Cart</span>
                <span class="menu-badge" id="cartItemCount"></span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a>
            <a href="index.php?page=credits" class="menu-list-item">
                <div class="menu-icon-wrap"><i class="fas fa-info-circle"></i></div>
                <span>About GamInc.</span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a>
            <a href="#" class="menu-list-item logout-item" id="logoutBtn">
                <div class="menu-icon-wrap"><i class="fas fa-sign-out-alt"></i></div>
                <span>Logout</span>
                <i class="fas fa-chevron-right arrow-icon"></i>
            </a>
        </div>

    </div>

<script>
    $(document).ready(function() {
        // Load order counts
        $.getJSON('api/orders.php?action=getOrderCounts', function(counts) {
            $('#cnt-pending').text(counts.pending || 0);
            $('#cnt-processing').text(counts.processing || 0);
            $('#cnt-shipped').text(counts.shipped || 0);
            $('#cnt-delivered').text(counts.delivered || 0);
        });

        // Load cart count
        $.getJSON('api/cart.php?action=getCount', function(data) {
            var count = data.cartCount || 0;
            if (count > 0) {
                $('#cartItemCount').text(count);
            }
        });

        // Logout
        $('#logoutBtn').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'api/auth.php',
                type: 'POST',
                data: { action: 'logout' },
                dataType: 'json',
                success: function() {
                    window.location.href = 'index.php';
                }
            });
        });
    });
</script>

<script src="assets/js/thtoggle.js"></script>