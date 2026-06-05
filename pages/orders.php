<link rel="stylesheet" href="./assets/css/orders-style.css?v=<?= time(); ?>" />

    <a href="index.php?page=user" class="back-button">
        <i class="fas fa-arrow-left"></i>
        <span>Back</span>
    </a>

<div class="orders-page">
    <h1 class="orders-page-title">My Orders</h1>

    <!-- Filter Tabs -->
    <div class="filter-tabs">
        <div class="filter-tab active" data-status="all">All</div>
        <div class="filter-tab" data-status="pending">Pending</div>
        <div class="filter-tab" data-status="processing">Processing</div>
        <div class="filter-tab" data-status="shipped">Shipped</div>
        <div class="filter-tab" data-status="delivered">Delivered</div>
    </div>

    <!-- Order List -->
    <div class="orders-list" id="ordersList">
        <!-- Skeleton Loaders -->
        <div class="skeleton-card" id="skeletonLoader">
            <div class="skeleton-line" style="width:40%"></div>
            <div class="skeleton-line" style="width:80%"></div>
            <div class="skeleton-line" style="width:60%"></div>
        </div>
    </div>
</div>

<script>
// Step index map for the progress bar
const STATUS_STEP = { pending: 0, processing: 1, shipped: 2, delivered: 3 };
const STEP_ICONS  = ['fa-check', 'fa-cog', 'fa-truck', 'fa-box'];
const STEP_LABELS = ['Confirmed', 'Processing', 'Shipped', 'Delivered'];
// Fill % per active step: 0 active = 0%, 1 = 33%, 2 = 66%, 3 = 100%
const FILL_PCT    = [0, 33, 66, 100];

function buildProgressBar(status) {
    var activeIdx = STATUS_STEP[status] ?? 0;
    var fillPct   = FILL_PCT[activeIdx];

    var html = '<div class="delivery-progress">'
             + '<div class="progress-steps">'
             + '<div class="progress-fill" style="width:' + fillPct + '%"></div>';

    for (var i = 0; i < STEP_LABELS.length; i++) {
        var cls = '';
        if (i < activeIdx) cls = 'done';
        else if (i === activeIdx) cls = 'active';

        var icon = (i < activeIdx)
            ? '<i class="fas fa-check"></i>'
            : '<i class="fas ' + STEP_ICONS[i] + '"></i>';

        html += '<div class="progress-step ' + cls + '">'
              + '<div class="step-dot">' + icon + '</div>'
              + '<div class="step-label">' + STEP_LABELS[i] + '</div>'
              + '</div>';
    }

    html += '</div></div>';
    return html;
}

function formatRp(num) {
    return 'Rp ' + parseInt(num).toLocaleString('id-ID');
}

function formatDate(str) {
    var d = new Date(str);
    return d.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
}

function loadOrders(statusFilter) {
    var url = 'api/orders.php?action=getOrders';
    if (statusFilter && statusFilter !== 'all') url += '&status=' + statusFilter;

    $('#ordersList').html(
        '<div class="skeleton-card"><div class="skeleton-line" style="width:40%"></div>'
      + '<div class="skeleton-line" style="width:80%"></div>'
      + '<div class="skeleton-line" style="width:60%"></div></div>'
    );

    $.getJSON(url, function(orders) {
        if (orders.length === 0) {
            $('#ordersList').html(
                '<div class="empty-orders">'
              + '<i class="fas fa-box-open"></i>'
              + '<h3>No orders yet</h3>'
              + '<p>You have no orders in this category.</p>'
              + '<a href="index.php?page=product" class="btn-shop">Start Shopping</a>'
              + '</div>'
            );
            return;
        }

        var html = '';
        orders.forEach(function(order) {
            var statusClass = 'status-' + order.status;
            var statusLabel = order.status.charAt(0).toUpperCase() + order.status.slice(1);

            html += '<div class="order-card">';
            // Header
            html += '<div class="order-card-header">';
            html += '<span class="order-id">ORDER #' + order.id + '</span>';
            html += '<span class="order-date">' + formatDate(order.created_at) + '</span>';
            html += '<span class="status-badge ' + statusClass + '">' + statusLabel + '</span>';
            html += '</div>';
            // Progress bar
            html += buildProgressBar(order.status);
            // Footer
            html += '<div class="order-card-footer">';
            html += '<div>';
            html += '<div class="order-total">' + formatRp(order.total_price) + '</div>';
            html += '<div class="order-items-count" id="item-count-' + order.id + '">Loading items...</div>';
            html += '</div>';
            html += '<button class="btn-view-detail" onclick="toggleDetail(' + order.id + ')">View Items</button>';
            html += '</div>';
            // Expandable items
            html += '<div class="order-items-detail" id="detail-' + order.id + '"></div>';
            html += '</div>';
        });

        $('#ordersList').html(html);

        // Load item counts + item data lazily
        orders.forEach(function(order) {
            $.getJSON('api/orders.php?action=getOrderDetail&id=' + order.id, function(items) {
                $('#item-count-' + order.id).text(items.length + ' item' + (items.length !== 1 ? 's' : ''));

                var itemsHtml = '';
                items.forEach(function(item) {
                    itemsHtml += '<div class="order-item-row">';
                    itemsHtml += '<img src="' + (item.product_image || 'assets/img/placeholder.jpg') + '" alt="' + item.product_name + '">';
                    itemsHtml += '<div class="order-item-name">' + item.product_name + '</div>';
                    itemsHtml += '<div class="order-item-qty">x' + item.qty + '</div>';
                    itemsHtml += '<div class="order-item-price">' + formatRp(item.price_at_order) + '</div>';
                    itemsHtml += '</div>';
                });
                $('#detail-' + order.id).html(itemsHtml);
            });
        });
    });
}

function toggleDetail(orderId) {
    var detail = $('#detail-' + orderId);
    detail.toggleClass('open');
    var $card = detail.closest('.order-card');
    var btn = $card.find('.btn-view-detail');
    btn.text(detail.hasClass('open') ? 'Hide Items' : 'View Items');
}

$(document).ready(function() {
    loadOrders('all');

    $('.filter-tab').click(function() {
        $('.filter-tab').removeClass('active');
        $(this).addClass('active');
        loadOrders($(this).data('status'));
    });
});
</script>

<script src="assets/js/thtoggle.js"></script>
