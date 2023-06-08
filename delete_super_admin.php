<?php
include "conn.php"; 
$id = $_GET['id']; 
$del = mysqli_query($conn,"delete from patient where id = '$id'"); 
if($del)
{
    mysqli_close($db); 
	header("location:update_del_super_admin.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; 
}
?>