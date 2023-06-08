<?php
include_once("header_super_admin.php");
include_once("conn.php");
?>

<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
<?php  
 $query = "SELECT * FROM patient ORDER BY id desc";  
 $result = mysqli_query($conn, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
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
      <body>  
            
                <form action="" method="POST">
                <table width="900" class="super-admin-panel-wise-data">
                <tr>
                    <td> <input type="date" name="from_date" id="from_date" class="tb1" placeholder="From Date" required/> </td>
                    <td> <input type="date" name="to_date" id="to_date" class="tb1" placeholder="To Date" required/> </td>
                    <td><input type="submit" class="tb1" name="submit" value="Generate Report"> </td> 
                  </tr>
                
                </table>
                </form> 
                             
                <br />  
                  
           </body>  
 </html>  
 
<table align="center">
<tr>
<td>
<div id="div1">
<style>
#tb {
  font-family: "cambria";
  border-collapse: collapse;
  width: 900px;
}

#tb td {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 14px;
}

#tb tr:nth-child(even){background-color: #f2f2f2;}

/*#tb tr:hover {background-color: #ddd;}*/

#tb th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #3db2e1;
  color: white;
  font-size: 16px;
}
</style>
<?php  
  $i=1;
  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {   
     $output = '';  
      $query = " 
           SELECT * FROM patient  
           WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_mode = '4' group by p_id";  
      $result = mysqli_query($conn, $query);  
     ?>
       		    
              
            <br>
           <table align="center" id="tb" border='1'> 
           <tr>
            <td colspan='9' align="center"><strong>PANEL WISE REPORTS </strong>
            </td> 
            <tr>
            <td colspan='9'>Test Results Duration : <?php echo $_POST["from_date"].' to '.$_POST["to_date"]; ?>
            </td>
             </tr>
                <tr>  
                     <th width="20" align="center">SL.NO</th>  
                     <th width="100" align="center">Test Location</th>  
                     <th width="100" align="center">rT-PCR</th>  
                     <th width="100" align="center">RTK-Antigen</th> 
                     <th width="100" align="center">RTK-Antigen<br>(PERKESO)</th>  
                     <th width="100" align="center">Antibody <br>IGM/IGG</th>
                     <th width="100" align="center">Rapid PCR <br>/Molecular</th>
                     <th width="100" align="center">SALIVA PCR</th>
					 <th width="100" align="center">Total <br>Registrations</th>  
                </tr>  
      <?php 
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
             ?>
               <tr>
               		<td><?php echo $i; ?> </td>
                    <td><?php //echo $row["p_id"]; 
					$panel = mysqli_query($conn, "SELECT * FROM panel WHERE p_id = '".$row["p_id"]."' ");
					  while ($p_name = mysqli_fetch_array($panel)) 
						{
							echo $p_name['mode'];
													
						}
					
					
					?> </td>
                    <td align="center"><?php 
			  //$sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_mode = '4' AND t_type = '1'");
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '1'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t1 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '2'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t2 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '3'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t3 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '4'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t4 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
               <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '5'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t5 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
               <td align="center"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$row["p_id"]."' AND t_type = '6'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(t_type)'];
							$t6 = $row1['COUNT(t_type)'];
							
						}
			   ?> </td>
                    <td align="center"><?php 
					
					$total = $t1 + $t2 + $t3 + $t4 + $t5 + $t6;
					echo $total; ?> </td>
					
			    </tr>
               
               <?php
			  $i++;
           }  
		   
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="9"><center>No Patient Records Found</center></td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 } 
  
 ?>
  </div>
 </td>
 </tr>
  <tr>
 <td>
 <button onClick="printContent('div1')"><img src="img/print.png" width="20" height="20" /></button></div>
 </td>
 </tr>
 </table>
 