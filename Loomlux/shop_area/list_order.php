<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <style>
/* Reset some default styles */
body, h3, table {
    margin: 0;
    padding: 0;
}

/* Apply a mobile-first approach */
/* The max-width ensures that the style does not break on larger screens */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f2f2f2;
}

h3 {
    text-align: center;
    margin: 20px 0;
}

/* Make the form and table responsive */
form, table {
    max-width: 100%;
    width: 100%;
    margin: 20px 0;
}

/* Style the form for better readability */
form {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

label {
    flex: 0 0 100%;
    margin-bottom: 10px;
}

input, button {
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

input {
    flex: 0 0 calc(100% - 22px); /* Consider padding and border */
}

button {
    flex: 0 0 calc(100% - 22px); /* Consider padding and border */
    background-color: #4caf50;
    color: white;
    border: none;
    cursor: pointer;
}

/* Style the table for better readability */
table {
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #4caf50;
    color: white;
}

/* Style for small screens */
@media screen and (max-width: 600px) {
    th, td {
        display: block;
        width: 100%;
        box-sizing: border-box;
    }

    th {
        text-align: center;
    }

    td {
        text-align: left;
    }
}

        </style>
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
        $shop_id = $_SESSION['shop_id'];

        // Handle Search
        if (isset($_POST['submit_search'])) {
            $search_invoice = mysqli_real_escape_string($con, $_POST['search_invoice']);
            $get_orders = "SELECT * FROM `placeorderdetails_table` WHERE shop_ids = $shop_id AND invoice_number LIKE '%$search_invoice%'";
        } else {
            $get_orders = "SELECT * FROM `placeorderdetails_table` WHERE shop_ids = $shop_id";
        }

        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2>No Orders</h2>";
        } else {
            echo "<tr>
                <th>Sl no</th>
                <th>Username</th>
                <th>Delivery Person Name</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Shop ID</th>
                <th>Total Amount</th>
                <th>Invoice Number</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Product_status</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>";

            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
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
                    <td>$order_status</td>
                    <td>$Product_status</td>";

                    if ($Product_status == 'Pending') {
                        echo "<td><a href='shop_confrom.php?order_id=$order_id'>Order Accepted</a></td>";
                    } elseif($Product_status == 'Reject'){
                        echo "<td>Reject</td>";
                    } else{
                        echo "<td>Shipping</td>";
                    }
                    echo"
                    <td><a href='shop.php?delete_orders=$order_id '><i class='bx bxs-message-alt-x'></i></a></td>
                </tr>";
                $number++;
            }
        }
        ?>
    </tbody>
</table>

</body>
</html>
