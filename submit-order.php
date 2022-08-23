<?php
session_start();

include("admin/confs/config.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

mysqli_query($conn, "INSERT INTO orders (name, email, phone, address, status, created_at, updated_at) VALUES ('$name', '$email', '$phone', '$address', 0, now(), now())");

$order_id = mysqli_insert_id($conn);
foreach($_SESSION['cart'] as $id => $qty) {
    mysqli_query($conn, "INSERT INTO order_items (order_id, book_id, qty) VALUES ($order_id, $id, $qty)");
}

unset($_SESSION['cart']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Order Submitted</h1>

    <div class="msg">
        Your order has been submitted. We'll deliver the items soon.
    </div>

    <div class="footer">
        &copy; <?php echo date("Y") ?> All right reserved.
    </div>
</body>
</html>