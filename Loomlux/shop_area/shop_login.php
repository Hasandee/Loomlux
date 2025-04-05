<?php
ob_start(); // Output buffering starts
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
ob_end_clean(); // Output buffering ends and clears the buffer
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login Form </title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   <style>
/* General styling */
body {
  font-family: 'Arial', sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  align-items:center;
  overflow-x:hidden ;
}

.main_div {
  width: 80%;
  max-width: 400px;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
}

.title {
  text-align: center;
}

.title h3 {
  margin: 0;
  color: #333;
}

.text-center {
  text-align: center;
}

.social_icons a {
  display: inline-block;
  margin: 10px 5px;
  text-align: center;
  text-decoration: none;
  color: #fff;
  background-color: #3498db;
  padding: 8px;
  border-radius: 5px;
}

.social_icons i {
  margin-right: 5px;
}

/* Form styling */
form {
  margin-top: 20px;
}

.input_box {
  position: relative;
  margin-bottom: 20px;
}

.input_box input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

.icon {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
}

.option_div {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.check_box {
  display: flex;
  align-items: center;
}

.check_box input {
  margin-right: 5px;
}

.forget_div a {
  text-decoration: none;
  color: #3498db;
}

.button input {
  background-color: #3498db;
  color: #fff;
  cursor: pointer;
}

.sign_up {
  text-align: center;
  margin-top: 15px;
}

.sign_up a {
  text-decoration: none;
  color: #3498db;
}
/* Media Queries for responsiveness */
@media screen and (max-width: 600px) {
  .main_div {
    width: 90%;
  }
}

   </style>
   </head>
<body>
  <div class="main_div">
    <div class="title">
    <h3 >LoomLux</h3>
        <p class="text-center">Its Your Platform Come And Buy It</p>
    Login Form</div>
    <div class="social_icons">
      <a href="#"><i class="fab fa-facebook-f"></i> <span>Facebook</span></a>
      <a href="#"><i class="fab fa-twitter"></i><span>Twitter</span></a>
    </div>
    <form action="" method="post">
      <div class="input_box">
      <input type="text" id="shop_shopname"  placeholder="Enter your name" autocomplete="off" required="required" name="shop_shopname">
        <div class="icon"><i class="fas fa-shop"></i></div>
      </div>
      <div class="input_box">
      <input type="password" id="shop_password"  placeholder="Enter your password" autocomplete="off"  required="required" name="shop_password">
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>
      <div class="option_div">
        <div class="check_box">
          <input type="checkbox">
          <span>Remember me</span>
        </div>
        <div class="forget_div">
          <a href="forget_shop.php">Forgot password?</a>
        </div>
      </div>
      <div class="input_box button">
        <input type="submit" value="Login" name="shop_login">
      </div>
      <div class="sign_up">
        Not a member? <a href="shop_registration.php">Signup now</a>
      </div>
    </form>
  </div>
  
</body>
</html>
<?php


if (isset($_POST['shop_login'])) {
  $shop_shopname = $_POST['shop_shopname'];
  $shop_password = $_POST['shop_password'];

  $select_shop = "SELECT * FROM `shops_table` WHERE shopname = '$shop_shopname'";
  $result = mysqli_query($con, $select_shop);

  if ($result) {
      $row_count = mysqli_num_rows($result);

      if ($row_count > 0) {
          $row_data = mysqli_fetch_assoc($result);

          // Verify the password using password_verify
          if (password_verify($shop_password, $row_data['shop_password'])) {
            $_SESSION['shop_id'] = $row_data['shop_id'];
              $_SESSION['shopname'] = $shop_shopname;
              echo "<script>alert('Login Successful')</script>";
              echo "<script>window.open('shop.php','_self')</script>";
          } else {
              echo "<script>alert('Invalid password credentials')</script>";
          }
      } else {
          echo "<script>alert('shop not found')</script>";
      }
  } else {
      echo "<script>alert('Query failed')</script>";
      // Add additional error handling if needed
  }
}
?>
