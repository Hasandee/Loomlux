<?php
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM `users_table` WHERE username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
}

if (isset($_POST['user_update'])) {
    $update_id = $user_id;
    $username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");

    // Update query
    $update_data = "UPDATE `users_table` SET username='$username', user_email='$user_email', user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id=$update_id";
    $result_query_update = mysqli_query($con, $update_data);

    // Password update
    if (!empty($_POST['user_password'])) {
        $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
        $update_password_query = "UPDATE `users_table` SET user_password='$user_password' WHERE user_id=$update_id";
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
        form{
            margin-left:50px;
        }
    /* Form Styles */
    .input-box {
        margin-bottom: 20px;
    }

    .details {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
    }

    input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    .edit_image {
        width: 50px;
        height: 50px;
        margin-left: 10px;
        object-fit: cover;
    }

    .button {
        margin-top: 20px;
    }

    /* Responsive Styles */
    @media screen and (max-width: 768px) {
        form{
            
            margin-left:70px; 
        }
        .input-box {
            margin-bottom: 15px;
        }

        .details {
            font-size: 12px;
        }

        input {
            padding:6px;
        }

        .edit_image {
            width: 40px;
            height: 40px;
        }
    }


    </style>
</head>
<body>
    <h3 class="heading" style="text-align:center;"></h3>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Existing fields -->
        <div class="input-box">
            <span for="user_username" class="details">Username</span>
            <input type="text" id="user_emails" placeholder="Enter your name" value="<?php echo $username ?>" name="user_username">
        </div>
        <div class="input-box">
            <span for="user_email" class="details">Email</span>
            <input type="text" id="user_email" placeholder="Enter your email" value="<?php echo $user_email ?>" name="user_email">
        </div>
        <div class="input-box" style="display:flex;">
            <span for="user_image" class="details">User image</span>
            <input type="file" id="user_image" placeholder="Enter your Image" name="user_image">
            <img src="./user_images/<?php echo $user_image ?>" alt="" class="edit_image">
        </div>
        <div class="input-box">
            <span for="user_address" class="details">Address</span>
            <input type="text" id="user_address" placeholder="Enter your address" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="input-box">
            <span for="user_mobile" class="details">Contact</span>
            <input type="text" id="user_mobile" placeholder="Enter your contact" value="<?php echo $user_mobile ?>" name="user_mobile">
        </div>

        <!-- New password fields -->
        <div class="input-box">
            <span for="user_password" class="details">New Password</span>
            <input type="password" id="user_password" placeholder="Enter new password" name="user_password">
        </div>
        <div class="input-box">
            <span for="confirm_password" class="details">Confirm Password</span>
            <input type="password" id="confirm_password" placeholder="Confirm new password" name="confirm_password">
        </div>

        <div class="button">
            <input type="submit" value="Update" name="user_update">
        </div>
    </form>
</body>
</html>
