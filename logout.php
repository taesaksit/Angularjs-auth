<?php
session_start();
session_destroy();
header("location: login-register/index.php");
?>