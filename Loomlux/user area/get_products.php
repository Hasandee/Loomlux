<?php
// get_products.php

include('../includes/connect.php');
include('../functions/common_function.php');

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

?>
