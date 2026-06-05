<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login | GamInc.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="./../assets/css/admin-login.css?v=<?= time(); ?>" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

    <div class="login-box">
        <div class="admin-icon">
            <i class="fas fa-user-shield"></i>
        </div>
        <h2>Admin Login</h2>
        <p class="subtitle">Enter your admin credentials to continue</p>

        <div class="error-msg" id="errorMsg">Invalid username or password.</div>

        <input type="text" id="adminUsername" placeholder="Username" />
        <input type="password" id="adminPassword" placeholder="Password" />
        <button id="adminLoginBtn">Log In</button>

        <a href="../index.php?page=home" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Website
        </a>
    </div>

    <script>
        // If already logged in, redirect to dashboard
        $.ajax({
            url: 'api/admin_auth.php',
            type: 'POST',
            data: { action: 'checkSession' },
            dataType: 'json',
            success: function(response) {
                if (response.loggedIn) {
                    window.location.href = 'pages/dashboard.php';
                }
            }
        });

        // Login button click
        $('#adminLoginBtn').click(function() {
            var username = $('#adminUsername').val();
            var password = $('#adminPassword').val();

            if (username == '' || password == '') {
                $('#errorMsg').text('Please fill in all fields.').show();
                return;
            }

            $.ajax({
                url: 'api/admin_auth.php',
                type: 'POST',
                data: {
                    action: 'login',
                    username: username,
                    password: password
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = 'pages/dashboard.php';
                    } else {
                        $('#errorMsg').text(response.message).show();
                    }
                }
            });
        });

        // Allow enter key to login
        $('#adminPassword').keypress(function(e) {
            if (e.which == 13) {
                $('#adminLoginBtn').click();
            }
        });
    </script>

</body>
</html>
