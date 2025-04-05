<?php
if (isset($_GET['delete_category'])) {
    $delete_category=$_GET['delete_category'];

    $delete_query="Delete from `categories` where category_id=$delete_category";
    $result=mysqli_query($con,$delete_query);

    $delete_brands_query = "DELETE FROM `brands` WHERE category_id = $delete_category";
    $result_brands = mysqli_query($con, $delete_brands_query);

    $delete_product="delete from `products` where category_id=$delete_category";
    $result_product=mysqli_query($con,$delete_product);

    if($result){
        echo "<script>alert('category Deleted successfully')</script>";
        echo "<script>window.open('./admin.php?view_categories','_self')</script>";
    
    }
}

?>