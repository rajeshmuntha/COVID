<?php
include_once("header_super_admin.php");
include_once("conn.php");
?> 
<?php
	                   
						$id =$_REQUEST['id'];
						$res=mysqli_query($conn,"select * from patient where id = '".$id."'");
                        while($row=mysqli_fetch_array($res))
                        {
                        //echo $row["user_id"]; 
						break;
						} 
	   			?>
                <?php

$date = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<!--<link rel="stylesheet" href="css/style1.css" />-->
</head>
<body>
<div class="form">
<style type="text/css">

.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 2px; 
    border: 1.5px solid #3db2e1; 
    outline:0; 
    height:30px; 
    width: 200px; 
	font-family: "Cambria";
}
.tb2 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 2px; 
    border: 1.5px solid #3db2e1; 
    outline:0; 
    height:30px; 
    width: 170px; 
	font-family: "Courier New", Courier, monospace;
}
.tb3 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 2px; 
    border: 1.5px solid #3db2e1; 
    outline:0; 
    height:30px; 
    width: 70px; 
	font-family: "Courier New", Courier, monospace;
}
</style>
<p>
<?php
ob_start();
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id =$_REQUEST['id'];
$reg_date = $_REQUEST['reg_date'];
$status = $_REQUEST['status'];
$update="update patient set reg_date='".$reg_date."',status='".$status."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Updated Successfully. </br></br>";
echo "<center>Subject Name: ".$row['name']." <p style='color:#006600;'>".$status."</center>";

//header('Refresh: 2; URL=subject_list.php');

 echo '<script type="text/javascript">
				location.replace("patient_data_level_II_super_admin.php");
			  </script>';
}else {

?>
</p>
<div>
  <form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<table width="600" align="center">
<tr>
<td align="right">IC/NO :</td><td><?php //echo $row['year'];
$res5=mysqli_query($conn,"select * from patient where id = '".$row['id']."'");
								while($row5=mysqli_fetch_array($res5))
								{
								echo $row5["icno"]; 
								}

?></td>
</tr>
<tr>
<tr>
<td align="right">Name :</td><td><?php echo $row['f_name'].''.$row['l_name'];?></td>



</tr>
<tr>
<tr>
<td align="right">Date of Registration :</td><td><?php echo $row['time'];?></td>
</tr>
<tr>
  <td align="right">Date of Conform:</td>
  <td><input type="date" class="tb1" name="reg_date" required/></td>
</tr>
<tr>
  <td align="right"></td>
</tr>
<td align="right">Kit Raising :</td>
  
  <td>
  <select name="status" class="tb2" required/>
                      <option value="">Select</option>
                      <option value="1">Kit Approved</option>
  </select>          
  </td>
</tr>
<tr>
<td></td><td><input name="submit" class="tb3" type="submit" value="Update" /></td>
</tr>
</table>
</form>
<?php } ?>

<br />
</div>
</div>
</body>
</html>
