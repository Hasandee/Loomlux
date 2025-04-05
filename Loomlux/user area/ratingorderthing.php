<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
               table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

       .images {
            width: 120px;
            height: 150px;
        }

        form {
            margin-top: 20px;
        }

        form input {
            margin-bottom: 10px;
        }
        table td img{
            width:20px;
            height:20px;
        }
    </style>
    </style>
</head>
<body>

<?php
// Check if order_id is set in the URL parameters
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch product details based on the order_id
    $fetch_order_query = "SELECT * FROM `placeorderdetails_table` WHERE order_id = '$order_id'";
    $fetch_order_result = mysqli_query($con, $fetch_order_query);

    if ($fetch_order_result && mysqli_num_rows($fetch_order_result) > 0) {
        $row = mysqli_fetch_assoc($fetch_order_result);

        // Check if the columns exist
        if (isset($row['product_images'], $row['product_prices'], $row['product_titles'], $row['quantities'], $row['shop_ids'])) {
            $product_images = explode(',', $row['product_images']);
            $product_prices = explode(',', $row['product_prices']);
            $product_titles = explode(',', $row['product_titles']);
            $quantities = explode(',', $row['quantities']);
            $shop_ids = explode(',', $row['shop_ids']);
            $product_ids = explode(',', $row['product_ids']);

            // Display order details in a table
            echo "<h3>Order ID: $order_id</h3>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Product Image</th>";
            echo "<th>Title</th>";
            echo "<th>Price</th>";
            echo "<th>Quantity</th>";
            echo "<th>Shop Name</th>";
            echo "<th>Rating</th>";
            echo "</tr>";

            // Iterate through each product
            for ($i = 0; $i < count($product_images); $i++) {
                // Fetch shop name based on shop_id
                $shop_id = $shop_ids[$i];
                $shop_query = "SELECT shopname FROM `shops_table` WHERE shop_id = '$shop_id'";
                $shop_result = mysqli_query($con, $shop_query);
                $shop_name = ($shop_result && mysqli_num_rows($shop_result) > 0) ? mysqli_fetch_assoc($shop_result)['shopname'] : 'Unknown Shop';

                // Display product details in the table
                echo "<tr>";
                echo "<td><img src='../shop_area/product_images/" . $product_images[$i] . "' alt='Product Image' class='images'></td>";
                echo "<td>" . $product_titles[$i] . "</td>";
                echo "<td>" . $product_prices[$i] . "</td>";
                echo "<td>" . $quantities[$i] . "</td>";
                echo "<td>" . $shop_name . "</td>";
                // Replace this with your actual rating logic or display the rating from the database
                echo "<td><a href='../user_area/ratingreview.php?order_id=" . $order_id . "&product_id=" . $product_ids[$i] . "'>Rating And Review</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Missing columns in the database.";
        }
    } else {
        echo "No order details found for order ID $order_id.";
    }
} else {
    echo "Order ID not provided in the URL parameters.";
}
?>

</body>
</html>
