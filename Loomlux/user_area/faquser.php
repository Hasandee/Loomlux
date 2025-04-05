<?php
include("../includes/connect.php");

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($con, $_POST["title"]);
    $first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $message = mysqli_real_escape_string($con, $_POST["message"]);
    

    // SQL query to insert data into the database
    $sql = "INSERT INTO contact (Title, Name,  Email, PhoneNo,  Message) VALUES ('$title', '$first_name','$email', '$phone','$message')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Message send it')</script>";
        // You can redirect the user to another page here if registration is successful
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RegalRadianceResort</title>
    <link rel="stylesheet" href="contactus.css">
    <link rel="stylesheet" href="main.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}

/* Media queries for responsiveness */
@media screen and (max-width: 600px) {
    form {
        padding: 10px;
    }
}

@media screen and (max-width: 400px) {
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea,
    select {
        width: 100%;
    }
}


        </style>

</head>

<body>

    <section class="superiroom2">
        <div class="room8">
            <h5>Message to Admin</h5>



            <form action="" method="post">
                <div class="room11">
                    <h1 class="k_m8">Title</h1>
                    <h1 class="k_m30">NAME</h1>
                    
                </div>
        
                <select class="form-select" aria-label="Default select example" name="title">
                    <option selected>select Title</option>
                    <option value="DR.">DR.</option>
                    <option value="MR.">MR.</option>
                    <option value="MRS.">MRS.</option>
                    <option value="MISS.">MISS.</option>
                </select>
        
                <div class="form">
                    <input type="text" id="first_name" name="first_name" placeholder="FIRST NAME" required>
                </div>
        
             
        
                <div class="room12">
                    <h1 class="k_m8">EMAIL </h1>
                    <h1 class="k_m90">PHONE NO</h1>
                </div>
        
                <div class="form3">
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
        
                <div class="form4">
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>

                <div class="room13">
                    <h1 class="k_m8">MESSAGE</h1>
                </div>
        
                <div class="form5">
                    <textarea id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
                </div>
        
           

            </div>
            <button type="submit" class="btn2">SUBMIT</button>
        </form>

       

</body>

</html>