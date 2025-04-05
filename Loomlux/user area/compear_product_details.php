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
                        <li><a href="#">Whislist</a></li>
                     </ul>
                    </div>
                    <div class="right">
                        <ul class="flexitem">
                            <li class="main-link">
                              <?php
if(isset($_SESSION['username'])){
  echo"<li><a href='../user_area/profile.php'>My Account</a></li>";
}else{
  echo"<li><a href='../user_area/user_registration.php'>Sign up</a></li>";
}
                              ?>

                              <!--  <li><a href="../user_area/user_loginn .php">My Account</a></li>-->
                                <li><a href="#">Order Tracking</a></li>
                                <li><a href="#">USD <span class="icon-small"><i class="ri-arrow-down-s-line"></i> </span>l</a>
                                <ul>
                                    <li><a class="current" href="#">USD</a></li>
                                    <li><a href="#">EURO</a></li>
                                    <li><a href="#">GBP</a></li>
                                    <li><a href="#">IDR</a></li>

                                </ul>
                                </li>
                                <li><a href="#">English <span class="icon-small"><i class="ri-arrow-down-s-line"></i> </span>l</a>
                                    <ul>
                                        <li><a class="current" href="#">English</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Bahasa</a></li>
    
                                    </ul>
                                </li>
                                <li class="mode">
                                    <div class="sun-moon">
                                        <i class='bx bx-moon icon moon'></i>
                                        <i class='bx bx-sun icon sun'></i>
                                    </div>
                                    <span class="mode-text text">Dark mode</span>
                
                                    <div class="toggle-switch">
                                        <span class="switch"></span>
                                    </div>
                                </li>
                            </li>
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
                            <li class="has-child "><a href="">Women
                                <div class="icon-samll"><i class="ri-arrow-down-s-line"></i></div>
                            </a>
                        <div class="mega">
                            <div class="container">
                                <div class="wrapper">
                                    <div class="flexcol">
                                        <div class="row">
                                            <ul>
                                            <h4>Women's Clothing</h4>
                                           
                                                <li><a href="">Dresses</a></li>
                                                <li><a href="">Tops & Tees</a></li>
                                                <li><a href="">Jackets & Coats</a></li>
                                                <li><a href="">Pants & Capris</a></li>
                                                <li><a href="">Sweaters</a></li>
                                                <li><a href="">Costumes</a></li>
                                                <li><a href="">Hoodies & SweatShirts</a></li>
                                                <li><a href="">Pajamas & Robes</a></li>
                                                <li><a href="">Shorts</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="flexcol">
                                        <div class="row">
                                            <ul>
                                            <h4>Jewwlry</h4>
                                            
                                                <li><a href="">Accessories</a></li>
                                                <li><a href="">Bags & Purses</a></li>
                                                <li><a href="">Neeecklaces</a></li>
                                                <li><a href="">Rings</a></li>
                                                <li><a href="">Earrings</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="flexcol">
                                        <div class="row">
                                            <ul>
                                            <h4>Beauty</h4>
                                           
                                                <li><a href="">Bath Accessories</a></li>
                                                <li><a href="">Makeup </a></li>
                                                <li><a href="">Skin Care</a></li>
                                                <li><a href="">Hair Care</a></li>
                                                <li><a href="">Soaps & Bath Bombs</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="flexcol">
                                        <div class="row">
                                            <ul class="women-brands">
                                            <h4>Top Brands</h4>
                                          
                                                <li><a href="">Nike</a></li>
                                                <li><a href="">Louis Vuitton</a></li>
                                                <li><a href="">Hermes</a></li>
                                                <li><a href="">Gucci</a></li>
                                                <li><a href="">Zalando</a></li>
                                            </ul>
                                           <a href="" class="view-all" style="font-weight: bold; font-size: medium;">View All Brands<i class="ri-arrow-right-line"></i></a>
                                        </div>
                                    </div>
                                    <div class="flexcol products">
                                        <div class="row">
                                            <div class="media ">
                                                <div class="thumbnail object-cover">
                                                    <a href=""><img src="4.png" alt="" style="width: 300px; height: 300px;" ></div>
                                                    </a>
                                                    </div>
                                            <div class="text-content">
                                                <h4>Most wanted </h4>
                                                <a href="" class="primary-button">Order Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </li>
                            <li><a href="">Men</a></li>
                            <li><a href="">Sport
                                <div class="fly-item"><span>New!</span></div>
                            </a></li></ul>
                        </nav>
                    </div>
                    <div class="right">
                        <ul class="flexitem second-links">
                            <li class="mobile-hide"><a href="#">
                                <div class="icon-large"><i class="ri-heart-line"></i></div>
                                <div class="fly-item"><span class="item-number">0</span></div>
                            </a></li>
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
         
        <form action="compear_product_details.php" class="search-form" method="get">
            
                                <span class="icon-large"><i class="ri-search-line"></i></span>
                                <input type="search" calss="input" placeholder="Search for Products" aria-label="Search" name="search_data">
                                <span class="icon-large"><i class="ri-search-line"></i></span>
                                <input type="search" calss="input" placeholder="Search for Products" aria-label="Search" name="search_data1">
                              <!--  <button type="submit" class="btn btn-outline-light">Search</button>-->
                              <input type="submit" value="Search" class="button" name="search_data_product">
                            </form>

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
comapre_product1();
comapre_product();
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
    <script >document.addEventListener("DOMContentLoaded", function () {
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