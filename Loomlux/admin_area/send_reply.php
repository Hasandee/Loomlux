<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

include("../includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $messageId = $_POST["message_id"];
    $adminReply = mysqli_real_escape_string($con, $_POST["admin_reply"]);
    $userEmail = mysqli_real_escape_string($con, $_POST["user_email"]);

    // Update the database with the admin reply
    $sqlUpdate = "UPDATE contact SET Admin_Reply = '$adminReply' WHERE ID = $messageId";

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

            $mail->send();
            echo "<script>alert('Admin Message send Successsfully')</script>";
        } catch (Exception $e) {
            echo "Error sending email: {$e->getMessage()}";
        }
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
}
?>
