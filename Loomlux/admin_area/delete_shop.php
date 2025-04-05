<?php
if (isset($_GET['delete_shop'])) {
    $delete_shop=$_GET['delete_shop'];

    $delete_query="Delete from `shops_table` where shop_id=$delete_shop";
    $result=mysqli_query($con,$delete_query);

    if($result){
        echo "<script>alert('shop Deleted successfully')</script>";
        echo "<script>window.open('./admin.php?shop_details','_self')</script>";
    
    }
}

?>