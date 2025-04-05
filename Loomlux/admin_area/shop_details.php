<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
</head>
<body>

<h3>All Orders</h3>

<!-- Search Form -->
<form method="post" action="">
    <label for="search_shopname">Search by shopname:</label>
    <input type="text" name="search_shopname" id="search_shopname" placeholder="Enter shopname" autocomplete="off">
    <button type="submit" name="submit_search">Search</button>
</form>

<table>
    <thead>
        <?php
        $get_orders = "SELECT * FROM `shops_table`";
        
        // Handle Search
        if (isset($_POST['submit_search'])) {
            $search_shopname = mysqli_real_escape_string($con, $_POST['search_shopname']);
            $get_orders .= " WHERE shopname LIKE '%$search_shopname%'";
        }
        
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2>No customers</h2>";
        } else {
            echo "<tr>
                <th>Sl no</th>
                <th>shopname</th>
                <th>shop Email</th>
                <th>Image</th>
                <th>Address No</th>
                <th>Contact Number</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>";

            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                // Existing code to fetch and display shop details
                $shop_id = $row_data['shop_id'];
                $shop_name = $row_data['shopname'];
                $shop_email = $row_data['shop_email'];
                $shop_address = $row_data['shop_address'];
                $shop_mobile = $row_data['shop_mobile'];
                $shop_image = $row_data['shop_image'];

                $number++;
                echo "<tr>
                    <td>$number</td>
                    <td>$shop_name</td>
                    <td>$shop_email</td>
                    <td><img src='../admin_area/shop_images/$shop_image' class='shop_ima'></td>
                    <td>$shop_address</td>
                    <td>$shop_mobile</td>
                    <td><a href='admin.php?delete_shop=$shop_id'><i class='bx bxs-message-alt-x'></i></a></td>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>

</body>
</html>
