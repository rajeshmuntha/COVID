<?php
include_once "header_admin.php";
include "conn.php";
include_once "left_menu_admin.php";
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>

<?php
//session_start();
$auth = $_SESSION['user_id'];
$res=mysqli_query($conn,"select * from authenticate where user_id='".$auth."'");
						while($row=mysqli_fetch_array($res))
                        {
						$emp_id = $row["user_id"];
						$emp_name = $row["name"];
						$emp_des = $row["dgn"];
						$emp_type = $row["role"];
						
						}
?>
<br>
<style>
#des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 800px;
   }

#des td {
  border: 1px solid #09F;
  padding: 9px;
  font-size: 14px;
 }

#des tr:nth-child(even){background-color: #f2f2f2;}

/*#des tr:hover {background-color: #ddd;}*/

#des th {
  padding-top: 16px;
  padding-bottom: 10px;
  text-align: center;
  background-color: #3db2e1;
  color: white;
  font-size: 16px;
}
</style>
<table width="800" border="1" id='des' align="center" bgcolor="#FFFFFF">

  <tr>
    <td height="44" colspan="3" align="center" valign="middle"><strong>Welcome to Employee Dashboard</strong></td>
  </tr>
  <tr>
    <td rowspan="5" width="175">
	<center>
	<?php
			  echo "<img src='img/staff_pics/".$emp_id.".jpg' width='100' height='150'>"."";
			  ?>
			  
			  </center></td>       
    <td height="44"width="200">User ID</td>
    <td>: <?php echo $emp_id;?></td>
  </tr>
  <tr>
    <td height="41">Eployee Name</td>
    <td>: <?php echo $emp_name;?></td>
  </tr>
  <tr>
    <td height="40">Designation</td>
    <td>: <?php echo $emp_des;?></td>
  </tr>
  <tr>
    <td height="46">User Type</td>
    <td>: <?php //echo $emp_type;
	switch($emp_type)
	{
		case 1: echo"Super Admin";
		break;
		case 2: echo"Admin";
		break;
		case 3: echo"Doctor";
		break;
		case 4: echo"Employee-I";
		break;
		case 5: echo"Employee-II";
		break;
	}
	
	
	
	?></td>
  </tr>
 
</table>
