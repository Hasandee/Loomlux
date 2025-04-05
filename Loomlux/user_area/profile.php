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
    <title>Welcome<?php echo $_SESSION['username'] ?></title>
    <link rel="stylesheet" href="../user area/Style.css">
  
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<style>
    .ProfileImage{
        width:20%;
        height:20vh;
    }
    .edit_image{
        width:100px;
        height: 100px;
        }
    /* Profile Section */
    .prow {
        display: flex;
       
    }

    .pcol {
        margin-left:75px;
        margin-top:75px;
    }

    .pside {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .items {
        margin-bottom: 10px;
    }

    .link {
        text-decoration: none;
        color: #333;
        font-size: 16px;
    }

    .ProfileImage {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
    }

    /* Calling Part */
    .scol {
        flex:1;
        text-align:center;
        margin-top:75px;
        margin-right: 100px; /* Add some space between the columns */
    }
    .order{
        text-align:center; color:green; margin-right:150px;margin-top:100px;
    }
 .orderde{
   text-align:center;margin-right:150px;margin-top:15px;
 }
    /* Responsive Styles */
    @media screen and (max-width: 768px) {
        .prow {
            flex-direction: column;
        }

        .pcol {
            order: 0;
            margin-top: 40px;
        }

        .scol {
            margin-left: 0; /* Reset margin for smaller screens */
        }
        .order{
       margin-right:-150px;margin-top:50px;
    }
 .orderde{
    margin-right:-150px;margin-top:15px;
 }
    }

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
        <div class="header-main mobile-hide">
            <div class="container">
                <div class="wrapper flexitem">
                    <div class="left">
                        <div class="dpt-cat">
                            <div class="dpt-head">
                                <div class="main-text">All Departments</div>
                                <div class="mini-text mobile-hide">Totaal 1059 Products</div>
                                <a href="" class="dpt-trigger mobile-hide">
                                    <i class="ri-menu-3-line ri-xl"></i>
                                </a>
                            </div>
                            <div class="dpt-menu">
                                <ul>
                                <?php
                                  getcategoryandbrands();
                                  ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="search-container">
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      
        </header>
        <main>
         

<?php
           add_cart();
          ?>


 <div class="bg-light">
    <h3 class="text-center">LoomLux</h3>
        <p class="text-center">Its Your Platform Come And Buy It</p> 
 </div>
      </div>
    </div>
  </div>
</div>

<!-- profile part-->
<div class="prow">
<div class="pcol">
   <ul class="pside">
    <li class="items"><a href="#" class="link "><h4>Your Profile</h4></a></li>
    <?php
     $username=$_SESSION['username'];
     $user_image="select * from `users_table` where username='$username' ";
     $result_image=mysqli_query($con,$user_image);
     $row_image=mysqli_fetch_array($result_image);
     $user_image=$row_image['user_image'];
     echo "<li class='items'><img src='./user_images/$user_image'  class='ProfileImage'alt=''></li>";
    ?>

    <li class="items"><a href="profile.php" class="link ">Pending Orders</a></li>
    <li class="items"><a href="profile.php?edit_account" class="link ">Edit Account</a></li>
    <li class="items"><a href="profile.php?my_orders" class="link ">My Orders</a></li>
    <li class="items"><a href="profile.php?delete_account" class="link ">Delete Account</a></li>
    <li class="items"><a href="logout.php" class="link ">Log Out</a></li>
   </ul>
</div>
<!--calling part-->
<div class="scol">
<?php get_user_order_details(); 
if (isset($_GET['edit_account'])) {
    include('edit_account.php');
}
if (isset($_GET['my_orders'])) {
    include('user_orders.php');
}
if (isset($_GET['delete_account'])) {
    include('delete_account.php');
}
?>
</div>

</div>

        </main>
        <footer>

        </footer>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>