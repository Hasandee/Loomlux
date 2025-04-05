
<?php
if (isset($_GET['delete_payment'])) {
    $delete_orders=$_GET['delete_payment'];

    $delete="Delete from `user_payments` where order_id=$delete_orders";
    $result=mysqli_query($con,$delete);
    if($result){
               echo "<script>alert('payment Deleted successfully')</script>"; 
               echo "<script>window.open('./admin.php?payment','_self')</script>";
    }
}


?>