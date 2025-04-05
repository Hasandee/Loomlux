<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.input-group.w-10{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}
.input-group-text {
    position: absolute;
    padding: 12px 10px;
    font-size: 28px; 
    color: var(--dark-color); 
}

.input-group.w-10 input {
    margin: 10px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px 5px 5px 5px;
    background-color: var(--primary-color);
    cursor: pointer;
    color: var(--white-color);
}

.input-group.w-90 input {
    padding: 1em 8em 1em 4.5em;

}
select{
    margin-top:10px;
    padding: 1em 8em 1em 4.5em;
}
.input-group.w-10 input:hover {
    background-color: var(--dark-color);
    color: var(--white-color);
}
@media screen and (min-width :992px ) {
    .form-con{
        display:flex;
        justify-content: center;
    align-items: center;
    }
    form {
    justify-content: center;
    align-items: center;
}
.selction{
    display:flex;
        justify-content: center;
    align-items: center;
}

.input-group.w-90 {
    position: relative;
    display: flex;
}
.input-group.w-10{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}
.input-group-text {
    position: absolute;
    margin-top:12px;
    padding: 12px 10px;
    font-size: 40px; 
    color: var(--dark-color); 
}

.input-group.w-10 input {
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px 5px 5px 5px;
    background-color: var(--primary-color);
    cursor: pointer;
    color: var(--white-color);
}

.input-group.w-90 input {
    margin-top:20px;
    padding: 1em 15em 1em 4.5em;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px;
    outline: none;
}
select{
    margin-top:10px;
    padding: 1em 15em 1em 4.5em;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px;
    outline: none;
}
}
</style>
</head>
<body>
   <div class="form-con">
<form action="" method="post" class="form">
<?php
include('../includes/connect.php');
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];
    $category = $_POST['category'];

    // Check if the brand already exists in the selected category
    $select_query = "SELECT * FROM `brands` WHERE brand_title='$brand_title' AND category_id='$category'";
    $result_select = mysqli_query($con, $select_query);

    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('This Brand is already present in the selected category')</script>";
    } else {
        // Insert the brand into the database
        $insert_query = "INSERT INTO `brands` (brand_title, category_id) VALUES ('$brand_title','$category')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('Brand has been Inserted Successfully')</script>";
        } else {
            echo "<script>alert('Error inserting brand')</script>";
        }
    }
}
?>


 <div class="selction">
    <select name="category"><?php
   include('../includes/connect.php');
   $categories=mysqli_query($con,"Select * from categories");
   while($c=mysqli_fetch_array($categories)){
    ?>
    <option value="<?php echo $c['category_id']?>"><?php echo $c['category_title'] ?></option>
    <?php }?>
</select>
</div>
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class='bx bx-receipt' ></i></span>
        <input type="text" name="brand_title"  class="form-control" placeholder="Insert brands" aria-lable="brands" aria-describedby="basic-addon1">
    </div>
   

 
    <div class="input-group w-10 mb-2">
       
    <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="Insrt Brands">
    <!--
       <button class="bg-info p-2 my-3 border-0"> Insert Brands</button>-->
    </div>
</div>
</form> 
</body>
</html>

