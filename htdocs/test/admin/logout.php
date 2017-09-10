<?php
ob_start();
session_start();

unset($_SESSION['sciadmin']);
header("location:login.php");
?>
