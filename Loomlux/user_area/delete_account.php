
    <h3 style="text-align:center;"> Delete Account</h3>
    <form action="" method="post">
        <div>
            <input type="submit" value="Delete Account" name="delete">
        </div>
        <br>
        <div>
            <input type="submit" value="Don't Delete Account" name="dont_delete">
        </div>
    </form>

<?php
    $user_session=$_SESSION['username'];
    if (isset($_POST['delete'])) {
      $delete_query="Delete from `users_table` where username='$user_session'";
      $result=mysqli_query($con,$delete_query);
      if ($result) {
        session_destroy();
        echo"<script>alert('Account Deleted Succesfully')</script>";
        echo"<script>window.open('../user area/index.php','_self')</script>";
      }
    }
    if(isset($_POST['dont_delete'])){
        echo"<script>window.open('profile.php','_self')</script>";
    }


?>