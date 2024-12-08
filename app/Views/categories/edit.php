<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
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
            transition: background 0.5s ease;
        }
        h1 {
            color: #ff6f61;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            letter-spacing: 1px;
        }
        form {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus, textarea:focus {
            border-color: #ff6f61;
            outline: none;
        }
        button {
            background-color: #ff6f61;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        button:hover {
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

    <h1>Edit Category</h1>
    <form action="<?= base_url('categories/update/' . $category['ID']) ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $category['name'] ?>" required>
        <label for="description">Description:</label>
        <textarea name="description"><?= $category['description'] ?></textarea>
        <button type="submit">Update</button>
    </form>

    <a href="<?= base_url('categories') ?>" class="back-button"><i class="fas fa-arrow-left"></i> Back to List</a>

    
</body>
</html>
