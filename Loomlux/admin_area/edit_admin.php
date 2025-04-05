!


<?php
if (isset($_GET['edit_account'])) {
  
    $admin_session_name = $_SESSION['adminname'];
    $select_query = "SELECT * FROM `admins_table` WHERE adminname='$admin_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $admin_id = $row_fetch['admin_id'];
    $admin_name = $row_fetch['admin_name'];

}

if (isset($_POST['admin_update'])) {
    $admin_id=$_SESSION['admin_id'];
    $adminname = $_POST['admin_adminname'];
    $admin_image = $_FILES['admin_image']['name'];
    $admin_image_tmp = $_FILES['admin_image']['tmp_name'];
    move_uploaded_file($admin_image_tmp, "../admin_area/admin_images/$admin_image");

    // Update query
    $update_data = "UPDATE `admins_table` SET adminname='$adminname', admin_image='$admin_image' WHERE admin_id=$admin_id";
    $result_query_update = mysqli_query($con, $update_data);

    // Password update
    if (!empty($_POST['admin_password'])) {
        $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);
        $update_password_query = "UPDATE `admins_table` SET admin_password='$admin_password' WHERE admin_id=$admin_id";
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
        /* CSS for responsiveness */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h3.heading {
    text-align: center;
}

form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

.input-box {
    margin-bottom: 15px;
}

.details {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.edit_image {
    max-width: 100px;
    height: auto;
    margin-left: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.button input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

.button input[type="submit"]:hover {
    background-color: #45a049;
}

/* Responsive CSS */
@media only screen and (max-width: 600px) {
    form {
        padding: 10px;
    }

    .edit_image {
        max-width: 50px;
    }
}

@media only screen and (max-width: 400px) {
    input[type="text"],
    input[type="password"],
    input[type="file"] {
        width: 100%;
    }
}

        
    </style>
</head>
<body>
    <h3 class="heading" style="text-align:center;"></h3>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Existing fields -->
        <div class="input-box">
            <span for="admin_adminname" class="details">adminname</span>
            <input type="text" id="admin_emails" placeholder="Enter your name" value="<?php echo $adminname ?>" name="admin_adminname">
        </div>

        <div class="input-box" style="display:flex;">
            <span for="admin_image" class="details">admin image</span>
            <input type="file" id="admin_image" placeholder="Enter your Image" name="admin_image">
            <img src="../admin_area/admin_images/<?php echo $admin_image ?>" alt="" class="edit_image">
        </div>


        <!-- New password fields -->
        <div class="input-box">
            <span for="admin_password" class="details">New Password</span>
            <input type="password" id="admin_password" placeholder="Enter new password" name="admin_password">
        </div>
        <div class="input-box">
            <span for="confirm_password" class="details">Confirm Password</span>
            <input type="password" id="confirm_password" placeholder="Confirm new password" name="confirm_password">
        </div>

        <div class="button">
            <input type="submit" value="Update" name="admin_update">
        </div>
    </form>
</body>
</html>
