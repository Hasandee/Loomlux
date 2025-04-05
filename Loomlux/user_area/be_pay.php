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
$product_id=$get_item_quantity['product_id'];

$select_product_det="select * from `products` where product_id=$product_id";
$result_det=mysqli_query($con,$select_product_det);
$dat=mysqli_fetch_assoc($result_det);
$product_title=$dat['product_title'];
$product_image1=$dat['product_image1'];
$shop_id=$dat['shop_id'];


if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

$insert_orders = "INSERT INTO `be_pay` (user_id, amount_due, total_products, product_title,product_image1,product_id,shop_id) VALUES ($user_id, $subtotal, $count_products,$product_title,$product_image1,$product_id,$shop_id)";
$result_query = mysqli_query($con, $insert_orders);

if ($result_query) {
    echo "<script>alert('Orders are Submitted Successfully')</script>";
    echo "<script>window.open('pay.php','_self')</script>";
}

?>

