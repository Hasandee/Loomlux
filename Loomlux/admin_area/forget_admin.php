<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $select = "SELECT * FROM `admins_table` WHERE admin_email='$email'";
    $result = mysqli_query($con, $select);
    $number = mysqli_num_rows($result);

    if ($number == 0) {
        echo "<div id='error-message' style='color: red; text-align: center; margin-top:20px;margin-bottom:-20px;'>Email not found</div>";
    } else {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['admin_email'] = $data['admin_email'];
        echo "<script>window.open('rest_admin_password.php','_self')</script>";
        exit(); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px; 
    width: 100%;
    margin: auto; 
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

input {
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%; /* Make the input fields take up the full width of the container */
}

input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Responsive Styling */
@media only screen and (max-width: 600px) {
    .container {
        padding: 10px;
    }

    input {
        margin-bottom: 12px;
    }
}
</style>

</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h2>Password Reset</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <input type="submit" name="submit" value="Reset Password">
        </form>
    </div>
</body>
</html>
