<?php

session_start();
session_unset();
session_destroy();
echo"<script>window.open('shop_login.php','_self')</script>";

?>