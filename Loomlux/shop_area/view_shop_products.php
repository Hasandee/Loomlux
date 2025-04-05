<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products Details</title>
    <style>
        /* Your existing CSS styles */
        /* ... */
    </style>
</head>
<body>

<h1>All Products Details</h1>

<!-- Search Form -->
<form method="post" action="">
    <label for="search_product">Search by Product Title:</label>
    <input type="text" name="search_product" id="search_product" placeholder="Enter Product Title" autocomplete="off">
    <button type="submit" name="submit_search">Search</button>
</form>

<div>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $shop_id = $_SESSION['shop_id'];

            // Handle Search
            if (isset($_POST['submit_search'])) {
                $search_product = mysqli_real_escape_string($con, $_POST['search_product']);
                $get_products = "SELECT * FROM `products` WHERE `shop_id` = $shop_id AND `product_title` LIKE '%$search_product%'";
            } else {
                $get_products = "SELECT * FROM `products` WHERE `shop_id` = $shop_id";
            }

            $result = mysqli_query($con, $get_products);
            $number = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
            ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $product_title ?></td>
                    <td><img src='./product_images/<?php echo $product_image1;  ?>' class='product_img' /></td>
                    <td><?php echo $product_price ?></td>
                    <td><?php echo $status ?></td>
                    <td><a href='shop.php?edit_products=<?php echo $product_id; ?>'><i class='bx bx-edit-alt'></i></a></td>
                    <td><a href='shop.php?delete_product=<?php echo $product_id; ?>'><i class='bx bxs-message-alt-x'></i></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
