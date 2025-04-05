<?php
include("../includes/connect.php");

$sql = "SELECT ID, Title, Name, Email, PhoneNo, Message FROM contact";
$result=mysqli_query($con,$sql);
$data = [];

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo "No records found!";
    }
} else {
    echo "Error: " . $con->error;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link rel="stylesheet" href="admin_index.css">
    <link rel="icon" type="image/x-icon" href="img/01.jpg">

    <style>
/* CSS for responsiveness 
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}
 Responsive CSS 
@media only screen and (max-width: 600px) {
    table {
        border-collapse: collapse;
        width: 100%;
        overflow-x: auto;
        display: block;
    }

    th, td {
        text-align: left;
        padding: 6px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr {
        display: block;
        border-bottom: 1px solid #ddd;
        margin-bottom: 10px;
    }

    td:before {
        content: attr(data-label);
        font-weight: bold;
        display: inline-block;
        width: 50%;
        margin-bottom: 5px;
    }
}

#replyForm {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
}

#replyForm label {
    display: block;
    margin-bottom: 10px;
}

#replyForm textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
}
*/

        </style>
</head>

<body>
    <h2>Messages from the users</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Name</th>
            <th>Email</th>
            <th>PhoneNo</th>
            <th>Message</th>
            <th>Action</th>
        </tr>

        <?php foreach ($data as $row) : ?>
            <tr>
                <td><?php echo $row["Title"]; ?></td>
                <td><?php echo $row["Name"]; ?></td>
                <td><?php echo $row["Email"]; ?></td>
                <td><?php echo $row["PhoneNo"]; ?></td>
                <td><?php echo $row["Message"]; ?></td>
                <td>
                    <!-- Add a button to trigger the reply form -->
                    <button onclick="showReplyForm(<?php echo $row['ID']; ?>)">Reply</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Add a hidden reply form -->
    <div id="replyForm" style="display:none;">
        <h2>Reply to Message</h2>
        <form action="send_reply.php" method="post">
            <input type="hidden" name="message_id" id="message_id">
            <input type="hidden" name="user_email" id="user_email"> <!-- Add hidden input for user's email -->
            <label for="admin_reply">Admin Reply:</label>
            <textarea id="admin_reply" name="admin_reply" rows="4" placeholder="Enter your reply" required></textarea>
            <button type="submit">Send Reply</button>
        </form>
    </div>

    <script>
        function showReplyForm(messageId) {
            // Set the message ID in the hidden form field
            document.getElementById('message_id').value = messageId;

            // Set the user's email in the hidden form field
            document.getElementById('user_email').value = "<?php echo $row['Email']; ?>";

            // Show the reply form
            document.getElementById('replyForm').style.display = 'block';
        }
    </script>
</body>

</html>