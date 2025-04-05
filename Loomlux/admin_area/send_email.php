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
                $insert_query = "INSERT INTO `user_product` (order_id, invoice_number, amount, product_mode, user_email, user_id) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($con, $insert_query);

                // Set values for placeholders
                $order_id = ''; // Set your order ID
                $invoice_number = ''; // Set your invoice number
                $amount = ''; // Set the amount
                $payment_mode = ''; // Set the payment mode
                $user_id = ''; // Set the user ID

                // Bind parameters
                mysqli_stmt_bind_param($stmt, "issssi", $order_id, $invoice_number, $amount, $adminReply, $userEmail, $user_id);

                // Execute statement
                $stmt_execute = mysqli_stmt_execute($stmt);

                if($stmt_execute) {
                    echo "Email sent and details inserted successfully.";
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
