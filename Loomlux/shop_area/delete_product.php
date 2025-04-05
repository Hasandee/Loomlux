<?php

if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];

    // delete query
    $delete_product="delete from `products` where product_id=$delete_id";
    $result_product=mysqli_query($con,$delete_product);
    if($result_product){
        echo "<script>alert('Product Deleted successfully')</script>";
        echo "<script>window.open('./shop.php','_self')</script>";
    }
}
?>