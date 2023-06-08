<?php
include_once("header_super_admin.php");
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
        
        
           <form action="report_super_admin_staff_wise_res.php? = Results" method="post" >
           <table width='800' border='0' align="center">
           <tr>
             <td colspan="5" align="center"><b>Employe Wise Reports</b></td>
             <tr>
               <td width="150" align="left">Report Date</td>
               <td width="150" align="left"><input type ="date" name="reg_date" class="tb1" required></td>
               <td width="150" align="left">Select Staff</td>
               <td width="180" align="left"><select name="author" class="tb1" required="">
                 <option selected>Select</option>
                 <?php
					   $type = mysqli_query($conn, "SELECT * FROM patient group by author order by t_type ASC");
					    while ($row = mysqli_fetch_array($type)) 
						{
						
					  ?>
                 <option value="<?php echo $row['author'];	?>">
                   <?php //echo $row['t_type'];
					  $sql = mysqli_query($conn, "SELECT * FROM authenticate where user_id = '".$row['author']."' AND status ='1'");
					  while ($row1 = mysqli_fetch_array($sql)) 
						{
							echo $row1['name'];
						}
					  
					  	}?>
                 </option>
                 <!--   <option value="1">rT-PCR</option>
                      <option value="2">RTK-Antigen</option>
                      <option value="3">RTK-Antigen(PERKESO)</option>
                      <option value="4">Antibody IGM/IGG</option> !-->
               </select></td>
               <td width="118" align="left"><input type="submit" class="tb2" name="submit" value="Search"></td>
             </table>
           </form>
       <div id="div1">
              
  </div>

</body>

</html>