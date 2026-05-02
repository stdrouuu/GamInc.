<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login | GamInc.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #0a0a0a;
            color: #fff;
        }
        .login-box {
            width: 90%;
            max-width: 400px;
            padding: 40px;
            background: #141414;
            border-radius: 12px;
            border: 1px solid #222;
        }
        .login-box h2 {
            color: #00e6e0;
            margin-bottom: 8px;
            font-weight: 700;
        }
        .login-box .subtitle {
            color: #aaa;
            margin-bottom: 25px;
            font-size: 0.95rem;
        }
        .login-box .admin-icon {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-box .admin-icon i {
            font-size: 3rem;
            color: #00e6e0;
        }
        .login-box input {
            width: 100%;
            padding: 0.9rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 6px;
            background-color: #1b1b1b;
            color: #fff;
            transition: outline 0.3s ease;
        }
        .login-box input:focus {
            outline: 1px solid #00e6e0;
            box-shadow: 0 0 5px rgba(0, 230, 224, 0.5);
        }
        .login-box button {
            width: 100%;
            padding: 0.9rem;
            border: none;
            border-radius: 6px;
            background-color: #00e6e0;
            color: #000;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }
        .login-box button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 230, 224, 0.4);
        }
        .error-msg {
            color: #ff4d4d;
            margin-bottom: 15px;
            display: none;
            text-align: left;
            font-size: 0.85rem;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #aaa;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .back-link:hover {
            color: #00e6e0;
        }
    </style>
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

        <a href="../index.php?page=main" class="back-link">
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
