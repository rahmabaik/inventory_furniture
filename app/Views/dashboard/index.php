<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Furniture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background: #fce4ec;
            overflow: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background: linear-gradient(135deg, #ec407a, #f48fb1);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            position: fixed;
            height: 100%;
            overflow-y: auto;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.15);
            transition: width 0.3s ease, transform 0.3s ease;
        }

        .sidebar h2 {
            font-size: 1.8rem;
            margin-bottom: 30px;
            text-align: center;
            color: #fff;
            letter-spacing: 2px;
            cursor: pointer;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            width: 85%;
            margin: 10px 0;
            position: relative;
            opacity: 0; /* Hidden by default */
            transform: translateY(-10px); /* Initially shifted up */
            transition: opacity 0.5s ease, transform 0.5s ease; /* Smooth transition */
        }

        .sidebar a.show {
            opacity: 1; /* Make visible */
            transform: translateY(0); /* Reset position */
        }

        .sidebar a i {
            font-size: 1.8rem;
            margin-right: 15px;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .sidebar a span {
            font-size: 1.2rem;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .sidebar a:hover i {
            transform: rotate(20deg);
            color: #ffeb3b;
        }

        .sidebar a:hover span {
            transform: translateX(10px);
            opacity: 1;
        }

        /* Main Content */
        .content {
            margin-left: 260px;
            padding: 40px;
            width: calc(100% - 260px);
            background: linear-gradient(135deg, #fff, #fce4ec);
            color: #333;
            transition: margin-left 0.3s ease, width 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            color: #ad1457;
            text-align: center;
        }

        p {
            font-size: 1.2rem;
            line-height: 1.6;
            text-align: center;
            color: #555;
            margin-bottom: 40px;
        }

        /* Card Section */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card i {
            font-size: 2.5rem;
            color: #f48fb1;
            margin-bottom: 20px;
        }

        .card h3 {
            font-size: 1.5rem;
            color: #ad1457;
            margin-bottom: 15px;
        }

        .card p {
            color: #555;
            font-size: 1rem;
        }

        /* Logout Button Styles */
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            background: #ec407a;
            color: #fff;
            padding: 10px 15px;
            border-radius: 25px;
            font-size: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .logout-btn i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .logout-btn:hover {
            background: #d81b60;
            transform: scale(1.05);
        }

        /* Responsive Sidebar */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
                width: 100%;
            }
        }

        /* Toggle Button */
        .toggle-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 2rem;
            cursor: pointer;
            color: #fff;
            z-index: 1000;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar">
        <span class="toggle-btn"><i class="fas fa-bars"></i></span>
        <h2 id="menu-title">Menu</h2>
        <a href="categories" class="menu-item"><i class="fas fa-tags"></i><span>Categories</span></a>
        <a href="customers" class="menu-item"><i class="fas fa-users"></i><span>Customers</span></a>
        <a href="suppliers" class="menu-item"><i class="fas fa-truck"></i><span>Suppliers</span></a>
        <a href="furniture" class="menu-item"><i class="fas fa-couch"></i><span>Furniture</span></a>
        <a href="orders" class="menu-item"><i class="fas fa-box"></i><span>Orders</span></a>
        <a href="order_item" class="menu-item"><i class="fas fa-list"></i><span>Order Items</span></a>
        <a href="inventory_transaction" class="menu-item"><i class="fas fa-warehouse"></i><span>Inventory Transactions</span></a>
    </nav>

    <!-- Logout Button -->
    <div class="logout-btn">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Inventory Furniture</h1>
        <p>Welcome to the Inventory Management System! Use the menu to navigate and manage your data efficiently.</p>

        <!-- Card Section -->
        <div class="card-container">
            <div class="card">
                <i class="fas fa-couch"></i>
                <h3>Furniture</h3>
                <p>Manage your furniture stock, categories, and availability.</p>
            </div>
            <div class="card">
                <i class="fas fa-box"></i>
                <h3>Orders</h3>
                <p>Track customer orders and manage their status.</p>
            </div>
            <div class="card">
                <i class="fas fa-users"></i>
                <h3>Customers</h3>
                <p>View and manage your customer data effectively.</p>
            </div>
        </div>
    </div>

    <script>
        const menuTitle = document.getElementById('menu-title');
        const menuItems = document.querySelectorAll('.menu-item');
        let menuOpen = false; // Track if menu is open or closed

        menuTitle.addEventListener('click', () => {
            if (menuOpen) {
                // Close the menu
                menuItems.forEach(item => {
                    item.classList.remove('show');
                });
                menuOpen = false;
            } else {
                // Open the menu with animation
                let delay = 0;
                menuItems.forEach(item => {
                    setTimeout(() => {
                        item.classList.add('show');
                    }, delay);
                    delay += 100; // Add delay between each item (100ms)
                });
                menuOpen = true;
            }
        });

        // Sidebar Toggle Button (optional for mobile)
        const toggleBtn = document.querySelector('.toggle-btn');
        const sidebar = document.querySelector('.sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Logout Button Action
        const logoutBtn = document.querySelector('.logout-btn');
        logoutBtn.addEventListener('click', () => {
            if (confirm) {
                window.location.href = 'logout'; // Redirect to logout page
            }
        });
    </script>

</body>
</html>
