<?php
if (isset($_GET['edit_account'])) {
  
    $shop_session_name = $_SESSION['shopname'];
    $select_query = "SELECT * FROM `shops_table` WHERE shopname='$shop_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $shop_id = $row_fetch['shop_id'];
    $shop_name = $row_fetch['shop_name'];

}

if (isset($_POST['shop_update'])) {
    $shop_id=$_SESSION['shop_id'];
    $shopname = $_POST['shop_shopname'];
    $shop_image = $_FILES['shop_image']['name'];
    $shop_image_tmp = $_FILES['shop_image']['tmp_name'];
    move_uploaded_file($shop_image_tmp, "../admin_area/shop_images/$shop_image");

    // Update query
    $update_data = "UPDATE `shops_table` SET shopname='$shopname', shop_image='$shop_image' WHERE shop_id=$shop_id";
    $result_query_update = mysqli_query($con, $update_data);

    // Password update
    if (!empty($_POST['shop_password'])) {
        $shop_password = password_hash($_POST['shop_password'], PASSWORD_DEFAULT);
        $update_password_query = "UPDATE `shops_table` SET shop_password='$shop_password' WHERE shop_id=$shop_id";
        mysqli_query($con, $update_password_query);
    }

    if ($result_query_update) {
        echo "<script>alert('Data updated successfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .ProfileImage {
            width: 20%;
            height: 20vh;
        }

        .edit_image {
            width: 50px; /* You can adjust the size as needed */
            height: auto;
        }
    </style>
</head>
<body>
    <h3 class="heading" style="text-align:center;"></h3>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Existing fields -->
        <div class="input-box">
            <span for="shop_shopname" class="details">shopname</span>
            <input type="text" id="shop_emails" placeholder="Enter your name" value="<?php echo $shopname ?>" name="shop_shopname">
        </div>

        <div class="input-box" style="display:flex;">
            <span for="shop_image" class="details">shop image</span>
            <input type="file" id="shop_image" placeholder="Enter your Image" name="shop_image">
            <img src="../admin_area/shop_images/<?php echo $shop_image ?>" alt="" class="edit_image">
        </div>


        <!-- New password fields -->
        <div class="input-box">
            <span for="shop_password" class="details">New Password</span>
            <input type="password" id="shop_password" placeholder="Enter new password" name="shop_password">
        </div>
        <div class="input-box">
            <span for="confirm_password" class="details">Confirm Password</span>
            <input type="password" id="confirm_password" placeholder="Confirm new password" name="confirm_password">
        </div>

        <div class="button">
            <input type="submit" value="Update" name="shop_update">
        </div>
    </form>
</body>
</html>
