<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h3 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
        }

        select, button {
            padding: 8px;
        }

        .table-container {
            margin-left:100px;
            overflow-x: auto;
            max-width: 100%;
            overflow-y: auto; /* Add vertical scrollbar */
            max-height: 300px; /* Set a max height or adjust as needed */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        @media screen and (max-width: 768px) {
            table {
                font-size: 14px;
            }
      form{
        margin-left:20px;
      }
      .table-container {
            margin-left:75px;
            overflow-x: 600px;
            max-width: 600px;
            overflow-y: auto; /* Add vertical scrollbar */
            max-height: 300px; /* Set a max height or adjust as needed */
        }
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <?php
    // Assuming you have started the session somewhere in your code
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    $get_user = "SELECT * FROM `users_table` WHERE user_id='$user_id'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    ?>
    <h3>ALL My Orders</h3>

    <!-- Search Form -->
    <form method="post" action="">
        <label for="search_payment_status">Search by Payment Status:</label>
        <select name="search_payment_status" id="search_payment_status">
            <option value="">All</option>
            <option value="Complete">Complete</option>
            <option value="Pending">Incomplete</option>
        </select>
        <button type="submit" name="submit_search">Search</button>
    </form>
    <div class="table-container">
    <table class="tableorder">
        <thead class="thead">
            <tr>
                <th>S1 no</th>
                <th>Amount Due</th>
                <th>Invoice number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Order Details</th>
                <th>Product Status</th>            
                <th>Payment Status</th>
                <th> Give Rating</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $get_order_details = "SELECT * FROM `placeorderdetails_table` WHERE user_id=$user_id";

            // Handle Search
            if (isset($_POST['submit_search'])) {
                $search_payment_status = mysqli_real_escape_string($con, $_POST['search_payment_status']);
                if (!empty($search_payment_status)) {
                    $get_order_details .= " AND order_status = '$search_payment_status'";
                }
            }

            $result_orders = mysqli_query($con, $get_order_details);
            $number = 1;

            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['total_price'];
                $invoice_number = $row_orders['invoice_number'];
                $order_status = $row_orders['order_status'];
                $Product_status = $row_orders['Product_status'];
                $user_id = $row_orders['user_id'];

                if ($order_status == 'Pending') {
                    $order_status = 'Incomplete';
                } else {
                    $order_status = 'Complete';
                }

                $order_date = $row_orders['create_at'];

                echo "<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>
                        <td><a href='../user area/oderthings.php?order_id=$order_id'>Order Details</a></td>";

                if ($Product_status == 'Pending') {
                    echo "<td>Order Processing</td>";
                }elseif($Product_status=='Processs'){
                    echo "<td>Accepted</td>";
                } elseif($Product_status == 'Shipping'){
                    echo "<td>Shipping</td>";
                }
                elseif($Product_status == 'Reject'){
                    echo "<td>Reject</td>";
                }elseif($Product_status == 'Accepted'){
                    echo "<td>Delevery</td>";
                    if ($order_status == 'Complete') {
                        echo "<td>Paid</td>";
                        echo"<td><a href='../user area/ratingorderthing.php?order_id=$order_id'>Rating And Review</a></td>";
                    } else {
                      
                        echo "<td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td></tr>";
                    }
                }
                else
                 {
                    echo "<td>Processing</td>";
                }

               

                $number++;
            }
            ?>
        </tbody>
    </table>
        </div>
</body>
</html>
