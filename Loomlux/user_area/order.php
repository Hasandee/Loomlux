<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

// Getting total items and total price of all
$user_id = $_SESSION['user_id'];
$total_price = 0;

$cart_query_price = "SELECT * FROM `cart_detail` WHERE user_id='$user_id'";
$result_cart_price = mysqli_query($con, $cart_query_price);

$invoice_number = mt_rand();
$status = 'pending';

// Use mysqli_num_rows to get the total count of products
$count_products = mysqli_num_rows($result_cart_price);

while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id=$product_id";
    $run_price = mysqli_query($con, $select_product);

    while ($row_product_price = mysqli_fetch_array($run_price)) {
        $product_price = array($row_product_price['product_price']);
        $product_price = array_sum($product_price);
        $total_price += $product_price;
    }
}

// Getting quantity from cart
$get_cart = "SELECT * FROM `cart_detail`";
$run_cart = mysqli_query($con, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];

if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $subtotal, $invoice_number, $count_products, NOW(), '$status')";
$result_query = mysqli_query($con, $insert_orders);

if ($result_query) {
    echo "<script>alert('Orders are Submitted Successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

//order pending
$insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number,product_id,quantity, order_status) VALUES ($user_id, $invoice_number,$product_id,$quantity, '$status')";
$result_pending_orders+=mysqli_query($con,$insert_pending_orders);

//delete items  from cart
$empty_cart="Delete from  `cart_detail` where user_id='$user_id'";
$result_delete=mysqli_query($con,$empty_cart);
?>

