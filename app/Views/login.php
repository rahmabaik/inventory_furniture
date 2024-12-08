<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ec407a, #f48fb1);
        }

        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .login-container h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #ad1457;
        }

        .login-container label {
            font-size: 1rem;
            color: #555;
            display: block;
            text-align: left;
            margin-bottom: 8px;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #ec407a, #f48fb1);
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-container button:hover {
            background: linear-gradient(135deg, #f48fb1, #ec407a);
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        /* Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ec407a, #f48fb1);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.5s ease;
        }

        .loading-screen.active {
            opacity: 1;
            pointer-events: all;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 6px solid #fff;
            border-top: 6px solid rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="loading-screen" id="loading-screen">
        <div class="loading-spinner"></div>
    </div>

    <div class="login-container">
        <h1>Login</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <p class="error-message"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>

        <form id="login-form" action="<?= site_url('login/process') ?>" method="post">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        const loginForm = document.getElementById('login-form');
        const loadingScreen = document.getElementById('loading-screen');

        loginForm.addEventListener('submit', function (event) {
            // Show the loading screen
            loadingScreen.classList.add('active');

            // Optional: Simulate a delay (remove this in production)
            setTimeout(() => {
                loadingScreen.classList.remove('active');
            }, 3000);
        });
    </script>
</body>
</html>
