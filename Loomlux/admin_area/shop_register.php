<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form</title>
    <link rel="stylesheet" href="">
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
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="shop-details">
          <div class="input-box">
            <span for="shop_shopname" class="details">shopname</span>
            <input type="text" id="shop_shopname"  placeholder="Enter your name" autocomplete="off" required="required" name="shop_shopname">
          </div>
          <div class="input-box">
            <span for="shop_name" class="details">Shop Name</span>
            <input type="text" id="shop_name"  placeholder="Enter your shop name" autocomplete="off" required="required" name="shop_name">
          </div>
          <div class="input-box">
            <span for="shop_email" class="details">Email</span>
            <input type="email" id="shop_email"  placeholder="Enter your email" autocomplete="off" required="required" name="shop_email">
          </div>
          <div class="input-box">
            <span for="shop_image" class="details">shop image</span>
            <input type="file" id="shop_image"  placeholder="Enter your Image"  required="required" name="shop_image">
          </div>
          <div class="input-box">
            <span for="shop_password" class="details">Password</span>
            <input type="password" id="shop_password"  placeholder="Enter your password" autocomplete="off"  required="required" name="shop_password">
          </div>
          <div class="input-box">
            <span for="conf_shop_password" class="details">Confirm password</span>
            <input type="password" id="conf_shop_password"  placeholder="Re-enter password" autocomplete="off" required="required" name="conf_shop_password">
          </div>
          <div class="input-box">
            <span for="shop_address" class="details">Address</span>
            <input type="text" id="shop_address"  placeholder="Enter your address" autocomplete="off" required="required" name="shop_address">
          </div>
          <div class="input-box">
            <span for="shop_contact" class="details">contact</span>
            <input type="text" id="shop_contact"  placeholder="Enter your contact" autocomplete="off" required="required" name="shop_contact">
          </div>
         
       
        
        </div>
       
        <div class="button">
          <input type="submit" value="Register" name="shop_register">
          <p style="text-align:center; color:black">Already have an account?<a href="shop_login.php">login</a></p>
        </div>
      </form>
    </div>
  </div>

</body>
</html>

<!--php-->

<?php
if (isset($_POST['shop_register'])) {
  // Your database connection code here (replace $con with your actual connection variable)

  $shop_shopname = mysqli_real_escape_string($con, $_POST['shop_shopname']);
  $shop_name = mysqli_real_escape_string($con, $_POST['shop_name']);
  $shop_email = mysqli_real_escape_string($con, $_POST['shop_email']);
  $shop_password = mysqli_real_escape_string($con, $_POST['shop_password']);
  $hash_password = password_hash($shop_password, PASSWORD_DEFAULT);
  $conf_shop_password = mysqli_real_escape_string($con, $_POST['conf_shop_password']);
  $shop_address = mysqli_real_escape_string($con, $_POST['shop_address']);
  $shop_contact = mysqli_real_escape_string($con, $_POST['shop_contact']);
  $shop_image = mysqli_real_escape_string($con, $_FILES['shop_image']['name']);
  $shop_image_tmp = $_FILES['shop_image']['tmp_name'];

  $select_query = "SELECT * FROM `shops_table` WHERE shopname='$shop_shopname' OR shop_email='$shop_email'";
  $result = mysqli_query($con, $select_query);
  $row_count = mysqli_num_rows($result);

  if ($row_count) {
      echo "<script>alert('shopname or Email already exists')</script>";
  } elseif ($shop_password != $conf_shop_password) {
      echo "<script>alert('Passwords do not match')</script>";
      // You may want to redirect or take other actions here
      exit();
  } else {
      // Insert data into the database
      $upload_directory = "./shop_images/";
      $upload_path = $upload_directory . basename($shop_image); 

      // Move uploaded file
      if (move_uploaded_file($shop_image_tmp, $upload_path)) {
          // File moved successfully, now insert data into the database using prepared statements
          $insert_query = "INSERT INTO `shops_table` (shopname, shop_name, shop_email, shop_password, shop_image, shop_address, shop_mobile) VALUES (?, ?, ?, ?, ?, ?, ?)";
          $stmt = mysqli_prepare($con, $insert_query);
          
          mysqli_stmt_bind_param($stmt, "sssssss", $shop_shopname, $shop_name, $shop_email, $hash_password, $shop_image, $shop_address, $shop_contact);
          
          $sql_execute = mysqli_stmt_execute($stmt);
          
          if ($sql_execute) {
              echo "<script>alert('Data insert Successfully')</script>";
              echo "<script>window.open('admin.php''_self')</script>";
          } else {
              die(mysqli_error($con));
          }
      } else {
          echo "<script>alert('Error uploading file')</script>";
      }
  }

}
?>
