<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

// Check if the form is submitted
if (isset($_POST['submit_order'])) {
    // Retrieve user details from the form
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $contact_number = mysqli_real_escape_string($con, $_POST['contact_number']);
    $postal_number = mysqli_real_escape_string($con, $_POST['postal_number']);

    // Retrieve product details from the products_detail table
    $user_id = $_SESSION['user_id'];
    $order_id = $_SESSION['order_id'];

    $fetch_order_query = "SELECT * FROM `products_detail` WHERE user_id = '$user_id' AND order_id = '$order_id'";
    $fetch_order_result = mysqli_query($con, $fetch_order_query);

    if ($fetch_order_result && mysqli_num_rows($fetch_order_result) > 0) {
        $row = mysqli_fetch_assoc($fetch_order_result);

        // Check if the required columns exist
        if (isset($row['product_images'], $row['product_prices'], $row['product_titles'], $row['quantities'], $row['product_ids'], $row['shop_ids'])) {
            $product_images = $row['product_images'];
            $product_prices = $row['product_prices'];
            $product_titles = $row['product_titles'];
            $quantities = $row['quantities'];
            $product_ids = $row['product_ids'];
            $shop_ids = $row['shop_ids'];
            $total_price=$row['sub_total'];

            // Generate an invoice number (you can customize this logic)
            $invoice_number = generateInvoiceNumber();

            // Insert the order details into placeorderdetails_table
            $insert_order_details_query = "INSERT INTO `placeorderdetails_table` (user_id, order_id, username, address, contact_number, postal_number, product_images, product_prices, product_titles, quantities, product_ids, shop_ids, invoice_number, order_status,total_price,Product_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
            
            // Set the default order_status as 'Pending'
            $order_status = 'Pending';
            $Product_status='Pending';
            $stmt = mysqli_prepare($con, $insert_order_details_query);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, 'ssssssssssssssss', $user_id, $order_id, $username, $address, $contact_number, $postal_number, $product_images, $product_prices, $product_titles, $quantities, $product_ids, $shop_ids, $invoice_number, $order_status,$total_price,$Product_status);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Check for errors
            if (mysqli_stmt_error($stmt)) {
                echo "Error inserting order details: " . mysqli_stmt_error($stmt);
            } else {
                $order_details_id = mysqli_insert_id($con);

                // Fetch product_id and quantity from products_detail table
                $fetch_product_quantity_query = "SELECT product_ids, quantities FROM `products_detail` WHERE user_id = '$user_id' AND order_id = '$order_id'";
                $fetch_product_quantity_result = mysqli_query($con, $fetch_product_quantity_query);

                if ($fetch_product_quantity_result && mysqli_num_rows($fetch_product_quantity_result) > 0) {
                    $total_quantity = 0;

                    while ($product_quantity_row = mysqli_fetch_assoc($fetch_product_quantity_result)) {
                        $product_id = $product_quantity_row['product_ids'];
                        $quantity = $product_quantity_row['quantities'];

                        $total_quantity += $quantity;

                        // Insert into orders_pending table
                        $status = 'Pending';
                        $Product_status='Pending';
                        $insert_pending_orders = "INSERT INTO `order_pending` (user_id, invoice_number, product_ids, quantity, order_status, order_details_id,Product_status) VALUES (?, ?, ?, ?, ?, ?,?)";

                        $stmt_pending_orders = mysqli_prepare($con, $insert_pending_orders);

                        // Bind parameters
                        mysqli_stmt_bind_param($stmt_pending_orders, 'sssssss', $user_id, $invoice_number, $product_id, $quantity, $status, $order_details_id,$Product_status);

                        // Execute the statement
                        mysqli_stmt_execute($stmt_pending_orders);

                        // Check for errors
                        if (mysqli_stmt_error($stmt_pending_orders)) {
                            echo "Error inserting into orders_pending table: " . mysqli_stmt_error($stmt_pending_orders);
                        }

                        // Close the statement
                        mysqli_stmt_close($stmt_pending_orders);
                    }

                    // Output total quantity
                    echo "<p>Total Quantity: $total_quantity";

                    // Automatically delete entries from the cart_detail table
                    $delete_cart_entries_query = "DELETE FROM `cart_detail` WHERE user_id = '$user_id'";
                    $result_delete_cart = mysqli_query($con, $delete_cart_entries_query);

                    if (!$result_delete_cart) {
                        echo "<br>Error deleting cart entries: " . mysqli_error($con);
                    } else {
                        echo "Cart details deleted successfully.</p>";
                    }
                } else {
                    echo "Error fetching product details: " . mysqli_error($con);
                }

                echo "<script>alert('Order details submitted successfully.')</script>";
                echo "<script>window.open('../user_area/pay.php','_self')</script>";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Missing columns in the database.";
        }
    } else {
        echo "No order details found for user ID $user_id and order ID $order_id.";
    }
}

