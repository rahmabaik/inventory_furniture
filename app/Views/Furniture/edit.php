<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Furniture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
            color: #333;
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
        }
        h1 {
            color: #ff6f61;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        form {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        label {
            font-weight: 600;
            margin-top: 10px;
            display: block;
        }
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #ff6f61;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #ee5a24;
        }
        .back-button {
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #a6c1ee;
            text-decoration: none;
            color: #fff;
            border-radius: 8px;
        }
        .back-button:hover {
            background-color: #7aa1d2;
        }

        /* Loading Screen */
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #a6c1ee, #fbc2eb);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .spinner {
            width: 80px;
            height: 80px;
            border: 8px solid rgba(255, 255, 255, 0.2);
            border-top: 8px solid #ff6f61;
            border-radius: 50%;
            animation: spin 1.5s infinite linear;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Active Loading Screen */
        #loading-screen.active {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div id="loading-screen">
        <div class="spinner"></div>
    </div>

    <h1>Edit Furniture</h1>
    <form action="<?= base_url('furniture/update/' . $furniture['ID']); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $furniture['name']; ?>" required>

        <label for="category_id">Category ID:</label>
        <input type="number" name="category_id" id="category_id" value="<?= $furniture['category_id']; ?>" required>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="<?= $furniture['price']; ?>" step="0.01" required>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="<?= $furniture['stock_quantity']; ?>" required>

        <input type="submit" value="Update">
    </form>

    <a href="<?= base_url('furniture') ?>" class="back-button"><i class="fas fa-arrow-left"></i> Back to List</a>

    <script>
        const loadingScreen = document.getElementById('loading-screen');

        document.querySelector('form').addEventListener('submit', function(event) {
            loadingScreen.classList.add('active');
        });
    </script>
</body>
</html>
