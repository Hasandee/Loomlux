<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>
    <style>
        /* Your existing CSS styles */
        /* ... */
    </style>
</head>
<body>

<h1>All Categories</h1>

<!-- Search Form -->
<form method="post" action="">
    <label for="search_category">Search by Category Title:</label>
    <input type="text" name="search_category" id="search_category" placeholder="Enter Category Title" autocomplete="off">
    <button type="submit" name="submit_search">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>Slno</th>
            <th>Category title</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Handle Search
        if (isset($_POST['submit_search'])) {
            $search_category = mysqli_real_escape_string($con, $_POST['search_category']);
            $select_cat = "SELECT * FROM `categories` WHERE `category_title` LIKE '%$search_category%'";
        } else {
            $select_cat = "SELECT * FROM `categories`";
        }

        $result = mysqli_query($con, $select_cat);
        $number = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
        ?>
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $category_title; ?></td>
                <td><a href='admin.php?edit_category=<?php echo $category_id; ?>'><i class='bx bx-edit-alt'></i></a></td>
                <td><a href='admin.php?delete_category=<?php echo $category_id; ?>'><i class='bx bxs-message-alt-x'></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

</body>
</html>
