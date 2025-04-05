<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <style>
footer {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px;
    gap: 100px; 
}

footer .col {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 20px;
}

footer .logo {
    margin-bottom: 30px;
    max-width: 100%;
}

footer h3{
    font-size: 14px;
    padding-bottom: 20px;
}

footer p{
    font-size: 13px;
    margin: 0 0 8px 0;
}

footer a{
    font-size: 13px;
    text-decoration: none;
    color: #222;
    margin-bottom: 10px;
}

footer .follow{
    margin-top: 20px;
}

footer .follow i{
    color: #465b52;
    padding-right: 4px;
    cursor: pointer; 
}

footer .instal .row img {
    width: 100%; /* Make images responsive */
    max-width: 150px; /* Adjust max-width as needed */
}

footer .follow i:hover,
footer a:hover{
    color: #d80505;
}

footer .copyright{
    width: 100%;
    text-align: center;
}


/* Responsive Styles */
@media screen and (max-width: 768px) {
    nav {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    nav a {
        margin: 10px 0;
    }

    main {
        padding: 1em;
    }

    section {
        padding: 10px;
    }

    footer .col {
        flex: 1 0 100%; /* Allow columns to stack vertically on smaller screens */
        max-width: none;
        margin-right: 0;
    }
}
        </style>
</head>
<body>
<footer class="section-p1">
        <div class="col">
            <img class="logo" src="#" alt="">
            <h3>Contact</h3>
            <p><strong>Address: </strong>No. 36 De Kretser, Bumblapity, Colombo - 04</p>
            <p><strong>Phone: </strong>1-800-123-4567</p>
            <p><strong>Hours: </strong>Monday to Friday, 9:00 AM - 5:00 PM</p>
            <div class="follow">
                <h3>Follow US</h3>
                <div class="icon"> 
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-f"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h3>About</h3>
             <a href="./footer/blog.html">About US</a>
             <a href="#">Privacy Policy</a>
             <a href="#">Terms of service</a>
             <a href="#">Returns Poliy</a>
        </div>

        <div class="col">
            <h3>My Account</h3>
             <a href="#">Sign In</a>
             <a href="#">View Cart</a>
             <a href="#">my Wishlist</a>
             <a href="#">Help</a>
        </div>

        <div class="col instal">
            <h3>Install App</h3>
            <p>From App Store or Google PLay</p>
            <div class="row">
                <img src="app.jpg" alt="">
                <img src="play.jpg" alt="">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="pay.png" alt="">
        </div>
        <div class="copyright">
            <p>@ 2021, LoomLux</p>
        </div>
    </footer>

</body>
</html>