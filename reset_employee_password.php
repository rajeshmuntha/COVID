<?php
include_once("header_super_admin.php");
include_once("conn.php");
?> 
<?php
	                    //session_start();
						$id =$_REQUEST['id'];
						$res=mysqli_query($conn,"select * from authenticate where id = '".$id."'");
                        while($row=mysqli_fetch_array($res))
                        {
                        //echo $row["user_id"]; 
						break;
						} 
	   			?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>

<!-- Bootstrap icons cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
<div class="form">
<p>
<?php
ob_start();
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id =$_REQUEST['id'];
$pass = md5($_REQUEST['pass']);
$update="update authenticate set pass='".$pass."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Updated Successfully. </br></br>";
echo "<center>Subject Name: ".$row['name']." <p style='color:#006600;'>".$status."</center>";

//header('Refresh: 2; URL=staff_permissions.php');

 echo '<script type="text/javascript">
 
 window.setTimeout(function() {
    window.location.href = "new_staff_super_admin.php? = 12345611";}, 1500);
				
			  </script>';
}else {

?>
</p>
<section class="animate__animated animate__backInDown">
  <div class="container p-4 shadow-lg rounded rounded-4">
  <form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<table class="table-responsive table table-hover table-bordered text-center align-middle ">
    <thead>
        <tr><th colspan="2" class="bg-light text-primary fs-4">Reset the Password</th></tr>
    </thead>
<tr>
<td >User ID :</td><td><?php //echo $row['year'];
$res5=mysqli_query($conn,"select * from authenticate where id = '".$row['id']."'");
								while($row5=mysqli_fetch_array($res5))
								{
								echo $row5["user_id"]; 
								}

?></td>
</tr>
<tr>
<tr>

</tr>
<tr>
<tr>
<td >Employee Name :</td><td><?php echo $row['name'];?></td>
</tr>
<tr>
<td >New Password :</td><td><!--<input type="text" class="tb1" name="status" required value="<?php //echo $row['status'];?>" />!-->
<input type="password" name="pass" class="form-control" placeholder ="EnterNew Password" required="required">
      
</td>
</tr>
<tr>
    <td colspan="2">
        <div class="d-grid">
            <input name="submit" class="btn btn-success" type="submit"  value="Click to Update" />
        </div>
    </td>
</tr>
</table>
</form>
<?php } ?>

<br />
</div>
</div>
</body>
</html>
