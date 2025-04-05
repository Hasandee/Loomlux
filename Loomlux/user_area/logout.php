<?php

session_start();
session_unset();
session_destroy();
echo"<script>window.open('../user area/index.php','_self')</script>";

?>