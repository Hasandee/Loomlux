<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Brands</title>
    <style>
        /* Your existing CSS styles */
        /* ... */
    </style>
</head>
<body>

<h1>All Brands</h1>

<!-- Search Form -->
<form method="post" action="">
    <label for="search_brand">Search by Brand Title:</label>
    <input type="text" name="search_brand" id="search_brand" placeholder="Enter Brand Title" autocomplete="off">
    <button type="submit" name="submit_search">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>Slno</th>
            <th>Category Title</th>
            <th>Brand Title</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Handle Search
        if (isset($_POST['submit_search'])) {
            $search_brand = mysqli_real_escape_string($con, $_POST['search_brand']);
            $select_brands = "SELECT b.*, c.category_title FROM `brands` b
                              JOIN `categories` c ON b.category_id = c.category_id
                              WHERE b.brand_title LIKE '%$search_brand%'";
        } else {
            $select_brands = "SELECT b.*, c.category_title FROM `brands` b
                              JOIN `categories` c ON b.category_id = c.category_id";
        }

        $result = mysqli_query($con, $select_brands);
        $number = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $category_title = $row['category_title'];
            $number++;
        ?>
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $category_title; ?></td>
                <td><?php echo $brand_title; ?></td>
                <td><a href='admin.php?delete_brand=<?php echo $brand_id; ?>'><i class='bx bxs-message-alt-x'></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

</body>
</html>
