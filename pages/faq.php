<link rel="stylesheet" href="./assets/css/user-style.css" />

<style>
    .faq-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .faq-item {
        background: var(--card-dark);
        border: 1px solid var(--border);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        backdrop-filter: var(--blur);
        -webkit-backdrop-filter: var(--blur);
    }
    .faq-item:hover {
        border-color: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }
    body.light-mode .faq-item:hover {
        border-color: rgba(0, 0, 0, 0.15);
    }
    .faq-question {
        padding: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        user-select: none;
        font-weight: 600;
        font-size: 1.05rem;
        color: var(--text-light);
        gap: 16px;
    }
    .faq-icon-toggle {
        font-size: 0.9rem;
        color: var(--text-secondary);
        transition: transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), padding 0.4s ease;
        padding: 0 24px;
        color: var(--text-secondary);
        font-size: 0.95rem;
        line-height: 1.6;
        border-top: 1px solid transparent;
        text-align: left;
    }
    .faq-item.active {
        border-color: #71717a;
        box-shadow: 0 0 15px rgba(113, 113, 122, 0.08);
    }
    body.light-mode .faq-item.active {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.03);
    }
    .faq-item.active .faq-icon-toggle {
        transform: rotate(180deg);
        color: var(--text-light);
    }
    .faq-item.active .faq-answer {
        max-height: 400px;
        padding: 0 24px 24px;
        border-top-color: var(--border);
    }
    .faq-category-pills {
        display: flex;
        gap: 10px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }
    .faq-pill {
        padding: 10px 20px;
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid var(--border);
        color: var(--text-secondary);
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
    }
    .faq-pill:hover, .faq-pill.active {
        background: rgba(255, 255, 255, 0.08);
        color: var(--text-light);
        border-color: #71717a;
        font-weight: 600;
    }
    body.light-mode .faq-pill:hover, body.light-mode .faq-pill.active {
        background: rgba(0, 0, 0, 0.05);
    }
    .faq-search-wrapper {
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 4px 16px;
        margin-bottom: 24px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .faq-search-wrapper:focus-within {
        border-color: #71717a;
        box-shadow: 0 0 12px rgba(113, 113, 122, 0.15);
    }
    body.light-mode .faq-search-wrapper:focus-within {
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.03);
    }
    .faq-search-wrapper input {
        background: transparent;
        border: none;
        width: 100%;
        padding: 14px 0;
        color: var(--text-light);
        font-size: 1.05rem;
        font-weight: 500;
        outline: none;
    }
    .faq-search-wrapper i {
        color: var(--text-secondary);
        margin-right: 12px;
        font-size: 1.1rem;
    }
    .faq-no-results {
        display: none;
        padding: 40px;
        text-align: center;
        background: var(--card-dark);
        border: 1px solid var(--border);
        border-radius: 20px;
        color: var(--text-secondary);
    }
    .faq-no-results i {
        font-size: 2.5rem;
        margin-bottom: 16px;
        color: #ef4444;
    }
    .faq-header-avatar {
        background-color: rgba(255, 255, 255, 0.03);
        color: var(--text-light);
        border: 1px solid var(--border);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.02);
        width: 80px;
        height: 80px;
        border-radius: 24px;
        font-size: 2.2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    body.light-mode .faq-header-avatar {
        background-color: rgba(0, 0, 0, 0.02);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.02);
    }
</style>

<a href="index.php?page=user" class="back-button">
    <i class="fas fa-arrow-left"></i>
    <span>Back</span>
</a>

