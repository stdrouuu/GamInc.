<link rel="stylesheet" href="./assets/css/complaint-style.css?v=<?= time(); ?>" />

    <a href="index.php?page=user" class="back-button">
        <i class="fas fa-arrow-left"></i>
        <span>Back</span>
    </a>

<div class="complaint-page">

    <!-- Header -->
    <div class="complaint-header">
        <div class="complaint-header-icon">
            <i class="fas fa-headset"></i>
        </div>
        <h1>Submit a Complaint</h1>
        <p>We're here to help. Tell us your issue and we'll review it within 24 hours.</p>
    </div>

    <!-- Form Card -->
    <div class="complaint-form-card" id="complaintFormCard">
        <form id="complaintForm">

            <div class="form-group">
                <label for="complaintCategory">Category <span style="color:#ef4444">*</span></label>
                <select id="complaintCategory" name="category" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Payment Issue">Payment Issue</option>
                    <option value="Wrong Item Received">Wrong Item Received</option>
                    <option value="Delivery Problem">Delivery Problem</option>
                    <option value="Key Not Working">Key Not Working</option>
                    <option value="Refund Request">Refund Request</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="complaintOrderId">Order ID <span style="color:var(--text-secondary); font-weight:400;">(optional)</span></label>
                <input type="number" id="complaintOrderId" name="order_id" placeholder="e.g. 42 — leave blank if not applicable" min="1" />
                <div class="form-hint">Find your Order ID in <a href="index.php?page=orders" style="color:var(--text-light)">My Orders</a>.</div>
            </div>

            <div class="form-group">
                <label for="complaintMessage">Describe your issue <span style="color:#ef4444">*</span></label>
                <textarea id="complaintMessage" name="message" placeholder="Provide as much detail as possible — include screenshots or transaction references if relevant." required></textarea>
            </div>

            <button type="submit" class="btn-submit" id="submitBtn">
                <i class="fas fa-paper-plane"></i> Submit Complaint
            </button>

        </form>
    </div>

    <!-- Success State -->
    <div class="complaint-success" id="complaintSuccess">
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        <h2>Complaint Submitted!</h2>
        <p>Your complaint has been received. Our team will review it and get back to you within 24 hours.</p>
        <a href="index.php?page=user" class="btn-back-home">Back to Account</a>
    </div>

</div>

<script>
$(document).ready(function() {
    $('#complaintForm').submit(function(e) {
        e.preventDefault();

        var category = $('#complaintCategory').val();
        var message  = $('#complaintMessage').val().trim();
        var orderId  = $('#complaintOrderId').val().trim();

        if (!category || !message) return;

        var $btn = $('#submitBtn');
        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Submitting...');

        $.ajax({
            url: 'api/complaints.php',
            type: 'POST',
            data: {
                action: 'submit',
                category: category,
                message: message,
                order_id: orderId || ''
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#complaintFormCard').fadeOut(300, function() {
                        $('#complaintSuccess').fadeIn(400);
                    });
                } else {
                    $btn.prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Submit Complaint');
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                $btn.prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Submit Complaint');
                alert('Something went wrong. Please try again.');
            }
        });
    });
});
</script>

<script src="assets/js/thtoggle.js"></script>
