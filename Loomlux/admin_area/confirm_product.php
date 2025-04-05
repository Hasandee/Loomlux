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
        $user_id=$row_fetch['user_id'];


        $select_user="select * from `users_table` where user_id='$user_id'";
        $result_user=mysqli_query($con,$select_user);
        $data=mysqli_fetch_assoc($result_user);
        $user_email=$data['user_email'];
    } else {
        echo "<h3>Error: Order not found</h3>";
        exit; // Stop execution if order not found
    }
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['product_mode']; // Corrected variable name




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
    <div class="replyForm">
<form action="" method="post">
    <h2>Payment Confirm</h2>
    <div class="form-group ">
        <label for="invoice_number">InvoiceNumber</label>
        <input type="text" id="invoice_number" name="invoice_number" value="<?php echo $invoice_number ?>">
    </div>
    <div class="form-group ">
        <label for="amount">Amount</label>
        <input type="text" id="amount" name="amount" value="<?php echo $amount_due ?>">
    </div>
    <div class="form-group ">
        <label for="user_id">User_id</label>
        <input type="text" id="user_id" name="user_id" value="<?php echo $user_id ?>">
    </div>
    <div class="form-group ">
        <label for="order_id">User_id</label>
        <input type="text" id="order_id" name="order_id" value="<?php echo $order_id ?>">
    </div>
    <div class="form-group ">
        <label for="user_email">User_id</label>
        <input type="text" id="user_email" name="user_email" value="<?php echo $user_email ?>">
    </div>
    <div class="form-group ">
        <label for="product_mode">Process</label>
        <select id="product_mode" name="product_mode">
            <option>Select Processing</option>
            <option value="Pending">Processs</option>
            <option value="Processs">Accept</option>
            <option value="Shipping">Shipping</option>
            <option value="Accepted">Delivery</option>
            <option value="Reject">Reject</option>
        </select>
    </div>
    <div class="form-group submit-btn">
        <input type="submit" value="Confirm" name="confirm_payment">
    </div>
</form>
</div>

<script>
        function showReplyForm(order_id) {
            // Set the message ID in the hidden form field
            document.getElementById('order_id').value = order_id;

            // Set the user's email in the hidden form field
            document.getElementById('user_email').value = "<?php echo $row['user_email']; ?>";

            // Show the reply form
            document.getElementById('replyForm').style.display = 'block';
        }
    </script>

  </body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

include("../includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST["order_id"];
    $adminReply = mysqli_real_escape_string($con, $_POST["product_mode"]);
    $userEmail = mysqli_real_escape_string($con, $_POST["user_email"]);

    // Update the database with the admin reply
    $sqlUpdate = "UPDATE user_product SET product_mode = '$adminReply' WHERE order_id ='$order_id'";

    if ($con->query($sqlUpdate) === TRUE) {
        try {
            // Server settings for Gmail SMTP
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'abdulraheemrn2014@gmail.com'; // Your Gmail address
            $mail->Password   = 'fpep izvf rfdg bseb'; // Your Gmail password
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => true,
                    'cafile' => 'C:\xampp\perl\vendor\lib\Mozilla\CA\cacert.pem' // Specify the full path here
                )
            );

            // Sender and recipient
            $mail->setFrom('abdulraheemrn2014@gmail.com', 'LoomLux');
            $mail->addAddress($userEmail); // User's email address

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reply from Admin';
            $mail->Body    = "Dear User,\n\nAdmin has replied to your message:\n\n$adminReply";

            // Send email
            if($mail->send()) {
                // Insert payment details into user_product table
                $insert_query = "INSERT INTO `user_products` (order_id, invoice_number, amount, product_mode, user_email, user_id) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($con, $insert_query);

                // Set values for placeholders
                $invoice_number = $_POST['invoice_number'];
                $amount = $_POST['amount'];
                $payment_mode = $_POST['product_mode']; 
                $user_id=$_POST['user_id'];

                // Bind parameters
                mysqli_stmt_bind_param($stmt, "issssi", $order_id, $invoice_number, $amount, $adminReply, $userEmail, $user_id);

                // Execute statement
                $stmt_execute = mysqli_stmt_execute($stmt);

                if($stmt_execute) {
                    echo "Email sent and details inserted successfully.";
                    if ($stmt_execute) {
                      echo "<h3>Successfully Completed the payment</h3>";
                      echo "<script>window.open('admin.php?list_orders','_self')</script>";
              
                      // Update order status in placeorderdetails_table
                      $update_orders = "UPDATE `placeorderdetails_table` SET Product_status=? WHERE order_id=?";
                      $stmt = mysqli_prepare($con, $update_orders);
                      mysqli_stmt_bind_param($stmt, "si", $payment_mode, $order_id);
                      $result = mysqli_stmt_execute($stmt);
              
                      // Update order status in order_pending table
                      $update_order_pending = "UPDATE `order_pending` SET Product_status = ? WHERE order_details_id = ?";
                      $stmt = mysqli_prepare($con, $update_order_pending);
                      mysqli_stmt_bind_param($stmt, "si", $payment_mode, $order_details_id);
                      $result_update_order_pending = mysqli_stmt_execute($stmt);
              
                      if (!$result_update_order_pending) {
                          echo "<h3>Error updating order status</h3>";
                      }
                  } else {
                      echo "<h3>Error inserting payment details</h3>";
                  }
                 
                } else {
                    echo "Error inserting details: " . mysqli_error($con);
                }
            } else {
                echo "Error sending email.";
            }
        } catch (Exception $e) {
            echo "Error: {$e->getMessage()}";
        }
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
}
?>
