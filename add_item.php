<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO inventory (item_name, quantity) VALUES ('$item_name', '$quantity')";
    mysqli_query($conn, $query);

    header("Location: inventory.php");
}
?>
