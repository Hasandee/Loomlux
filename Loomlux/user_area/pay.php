<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../user area/Style.css">
    <style>
<style>
    body {
        background-color: white;
        color: black;
        margin: 0; /* Remove default margin */
        font-family: 'Arial', sans-serif;
    }

    .container {
        margin-top: 10vh;
    }

    .row {
        text-align:center;
        flex-direction: column; /* Change to column layout on small screens */
        align-items: center; /* Center content */
    }

    .payment-image {
        width: 600px; /* Make the image take full width */
        max-height: 40vh; /* Set maximum height */
        margin-bottom: 20px; /* Add some spacing between image and text */
    }

    .pay-offline-link {
        text-decoration: none;
        font-size: 24px; /* Adjust font size for better readability on small screens */
        padding:10px 10px;
        background-color:black;
        color:white;
    }

    @media screen and (min-width: 768px) {
        /* Apply styles for screens larger than or equal to 768px width */
        .row {
            flex-direction: row; /* Switch back to row layout */
            justify-content: space-between; /* Align items with space between */
        }

        .payment-image {
            width: 300px; /* Reset width for larger screens */
            max-height: none; /* Remove maximum height */
            margin-bottom: 0; /* Remove spacing between image and text */
        }

        .pay-offline-link {
            font-size: 48px; /* Reset font size for larger screens */
        }
    }
</style>


    </style>
</head>

<body>
<style>
  .imageid{
    width: 30px;
    height:30px;
    border-radius:50%;
  }
  </style>
</head>
<body>
    <div id="page" class="site">

      <aside class="site-off desktop-hide">
        <div class="off-canvas">
            <div class="canvas-head flexitem">
                <div class="logo"><a href="/"><span class="circle"></span>.LoomLux</a></div>
                <a href="" class="t-close flexcenter"><i class="ri-close-line"></i></a>
            </div>
            <div class="departments">

            </div>
            <nav>

            </nav>
            <div class="thetop-nav">

            </div>
        </div>
      </aside>

        <header>

        <div class="header-top mobile-hide">
            <div class="container">
                <div class="wrapper flexitem">
                    <div class="left">
                     <ul class="flexitem main-links">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Feature Product</a></li>
                        <li><a href="wishlist.php">Whislist</a></li>
                     </ul>
                    </div>
                    <div class="right">
                        <ul class="flexitem">
                          <li><?php

if(!isset($_SESSION['username'])){
  echo"<li class='nav-item'>
  <a class='nav-link' href='#'> Welcome Guest</a>
  </li>";

}else{
  echo"<li class='nav-item'>
  <a class='nav-link' href='#'> Welcome ".$_SESSION['username']."</a>
  </li>";
}
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='../user_area/user_login.php'>login</a>
  </li>";
}else{
  echo"<li class='nav-item'>
  <a class='nav-link' href='../user_area/logout.php'>logout</a>
  </li>";
}

?></li>
                            <li class="main-link">
                              <?php
if(isset($_SESSION['username'])){
  $username=$_SESSION['username'];
  echo"<li><a href='../user_area/profile.php'>My Account</a></li>";
  $select_user="select * from `users_table` where username='$username'";
           $result_user=mysqli_query($con,$select_user);
           $row_user=mysqli_fetch_assoc($result_user);
           $user_image=$row_user['user_image'];
           $username=$row_user['username'];

           echo "<li><img src='../user_area/user_images/$user_image' class='imageid'>$username</li>";
           
}else{
  echo"<li><a href='../user_area/user_registration.php'>Sign up</a></li>";
}
                              ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="container">
                <div class="wrapper flexitem">
                    <a href="#" class="trigger desktop-hide"><i class="ri-menu-2-line"></i></a>
                    <div class="left flexitem">
                        <div class="logo"><a href="/"><span class="circle"></span>.LoomLux</a></div>
                        <nav class="mobile-hide">
                            <ul class="flexitem second-links">
                            <li><a href="../user area/index.php">home</a></li>
                            <li><a href="../user area/display_all.php">Shop</a></li>
                            <li><a href="../user area/compear_product_details.php">Compaer</a></li>
                            <li><a href="">Men</a></li>
                            <li><a href="">Sport
                                <div class="fly-item"><span>New!</span></div>
                            </a></li></ul>
                        </nav>
                    </div>
                    <div class="right">
                    <?php
                            if(!isset($_SESSION['username'])){
  echo" <ul class='flexitem second-links'>
  <li class='mobile-hide'><a href='#'>
      <div class='icon-large'><i class='ri-heart-line'></i></div>
      <div class='fly-item'><span class='item-number'><?php wish_item();  ?></span></div>
  </a></li>";
} else{
  echo"<ul class='flexitem second-links'>
  <li class='mobile-hide'><a href='wishlist.php'>
      <div class='icon-large'><i class='ri-heart-line'></i></div>";?>
      
      <div class='fly-item'><span class='item-number'><?php wish_item();  ?></span></div>
      <?php
echo "</a></li>";
}
    ?>        
                       
                            <?php
                            if(!isset($_SESSION['username'])){
  echo"<li><a href='index.php'class='iscart'>
  <div class='icon-large>
    <i class='ri-shopping-cart-line'></i>
  </div>
  <div class='icon-text'></div>
  <div class='mini-text'>Total LRK:</div>
</a></li>";
} else{
  echo"<li><a href='cart.php'class='iscart'>
  <div class='icon-large'>
    <i class='ri-shopping-cart-line'></i>";?>
      <div class="fly-item"><span class="item-number"><?php cart_item();  ?></span></div>
  </div><?php
  echo "<div class='icon-text'></div>";?>
  <div class='mini-text'>Total LRK:<?php total_cart_price(); ?></div>
  <?php
echo "</a></li>";
}
    ?>                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
       
      </div>
      
        </header>
    <main>
    <?php
  $user_id = $_SESSION['user_id'];
  $get_user="Select * from `users_table` Where user_id= '$user_id'";
  $result=mysqli_query($con,$get_user);
  $run_query=mysqli_fetch_array($result);
  $user_id=$run_query['user_id'];
    ?>
    <div class="containre">
        <h2 class="text-center text-info">Payment Option</h2>
        <div class="row">
            <div class="col-md-6">
                <a href=""><img src="4.png" alt="" class="payment-image"></a>
            </div>
            <div class="pay-offline-link"><a href="order.php?user_id=<?php echo $user_id  ?>">Pay offline</a></div>
        </div>
    </div>
</main>
</body>
</html>