<div class="user-container">
    <!-- Header banner -->
    <div class="account-header" style="flex-direction: column; text-align: center; gap: 16px; padding: 48px 24px; margin-bottom: 24px;">
        <div class="avatar faq-header-avatar">
            <i class="fa-solid fa-circle-question"></i>
        </div>
        <div>
            <h1 class="user-name" style="font-size: 2.2rem; margin-bottom: 8px;">Help & FAQs</h1>
            <p style="color: var(--text-secondary); font-size: 0.95rem; margin-bottom: 0;">Find answers to popular questions and get support instantly.</p>
        </div>
    </div>

    <!-- Live Search Bar -->
    <div class="faq-search-wrapper">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" id="faqSearchInput" placeholder="Type keywords (e.g. key, payment, DANA, refund)..." autocomplete="off" />
    </div>

    <!-- Category Pills -->
    <div class="faq-category-pills">
        <div class="faq-pill active" data-category="all">All Topics</div>
        <div class="faq-pill" data-category="keys">Product Keys</div>
        <div class="faq-pill" data-category="payment">Payments & Wallets</div>
        <div class="faq-pill" data-category="complaints">Complaints & Support</div>
        <div class="faq-pill" data-category="delivery">Delivery & Orders</div>
    </div>

    <!-- FAQ Accordion Container -->
    <div class="faq-container">
        <!-- FAQ 1 -->
        <div class="faq-item" data-category="keys">
            <div class="faq-question">
                <span>How do I redeem my purchased game or digital key?</span>
                <i class="fa-solid fa-chevron-down faq-icon-toggle"></i>
            </div>
            <div class="faq-answer">
                Once your payment is completed, your unique activation key (Steam, PlayStation Store, or Nintendo eShop) is immediately displayed in your transaction history and sent to your email. Simply copy the code and input it into the respective platform's client (e.g., Steam Client -> Add Game -> Activate a Product on Steam).
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="faq-item" data-category="payment">
            <div class="faq-question">
                <span>What payment methods are supported on GamInc?</span>
                <i class="fa-solid fa-chevron-down faq-icon-toggle"></i>
            </div>
            <div class="faq-answer">
                We support a variety of instant digital payment solutions, including linked e-wallets such as **DANA** and **OVO** for fast, one-click checkout. You can also pay via credit card, Bank Transfer, and secure QRIS scans.
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="faq-item" data-category="payment">
            <div class="faq-question">
                <span>My wallet balance hasn't updated after linking. What should I do?</span>
                <i class="fa-solid fa-chevron-down faq-icon-toggle"></i>
            </div>
            <div class="faq-answer">
                Linking your e-wallet (DANA/OVO) securely fetches your real-time balance. If the balance doesn't display immediately, try disconnecting the wallet via your account screen and reconnecting it. If the issue persists, please submit a complaint ticket under the "Top-up & Wallet" category.
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="faq-item" data-category="delivery">
            <div class="faq-question">
                <span>How long does it take for digital console purchases to deliver?</span>
                <i class="fa-solid fa-chevron-down faq-icon-toggle"></i>
            </div>
            <div class="faq-answer">
                All game titles, keys, and top-up gift cards are delivered **instantly** (within 2-5 seconds) after payment confirmation. Hard-copy physical accessories or limited retro consoles are shipped via express courier and usually take 1-3 business days depending on your location.
            </div>
        </div>

        <!-- FAQ 5 -->
        <div class="faq-item" data-category="complaints">
            <div class="faq-question">
                <span>How can I file a formal complaint or resolve a transaction issue?</span>
                <i class="fa-solid fa-chevron-down faq-icon-toggle"></i>
            </div>
            <div class="faq-answer">
                You can easily file a formal support request by navigating to the **Submit a Complaint** page under your profile. Select the appropriate category (e.g. Account, Payments, Product Keys), detail your issue, and click Submit. Your ticket is registered in our session support log and is typically reviewed by our staff within 24 hours.
            </div>
        </div>

        <!-- FAQ 6 -->
        <div class="faq-item" data-category="keys">
            <div class="faq-question">
                <span>Can I request a refund for a digital game key?</span>
                <i class="fa-solid fa-chevron-down faq-icon-toggle"></i>
            </div>
            <div class="faq-answer">
                Due to the nature of digital license keys, all key sales are final once the key has been revealed to you. However, if a key is invalid or defective, we will issue a full replacement or refund. Please submit a complaint ticket with your Transaction ID and a screenshot of the error.
            </div>
        </div>
    </div>

    <!-- No Results Placeholder -->
    <div class="faq-no-results" id="faqNoResults">
        <i class="fa-solid fa-circle-exclamation"></i>
        <h3>No Answers Found</h3>
        <p>We couldn't find any questions matching your keywords. Please try another term or submit a ticket to us directly.</p>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Toggle Accordion Panels
        $('.faq-question').click(function() {
            var faqItem = $(this).closest('.faq-item');
            var isActive = faqItem.hasClass('active');
            
            // Toggle active state
            if (isActive) {
                faqItem.removeClass('active');
            } else {
                $('.faq-item').removeClass('active'); // Close other accordion items
                faqItem.addClass('active');
            }
        });

        // Interactive Live Keyword & Category Search Filter
        function filterFAQs() {
            var query = $('#faqSearchInput').val().toLowerCase().trim();
            var activeCategory = $('.faq-pill.active').data('category');
            var matchCount = 0;

            $('.faq-item').each(function() {
                var question = $(this).find('.faq-question span').text().toLowerCase();
                var answer = $(this).find('.faq-answer').text().toLowerCase();
                var category = $(this).data('category');

                var matchesQuery = question.includes(query) || answer.includes(query);
                var matchesCategory = activeCategory === 'all' || category === activeCategory;

                if (matchesQuery && matchesCategory) {
                    $(this).show(200);
                    matchCount++;
                } else {
                    $(this).hide(200);
                }
            });

            // Show or hide the no-results block
            if (matchCount === 0) {
                $('.faq-container').hide();
                $('#faqNoResults').fadeIn(300);
            } else {
                $('#faqNoResults').hide();
                $('.faq-container').show();
            }
        }

        // Search text change
        $('#faqSearchInput').on('input', function() {
            filterFAQs();
        });

        // Pill clicks
        $('.faq-pill').click(function() {
            $('.faq-pill').removeClass('active');
            $(this).addClass('active');
            filterFAQs();
        });
    });
</script>

<script src="assets/js/thtoggle.js"></script>
