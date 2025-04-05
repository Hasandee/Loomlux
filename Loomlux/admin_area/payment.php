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
        $get_orders = "SELECT * FROM `user_payments`";

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
                <th>Total Amount</th>
                <th>Payment Mode</th>
                <th>Invoice Number</th>
                <th>Order date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>";

            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                // Existing code to fetch and display payment details
                $order_id = $row_data['order_id'];
                $amount_due = $row_data['amount'];
                $payment_mode = $row_data['payment_mode'];
                $invoice_number = $row_data['invoice_number'];
                $order_date = $row_data['date'];

                $get_user = "SELECT * FROM `placeorderdetails_table` WHERE order_id = $order_id";
                $result_user = mysqli_query($con, $get_user);
                $row_user = mysqli_fetch_assoc($result_user);
                $order_status = $row_user['order_status'];

                $number++;
                echo "<tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$payment_mode</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                    <td><a href='admin.php?delete_payment=$order_id'><i class='bx bxs-message-alt-x'></i></a></td>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>

</body>
</html>
