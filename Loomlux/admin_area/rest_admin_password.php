<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

// Check if the form is submitted
if (isset($_POST['admin_register'])) {
    // Get admin email from the session
    $admin_email = $_SESSION['admin_email'];

    // Get the new password and confirm password
    $admin_password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Check if passwords match
    if ($admin_password !== $confirm_password) {
        echo "<div id='error-message' style='color: red; text-align: center; margin-top:20px;margin-bottom:-20px;'>Passwords do not match. Please try again.</div>";
    } else {
        // Validate the password
        if (strlen($admin_password) < 8 || !preg_match('/[A-Z]/', $admin_password) || !preg_match('/[a-z]/', $admin_password) || !preg_match('/[0-9]/', $admin_password)) {
           
            echo "<div id='error-message' style='color: red; text-align: center; margin-top:20px;margin-bottom:-20px;'>Password must be at least 8 characters long and contain one uppercase letter, one lowercase letter, and one numeric value.</div>";
        } else {
            // Hash the password
            $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);

            // Update the admin password in the database
            $update_query = "UPDATE admins_table SET admin_password='$hash_password' WHERE admin_email='$admin_email'";
            $result = mysqli_query($con, $update_query);

            if ($result) {
                // Password updated successfully
                echo "<script>alert('Password updated successfully')</script>";
                // Redirect to a success page or login page
                echo "<script>window.open('admin_login.php', '_self')</script>";
                exit();
            } else {
                // Error updating password
                echo "<script>alert('Error updating password')</script>";
                echo "<script>window.open('admin_login.php', '_self')</script>";
            }
        }
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
    max-width: 400px; /* Set a maximum width for better readability on larger screens */
    width: 100%;
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
            <h2>Reset Password</h2>
            <p>Enter your new password below:</p>
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <!-- Remove the unnecessary token input field -->
            
            <input type="submit" name="admin_register" value="Update">
        </form>
    </div>
    <script>
    function checkPasswordMatch() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        var matchDiv = document.getElementById("password-match");
        if (password === confirmPassword) {
            matchDiv.innerHTML = "Password match";
            matchDiv.style.color = "green";
        } else {
            matchDiv.innerHTML = "Password do not match";
            matchDiv.style.color = "red";
        }

        checkPasswordStrength();
    }
    

</script>
</body>
</html>