// Function to generate a random invoice number
function generateInvoiceNumber() {
    return 'INV' . rand(100000, 999999);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="Style.css">
  
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Add some basic styling */
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
            width: 80px;
            height: 80px;
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
        .imageid{
    width: 30px;
    height:30px;
    border-radius:50%;
  }
  </style>
</head>
<body>
    <div id="page" class="site">

      <aside class="site-off desktop-hide">
        <div class="off-canvas">
            <div class="canvas-head flexitem">
                <div class="logo"><a href="/"><span class="circle"></span>.LoomLux</a></div>
                <a href="" class="t-close flexcenter"><i class="ri-close-line"></i></a>
            </div>
            <div class="departments">

            </div>
            <nav>

            </nav>
            <div class="thetop-nav">

            </div>
        </div>
      </aside>

        <header>

        <div class="header-top mobile-hide">
            <div class="container">
                <div class="wrapper flexitem">
                    <div class="left">
                     <ul class="flexitem main-links">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Feature Product</a></li>
                        <li><a href="wishlist.php">Whislist</a></li>
                     </ul>
                    </div>
                    <div class="right">
                        <ul class="flexitem">
                          <li><?php

if(!isset($_SESSION['username'])){
  echo"<li class='nav-item'>
  <a class='nav-link' href='#'> Welcome Guest</a>
  </li>";

}else{
  echo"<li class='nav-item'>
  <a class='nav-link' href='#'> Welcome ".$_SESSION['username']."</a>
  </li>";
}
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='../user_area/user_login.php'>login</a>
  </li>";
}else{
  echo"<li class='nav-item'>
  <a class='nav-link' href='../user_area/logout.php'>logout</a>
  </li>";
}

?></li>
                            <li class="main-link">
                              <?php
if(isset($_SESSION['username'])){
  $username=$_SESSION['username'];
  echo"<li><a href='../user_area/profile.php'>My Account</a></li>";
  $select_user="select * from `users_table` where username='$username'";
           $result_user=mysqli_query($con,$select_user);
           $row_user=mysqli_fetch_assoc($result_user);
           $user_image=$row_user['user_image'];
           $username=$row_user['username'];

           echo "<li><img src='../user_area/user_images/$user_image' class='imageid'>$username</li>";
           
}else{
  echo"<li><a href='../user_area/user_registration.php'>Sign up</a></li>";
}
                              ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="container">
                <div class="wrapper flexitem">
                    <a href="#" class="trigger desktop-hide"><i class="ri-menu-2-line"></i></a>
                    <div class="left flexitem">
                        <div class="logo"><a href="/"><span class="circle"></span>.LoomLux</a></div>
                        <nav class="mobile-hide">
                            <ul class="flexitem second-links">
                            <li><a href="../user area/index.php">home</a></li>
                            <li><a href="../user area/display_all.php">Shop</a></li>
                            <li><a href="../user area/compear_product_details.php">Compaer</a></li>
                            <li><a href="">Men</a></li>
                            <li><a href="">Sport
                                <div class="fly-item"><span>New!</span></div>
                            </a></li></ul>
                        </nav>
                    </div>
                    <div class="right">
                    <?php
                            if(!isset($_SESSION['username'])){
  echo" <ul class='flexitem second-links'>
  <li class='mobile-hide'><a href='#'>
      <div class='icon-large'><i class='ri-heart-line'></i></div>
      <div class='fly-item'><span class='item-number'><?php wish_item();  ?></span></div>
  </a></li>";
} else{
  echo"<ul class='flexitem second-links'>
  <li class='mobile-hide'><a href='wishlist.php'>
      <div class='icon-large'><i class='ri-heart-line'></i></div>";?>
      
      <div class='fly-item'><span class='item-number'><?php wish_item();  ?></span></div>
      <?php
echo "</a></li>";
}
    ?>        
                       
                            <?php
                            if(!isset($_SESSION['username'])){
  echo"<li><a href='index.php'class='iscart'>
  <div class='icon-large>
    <i class='ri-shopping-cart-line'></i>
  </div>
  <div class='icon-text'></div>
  <div class='mini-text'>Total LRK:</div>
</a></li>";
} else{
  echo"<li><a href='cart.php'class='iscart'>
  <div class='icon-large'>
    <i class='ri-shopping-cart-line'></i>";?>
      <div class="fly-item"><span class="item-number"><?php cart_item();  ?></span></div>
  </div><?php
  echo "<div class='icon-text'></div>";?>
  <div class='mini-text'>Total LRK:<?php total_cart_price(); ?></div>
  <?php
echo "</a></li>";
}
    ?>                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
     
      </div>
      
        </header>
  <main>
   

