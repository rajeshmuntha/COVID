<?php
include_once("header_admin.php");
include_once("conn.php");
error_reporting( error_reporting() & ~E_NOTICE )
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
<script src="jquery-3.2.1.min.js"></script>
 

<style type="text/css">
 
.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #332b92; 
	font-family: "Cambria";
    outline:0; 
    height:30px; 
	width: 180px; 
    
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
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</head>
<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    <div class="outer-scontainer">
<div class="row" align='center'>
        
        
           <form action="report_admin_day_wise_res.php? = Results" method="post" >
           <table width='800' border='0'>
           <tr>
             <td colspan="5" align="center">Reports </td>
             <tr>
               <td width="140" align="left">Report Date</td>
               <td width="191" align="left"><input type ="date" name="reg_date" class="tb1" required></td>
               <td width="150" align="center">Test Type</td>
               <td align="center"><select name="t_type" class="tb1" required="">
                 <option selected>Type of Test</option>
                 <?php
					   $type = mysqli_query($conn, "SELECT * FROM patient group by t_type order by t_type ASC");
					    while ($row = mysqli_fetch_array($type)) 
						{
						
					  ?>
                 <option value="<?php echo $row['t_type'];	?>">
                   <?php //echo $row['t_type'];
					  $sql = mysqli_query($conn, "SELECT * FROM test_type where id = '".$row['t_type']."'");
					  while ($row1 = mysqli_fetch_array($sql)) 
						{
							echo $row1['test_type'];
						}
					  
					  	}?>
                 </option>
                 <!--   <option value="1">rT-PCR</option>
                      <option value="2">RTK-Antigen</option>
                      <option value="3">RTK-Antigen(PERKESO)</option>
                      <option value="4">Antibody IGM/IGG</option> !-->
               </select></td>
               <td align="left"><input type="submit" class="tb2" name="submit" value="Search"></td>
             <tr>
           <td width="140" align="left">&nbsp;</td>
           <td align="left">&nbsp;</td>
           <td width="128" align="left">&nbsp;</td>
           <td width="180" align="left">&nbsp;</td>
           <td width="139" align="left">&nbsp;</td>
             </table>
           </form>
      
</div>

</body>

</html>