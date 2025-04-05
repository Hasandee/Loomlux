<?php
include('../includes/connect.php');

if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    $select_query = "SELECT * FROM `brands` WHERE category_id = '$category_id'";
    $result_query = mysqli_query($con, $select_query);

    $options = '<option value="">Select a Brand</option>';
    while ($row = mysqli_fetch_assoc($result_query)) {
        $brand_title = $row['brand_title'];
        $brand_id = $row['brand_id'];
        $options .= "<option value='$brand_id'>$brand_title</option>";
    }

    echo $options;
}
?>
