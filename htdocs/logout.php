<?php
ob_start();
session_start();

unset($_SESSION['user']);
unset($_SESSION['shareauthcode']);
unset($_SESSION['lastvisitpage']);
unset($_SESSION['lastclickedlink']);
setcookie("scim_uname", "", time()-60*60*24*30, "/");
setcookie("scim_passwd", "", time()-60*60*24*30, "/");
header("location:login.php");
?>