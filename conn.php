<?php
$servername="localhost";
$username="root";
$password="";
$db="covidreports";
$conn = new mysqli($servername,$username,$password,$db);
if(!$conn)
{
die("Eroor on Connection" .$conn->connect_error);
}
?>                                                                                                                                                                                                                           