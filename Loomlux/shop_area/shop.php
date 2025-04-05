<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Drop Down Sidebar Menu </title>
    <link rel="stylesheet" href="../admin_area/admin.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
      .product_img{
        width:50px;
            height:40px;
      }     
     
      /* Reset some default styles */
body, h3, table {
    margin: 0;
    padding: 0;
}

/* Apply a mobile-first approach */
/* The max-width ensures that the style does not break on larger screens */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f2f2f2;
}

h3 {
    text-align: center;
    margin: 20px 0;
}

/* Make the form and table responsive */
form, table {
    max-width: 100%;
    width: 100%;
    margin: 20px 0;
}

/* Style the form for better readability */
form {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

label {
    flex: 0 0 100%;
    margin-bottom: 10px;
}

input, button {
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

input {
    flex: 0 0 calc(100% - 22px); /* Consider padding and border */
}

button {
    flex: 0 0 calc(100% - 22px); /* Consider padding and border */
    background-color: #794afa;
    color: white;
    border: none;
    cursor: pointer;
}

/* Style the table for better readability */
table {
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #794afa;
    color: white;
}

/* Style for small screens */
@media screen and (max-width: 600px) {
    th, td {
        display: block;
        width: 100%;
        box-sizing: border-box;
    }

    th {
        text-align: center;
    }

    td {
        text-align: left;
    }
    input {
    flex: 0 0 calc(100% - 50px); /* Consider padding and border */
}

button {
    flex: 0 0 calc(100% - 50px); /* Consider padding and border */
    background-color: #0000;
    color: white;
    border: none;
    cursor: pointer;
}
}

     </style>
     </style>
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
        <img src="5.jpg" alt="">
      <span class="logo_name">LoomLux</span>
    </div>
    <ul class="nav-links">
        <li>
            <div class="iocn-link">
              <a href="#">
                <i class='bx bxs-plus-square'></i>
                <span class="link_name">Insert</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a class="link_name" href="#">Insert</a></li>
              <li><button><a href="insert_product.php">Products</a></button></li>
            </ul>
          </li>
          <li>
            <a href="shop.php?view_products">
                <i class='bx bxl-product-hunt'></i>
              <span class="link_name">View Products </span>
            </a>
            <ul class="sub-menu blank">
              <li><button><a class="link_name" href="shop.php?view_products">View Products </a></button></li>
            </ul>
          </li>
      <li>
        <a href="shop.php?list_orders">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">View Category </span>
        </a>
        <ul class="sub-menu blank">
          <li><button><a class="link_name" href="shop.php?list_orders">View orders </a></button></li>
        </ul>
      </li>

      <li>
        <a href="shop.php?edit_shop_acc">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><button><a class="link_name" href="shop.php?edit_shop_acc">Setting</a></button></li>
        </ul>
      </li>
      <li>
        <?php
              $shopname=$_SESSION['shopname'];
            $shop_image="select * from `shops_table` where shopname='$shopname' ";
            $result_query=mysqli_query($con,$shop_image);
            $row=mysqli_fetch_assoc($result_query);
            $shop_shopname=$row['shopname'];
            $shop_image=$row['shop_image'];
            echo "  <div class='profile-details'>
            <div class='profile-content'>
              <img src='../admin_area/shop_images/$shop_image' alt='profileImg'>
            </div>
            <div class='name-job'>
              <div class='profile_name'>$shop_shopname</div>
            </div>
           <a href='shoplogout.php'> <i class='bx bx-log-out' ></i></a>
          </div>
      ";

?>
    </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <a href="" class="nav-link"> Welcome Guest</a>
    </div>
    <div class="shophead">
      <h2>SHOP PAGE</h2>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['view_products'])){
          include('view_shop_products.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['edit_products'])){
          include('edit_products.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['delete_product'])){
          include('delete_product.php');
        }
    ?>
    </div>

    <div class="insert-content">
    <?php  
        if(isset($_GET['list_orders'])){
          include('list_order.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['delete_orders'])){
          include('delete_orders.php');
        }
    ?>
    </div>
 
    <div class="insert-content">
    <?php  
        if(isset($_GET['edit_shop_acc'])){
          include('edit_shop_acc.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['delete_orders'])){
          include('delete_orders.php');
        }
    ?>
    </div>
 
  </section>
   
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>
</html>

