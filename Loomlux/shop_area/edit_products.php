<?php
if (isset($_GET['edit_products'])) {
    $edit_id=$_GET['edit_products'];
    //echo $edit_id;

    $get_data="select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    //echo $product_title;
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
   $product_status=$row['product_status'];
   $quantity=$row['product_quantity'];
   $product_color=$row['product_color'];
   $product_priceO=$row['product_priceO'];

    // fetching category name 
    $select_category="select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];


        // fetching brand name 
        $select_brand="select * from `brands` where brand_id=$brand_id";
        $result_brand=mysqli_query($con,$select_brand);
        $row_brand=mysqli_fetch_assoc($result_brand);
        $brand_title=$row_brand['brand_title'];
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
.w-40{
    display:flex;
    justify-items:space-between;

} 
.w-40 img{
    width:20px;
    height:40px;
}
}
    </style>
    </head>
    <body>
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_title" class="form-lable">Product Title</lable>
                <input type="text" name="product_title" id="product_title" 
                class="form-control" value="<?php echo $product_title ?>" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="description" class="form-lable">Product Description</lable>
                <input type="text" name="description" id="description" 
                class="form-control" value="<?php echo $product_description  ?>" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_keywords" class="form-lable">Product Keywords</lable>
                <input type="text" name="product_keywords" id="product_keywords" 
                class="form-control" value="<?php echo $product_keywords ?>" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
    <select name="product_category" id="product_category" class="form-select">
        <option value="<?php echo $category_title ?>"><?php echo $category_title  ?></option> 
        <?php  
        $select_category_all="select * from `categories`";
        $result_category_all=mysqli_query($con,$select_category_all);
        while ($row_category_all=mysqli_fetch_assoc($result_category_all)) {
            $category_title=$row_category_all['category_title'];
            $category_id=$row_category_all['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
        }
        ?>

    </select>
</div>

<div class="form-outline mb-4 w-50 m-auto">
    <select name="product_brands" id="product_brands" class="form-select">
        <option value="<?php echo $brand_title?>"><?php echo $brand_title ?></option>
                <?php  
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    $select_query = "SELECT * FROM `brands` WHERE category_id = '$category_id'";
    $result_query = mysqli_query($con, $select_query);

    $options = '<option value="">Select a Brand</option>';
    while ($row = mysqli_fetch_assoc($result_query)) {
        $brand_title = $row['brand_title'];
        $brand_id = $row['brand_id'];
        $options .= "<option value='$brand_id'>$brand_title</option>";
    }

    echo $options;
}
        ?>
    </select>
</div>
            <div class="form-outline mb-4 w-40 m-auto">
                <lable for="product_image1" class="form-lable">Product image1</lable>
                <input type="file" name="product_image1" id="product_image1" 
                class="form-control" required="required">
                <img src="./product_images/<?php echo $product_image1   ?>" alt="">
            </div>
            <div class="form-outline mb-4 w-40 m-auto">
                <lable for="product_image2" class="form-lable">Product image1</lable>
                <input type="file" name="product_image2" id="product_image2" 
                class="form-control" required="required">
                <img src="./product_images/<?php echo $product_image2 ?>" alt="">
            </div>
            <div class="form-outline mb-4 w-40 m-auto">
                <lable for="product_image3" class="form-lable">Product image1</lable>
                <input type="file" name="product_image3" id="product_image1" 
                class="form-control" required="required">
                <img src="./product_images/<?php  echo $product_image3 ?>" alt="">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_price" class="form-lable">Product New Price</lable>
                <input type="text" name="product_price" id="product_price" 
                class="form-control" value="<?php echo $product_price ?>" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_priceO" class="form-lable">Product Old Price</lable>
                <input type="text" name="product_priceO" id="product_priceO" 
                class="form-control" value="<?php echo $product_priceO ?>" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="quantity" class="form-lable">Product Quantity</lable>
                <input type="text" name="quantity" id="quantity" 
                class="form-control" value="<?php echo $quantity ?>" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_color" class="form-lable">Product color</lable>
                <input type="text" name="product_color" id="product_color" 
                class="form-control" value="<?php echo $product_color ?>" autocomplete="off" required="required">
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
              <input type="submit" name="edit_product" class="btn btn-info mb-3" value="edit products">
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


    <?php
if (isset($_POST['edit_product'])) {
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status=$_POST['product_status'];
    $quantity=$_POST['quantity'];
    $product_color=$_POST['product_color'];
    $product_priceO=$_POST['product_priceO'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_desc=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' or $product_price=='' or $product_status=='' or $quantity=='' or $product_color=='' or $product_priceO==''){
        echo "<script> alter('Please fill all the filed and continue the process')</script>";
    }
    else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //query update 
        $update_product="update `products` set product_title='$product_title',product_description='$product_desc', product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brand', product_image1='$product_image1', product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price',date=NOW(),product_status='$product_status',product_quantity='$quantity',product_color='$product_color',product_priceO='$product_priceO' where product_id=$edit_id ";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script> alert('product updated successsfully')</script>";
            echo "<script> window.open('./shop.php','_self')</script>";
        }
    }
}

?>