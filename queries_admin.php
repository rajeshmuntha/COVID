<?php
include "conn.php";
include_once "left_menu_admin.php";
error_reporting( error_reporting() & ~E_NOTICE )
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
include_once "header_admin.php";
include_once "time.php";
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
<style>
#des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 1000px;
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
</style><table width="1184" height="65" border="1" align="center" id='des'>
  <tr>
    <th colspan="5" align="center"><strong>Employee Queries</strong></th>
  </tr>
  <tr>
    <td width="10"><strong>SL.NO</strong></td>
    <td width="600"><strong>Query Type</strong></td>
    <td width="180" align="center"><strong>Request Date</strong></td>
    <td width="180" align="center"><strong>Status</strong></td>
    <td width="180" align="center"><strong>Response Date</strong></td>
  </tr>
<?php
$i=1;
$query=mysqli_query($conn,"select * from messages where author='".$auth."' ORDER by id desc limit 25");
						while($row_q=mysqli_fetch_array($query))
                        {
							
						$mid = $row_q["id"];
?>


<br>

  <tr>
 	 <td width="10" align="center"><?php echo $i;?></td>
  	<td width="600"><?php echo $row_q["msg"];?></td>
	<td align="center"><?php echo $row_q["date"];?></td>
	<td align="center"><?php //echo $row_q["status"];
	switch($row_q["status"])
	{
		case 0 : echo 'PENDING';
		break;
		case 1 : echo 'SUCCESS';
		break;
	}
	
	?></td>
	<td align="center">
    				<?php

					$response=mysqli_query($conn,"select * from m_status where m_id='".$mid."'");
						while($res_q=mysqli_fetch_array($response))
                        {
									
								echo $res_q["date"];
														
						}
		$i++;
		}
						
?>
    
    </td>
  </tr>
</table>
