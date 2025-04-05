<?php
include('../includes/connect.php');

session_start();
if (!isset($_SESSION['shop_id'])) {
    // Redirect or handle the case when the shop is not logged in
    header("Location: shop_login.php"); // Replace with your login page
    exit();
}

// Get shop_id from the session
$shop_id = $_SESSION['shop_id'];

if (isset($_POST['insert_product'])) {
    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $product_category = mysqli_real_escape_string($con, $_POST['product_category']);
    $product_brands = mysqli_real_escape_string($con, $_POST['product_brands']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_statu=mysqli_real_escape_string($con,$_POST['product_status']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $product_color = mysqli_real_escape_string($con, $_POST['product_color']);
    $product_priceO = isset($_POST['product_priceO']) ? mysqli_real_escape_string($con, $_POST['product_priceO']) : '';
    $product_status = 'true';

    // Accessing image
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // Accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    if (
        $product_title == '' ||
        $description == '' ||
        $product_keywords == '' ||
        $product_category == '' ||
        $product_brands == '' ||
        $product_price == '' ||
        $product_image1 == '' ||
        $product_image2 == '' ||
        $product_image3 == ''
    ) {
        echo "<script>alert('Please fill all the available fields')</script>";
    } else {

        // Move uploaded file with temp name
        $upload_directory = "./product_images/";
        $product_image1 = uniqid() . "_" . $product_image1;
        $product_image2 = uniqid() . "_" . $product_image2;
        $product_image3 = uniqid() . "_" . $product_image3;

        move_uploaded_file($temp_image1, $upload_directory . $product_image1);
        move_uploaded_file($temp_image2, $upload_directory . $product_image2);
        move_uploaded_file($temp_image3, $upload_directory . $product_image3);

        // Insert query 
     
 // Insert query
 $insert_products = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, product_quantity, product_color, date, status, shop_id, product_status,product_priceO)
 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?,?)";

 $stmt = mysqli_prepare($con, $insert_products);
 mysqli_stmt_bind_param(
     $stmt,
     "sssssssssssssss",
     $product_title,
     $description,
     $product_keywords,
     $product_category,
     $product_brands,
     $product_image1,
     $product_image2,
     $product_image3,
     $product_price,
     $quantity,
     $product_color,
     $product_status,
     $shop_id,
     $product_statu,
     $product_priceO
 );

        $result_query = mysqli_stmt_execute($stmt);

        if ($result_query) {
            echo "<script>alert('Successfully inserted the product')</script>";
        } else {
            die(mysqli_error($con));
        }
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
                body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: auto;
    margin: 0;
}
.container {
    border:1px solid black;
    max-width: 300px; /* Adjust the maximum width as needed */
    width: 100%;
    padding:30px 50px;
    margin-top:40px;
    margin-bottom:40px;
}
select{
    margin:10px;
    padding:1em 8em 1em 4.5em;
    border-radius:5px;
}
.form-outline input{
    margin:5px;
    padding:1em 8em 1em 4.5em;
    border-radius:5px;
}
.form-outline {
    display: block;
}
.mb-3 {

    align-items: center;
    justify-content: center;
}
.btn {
    background-color: var(--primary-color);
    cursor: pointer;
    color: var(--white-color);
    background-color;
    display: block;
    width: 50%;
    margin-bottom:20px;
    text-align:center;
} 

@media screen and (min-width :992px ) {
    body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: auto;
    margin: 0;
}
.container {
    border:1px solid black;
    max-width: 600px; /* Adjust the maximum width as needed */
    width: 100%;
    padding:30px 50px;
    margin-top:40px;
    margin-bottom:40px;
}
.container h1{
    text-align:center;
    
}
.form-outline {
    display: block;
}
.form-outline input{
    margin:5px;
    padding:1em 12em 1em 4.5em;
    border-radius:5px;
}
.form-lable {
    display: block;
    margin: 5px;
}
select{
    margin:10px;
    padding:1em 12em 1em 4.5em;
    border-radius:5px;
}

.form-control,
.form-select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}
.mb-3 {
    display: flex;
    align-items: center;
    justify-content: center;
}
.btn {
    background-color: var(--primary-color);
    cursor: pointer;
    color: var(--white-color);
    background-color;
    display: block;
    width: 50%;
    margin-bottom:20px;
    text-align:center;
}    
}
    </style>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_title" class="form-lable">Product Title</lable>
                <input type="text" name="product_title" id="product_title" 
                class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="description" class="form-lable">Product Description</lable>
                <input type="text" name="description" id="description" 
                class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_keywords" class="form-lable">Product Keywords</lable>
                <input type="text" name="product_keywords" id="product_keywords" 
                class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
    <select name="product_category" id="product_category" class="form-select">
        <option value="">Select a Category</option> 
        <?php
        $select_query = "Select * from `categories`";
        $result_query = mysqli_query($con, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $category_title = $row['category_title'];
            $category_id = $row['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
        }
        ?>
    </select>
</div>

<div class="form-outline mb-4 w-50 m-auto">
    <select name="product_brands" id="product_brands" class="form-select">
        <option value="">Select a Brand</option>
    </select>
</div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_image1" class="form-lable">Product image1</lable>
                <input type="file" name="product_image1" id="product_image1" 
                class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_image2" class="form-lable">Product image2</lable>
                <input type="file" name="product_image2" id="product_image2" 
                class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_image3" class="form-lable">Product image3</lable>
                <input type="file" name="product_image3" id="product_image3" 
                class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_price" class="form-lable">New Price</lable>
                <input type="text" name="product_price" id="product_price" 
                class="form-control" placeholder="Enter product New price" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_priceO" class="form-lable">Old Price</lable>
                <input type="text" name="product_priceO" id="product_priceO" 
    class="form-control" placeholder="Enter product Old Price" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
    <label for="quantity" class="form-lable">Quantity</label>
    <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter product quantity" autocomplete="off" required="required">
</div>

<div class="form-outline mb-4 w-50 m-auto">
    <label for="product_color" class="form-lable">Product Color</label>
    <input type="text" name="product_color" id="product_color" class="form-control" placeholder="Enter product color" autocomplete="off" required="required">
</div>
            <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_status" class="form-label">Product Status</label>
    <select name="product_status" id="product_status" class="form-control" required="required">
        <option value="" disabled selected>Select product_status</option>
        <option value="In Stock">In Stock</option>
        <option value="Out Stock">Out Stock</option>
    </select>
</div>
            <div class="form-outline mb-3 w-50 m-auto">
              <input type="submit" name="insert_product" class="btn btn-info mb-3" value="Insert products">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#product_category').change(function () {
            var selectedCategory = $(this).val();

            // Clear the existing options in the brands select
            $('#product_brands').empty();

            if (selectedCategory !== "") {
                // Fetch brands for the selected category using AJAX
                $.ajax({
                    type: 'POST',
                    url: 'get_brands.php', // Create a separate PHP file to handle this request
                    data: { category_id: selectedCategory },
                    success: function (response) {
                        // Update the brands select with the fetched brands
                        $('#product_brands').html(response);
                    }
                });
            }
        });
    });
</script>
</body>
</html>