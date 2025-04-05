<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<?php
if (isset($_POST['user_register'])) {
 

  $user_username = mysqli_real_escape_string($con, $_POST['user_username']);
  $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
  $user_password = mysqli_real_escape_string($con, $_POST['user_password']);
  $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
  $conf_user_password = mysqli_real_escape_string($con, $_POST['conf_user_password']);
  $user_address = mysqli_real_escape_string($con, $_POST['user_address']);
  $user_contact = mysqli_real_escape_string($con, $_POST['user_contact']);
  $user_image = mysqli_real_escape_string($con, $_FILES['user_image']['name']);
  $user_image_tmp = $_FILES['user_image']['tmp_name'];

  $select_query = "SELECT * FROM users_table WHERE username='$user_username' OR user_email='$user_email'";
  $result = mysqli_query($con, $select_query);
  $row_count = mysqli_num_rows($result);




$error_message = "";

if (empty($user_username)) {
    $error_message .= "Username is required.<br>";
} elseif (strlen($user_username) < 3) {
    $error_message .= "Username must be at least 3 characters long.<br>";
}

if (strlen($user_password) < 8 || !preg_match('/[A-Z]/', $user_password) || !preg_match('/[a-z]/', $user_password) || !preg_match('/[0-9]/', $user_password)) {
    $error_message .= "Password must be at least 8 characters long and contain one uppercase letter, one lowercase letter, and one numeric value.<br>";
}

if (!ctype_digit($user_contact)) {
    $error_message .= "Contact number must contain only numbers .<br>";
}


if (!empty($error_message)) {
    
    echo "<div id='error-message' style='color: red; text-align: center; margin-top:20px;'>$error_message</div>";
} else {
    
    $select_query = "SELECT * FROM users_table WHERE username='$user_username' OR user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        
        echo "<div id='error-message' style='color: red; text-align: center; margin-top:20px;margin-bottom:-20px;'>Username or email already exists. Please choose a different one.</div>";
    } 
    else {
      $insert_query = "INSERT INTO users_table (username, user_email, user_password, user_image, user_address, user_mobile) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = mysqli_prepare($con, $insert_query);
      mysqli_stmt_bind_param($stmt, "ssssss", $user_username, $user_email, $hash_password, $user_image, $user_address, $user_contact);
       $sql_execute = mysqli_stmt_execute($stmt);

       if ($sql_execute) {
           echo "<script>alert('Data insert Successfully')</script>";
          echo "<script>window.open('../user_area/index.php')</script>";
      } else {
          die(mysqli_error($con));
       }

       if ($sql_execute) {
        echo "<script>alert('Data insert Successfully')</script>";
        echo "<script>window.location.href='../user_area/index.php'</script>";
        exit(); // Ensure script stops execution after redirection
    } else {
        echo "<div id='error-message' style='color: red; text-align: center;'>Error: " . mysqli_error($con) . "</div>";
    }
    }
  }





    $select_cart_items="Select * from cart_detail where user_id='$user_id'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($row_count>0){
      $_SESSION['username']=$user_username;
     echo "<script>alert('you have items in your cart')</script>";
     echo "<script>window.open('user_login.php','_self')</script>";
    }else{
    echo "<script>window.open('../user_area/index.php','_self')</script>";   
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
     <style>
       
      /* Global Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.title {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

.content {
    margin-top: 20px;
}

/* Form Styles */
.user-details {
    display: grid;
    grid-gap: 20px;
}

.input-box {
    position: relative;
    margin-bottom: 20px;
}

.details {
    font-size: 14px;
    margin-bottom: 5px;
    display: block;
}

input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Button Styles */
.button {
    text-align: center;
    margin-top: 20px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Responsive Styles */
@media screen and (max-width: 600px) {
    .container {
        max-width: 100%;
        margin: 20px;
    }

    .input-box {
        margin-bottom: 10px;
    }
}

    </style>
   </head>
<body>
   
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form action="user_registration.php" id="registerform" method="post" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <span for="user_username" class="details">Username</span>
                        <input type="text" id="user_username" placeholder="Enter your name" autocomplete="off" required="required" name="user_username" value="<?php echo isset($user_username) ? $user_username : ''; ?>">

                    </div>

                    <div class="input-box">
                        <span for="user_email" class="details">Email</span>
                        <input type="email" id="user_email" placeholder="Enter your email" autocomplete="off" required="required" name="user_email" value="<?php echo isset($user_email) ? $user_email : ''; ?>">
                    </div>

                    <div class="input-box">
                        <span for="user_image" class="details">User image</span>
                        <input type="file" id="user_image" placeholder="Enter your Image" required="required" name="user_image">
                    </div>

                    <div class="input-box">
                        <span for="user_password" class="details">Password</span>
                        <input type="password" id="user_password" placeholder="Enter your password" autocomplete="off" required="required" name="user_password" onkeyup="checkPasswordMatch()">
                    </div>

                    <div class="input-box">
                        <span for="conf_user_password" class="details">Confirm password</span>
                        <input type="password" id="conf_user_password" placeholder="Re-enter password" autocomplete="off" required="required" name="conf_user_password" onkeyup="checkPasswordMatch()">
                        <div id="password-match" class="password-match"></div>
                    </div>

                    <div class="input-box">
                        <span for="user_address" class="details">Address</span>
                        <input type="text" id="user_address" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                    </div>

                    <div class="input-box">
                        <span for="user_contact" class="details">Contact</span>
                        <input type="text" id="user_contact" placeholder="Enter your contact" autocomplete="off" required="required" name="user_contact">
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Register" name="user_register">
                    <p style="text-align:center; color:black">Already have an account?<a href="user_login.php">login</a></p>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

<!--php-->

<script>
    function checkPasswordMatch() {
        var password = document.getElementById("user_password").value;
        var confirmPassword = document.getElementById("conf_user_password").value;

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