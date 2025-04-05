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
    <link rel="stylesheet" href="Style.css">
  
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<style>
       .tcontainer {
            display: flex;
            flex-direction: column;
            align-items:center;
        }

        .trow {
            flex: 1;
            overflow: auto;
        }

        .table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 15px;
            align-items:center;
            margin-left:70px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .table td img{
            width:100px;
            height:80px;
        }
        .table th {
            background-color: #f2f2f2;
        }

        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f2f2f2;
        }
        .table .qty{
            padding:5px;
            font-size: 12px;
            text-align:center;
        }
        .tbtn, .tbtnck {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .table th, .table td {
                font-size: 12px;
            }
            .tcontainer {
            display: flex;
            flex-direction: column;
            align-items:center;
        }
        .table td img{
            width:50px;
            height:40px;
        }      .table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 15px;
            align-items:center;
            margin-left:30px;
        }
        
        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
            background-color: #f2f2f2;
        }        .table th, .table td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: center;
        }
        .devide {
            flex-direction: column;
            width: 40%;
            border-collapse: collapse;
            align-items:center;
        }

        .tbtn-update, .tbtn-remove {
            padding: 8px;
            font-size: 12px;
            cursor: pointer;
        }
        .tbtn, .tbtnck {
            padding: 5px;
            font-size: 12px;
            cursor: pointer;
        }
        .table .qty{
            padding:5px;
            font-size: 12px;
            text-align:center;
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
         


<?php
           add_cart();
          ?>
 

 <div class="bg-light">
    <h3 class="text-center">LoomLux</h3>
        <p class="text-center">Its Your Platform Come And Buy It</p> 
 </div>
 <div class="tcontainer">
    <div class="trow">
      <form action="" method="post">
        <table class="table table-border text-center">
           
                <?php
    $user_id = $_SESSION['user_id'];
$total_price=0;
$cart_query="Select * from `cart_detail` where user_id='$user_id'";
$result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){
  echo" <thead>
  <tr>
      <th>product title</th>
      <th>product image</th>
      <th>Edit quantity</th>
      <th>quantity</th>
      <th>total</th>
      <th>remove</th>
      <th class='devide'>operation</th>
  </tr>
</thead>
<tbody>";

while($row=mysqli_fetch_array($result)){
  $product_id=$row['product_id'];
  $product_qty=$row['quantity'];
  $select_products="Select * from `products` where product_id='$product_id'";
  $result_products=mysqli_query($con,$select_products);
  while($row_product_price=mysqli_fetch_array($result_products)){
    $product_price=array($row_product_price['product_price']);//200,300
    $pirce_table=$row_product_price['product_price'];
    $product_title=$row_product_price['product_title'];
    $product_image1=$row_product_price['product_image1'];
    $product_values=array_sum($product_price);//500
    $total_price+=$product_values;//500
    $shop_id=$row_product_price['shop_id'];
 
                ?>
                <tr>
                    <td><?php echo $product_title   ?></td>
                    <td><img src="../shop_area/product_images/<?php echo $product_image1?>" alt=""></td>
                    <td><form method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                            <input type="text" name="qty" class="qty" value="">
                            <input type="submit" value="Update" class="tbtn-update" name="update_qty">
                        </form></td>
                    <td><?php echo $pirce_table ?></td>
                    



                    <td><?php echo $product_qty ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <!--<button class="tbtn-remove">Remove</button>--><td>
                    <input type="submit" value="Remove cart" class="tbtn-update" name="remove_cart">
                </td>
                </tr>
                <?php }}
                }
                else{ echo"<h2 style='text-align:center';>Cart is empty</h2>";
                }?>
            </tbody>
        </table>
        <div class="d-flex">
          <?php
           $user_id = $_SESSION['user_id'];
          $cart_query="Select * from `cart_detail` where user_id='$user_id'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0){
            ?>  <h4 class='px-3'>SubTotal<strong class='text-info'><?php total_cart_price();?></strong></h4> 
            <?php
            echo"
            <input type='submit' value='Contine Shopping' class='tbtn' name='continue_shopping'>
            <input type='submit' value='Check Out' class='tbtn' name='check_out'>
           ";
          }
          else{
            echo"<input type='submit' value='Contine Shopping' class='tbtn' name='continue_shopping'>";
          }
          if(isset($_POST['continue_shopping'])){
            echo"<script>window.open('index.php','_self')</script>";
          }
          if (isset($_POST['update_qty'])) {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['qty'];
    
            $update_cart = "UPDATE cart_detail SET quantity = ? WHERE user_id = ? AND product_id = ?";
            $stmt = mysqli_prepare($con, $update_cart);
    
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "iii", $quantity, $user_id, $product_id);
                $result_products_quantity = mysqli_stmt_execute($stmt);
    
                if ($result_products_quantity) {
                    $total_price = $total_price * $quantity;
                    // Optionally, you can redirect or refresh the page after updating the quantity
                    // header("Location: your_page.php");
                } else {
                    echo "Error updating cart details: " . mysqli_error($con);
                }
    
                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing statement: " . mysqli_error($con);
            }
        }
          
          if (isset($_POST['check_out'])) {
              // Retrieve user details (assuming they are stored in session variables)
              $user_id = $_SESSION['user_id'];
          
              // Retrieve product details from the cart_detail table
              $cart_query = "SELECT * FROM `cart_detail` WHERE user_id = '$user_id'";
              $cart_result = mysqli_query($con, $cart_query);
          
              if ($cart_result) {
                  // Initialize arrays to store product details for bulk insertion
                  $product_ids = array();
                  $quantities = array();
                  $product_images = array();
                  $product_titles = array();
                  $product_prices = array(); // New array for product prices
                  $shop_ids = array();
                  $total_price=$total_price;
          
                  while ($row = mysqli_fetch_assoc($cart_result)) {
                      $product_id = $row['product_id'];
                      $quantity = $row['quantity'];
          
                      $product_ids[] = $product_id;
                      $quantities[] = $quantity;
          
                      // Fetch shop_id and product_price for each product
                      $shop_query = "SELECT shop_id, product_price FROM `products` WHERE product_id = '$product_id'";
                      $shop_result = mysqli_query($con, $shop_query);
          
                      if ($shop_result && mysqli_num_rows($shop_result) > 0) {
                          $shop_row = mysqli_fetch_assoc($shop_result);
                          $shop_ids[] = $shop_row['shop_id'];
                          $product_prices[] = $shop_row['product_price'];
                      } else {
                          // Handle the case where shop_id or product_price is not found
                          $shop_ids[] = -1; // You can use a default value or handle it as needed
                          $product_prices[] = 0; // You can use a default value or handle it as needed
                      }
                  }
          
                  if (!empty($product_ids) && !empty($quantities) && !empty($shop_ids) && !empty($product_prices)) {
                      // Fetch product details from the product table
                      $product_query = "SELECT * FROM `products` WHERE product_id IN (" . implode(',', $product_ids) . ")";
                      $product_result = mysqli_query($con, $product_query);
          
                      if ($product_result) {
                          $product_rows = mysqli_fetch_all($product_result, MYSQLI_ASSOC);
          
                          // Calculate total price
                          $total_price = 0;
                          foreach ($product_rows as $index => $product_row) {
                              $product_price = $product_prices[$index];
                              $total_price += $product_price * $quantities[$index];
          
                              $product_images[] = $product_row['product_image1'];
                              $product_titles[] = $product_row['product_title'];
                          }
          
                          // Combine product details into a single row for bulk insertion
                          $shop_ids_str = implode(',', $shop_ids);
                          $product_ids_str = implode(',', $product_ids);
                          $quantities_str = implode(',', $quantities);
                          $product_images_str = implode(',', $product_images);
                          $product_titles_str = implode(',', $product_titles);
                          $product_prices_str = implode(',', $product_prices);
          
                          // Generate a random invoice number
                          $invoice_number = uniqid();
          
                          $insert_orders = "INSERT INTO `products_detail` (user_id, shop_ids, product_ids, quantities, total_price, product_images, product_titles, product_prices, invoice_number,sub_total) VALUES ('$user_id', '$shop_ids_str', '$product_ids_str', '$quantities_str', '$total_price', '$product_images_str', '$product_titles_str', '$product_prices_str', '$invoice_number','$total_price')";
          
                          $result_query = mysqli_query($con, $insert_orders);
          
                          if (!$result_query) {
                              echo "Error: " . mysqli_error($con);
                          } else {
                              $order_id = mysqli_insert_id($con);
                              $_SESSION['order_id'] = $order_id;
          
                              echo "<script>alert('Orders are Submitted Successfully.')</script>";
                              echo "<script>window.open('place_order.php','_self')</script>";
                          }
                      } else {
                          echo "Error fetching product details: " . mysqli_error($con);
                      }
                  }
              } else {
                  echo "Error fetching cart details: " . mysqli_error($con);
              }
          }
          ?>
          
        
          

        </div>  
      </div>
 </div>
              </form>

              <?php
    function remove_cart_item() {
        global $con;

        if (isset($_POST['remove_cart']) && isset($_POST['removeitem'])) {
            foreach ($_POST['removeitem'] as $remove_id) {
                $delete_query = "DELETE FROM `cart_detail` WHERE product_id = $remove_id";
                $run_delete = mysqli_query($con, $delete_query);

                if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
                
               
               echo $remove_item=remove_cart_item();
              ?>
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

        </main>
        <footer>
<?php
include('./footer/footer.php');
?>
        </footer>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>