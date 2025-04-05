<?php
include('../includes/connect.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $select_data = "SELECT * FROM `placeorderdetails_table` WHERE order_id = ?";
    $stmt = mysqli_prepare($con, $select_data);
    mysqli_stmt_bind_param($stmt, "i", $order_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row_fetch = mysqli_fetch_assoc($result);
        $invoice_number = $row_fetch['invoice_number'];
        $amount_due = $row_fetch['total_price'];
        $order_details_id = $row_fetch['order_details_id'];
    } else {
        echo "<h3>Error: Order not found</h3>";
        exit; // Stop execution if order not found
    }
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];

    $insert_query = "INSERT INTO `user_payments` (order_id, invoice_number, amount, payment_mode) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $insert_query);
    mysqli_stmt_bind_param($stmt, "isds", $order_id, $invoice_number, $amount, $payment_mode);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<h3>Successfully Completed the payment</h3>";
        echo "<script>window.open('profile.php?user_orders','_self')</script>";

        $update_orders = "UPDATE `placeorderdetails_table` SET order_status='Complete' WHERE order_id=?";
        $stmt = mysqli_prepare($con, $update_orders);
        mysqli_stmt_bind_param($stmt, "i", $order_id);
        $result = mysqli_stmt_execute($stmt);

        $update_order_pending = "UPDATE `order_pending` SET order_status = 'Complete' WHERE order_details_id = ?";
        $stmt = mysqli_prepare($con, $update_order_pending);
        mysqli_stmt_bind_param($stmt, "i", $order_details_id);
        $result_update_order_pending = mysqli_stmt_execute($stmt);

        if (!$result_update_order_pending) {
            echo "<h3>Error updating order status</h3>";
        }
    } else {
        echo "<h3>Error inserting payment details</h3>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation in HTML | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link For Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Open Sans', sans-serif;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 10px;
  min-height: 100vh;
  background: #1BB295;
}

form {
  padding: 25px;
  background: #fff;
  max-width: 500px;
  width: 100%;
  border-radius: 7px;
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
}

form h2 {
  font-size: 27px;
  text-align: center;
  margin: 0px 0 30px;
}

form .form-group {
  margin-bottom: 15px;
  position: relative;
}

form label {
  display: block;
  font-size: 15px;
  margin-bottom: 7px;
}

form input,
form select {
  height: 45px;
  padding: 10px;
  width: 100%;
  font-size: 15px;
  outline: none;
  background: #fff;
  border-radius: 3px;
  border: 1px solid #bfbfbf;
}

form input:focus,
form select:focus {
  border-color: #9a9a9a;
}

form small {
  font-size: 14px;
  margin-top: 5px;
  display: block;
  color: #f91919;
}

form .password i {
  position: absolute;
  right: 0px;
  height: 45px;
  top: 28px;
  font-size: 13px;
  line-height: 45px;
  width: 45px;
  cursor: pointer;
  color: #939393;
  text-align: center;
}

.submit-btn {
  margin-top: 30px;
}

.submit-btn input {
  color: white;
  border: none;
  height: auto;
  font-size: 16px;
  padding: 13px 0;
  border-radius: 5px;
  cursor: pointer;
  font-weight: 500;
  text-align: center;
  background: #1BB295;
  transition: 0.2s ease;
}

.submit-btn input:hover {
  background: #179b81;
}
    </style>
  </head>
  <body>
    <form action="" method="post">
      <h2>Payment Confirm</h2>
      <div class="form-group ">
        <label for="invoice_number">InvoiceNumber</label>
        <input type="text" id="invoice_number"  name="invoice_number" value="<?php echo $invoice_number ?>">
      </div>
      <div class="form-group ">
        <label for="amount">Amount</label>
        <input type="text" id="amount" name="amount" value="<?php echo $amount_due ?>">
</div>
      <div class="form-group ">
        <label for="payment_mode">Payment</label>
        <select id="payment_mode" name="payment_mode">
          <option >Select payment mode</option>
          <option >online</option>
          <option >offline</option>
          <option >cash on delivery</option>
        </select>
      </div>
      <div class="form-group submit-btn">
        <input type="submit" value="Confirm" name="confirm_payment">
      </div>
    </form>


  </body>
</html>