<?php
include('../includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../user area/Style.css">
  
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
     <style>



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
                        <li><a href="#">Whislist</a></li>
                     </ul>
                    </div>
                    <div class="right">
                        <ul class="flexitem">
                            <li class="main-link">
                                <li><a href="#">Sign up</a></li>
                                <li><a href="#">My Account</a></li>
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
                        
                </div>
            </div>
        </div>
      
        </header>
        <main>
        <nav class="navbar navbar-epand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
        <li class="nav-item"><a href="" class="nav-link">Wlcome Guest</a></li>
        <li class="nav-item"><a href="" class="nav-link">Login</a></li>
    </ul>
 </nav>

 <div class="bg-light">
    <h3 class="text-center">LoomLux</h3>
        <p class="text-center">Its Your Platform Come And Buy It</p> 
    <br><br><br> <br><br><br> <br><br><br> <br><br><br><br><br><br> <br><br><br> 
     <?php
       if(!isset($_SESSION['username'])){
        include('user_login.php');
       }else{
        include('pay.php');
       }
     ?>

 </div>



        </main>
        <footer>

        </footer>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>