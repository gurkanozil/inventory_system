<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Inventory Dashboard</h1>

    <!-- Add New Item Form -->
    <form action="add_item.php" method="POST">
        <input type="text" name="item_name" placeholder="Item Name" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <button type="submit">Add Item</button>
    </form>

    <!-- Display Inventory -->
    <table>
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Date Added</th>
        </tr>

        <?php
        $query = "SELECT * FROM inventory";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['item_name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['added_at']}</td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
