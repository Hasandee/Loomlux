<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style.css">
  
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<style>
.imageids{
  width:40px;
  height:40px;
  border-radius:50%;
}
.review{

            margin-left:100px;
            overflow-x: auto;
            max-width: 100%;
            overflow-y: auto; /* Add vertical scrollbar */
            max-height: 300px; /* Set a max height or adjust as needed */
        
}   @media screen and (max-width: 768px) {
     
      .review {
            margin-left:75px;
            overflow-x: 600px;
            max-width: 600px;
            overflow-y: auto; /* Add vertical scrollbar */
            max-height: 300px; /* Set a max height or adjust as needed */
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
                            <li><a href="index.php">home</a></li>
                            <li><a href="display_all.php">Shop</a></li>
                            <li><a href="compear_product_details.php">Compaer</a></li>
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
                            <form action="search_product.php" class="search-form" method="get">
                                <span class="icon-large"><i class="ri-search-line"></i></span>
                                <input type="search" calss="input" placeholder="Search for Products" aria-label="Search" name="search_data">
                              <!--  <button type="submit" class="btn btn-outline-light">Search</button>-->
                              <input type="submit" value="Search" class="button" name="search_data_product">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      
        </header>
        <main>
         
<div class="slider">
    <div class="container">
        <div class="wrapper">
            <div class="myslider Swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="item">
                            <div class="image object-cover"><img src="OIP (11).jpg" alt=""></div>
                       <div class="text-content flexcol">
                        <h4>Shoes Fashion</h4>
                        <h2><span>Come And Get It!</span><br><span>Brand New Shoes</span></h2>
                        <a href="" class="primary-button">Shop Now</a>
                       </div>
                        </div>
                    </div>
                </div>
               <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
<div class="brands">
    <div class="wrapper">

        <ul class="carousel">
          <li class="card">
            <div class="img"><img src="OIP (11).jpg" alt="img" draggable="false"></div>
           
          </li>
          <li class="card">
            <div class="img"><img src="OIP (11).jpg" alt="img" draggable="false"></div>
            
          </li>
          <li class="card">
            <div class="img"><img src="OIP (11).jpg" alt="img" draggable="false"></div>
           
          </li>
          <li class="card">
            <div class="img"><img src="OIP (11).jpg" alt="img" draggable="false"></div>
            
          </li>
          <li class="card">
            <div class="img"><img src="OIP (11).jpg" alt="img" draggable="false"></div>
          
          </li>
          <li class="card">
            <div class="img"><img src="4.png" alt="img" draggable="false"></div>
            
          </li>
          <li class="card">
              <div class="img"><img src="4.png" alt="img" draggable="false"></div>
             
            </li>
            <li class="card">
              <div class="img"><img src="OIP (9).jpg" alt="img" draggable="false"></div>
              
            </li>
            <li class="card">
              <div class="img"><img src="R (2).jpg" alt="img" draggable="false"></div>
             
            </li>
            <li class="card">
              <div class="img"><img src="OIP.png" alt="img" draggable="false"></div>
              
            </li>
            <li class="card">
              <div class="img"><img src="R (1).jpg" alt="img" draggable="false"></div>
            
            </li>
            <li class="card">
              <div class="img"><img src="R (2).jpg" alt="img" draggable="false"></div>
              
            </li>
            <li class="card">
              <div class="img"><img src="OIP.png" alt="img" draggable="false"></div>
             
            </li>
            <li class="card">
              <div class="img"><img src="R (1).jpg" alt="img" draggable="false"></div>
              
            </li>
            <li class="card">
              <div class="img"><img src="R (2).jpg" alt="img" draggable="false"></div>
             
            </li>
            <li class="card">
              <div class="img"><img src="OIP.png" alt="img" draggable="false"></div>
              
            </li>
            <li class="card">
              <div class="img"><img src="R (1).jpg" alt="img" draggable="false"></div>
            
            </li>
            <li class="card">
              <div class="img"><img src="R (2).jpg" alt="img" draggable="false"></div>
              
            </li>
            <li class="card">
              <div class="img"><img src="OIP.png" alt="img" draggable="false"></div>
             
            </li>
            <li class="card">
              <div class="img"><img src="R (1).jpg" alt="img" draggable="false"></div>
              
            </li>
            <li class="card">
              <div class="img"><img src="R (2).jpg" alt="img" draggable="false"></div>
             
            </li>
            <li class="card">
              <div class="img"><img src="OIP.png" alt="img" draggable="false"></div>
              
            </li>
            <li class="card">
              <div class="img"><img src="R (1).jpg" alt="img" draggable="false"></div>
            
            </li>
            <li class="card">
              <div class="img"><img src="R (2).jpg" alt="img" draggable="false"></div>
              
            </li>
        </ul>

      </div>
</div>
<?php
           add_cart();
          ?>
 

 <div class="bg-light">
    <h3 class="text-center">LoomLux</h3>
        <p class="text-center">Its Your Platform Come And Buy It</p> 
 </div>
 <!---
<div class="trending">
  <div class="container">
    <div class="wrapper">
      <div class="sectop flexitem">
        <h2><span class="circle"></span><span>Trending Products</span></h2>
      </div>
      <div class="column">
              <div class="flexwrap">
                <div class="products">
                <div class="row big">
                    <div class="item">
                      <div class="offer">
                        <p>Offer ends at</p>
                        <ul class="flexcenter">
                               <li>1</li>
                               <li>15</li>
                               <li>27</li>
                               <li>60</li>
                        </ul>
                      </div>
                      <div class="media">
                        <div class="image">
                          <a href="">
                            <img src="OIP (9).jpg" alt="" style="width: 20%; height: 100px;">
                          </a>
                        </div>
                        <div class="hoverable">
                          <ul>
                            <li class="active"><a href=""><i class="ri-heart-line"></i></a></li>
                            <li><a href=""><i class="ri-eye-line"></i></a></li>
                            <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                          </ul>
                        </div>
                        <div class="discount circle flexcenter"><span>31%</span></div>
                      </div>
                      <div class="content">
                        <div class="rating">
                          <div class="stars"></div>
                          <span class="mini-text">(2,548)</span>
                        </div>
                        <h3 class="main-links"><a href="">Happy sailed Womens Summer Boho Floral</a></h3>
                        <div class="price">
                          <span class="current">129.99</span>
                          <span class="normal mini-text">189.98</span>
                        </div>
                        <div class="stock mini-text">
                          <div class="qty">
                            <span>Stock:<strong class="qty-available">107</strong></span>
                            <span>Sold:<strong class="qty-sold">3,459</strong></span>
                          </div>
                          <div class="bar">
                            <div class="available"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div>
                </div>
                <div class="products">
                <div class="row mini">
                  <div class="item">
                    <div class="media">
                      <div class="image">
                        <a href="">
                          <img src="OIP (9).jpg" alt="" style="width: 20%; height: 100px;">
                        </a>
                      </div>
                      <div class="hoverable">
                        <ul>
                          <li class="active"><a href=""><i class="ri-heart-line"></i></a></li>
                          <li><a href=""><i class="ri-eye-line"></i></a></li>
                          <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                        </ul>
                      </div>
                      <div class="discount circle flexcenter"><span>32%</span></div>
                    </div>
                    <div class="content">
                      <div class="rating">
                        <div class="stars"></div>
                        <span class="mini-text">(2,548)</span>
                      </div>
                      <h3 class="main-links"><a href="">Happy sailed Womens Summer Boho Floral</a></h3>
                      <div class="rating">
                        <div class="stars"></div>
                        <span class="mini-text">(2,548)</span>
                      </div>
                      <div class="price">
                        <span class="current">129.99</span>
                        <span class="normal mini-text">189.98</span>
                      </div>
                      <div class="mini-text">
                       <p>2975 sold</p>
                       <p>free Shipping</p>
                        
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="products">
                <div class="row  mini">
                  <div class="item">
                    <div class="media">
                      <div class="image">
                        <a href="">
                          <img src="OIP (9).jpg" alt="" style="width: 20%; height: 100px;">
                        </a>
                      </div>
                      <div class="hoverable">
                        <ul>
                          <li class="active"><a href=""><i class="ri-heart-line"></i></a></li>
                          <li><a href=""><i class="ri-eye-line"></i></a></li>
                          <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                        </ul>
                      </div>
                      <div class="discount circle flexcenter"><span>33%</span></div>
                    </div>
                    <div class="content">
                      <div class="rating">
                        <div class="stars"></div>
                        <span class="mini-text">(2,548)</span>
                      </div>
                      <h3 class="main-links"><a href="">Happy sailed Womens Summer Boho Floral</a></h3>
                      <div class="rating">
                        <div class="stars"></div>
                        <span class="mini-text">(2,548)</span>
                      </div>
                      <div class="price">
                        <span class="current">129.99</span>
                        <span class="normal mini-text">189.98</span>
                      </div>
                      <div class="mini-text">
                       <p>2975 sold</p>
                       <p>free Shipping</p>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
      </div>
    </div>
  </div>
</div>-->

<div class="fuproductcon">
  <div class="product">
    <div class="offerproduct">
    <div class="pcard-wrapper">
        
    </div>
      <div class="row">
      <?php
// Call the functions
vew_details();
get_unique_categories();
get_unique_brand();
?>

<?php
    if(isset($_GET['product_id'])){
      if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        $product_id=$_GET['product_id'];
        $select_review="select * from product_reviews where product_id=$product_id";
        $result_review=mysqli_query($con,$select_review);
        $total_rating = 0;
        $review_count = 0;
        while ($row = mysqli_fetch_assoc($result_review)) {
           $user_id=$row['user_id'];
           $review=$row['review_text'];
           $review_id=$row['review_id'];

           $rating = $row['rating'];
           $total_rating += $rating;
           $review_count++;

        }
        if ($review_count > 0) {
          $average_rating = $total_rating / $review_count;
          $average_rating_display = str_repeat('★', round($average_rating)) . str_repeat('☆', 5 - round($average_rating));
          echo "<p>Average Rating: $average_rating_display</p>";
      } else {
          echo "<p>No reviews available for this product.</p>";
      }
    }
  }
?>
<div class="review">
<?php
    if(isset($_GET['product_id'])){
      if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        $product_id=$_GET['product_id'];
        $select_review="select * from product_reviews where product_id=$product_id";
        $result_review=mysqli_query($con,$select_review);
        $total_rating = 0;
        $review_count = 0;
        while ($row = mysqli_fetch_assoc($result_review)) {
           $user_id=$row['user_id'];
           $review=$row['review_text'];
           $review_id=$row['review_id'];

           $rating = $row['rating'];
           $total_rating += $rating;
           $review_count++;

           $select_user="select * from `users_table` where user_id='$user_id'";
           $result_user=mysqli_query($con,$select_user);
           $row_user=mysqli_fetch_assoc($result_user);
           $user_image=$row_user['user_image'];
           $username=$row_user['username'];

           echo "<p><img src='../user_area/user_images/$user_image' class='imageids'>$username</p>
           <p> $review<p>";
        }
        
    }
  }
?>
</div>
<div class="fuproductcon">
  <div class="product">
    <div class="offerproduct">
      <div class="sectop flexitem">
        <h2><span class="circle"></span><span>Trending Products</span></h2>
      </div>
      <a href="" class="view-all" style="font-weight: bold; font-size: medium; float:right;">View All Brands<i class="ri-arrow-right-line"></i></a>
       <br><br>
      <div class="row">
      <?php
// Call the functions
getproducts_detail();

?>

      </div>
    </div>
  </div>
</div>

        </main>
        <footer>

        </footer>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>document.addEventListener("DOMContentLoaded", function () {
    const imgItems = document.querySelectorAll('.img-item');
    const showcaseImages = document.querySelectorAll('.img-showcase img');

    imgItems.forEach((item, index) => {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            // Remove the 'active' class from all items
            imgItems.forEach((item) => {
                item.classList.remove('active');
            });
            // Add 'active' class to the clicked item
            item.classList.add('active');
            // Hide all showcase images
            showcaseImages.forEach((img) => {
                img.style.display = 'none';
            });
            // Display the corresponding showcase image
            showcaseImages[index].style.display = 'block';
        });
    });
});
</script>
</body>
</html>