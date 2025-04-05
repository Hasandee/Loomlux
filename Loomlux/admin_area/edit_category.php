<?php
if (isset($_GET['edit_category'])) {
    $edit_category=$_GET['edit_category'];


    $get_categories="select * from `categories` where category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];


}
if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['cat_title'];

    $update_query="update `categories` set category_title='$cat_title' where category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script> alert('category updated successsfully')</script>";
        echo "<script> window.open('./admin.php?view_categories','_self')</script>";
    }
}


?>


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
}
</style>
</head>
<body>
<div class="form-con">

<form action="" method="post" class="form">

    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class='bx bx-receipt' ></i></span>
        <input type="text" name="cat_title"  class="form-control" value="<?php echo $category_title;  ?>"aria-lable="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="edit_cat" value="update categories">
       <!--<button class="bg-info p-2 my-3 border-0"> Insert Categories</button>-->
    </div>
</div>
</form> 
</body>
</html>