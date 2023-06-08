<?php
include_once("header_level-I.php");
include_once("conn.php");
?> 
<?php
	                    //session_start();
						$res=mysqli_query($conn,"select * from authenticate where user_id = '".$_SESSION["user_id"]."'");
                        while($row=mysqli_fetch_array($res))
                        {
                        //echo $row["user_id"]; 
						break;
						}
	   			?>
                <?php
$auth = $_SESSION["user_id"];
if($auth =='')
{
echo '<script type="text/javascript">
location.replace("logout.php? = Invalid Login");
 </script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<!-- Bootstrap 5.3 cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
<div class="form">
<style type="text/css">
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
</style>
<p>
  <?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$pass =$_REQUEST['pass'];
$update="update authenticate set pass='".md5($pass)."' where user_id='".$_SESSION["user_id"]."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Password Updated Successfully. </br></br>";
echo "<center>Login ID: ".$row['user_id']." <p style='color:#006600;'>".$status."</center>";
}else {
?>
</p>

<section class="pt-5">
  <div class="container p-4 shadow-lg rounded rounded-4">
    <form name="form" method="post" action=""> 
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <table class="table table-responsive table-hover table-bordered">
        <thead>
            <tr class="text-center fs-4">
            <th scope="row" colspan="2" class="bg-light text-primary">Reset Your Password</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th scope="col">Login / User ID: </th>
                <td><?php echo $row['user_id'];?></td>
            </tr>
            <tr>
                <th scope="col">User Name: </th>
                <td><?php echo $row['name'];?></td>
            </tr>
            <tr>
                <th scope="col">Enter New Password: </th>
                <td><input type="password" class="form-control" name="pass" placeholder="Enter New Password" required value="" /></td>
            </tr>
            <tr class="">
                <th scope="row" colspan="2"><input name="submit" class="btn btn-outline-success" type="submit" value="Update Password" /></th>
            </tr>
        </tbody>
        </table>
    </form>
  </div>
</section>

<!-- <div>
  <form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<table width="600" align="center">
<tr>
<td align="left">Login ID :</td><td><?php echo $row['user_id'];?></td>
</tr>
<tr>
<td align="left" height="40">User Name :</td><td><?php echo $row['name'];?></td>
</tr>
<tr>
<td align="left">New Password :</td><td><input type="password" class="tb1" name="pass" placeholder="Enter New Password" required value="" /></td>
</tr>
<tr>
<td></td><td><input name="submit" class="tb3" type="submit" value="Update" /></td>
</tr>
</table>
</form>
</div> -->
<?php } ?>

<br />
</div>
</body>
</html>