<?php
     add_cart();
    ?>


<div class="bg-light">
<h3 class="text-center">LoomLux</h3>
  <p class="text-center">Its Your Platform Come And Buy It</p> 
</div>
</div>
</div>
</div>
</div>
<?php
// Check if both user_id and order_id are set in the session
if (isset($_SESSION['user_id'], $_SESSION['order_id'])) {
    $user_id = $_SESSION['user_id'];
    $order_id = $_SESSION['order_id'];

    // Fetch order details from the database for the specified user and order ID
    $fetch_order_query = "SELECT * FROM `products_detail` WHERE user_id = '$user_id' AND order_id = '$order_id'";
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

            // Display order details in a table
            echo "<style>";
            echo "body { font-family: Arial, sans-serif;  justify-content: center; align-items: center; height: 100vh; margin: 0; background-color: #f5f5f5; }";
            echo ".container { display: flex; max-width: 1200px; width: 100%; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden; }";
            echo ".table-container { flex: 1; padding: 20px; }";
            echo "table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }";
            echo "table, th, td { border: 1px solid #ddd; }";
            echo "th, td { padding: 12px; text-align: left; }";
            echo "th { background-color: #f2f2f2; }";
            echo ".form-container { flex: 1; padding: 20px; background-color: #f5f5f5; }";
            echo "form { max-width: 400px; margin: 0 auto; }";
            echo "label { display: block; margin-bottom: 8px; }";
            echo "input { width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box; }";
            echo "input[type='submit'] { background-color: #4caf50; color: #fff; cursor: pointer; }";
            echo "</style>";

            echo "<div class='container'>";
            echo "<div class='table-container'>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Product Image</th>";
            echo "<th>Title</th>";
            echo "<th>Price</th>";
            echo "<th>Quantity</th>";
            echo "<th>Shop Name</th>";
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
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
            echo "<div class='form-container'>";
            // Display the order details form
            echo "<form method='post'>";
            echo "<label for='username'>Delivery Person Name:</label>";
            echo "<input type='text' name='username' required autocomplete='off'>";
            echo "<label for='address'>Address:</label>";
            echo "<input type='text' name='address' required autocomplete='off'>";
            echo "<label for='contact_number'>Contact Number:</label>";
            echo "<input type='text' name='contact_number' required autocomplete='off'>";
            echo "<label for='postal_number'>Postal Number:</label>";
            echo "<input type='text' name='postal_number' required autocomplete='off'>";
            echo "<input type='submit' name='submit_order' value='Submit Order'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "Missing columns in the database.";
        }
    } else {
        echo "No order details found for user ID $user_id and order ID $order_id.";
    }
} else {
    echo "User ID or Order ID not set in the session.";
}
?>

</body>
</html>
