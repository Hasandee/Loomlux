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
    <link rel="stylesheet" href="admin.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
      .product_img{
        width:50px;
            height:40px;
      }
      .user_ima{
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
#replyForm textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
}
}

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
              <li><button><a href="admin.php?insert_category">Category</a></button></li>
              <li><button><a href="admin.php?insert_brand">Brands</a></button></li>
            </ul>
          </li>
          <li>
            <a href="admin.php?view_products">
                <i class='bx bxl-product-hunt'></i>
              <span class="link_name">View Products </span>
            </a>
            <ul class="sub-menu blank">
              <li><button><a class="link_name" href="admin.php?view_products">View Products </a></button></li>
            </ul>
          </li>
      <li>
        <a href="admin.php?view_categories">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">View Category </span>
        </a>
        <ul class="sub-menu blank">
          <li><button><a class="link_name" href="admin.php?view_categories">View Category </a></button></li>
        </ul>
      </li>

      <li>
        <a href="admin.php?view_brand">
            <i class='bx bx-purchase-tag-alt' ></i>
          <span class="link_name">View Brands </span>
        </a>
        <ul class="sub-menu blank">
          <li><button><a class="link_name" href="admin.php?view_brand">View Brands </a></button></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bxs-user-circle' ></i>
            <span class="link_name">User</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">User</a></li>
          <li><button><a href="admin.php?customer_details">Customer</a></button></li>
          <li><button><a href="admin.php?shop_details">Seller</a></button></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="link_name">User</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Account Create</a></li>
          <li><button><a href="admin.php?admin_register">Admin</a></button></li>
          <li><button><a href="admin.php?shop_register">Seller</a></button></li>
        </ul>
      </li>
      <li>
        <a href="admin.php?list_orders">
          <i class='bx bx-history'></i>
          <span class="link_name">All Order History</span>
        </a>
        <ul class="sub-menu blank">
          <li><button><a class="link_name" href="admin.php?list_orders">All Order History</a></button></li>
        </ul>
      </li>
      <li>
        <a href="admin.php?payment">
            <i class='bx bxs-bank'></i>
          <span class="link_name">All Payments</span>
        </a>
        <ul class="sub-menu blank">
          <li><button><a class="link_name" href="admin.php?payment">All Payments</a></button></li>
        </ul>
      </li>
      <li>
        <a href="admin.php?message">
            <i class='bx bxs-bank'></i>
          <span class="link_name" href="">Message</span>
        </a>
        <ul class="sub-menu blank">
          <li><button><a class="link_name" href="admin.php?message">Message</a></button></li>
        </ul>
      </li>
      <li>
        <a href="admin.php?edit_admin_acc">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><button><a class="link_name" href="admin.php?edit_admin_acc">Setting</a></button></li>
        </ul>
      </li>
      <li>
        <?php
            $adminname=$_SESSION['adminname'];
            $user_image="select * from `admins_table` where adminname='$adminname' ";
            $result_query=mysqli_query($con,$user_image);
            $row=mysqli_fetch_assoc($result_query);
            $admin_adminname=$row['adminname'];
            $admin_image=$row['admin_image'];
            echo "  <div class='profile-details'>
            <div class='profile-content'>
              <img src='./admin_images/$admin_image' alt='profileImg'>
            </div>
            <div class='name-job'>
              <div class='profile_name'>$admin_adminname</div>
            </div>
           <a href='adminlogout.php'> <i class='bx bx-log-out' ></i></a>
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
    <div class="adminhead">
      <h2>ADMIN PAGE</h2>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['insert_category'])){
          include('insert_categories.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['insert_brand'])){
          include('inser_brands.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['view_products'])){
          include('view_products.php');
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
          include('delete_products.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['view_categories'])){
          include('view_categories.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['view_brand'])){
          include('view_brand.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['edit_category'])){
          include('edit_category.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['delete_category'])){
          include('delete_category.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['delete_brand'])){
          include('delete_brand.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['list_orders'])){
          include('list_orders.php');
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
        if(isset($_GET['admin_register'])){
          include('admin_register.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['shop_register'])){
          include('shop_register.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['payment'])){
          include('payment.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['delete_payment'])){
          include('delete_payment.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['customer_details'])){
          include('customer_details.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['delete_customer'])){
          include('delete_customer.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['shop_details'])){
          include('shop_details.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['delete_shop'])){
          include('delete_shop.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['message'])){
          include('faq.php');
        }
    ?>
    </div>
    <div class="insert-content">
    <?php  
        if(isset($_GET['edit_admin_acc'])){
          include('edit_admin.php');
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

