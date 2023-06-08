<?php
session_start();
unset($_SESSION['user_id']);
$_SESSION['islogin'] = 'N';
header("Location: index.php");
?>