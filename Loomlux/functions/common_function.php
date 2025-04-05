<?php
//include('../includes/connect.php');


function getproducts()
{
    global $con;

    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        $select_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 0,8";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
              $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $color=$row['product_color'];
    // Move this block inside the loop
    $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
    $result_reviews = mysqli_query($con, $select_reviews);
    $row_average = mysqli_fetch_assoc($result_reviews);
    $average_rating = $row_average['average_rating'];

    echo " <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='../shop_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <div class='product-rating'>
                            <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
                        </div>
                            <p>$product_description</p>
                            <p>$color</p>
                            <p>RS.$product_price</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div></a>";
        }
    }
}
function getproducts_index()
{
    global $con;

    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        $select_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 0,8";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
              $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $color=$row['product_color'];
    // Move this block inside the loop
    $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
    $result_reviews = mysqli_query($con, $select_reviews);
    $row_average = mysqli_fetch_assoc($result_reviews);
    $average_rating = $row_average['average_rating'];

    echo " <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='../shop_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <div class='product-rating'>
                            <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
                        </div>
                            <p>$product_description</p>
                            <p>$color</p>
                            <p>RS.$product_price</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div></a>";
        }
    }
}
function getproducts_detail()
{
    global $con;

    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        $select_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 0,4";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
              $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $color=$row['product_color'];
    // Move this block inside the loop
    $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
    $result_reviews = mysqli_query($con, $select_reviews);
    $row_average = mysqli_fetch_assoc($result_reviews);
    $average_rating = $row_average['average_rating'];

    echo " <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='../shop_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <div class='product-rating'>
                            <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
                        </div>
                            <p>$product_description</p>
                            <p>$color</p>
                            <p>RS.$product_price</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div></a>";
        }
    }
}
function get_all_products()
{
    global $con;

    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        $select_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 0,28";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
              $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $color=$row['product_color'];
    // Move this block inside the loop
    $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
    $result_reviews = mysqli_query($con, $select_reviews);
    $row_average = mysqli_fetch_assoc($result_reviews);
    $average_rating = $row_average['average_rating'];

    echo " <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><div class='col-md-4 mb-2'>
    <div class='card'>
        <img src='../shop_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <div class='product-rating'>
            <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
        </div>
            <p>$product_description</p>
            <p>$color</p>
            <p>RS.$product_price</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
            <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
    </div>
</div></a>";
        }
    }
}
function get_all_product()
{
    global $con;

    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` WHERE `category_id` = '$category_id=2' ORDER BY RAND() LIMIT 0,4";
    } else {
        $select_query = "SELECT * FROM `products` WHERE `category_id` = '$category_id' ORDER BY RAND() LIMIT 0,4";
    }

    $result_query = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $color=$row['product_color'];
        // Move this block inside the loop
        $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
        $result_reviews = mysqli_query($con, $select_reviews);
        $row_average = mysqli_fetch_assoc($result_reviews);
        $average_rating = $row_average['average_rating'];

        echo " <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='../shop_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <div class='product-rating'>
                <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
            </div>
                <p>$product_description</p>
                <p>$color</p>
                <p>RS.$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div></a>";
    }
}
function get_all_products_un()
{
    global $con;

    $default_category_id = 2; // Set your default category ID

    $select_query = "SELECT * FROM `products` WHERE `category_id` = '$default_category_id' ORDER BY RAND() LIMIT 0,4";
    $result_query = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $color=$row['product_color'];
        // Move this block inside the loop
        $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
        $result_reviews = mysqli_query($con, $select_reviews);
        $row_average = mysqli_fetch_assoc($result_reviews);
        $average_rating = $row_average['average_rating'];

        echo " <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='../shop_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <div class='product-rating'>
                <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
            </div>
                <p>$product_description</p>
                <p>$color</p>
                <p>RS.$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div></a>";
    }
}
function get_all_products_el()
{
    global $con;

    $default_category_id = 4; // Set your default category ID

    $select_query = "SELECT * FROM `products` WHERE `category_id` = '$default_category_id' ORDER BY RAND() LIMIT 0,4";
    $result_query = mysqli_query($con, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $color=$row['product_color'];
        // Move this block inside the loop
        $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
        $result_reviews = mysqli_query($con, $select_reviews);
        $row_average = mysqli_fetch_assoc($result_reviews);
        $average_rating = $row_average['average_rating'];

        echo " <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='../shop_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <div class='product-rating'>
                <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
            </div>
                <p>$product_description</p>
                <p>$color</p>
                <p>RS.$product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
            </div>
        </div>
    </div></a>";
    }
}
function get_unique_categories()
{
    global $con;

    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` WHERE category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
             echo"<h2 style='text-align:center'>This category is not available</h2>";
        }
        if($result_query) {
            while ($row = mysqli_fetch_assoc($result_query)) {
              $product_id = $row['product_id'];
              $product_title = $row['product_title'];
              $product_description = $row['product_description'];
              $product_image1 = $row['product_image1'];
              $product_price = $row['product_price'];
              $category_id = $row['category_id'];
              $brand_id = $row['brand_id'];
              $color=$row['product_color'];
              // Move this block inside the loop
              $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
              $result_reviews = mysqli_query($con, $select_reviews);
              $row_average = mysqli_fetch_assoc($result_reviews);
              $average_rating = $row_average['average_rating'];
          
              echo " <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><div class='col-md-4 mb-2'>
              <div class='card'>
                  <img src='../shop_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                  <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <div class='product-rating'>
                      <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
                  </div>
                      <p>$product_description</p>
                      <p>$color</p>
                      <p>RS.$product_price</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                      <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                  </div>
              </div>
          </div></a>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
function get_unique_brand()
{
    global $con;

    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
             echo"<h2 style='text-align:center'>This Brand is not available</h2>";
        }
        if ($result_query) {
            while ($row = mysqli_fetch_assoc($result_query)) {
              $product_id = $row['product_id'];
              $product_title = $row['product_title'];
              $product_description = $row['product_description'];
              $product_image1 = $row['product_image1'];
              $product_price = $row['product_price'];
              $category_id = $row['category_id'];
              $brand_id = $row['brand_id'];
              $color=$row['product_color'];
              // Move this block inside the loop
              $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
              $result_reviews = mysqli_query($con, $select_reviews);
              $row_average = mysqli_fetch_assoc($result_reviews);
              $average_rating = $row_average['average_rating'];
          
              echo " <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='../shop_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <div class='product-rating'>
                            <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
                        </div>
                            <p>$product_description</p>
                            <p>$color</p>
                            <p>RS.$product_price</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div></a>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

function getcategoryandbrands()
{
    global $con;

    $select_brands = "SELECT * FROM `brands`";
    $result_brands = mysqli_query($con, $select_brands);

    $select_category = "SELECT * FROM `categories`";
    $result_category = mysqli_query($con, $select_category);

    while ($row_category = mysqli_fetch_assoc($result_category)) {
        $category_title = $row_category['category_title'];
        $category_id = $row_category['category_id'];

        echo "<li class='has-child beauty'>
                <a href='index.php?category=$category_id'>$category_title  <i class='ri-arrow-right-s-line'></i></a>
                <ul>";

        mysqli_data_seek($result_brands, 0);

        while ($row_brand = mysqli_fetch_assoc($result_brands)) {
            if ($row_brand['category_id'] == $category_id) {
                $brand_title = $row_brand['brand_title'];
                $brand_id = $row_brand['brand_id'];

                echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
            }
        }

        echo "</ul></li>";
    }
}

function search_product()
{
    global $con;

    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2 style='text-align:center'>This Brand is not available</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $color=$row['product_color'];
            // Move this block inside the loop
            $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
            $result_reviews = mysqli_query($con, $select_reviews);
            $row_average = mysqli_fetch_assoc($result_reviews);
            $average_rating = $row_average['average_rating'];

            echo " <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'><div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='../shop_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <div class='product-rating'>
                            <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
                        </div>
                            <p>$product_description</p>
                            <p>$color</p>
                            <p>RS.$product_price</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div></a>";
        }
    }
}

//view deatils function
function vew_details(){
  global $con;
  if(isset($_GET['product_id'])){
  if (!isset($_GET['category']) && !isset($_GET['brand'])) {
    $product_id=$_GET['product_id'];
      $select_query = "SELECT * FROM `products` where product_id=$product_id";
      $result_query = mysqli_query($con, $select_query);
  $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
            $result_reviews = mysqli_query($con, $select_reviews);
            $row_average = mysqli_fetch_assoc($result_reviews);
            $average_rating = $row_average['average_rating'];
      while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description = $row['product_description'];
  $product_image1 = $row['product_image1'];
  $product_image2 = $row['product_image2'];
  $product_image3 = $row['product_image3'];
  $product_price = $row['product_price'];
  $category_id = $row['category_id'];
  $quantity=$row['product_quantity'];
  $color=$row['product_color'];
  $brand_id = $row['brand_id'];
  $shop_id=$row['shop_id'];
  $product_status=$row['product_status'];
  $product_priceO=$row['product_priceO'];

  $select_shop="select * from `shops_table` where shop_id=$shop_id";
  $result_query_shop = mysqli_query($con, $select_shop);
  $row_shop = mysqli_fetch_assoc($result_query_shop);
  $shop_name=$row_shop['shop_name'];
  echo "<div class='pcard'>
  <div class='product-content'>
      <h2 class='product-title'>$product_title</h2>
      <a href='' class='product-link'>Visit Nike</a>
      <div class='product-rating'>
      <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
  </div>
      <div class='product-price'>
          <p class='last-price'>Old Price<span>$product_priceO</span></p>
          <p class='new-price'>New Price<span>$product_price</span></p>
      </div>
      <div class='product-detail'>
          <h2>About this item:</h2>
          <p>$product_description</p>
          <p>$product_description </p>
          <ul>
              <li>Color<span>$color</span></li>
              <li>Available<span>$product_status</span></li>
              <li>Maximu By Quantity<span>$quantity</span></li>
              <li>Shop name:<span>$shop_name</span></li>
          </ul>
      </div>
      <div class='purchase-info'>
          <button type='button' class='btn'><a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a></button>
          <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
          <button type='button' class='btn'><a href='index.php' class='btn btn-info'>Go Home</a></button>
      </div>
  </div>
  <div class='product-imgs'>
      <div class='img-display'>
          <div class='img-showcase'>
              <img src='../shop_area/product_images/$product_image1' alt=''>
              <img src='../shop_area/product_images/$product_image2' alt=''>
              <img src='../shop_area/product_images/$product_image3' alt=''>

          </div>
      </div>
      <div class='img-select'>
          <div class='img-team'>
              <a href='#' data-id='1' class='img-item'><img src='../shop_area/product_images/$product_image1' alt=''></a>
          </div>
          <div class='img-team'>
              <a href='#' data-id='1' class='img-item'><img src='../shop_area/product_images/$product_image2' alt=''></a>
          </div>
          <div class='img-team'>
          <a href='#' data-id='1' class='img-item'><img src='../shop_area/product_images/$product_image3' alt=''></a>
      </div>
      </div>
  </div>
</div>";
      }
  } 
}
}

//getting ip address
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;

// Cart function
function add_cart() {
  global $con;

  // Check if the 'add_to_cart' parameter is set in the URL
  if (isset($_GET['add_to_cart'])) {
      // Retrieve the currently logged-in user_id (Assuming you have a session variable storing the user_id)
      if (!isset($_SESSION['user_id'])) {
          // Handle the case where the user is not logged in
          echo "<script>alert('User not logged in')</script>";
          echo "<script>window.open('index.php','_self')</script>";
          return;
      }

      $user_id = $_SESSION['user_id'];

      // Get the product_id from the URL
      $get_product_id = mysqli_real_escape_string($con, $_GET['add_to_cart']);

      // Check if the product is already in the cart for the user
      $select_query = "SELECT * FROM `cart_detail` WHERE user_id = $user_id AND product_id = $get_product_id";
      $result_query = mysqli_query($con, $select_query);

      if (!$result_query) {
          // Handle query error
          echo "<script>alert('Error checking cart')</script>";
          echo "<script>window.open('index.php','_self')</script>";
          return;
      }

      $num_of_rows = mysqli_num_rows($result_query);

      if ($num_of_rows>0) {
          // Product is already in the cart
          echo "<script>alert('This item is already present inside the cart')</script>";
          echo "<script>window.open('index.php','_self')</script>";
      } else {
          // Product is not in the cart, insert it
          $insert_query = "INSERT INTO `cart_detail` (product_id, quantity, user_id) VALUES ($get_product_id, 1, $user_id)";
          
          // Note: I assume a quantity of 1, you can adjust as needed
          
          $result_query = mysqli_query($con, $insert_query);

          if ($result_query) {
              echo "<script>alert('This item is added to the cart')</script>";
              echo "<script>window.open('index.php','_self')</script>";
          } else {
              // Handle insert error
              echo "<script>alert('Error adding item to cart: " . mysqli_error($con) . "')</script>";
              echo "<script>window.open('index.php','_self')</script>";
          }
      }
  }
}
// Cart item total function
function cart_item() {
  global $con;

  // Check if the user is logged in
  if (!isset($_SESSION['user_id'])) {
      return 0; // If not logged in, return 0 items in the cart
  }

  $user_id = $_SESSION['user_id'];

  // Count the number of items in the cart for the logged-in user
  $select_query = "SELECT COUNT(*) AS total_items FROM `cart_detail` WHERE user_id = $user_id";
  $result_query = mysqli_query($con, $select_query);

  if ($result_query) {
      $row = mysqli_fetch_assoc($result_query);
      $count_cart_items = $row['total_items'];
      return $count_cart_items;
      $count_cart_items = mysqli_num_rows($result_query);
      echo $count_cart_items;
  } else {
      // Handle query error
      echo "Error: " . mysqli_error($con);
      return 0;
  }
}// Total cart price function
function total_cart_price(){
  global $con;

  // Check if the user is logged in and has items in the cart
  $cart_items = cart_item();

  if ($cart_items > 0) {
    $user_id = $_SESSION['user_id'];
    $total_price = 0;

    // Retrieve cart details for the user
    $cart_query = "SELECT * FROM `cart_detail` WHERE user_id='$user_id'";
    $result = mysqli_query($con, $cart_query);

    while ($row = mysqli_fetch_array($result)) {
      $product_id = $row['product_id'];

      // Retrieve product price from the 'products' table
      $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
      $result_products = mysqli_query($con, $select_products);

      while ($row_product_price = mysqli_fetch_array($result_products)) {
        $product_price = $row_product_price['product_price'];
        $total_price += $product_price * $row['quantity'];
      }
    }

    echo $total_price;
  } else {
    echo "0"; // No items in the cart
  }
}

//get user order details
function get_user_order_details(){
  global $con;
  $username=$_SESSION['username'];
  $user_id = $_SESSION['user_id'];
  $get_details="select * from `users_table` where user_id='$user_id'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_orders'])) {
         if (!isset($_GET['delete_account'])) {
          $get_orders="select * from `placeorderdetails_table` where user_id=$user_id and order_status='pending' ";
          $result_orders_query=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_orders_query);
          if ($row_count>0) {
            echo"<h3 class='order'> You Have  <span style='color:red'>$row_count</span>  pending Orders<h3>
            <p class='orderde'><a href='profile.php?my_orders'>Order Deatils</a></p>";
          }
          else{
            echo"<h3 class='order' > You Have zero pending Orders<h3>
            <p class='orderde' '><a href='../index.php'>explore Products</a></p>";
          }
         }
      }
    }
  }
}
// Cart function
function add_wish() {
  global $con;

  // Check if the 'add_to_cart' parameter is set in the URL
  if (isset($_GET['wish_cart'])) {
      // Retrieve the currently logged-in user_id (Assuming you have a session variable storing the user_id)
      if (!isset($_SESSION['user_id'])) {
          // Handle the case where the user is not logged in
          echo "<script>alert('User not logged in')</script>";
          echo "<script>window.open('index.php','_self')</script>";
          return;
      }

      $user_id = $_SESSION['user_id'];

      // Get the product_id from the URL
      $get_product_id = mysqli_real_escape_string($con, $_GET['wish_cart']);

      // Check if the product is already in the cart for the user
      $select_query = "SELECT * FROM `wish_detail` WHERE user_id = $user_id AND product_id = $get_product_id";
      $result_query = mysqli_query($con, $select_query);

      if (!$result_query) {
          // Handle query error
          echo "<script>alert('Error checking cart')</script>";
          echo "<script>window.open('index.php','_self')</script>";
          return;
      }

      $num_of_rows = mysqli_num_rows($result_query);

      if ($num_of_rows>0) {
          // Product is already in the cart
          echo "<script>alert('This item is already present inside the cart')</script>";
          echo "<script>window.open('index.php','_self')</script>";
      } else {
          // Product is not in the cart, insert it
          $insert_query = "INSERT INTO `wish_detail` (product_id, user_id) VALUES ($get_product_id, $user_id)";
          
          // Note: I assume a quantity of 1, you can adjust as needed
          
          $result_query = mysqli_query($con, $insert_query);

          if ($result_query) {
              echo "<script>alert('This item is added to the cart')</script>";
              echo "<script>window.open('index.php','_self')</script>";
          } else {
              // Handle insert error
              echo "<script>alert('Error adding item to cart: " . mysqli_error($con) . "')</script>";
              echo "<script>window.open('index.php','_self')</script>";
          }
      }
  }
}
// Cart item total function
function wish_item() {
  global $con;

  // Check if the user is logged in
  if (!isset($_SESSION['user_id'])) {
      return 0; // If not logged in, return 0 items in the cart
  }

  $user_id = $_SESSION['user_id'];

  // Count the number of items in the cart for the logged-in user
  $select_query = "SELECT COUNT(*) AS total_items FROM `wish_detail` WHERE user_id = $user_id";
  $result_query = mysqli_query($con, $select_query);

  if ($result_query) {
      $row = mysqli_fetch_assoc($result_query);
      $count_cart_items = $row['total_items'];
      return $count_cart_items;
  } else {
      // Handle query error
      echo "Error: " . mysqli_error($con);
      return 0;
  }
}
function comapre_product()
{
    global $con;

    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2 style='text-align:center'>This Brand is not available</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description = $row['product_description'];
  $product_image1 = $row['product_image1'];
  $product_image2 = $row['product_image2'];
  $product_image3 = $row['product_image3'];
  $product_price = $row['product_price'];
  $category_id = $row['category_id'];
  $quantity=$row['product_quantity'];
  $color=$row['product_color'];
  $brand_id = $row['brand_id'];
  $shop_id=$row['shop_id'];
  $product_status=$row['product_status'];
  $product_priceO=$row['product_priceO'];

  $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
  $result_reviews = mysqli_query($con, $select_reviews);
  $row_average = mysqli_fetch_assoc($result_reviews);
  $average_rating = $row_average['average_rating'];
  $select_shop="select * from `shops_table` where shop_id=$shop_id";
  $result_query_shop = mysqli_query($con, $select_shop);
  $row_shop = mysqli_fetch_assoc($result_query_shop);
  $shop_name=$row_shop['shop_name'];
  echo "<div class='pcard'>
  <div class='product-content'>
      <h2 class='product-title'>$product_title</h2>
      <a href='' class='product-link'>Visit Nike</a>
      <div class='product-rating'>
      <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
  </div>
      <div class='product-price'>
          <p class='last-price'>Old Price<span>$product_priceO</span></p>
          <p class='new-price'>New Price<span>$product_price</span></p>
      </div>
      <div class='product-detail'>
          <h2>About this item:</h2>
          <p>$product_description</p>
          <p>$product_description </p>
          <ul>
              <li>Color<span>$color</span></li>
              <li>Available<span>$product_status</span></li>
              <li>Maximu By Quantity<span>$quantity</span></li>
              <li>Shop name:<span>$shop_name</span></li>
          </ul>
      </div>
      <div class='purchase-info'>
          <button type='button' class='btn'><a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a></button>
          <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
          <button type='button' class='btn'><a href='index.php' class='btn btn-info'>Go Home</a></button>
      </div>
  </div>
  <div class='product-imgs'>
      <div class='img-display'>
          <div class='img-showcase'>
              <img src='../shop_area/product_images/$product_image1' alt=''>
              <img src='../shop_area/product_images/$product_image2' alt=''>
              <img src='../shop_area/product_images/$product_image3' alt=''>

          </div>
      </div>
      <div class='img-select'>
          <div class='img-team'>
              <a href='#' data-id='1' class='img-item'><img src='../shop_area/product_images/$product_image1' alt=''></a>
          </div>
          <div class='img-team'>
              <a href='#' data-id='1' class='img-item'><img src='../shop_area/product_images/$product_image2' alt=''></a>
          </div>
          <div class='img-team'>
          <a href='#' data-id='1' class='img-item'><img src='../shop_area/product_images/$product_image3' alt=''></a>
      </div>
      </div>
  </div>
</div>";
      }
    }
}
function comapre_product1()
{
    global $con;

    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data1'];
        $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2 style='text-align:center'>This Brand is not available</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
              $product_id = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description = $row['product_description'];
  $product_image1 = $row['product_image1'];
  $product_image2 = $row['product_image2'];
  $product_image3 = $row['product_image3'];
  $product_price = $row['product_price'];
  $category_id = $row['category_id'];
  $quantity=$row['product_quantity'];
  $color=$row['product_color'];
  $brand_id = $row['brand_id'];
  $shop_id=$row['shop_id'];
  $product_status=$row['product_status'];
  $product_priceO=$row['product_priceO'];
  
  $select_reviews = "SELECT AVG(rating) as average_rating FROM product_reviews WHERE product_id = $product_id";
  $result_reviews = mysqli_query($con, $select_reviews);
  $row_average = mysqli_fetch_assoc($result_reviews);
  $average_rating = $row_average['average_rating'];
  $select_shop="select * from `shops_table` where shop_id=$shop_id";
  $result_query_shop = mysqli_query($con, $select_shop);
  $row_shop = mysqli_fetch_assoc($result_query_shop);
  $shop_name=$row_shop['shop_name'];
  echo "<div class='pcard'>
  <div class='product-content'>
      <h2 class='product-title'>$product_title</h2>
      <a href='' class='product-link'>Visit Nike</a>
      <div class='product-rating'>
      <span>Average Rating: " . number_format($average_rating, 1) . " stars/5</span>
  </div>
      <div class='product-price'>
          <p class='last-price'>Old Price<span>$product_priceO</span></p>
          <p class='new-price'>New Price<span>$product_price</span></p>
      </div>
      <div class='product-detail'>
          <h2>About this item:</h2>
          <p>$product_description</p>
          <p>$product_description </p>
          <ul>
              <li>Color<span>$color</span></li>
              <li>Available<span>$product_status</span></li>
              <li>Maximu By Quantity<span>$quantity</span></li>
              <li>Shop name:<span>$shop_name</span></li>
          </ul>
      </div>
      <div class='purchase-info'>
          <button type='button' class='btn'><a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a></button>
          <a href='index.php?wish_cart=$product_id' class='btn btn-info'>wish </a>
          <button type='button' class='btn'><a href='index.php' class='btn btn-info'>Go Home</a></button>
      </div>
  </div>
  <div class='product-imgs'>
      <div class='img-display'>
          <div class='img-showcase'>
              <img src='../shop_area/product_images/$product_image1' alt=''>
              <img src='../shop_area/product_images/$product_image2' alt=''>
              <img src='../shop_area/product_images/$product_image3' alt=''>

          </div>
      </div>
      <div class='img-select'>
          <div class='img-team'>
              <a href='#' data-id='1' class='img-item'><img src='../shop_area/product_images/$product_image1' alt=''></a>
          </div>
          <div class='img-team'>
              <a href='#' data-id='1' class='img-item'><img src='../shop_area/product_images/$product_image2' alt=''></a>
          </div>
          <div class='img-team'>
          <a href='#' data-id='1' class='img-item'><img src='../shop_area/product_images/$product_image3' alt=''></a>
      </div>
      </div>
  </div>
</div>";
      }
    }
}

?>

