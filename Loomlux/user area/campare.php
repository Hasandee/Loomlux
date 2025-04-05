<?php
include('../includes/connect.php');
include('../functions/common_function.php');
if (isset($_POST['category_id']) && isset($_POST['brand_id'])) {
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];

    $product_query = "SELECT * FROM products WHERE category_id = '$category_id' AND brand_id = '$brand_id'";
    $result = mysqli_query($con, $product_query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            // Add other product details as needed

            echo "<p><strong>Product Name:</strong> $product_name</p>";
            echo "<p><strong>Product Price:</strong> $product_price</p>";
            // Display other product details as needed
            echo "<hr>";
        }
    } else {
        echo "<p>No products found for the selected category and brand.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
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
    <select name="product_brands1" id="product_brands1" class="form-select">
        <option value="">Select a Brand</option>
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
            updateBrands('product_brands', selectedCategory);
        });

        $('#product_category').change(function () {
            var selectedCategory = $(this).val();
            updateBrands('product_brands1', selectedCategory);
        });

        function updateBrands(brandSelectId, selectedCategory) {
            $('#' + brandSelectId).empty();

            if (selectedCategory !== "") {
                $.ajax({
                    type: 'POST',
                    url: 'get_brands.php',
                    data: { category_id: selectedCategory },
                    success: function (response) {
                        $('#' + brandSelectId).html(response);
                        // Trigger change event for the newly populated brand dropdown
                        $('#' + brandSelectId).trigger('change');
                    }
                });
            }
        }

        // Update product details when brand is selected
        $('#product_brands, #product_brands1').change(function () {
            var selectedCategory = $('#product_category, #product_category').val();
            var selectedBrand = $(this).val();

            if (selectedCategory !== "" && selectedBrand !== "") {
                $.ajax({
                    type: 'POST',
                    url: 'get_products.php',
                    data: { category_id: selectedCategory, brand_id: selectedBrand },
                    success: function (response) {
                        $('#compear_product_details').html(response);
                    }
                });
            }
        });
    });
</script>
</body>
</html>

