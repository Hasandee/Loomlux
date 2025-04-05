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
        <div class="admin-details">
          <div class="input-box">
            <span for="admin_adminname" class="details">adminname</span>
            <input type="text" id="admin_adminname"  placeholder="Enter your name" autocomplete="off" required="required" name="admin_adminname">
          </div>
          <div class="input-box">
            <span for="admin_email" class="details">Email</span>
            <input type="email" id="admin_email"  placeholder="Enter your email" autocomplete="off" required="required" name="admin_email">
          </div>
          <div class="input-box">
            <span for="admin_image" class="details">admin image</span>
            <input type="file" id="admin_image"  placeholder="Enter your Image"  required="required" name="admin_image">
          </div>
          <div class="input-box">
            <span for="admin_password" class="details">Password</span>
            <input type="password" id="admin_password"  placeholder="Enter your password" autocomplete="off"  required="required" name="admin_password">
          </div>
          <div class="input-box">
            <span for="conf_admin_password" class="details">Confirm password</span>
            <input type="password" id="conf_admin_password"  placeholder="Re-enter password" autocomplete="off" required="required" name="conf_admin_password">
          </div>
        
         
       
        
        </div>
       
        <div class="button">
          <input type="submit" value="Register" name="admin_register">
          <p style="text-align:center; color:black">Already have an account?<a href="admin_login.php">login</a></p>
        </div>
      </form>
    </div>
  </div>

</body>
</html>

<!--php-->

<?php
if (isset($_POST['admin_register'])) {
    // Your database connection code here (replace $con with your actual connection variable)

    $admin_adminname = mysqli_real_escape_string($con, $_POST['admin_adminname']);
    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_password = mysqli_real_escape_string($con, $_POST['admin_password']);
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password = mysqli_real_escape_string($con, $_POST['conf_admin_password']);
    $admin_image = mysqli_real_escape_string($con, $_FILES['admin_image']['name']);
    $admin_image_tmp = $_FILES['admin_image']['tmp_name'];

    $select_query = "SELECT * FROM `admins_table` WHERE adminname='$admin_adminname' OR admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count) {
        echo "<script>alert('adminname or Email already exists')</script>";
    } elseif ($admin_password != $conf_admin_password) {
        echo "<script>alert('Passwords do not match')</script>";
        exit();
    } else {
        // Insert data into the database
        $upload_directory = "./admin_images/";
        $upload_path = $upload_directory . basename($admin_image); // Use basename to get the file name

        // Move uploaded file
        if (move_uploaded_file($admin_image_tmp, $upload_path)) {
            // File moved successfully, now insert data into the database using prepared statements
            $insert_query = "INSERT INTO `admins_table` (adminname, admin_email, admin_password, admin_image) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $insert_query);
            mysqli_stmt_bind_param($stmt, "ssss", $admin_adminname, $admin_email, $hash_password, $admin_image);
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
    // Close the database connection if not needed further
    mysqli_close($con);
}
?>
