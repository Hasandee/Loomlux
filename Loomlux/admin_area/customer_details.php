<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
</head>
<body>

<h3>All Orders</h3>

<!-- Search Form -->
<form method="post" action="">
    <label for="search_username">Search by Username:</label>
    <input type="text" name="search_username" id="search_username" placeholder="Enter Username" autocomplete="off">
    <button type="submit" name="submit_search">Search</button>
</form>

<table>
    <thead>
        <?php
        $get_orders = "SELECT * FROM `users_table`";
        
        // Handle Search
        if (isset($_POST['submit_search'])) {
            $search_username = mysqli_real_escape_string($con, $_POST['search_username']);
            $get_orders .= " WHERE username LIKE '%$search_username%'";
        }
        
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2>No customers</h2>";
        } else {
            echo "<tr>
                <th>Sl no</th>
                <th>username</th>
                <th>User Email</th>
                <th>Image</th>
                <th>Address No</th>
                <th>Contact Number</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>";

            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                // Existing code to fetch and display user details
                $user_id = $row_data['user_id'];
                $user_name = $row_data['username'];
                $User_email = $row_data['user_email'];
                $user_address = $row_data['user_address'];
                $user_mobile = $row_data['user_mobile'];
                $user_image = $row_data['user_image'];

                $number++;
                echo "<tr>
                    <td>$number</td>
                    <td>$user_name</td>
                    <td>$User_email</td>
                    <td><img src='../user_area/user_images/$user_image' class='user_ima'></td>
                    <td>$user_address</td>
                    <td>$user_mobile</td>
                    <td><a href='admin.php?delete_customer=$user_id'><i class='bx bxs-message-alt-x'></i></a></td>
                </tr>";
            }
        }
        ?>
    </tbody>
</table>

</body>
</html>
