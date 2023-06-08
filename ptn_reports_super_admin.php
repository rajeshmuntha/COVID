<?php
include "header_super_admin.php";
include "conn.php";
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: ptn_login.php");
}
?>
<style type="text/css">
 
.tb3 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria";
    outline:0; 
    height:30px; 
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
<table width="1000" border='0' align="center">
        <tr>
          <td align="center"><strong>PATIENT REPORTS</strong></td>        
        <tr>
        	<td align="right">
           <form action="ptn_reports_super_admin_res.php? = Results" method="post" >
               Patient Uniq ID No: 
                 <input type="text" class="tb3" name="validation" placeholder="Enter Uniq ID">
                <input type="submit" class="tb2" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>
			 
				</td>
		  </tr>
		  
		</table>
		
