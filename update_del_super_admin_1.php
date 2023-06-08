<?php
include_once("header_super_admin.php");
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
 
</head>
<body>
<style type="text/css">
 
.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria";
    outline:0; 
    height:30px;
	
    
}
.tb2 {
	-webkit-border-radius: 1px; 
    -moz-border-radius: 1px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria", Courier, monospace;
    outline:0; 
    height:30px; 
    width: 50px; 
}
</style>
<style>
#customers {
  font-family: "cambria";
  border-collapse: collapse;
  width: 850px;
}

#customers td {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 14px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #3db2e1;
  color: white;
  font-size: 16px;
}
</style>
<style>
  #des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 900px;
   }

#des td {
  border: 1px solid #09F;
  padding: 6px;
  font-size: 14px;
 }

#des tr:nth-child(even){background-color: #f2f2f2;}

/*#des tr:hover {background-color: #ddd;}*/

#des th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: left;
  background-color: #3db2e1;
  color: white;
  font-size: 16px;
}
  </style>
<table width="850" align="center" class="ptn-details-update">
        <tr>
          <td align="center"><strong>PATIENT RECORDS UPDATE</strong></td>        
        <tr>
        	<td align="right">
           <form action="" method="post" >
               Patient IC/Passport No: 
                 <input type="text" class="tb1" class="tb1" name="icno" placeholder="Enter IC/Passport No.">
                <input type="submit" class="tb2" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>
<div class="table-data-scroll">
<table border="1" width="1000" id="des" align="center">
  <tr>
  <th width="30"><strong>S.NO</strong></th>
    <th width="80"><strong>ICNO.</strong></th>
    <th width="120"><strong>First Name</strong></th>
    <th width="100"><strong>Last Name</strong></th>
    <th width="90"><strong>DOB</strong></th>
    <th width="80"><strong>Reg. No.</strong></th>
    <th width="86"><strong>DOR</strong></th>
    <th width="40"><strong>TOT</strong></th>
    <th width="100"><strong>Test Location</strong></th>
    <th width="100"><strong>Reference</strong></th>
    <th width="27"><strong>Edit</strong></th>
    <th width="45"><strong>Delete</strong></th>
  </tr>

<?php

include "conn.php"; // Using database connection file here
$i=1;
$icno = $_POST['icno'];
$records = mysqli_query($conn,"select * from patient where icno like '%".$icno."%' limit 25"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
	$id = $data['id'];
?>
  <tr>
  
    <td><?php echo $i; ?></td>
    <td><?php echo $data['icno']; ?></td>
    <td><?php echo $data['f_name']; ?></td>
    <td><?php echo $data['l_name']; ?></td>
    <td><?php echo $data['dob']; ?></td>
    <td><?php echo $data['validation']; ?></td>
    <td><?php echo $data['sys_date']; ?></td>
    <td><?php echo $data['t_type']; ?></td>
    <td><?php echo $data['t_location']; ?></td>
    <td><?php echo $data['p_ref']; ?></td>   
    <td align="center"><a href="update_super_admin.php?id=<?php echo $data['id']; ?>"><img src="img/edit.png" width="25" height="25"></a></td>
    <td align="center"><a href="delete_super_admin.php?id=<?php echo $data['id']; ?> "onclick="return confirm('Delete Patient:<?php echo $data['icno']; ?>')"><button><img src="img/delete.png" width="15" height="15" /></button></a></td>
  </tr>	
<?php
$i++;
}

?>
</table>
</div>
</body>
</html>