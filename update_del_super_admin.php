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
<table width="850" align="center" class="ptn-details-update">
        <tr>
          <td align="center"><strong>PATIENT RECORDS UPDATE</strong></td>        
        <tr>
        	<td align="right">
           <form action="update_del_super_admin_1.php? = Update Patient Record" method="post" >
               Patient IC/Passport No: 
                 <input type="text" class="tb1" class="tb1" name="icno" placeholder="Enter IC/Passport No.">
                <input type="submit" class="tb2" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>
