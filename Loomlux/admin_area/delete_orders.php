

<?php
if (isset($_GET['delete_orders'])) {
    $delete_orders=$_GET['delete_orders'];

    $delete="Delete from `placeorderdetails_table` where order_id=$delete_orders";
    $result=mysqli_query($con,$delete);

    $delete="Delete from `user_payments` where order_id=$delete_orders";
    $result=mysqli_query($con,$delete);
    if($result){
               echo "<script>alert('order Deleted successfully')</script>"; 
    }
}


?>