<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1.0">
    <title>Inventory Transaction List</title>
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
        a.add-transaction {
            text-decoration: none;
            font-weight: 500;
            background-color: #ff6f61;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }
        a.add-transaction:hover {
            background-color: #ee5a24;
        }
        table {
            wIDth: 100%;
            max-wIDth: 900px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            overflow: hIDden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solID #ddd;
        }
        table th {
            background-color: #ff6f61;
            color: white;
            text-transform: uppercase;
        }
        table tr:hover {
            background-color: rgba(255, 111, 97, 0.1);
        }
        table td form {
            display: inline-block;
            margin: 0;
        }
        table td button {
            background-color: #ee5a24;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        table td button:hover {
            background-color: #e63946;
        }
        .back-button {
            margin-top: 30px;
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
            wIDth: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #a6c1ee, #fbc2eb);
            z-index: 1000;
            opacity: 0;
            visibility: hIDden;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .spinner {
            wIDth: 80px;
            height: 80px;
            border: 8px solID rgba(255, 255, 255, 0.2);
            border-top: 8px solID #ff6f61;
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
    <div ID="loading-screen">
        <div class="spinner"></div>
    </div>

    <h1>Inventory Transaction List</h1>
    <a href="<?= base_url('inventory_transaction/create') ?>" class="add-transaction"><i class="fas fa-plus"></i> Add New Transaction</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Furniture ID</th>
                <th>Transaction Type</th>
                <th>Quantity</th>
                <th>Transaction Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?= $transaction['furniture_ID'] ?></td>
                <td><?= $transaction['furniture_name'] ?></td>
                <td><?= $transaction['transaction_type'] ?></td>
                <td><?= $transaction['quantity'] ?></td>
                <td><?= $transaction['transaction_date'] ?></td>
                <td>
                    <a href="<?= base_url('inventory_transaction/edit/' . $transaction['ID']) ?>"><i class="fas fa-edit"></i> Edit</a>
                    <form action="<?= base_url('inventory_transaction/delete/' . $transaction['ID']) ?>" method="post" style="display:inline;">
                        <input type="hIDden" name="_method" value="DELETE">
                        <button type="submit"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('dashboard') ?>" class="back-button"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>

    <script>
        const loadingScreen = document.getElementByID('loading-screen');

        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(event) {
                loadingScreen.classList.add('active');
            });
        });
    </script>
</body>
</html>
