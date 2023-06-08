<?php
include "conn.php";
include_once "left_menu.php";

?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
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
<?php
include_once "header_super_admin.php";
include_once "time.php";
?>

<style>
#des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 1000px;
   }

#des td {
  border: 1px solid #09F;
  padding: 2px;
  font-size: 14px;
 }

#des tr:nth-child(even){background-color: #f2f2f2;}

/*#des tr:hover {background-color: #ddd;}*/

#des th {
  padding-top: 12px;
  padding-bottom: 10px;
  text-align: center;
  background-color: #3db2e1;
  color: white;
  font-size: 16px;
}
</style>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<table width="837" height="65" border="1" align="center" id='des'>
<thead class="alert-success">
  <tr>
    <th colspan="6" align="center"><strong>Employee Queries</strong></th>
  </tr>
  <tr>
    <th width="54"><strong>SL.NO</strong></th>
    <th width="115">User ID</th>
    <th width="500"><strong>Query Type</strong></th>
    <th width="150"><strong>Request Date</strong></th>
    <th>Status</th>
    <th>Resolve</th>
  </tr>
  </thead>
<?php
$i=1;
$query=mysqli_query($conn,"select * from messages ORDER by id desc");
						while($row_q=mysqli_fetch_array($query))
                        {
						
?>




  <tr>
 	 <td align="center"><?php echo $i;?></td>
 	 <td><?php echo $row_q["author"];?></td>
  	<td><?php echo $row_q["msg"];?></td>
	<td><?php echo $row_q["date"];
	
	//}
	
	?></td>
	<td><?php //echo $row_q["msg"];
	switch($row_q["status"])
	
	{
		case 0: echo"PENDING";
		break;
		case 1: echo"<p style='color:red'>SOLVE";
		break;
	}
	
	
	?></td>
	<td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $row_q['id']?>"><span class="glyphicon glyphicon-edit"></span> UP</button></td>
    <?php
					
					include 'query_update.php';
					$i++;
					}
				?>
  </tr>
  <script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
  
</table>
