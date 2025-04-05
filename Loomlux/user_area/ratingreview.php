<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }

        h2 {
            margin-top: 20px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 768px) {
            form {
                padding: 10px;
            }

            input[type="number"],
            textarea,
            input[type="submit"] {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($_SESSION['user_id'])) {
    // Handle the case where the user is not logged in
    echo "<script>alert('User not logged in')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    return;
}
    $user_id = $_SESSION['user_id']; 
    
    $product_id = $_POST['product_id']; 
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];

    // Insert the data into the database
    $insert_review_query = "INSERT INTO product_reviews (product_id, user_id, rating, review_text) VALUES ('$product_id', '$user_id', '$rating', '$review_text')";
    $result = mysqli_query($con, $insert_review_query);

    if ($result) {
       echo "<script>alert('Submitted')</script>";
       echo "<script>window.open('profile.php?user_orders','_self')</script>";
    } else {
        echo "Error submitting review: " . mysqli_error($con);
    }
}
?>

<!-- Display the product and the form for submitting reviews -->
<h2>Product Name</h2>
<!-- Display product details here -->

<!-- Form for submitting reviews -->
<form method="post" action="">
  <?php
   if(isset($_GET['product_id'])){
    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
      $product_id=$_GET['product_id'];
    }}
  ?>
    <input type="hidden" name="product_id" value="<?php  echo $product_id ?>"> 
    <label for="rating">Rating:</label>
    <input type="number" name="rating" min="1" max="5" required>
    <label for="review_text">Review:</label>
    <textarea name="review_text" required></textarea>
    <input type="submit" value="Submit Review">
</form>
<?php

?>