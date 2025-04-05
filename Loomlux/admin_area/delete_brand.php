<?php
if (isset($_GET['delete_brand'])) {
    $delete_brand=$_GET['delete_brand'];

    $delete_query="Delete from `brands` where brand_id=$delete_brand";
    $result=mysqli_query($con,$delete_query);

    $delete_product="delete from `products` where brand_id=$delete_brand";
    $result_product=mysqli_query($con,$delete_product);

    if($result){
        echo "<script>alert('brand Deleted successfully')</script>";
        echo "<script>window.open('./admin.php?view_brand','_self')</script>";
    
    }
}

?>