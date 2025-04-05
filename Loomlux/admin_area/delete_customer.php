<?php
if (isset($_GET['delete_customer'])) {
    $delete_brand=$_GET['delete_customer'];

    $delete_query="Delete from `users_table` where user_id=$delete_brand";
    $result=mysqli_query($con,$delete_query);

    $delete="Delete from `placeorderdetails_table` where user_id=$delete_brand";
    $result=mysqli_query($con,$delete);

    if($result){
        echo "<script>alert('Customer Deleted successfully')</script>";
        echo "<script>window.open('./admin.php?customer_details','_self')</script>";
    
    }
}

?>