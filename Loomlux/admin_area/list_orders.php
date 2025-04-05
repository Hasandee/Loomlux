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
    <label for="search_invoice">Search by Invoice Number:</label>
    <input type="text" name="search_invoice" id="search_invoice" placeholder="Enter Invoice Number" autocomplete="off">
    <button type="submit" name="submit_search">Search</button>
</form>

<table>
    <thead>
        <?php
        $get_orders = "SELECT * FROM `placeorderdetails_table`";
        
        // Handle Search
        if (isset($_POST['submit_search'])) {
            $search_invoice = mysqli_real_escape_string($con, $_POST['search_invoice']);
            $get_orders .= " WHERE invoice_number LIKE '%$search_invoice%'";
        }
        
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2>No Orders</h2>";
        } else {
            echo "<tr>
                <th>Sl no</th>
                <th>username</th>
                <th>Delivery Person name</th>
                <th>address</th>
                <th>Contact No</th>
                <th>Shop IDs</th>
                <th>Total Amount</th>
                <th>Invoice Number</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Product Status</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>";

            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                // Existing code to fetch and display order details
                $order_id = $row_data['order_id'];
                $user_id = $row_data['user_id'];
                $user_name = $row_data['username'];
                $address = $row_data['address'];
                $contact_number = $row_data['contact_number'];
                $shop_ids = $row_data['shop_ids'];
                $amount_due = $row_data['total_price'];
                $invoice_number = $row_data['invoice_number'];
                $order_date = $row_data['create_at'];
                $order_status = $row_data['order_status'];
                $Product_status = $row_data['Product_status'];

                $get_user = "SELECT * FROM `users_table` WHERE user_id = $user_id";
                $result_user = mysqli_query($con, $get_user);
                $row_user = mysqli_fetch_assoc($result_user);
                $username = $row_user['username'];

                $number++;
                echo "<tr>
                    <td>$number</td>
                    <td>$username</td>
                    <td>$user_name</td>
                    <td>$address</td>
                    <td>$contact_number</td>
                    <td>$shop_ids</td>
                    <td>$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td>$order_status</td>";

                // Product Status Condition
                if($Product_status=='Processs'){
                    echo "<td><a href='confirm_product.php?order_id=$order_id'>Pending</a></td>"; 
                } elseif ($Product_status == 'Pending') {
                    echo "<td>waiting responces</td>";
                } 
               elseif($Product_status == 'Shipping'){
                    echo "<td><a href='confirm_product.php?order_id=$order_id'>Packing</a></td>";
                } elseif($Product_status == 'Reject'){
                    echo "<td>Reject</td>";
                } else{
                    echo "<td>Accepted</td>";
                }

                echo "<td><a href='admin.php?delete_orders=$order_id'><i class='bx bxs-message-alt-x'></i></a></td>
                </tr>";
                $number++;
            }
        }
        ?>
    </tbody>
</table>

</body>
</html>
