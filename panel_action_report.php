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
      </head>  
      <body>  
            
                <form action="panel_action_report.php? = Panel Reports" method="POST">
                <table width="900" align="center">
                <tr>
                    <td><select name="p_id" class="tb1" required=""/>
                 <option value="#">Select Panel</option>
                 <?php
					   $type = mysqli_query($conn, "SELECT * FROM panel where process_id='4'");
					    while ($row = mysqli_fetch_array($type)) 
						{
						
					  ?>
                 <option value="<?php echo $row['p_id'];?>"><?php echo $row['mode'];}?>             
				 </option></select>	
                    </td>
                    <td> <input type="date" name="from_date" id="from_date" class="tb1" placeholder="From Date" required/> 
                    </td>
                    <td> <input type="date" name="to_date" id="to_date" class="tb1" placeholder="To Date" required/> 
                    </td>
                    <td><input type="submit" class="tb1" name="submit" value="Generate Invoice">  
                    </td>
                   <td>
                   </td>
                </tr>
                
                </table>
                </form> 
                             
                <br />  
                  
           </div>  
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
  font-size: 12px;
}

#tb tr:nth-child(even){background-color: #f2f2f2;}

/*#tb tr:hover {background-color: #ddd;}*/

#tb th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #3db2e1;
  color: white;
  font-size: 12px;
}
</style>
<?php  
  $i=1;
 if(isset($_POST["from_date"], $_POST["to_date"], $_POST["p_id"]))  
 {   
     $output = '';  
      $query = " 
           SELECT * FROM patient  
           WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."'";  
      $result = mysqli_query($conn, $query);  
     ?>
       		    
              <table align="center" id="tb" border='1'>
              <tr>
            <td colspan="4" style="text-align:left; color:blue; font-size:100%;"><strong>SP CARE GROUP<span style="float:right;">INVOICE
        </strong>
            </td>
            </tr> 
            <tr>
            <td> 2A-1,7,JALAN RAWANG MUTIARA 3,RAWANG MUTIARA BUSINESS CENTER</td>
            
            <td width="150" rowspan="4" align="center"><img src="img/Sp-cov-19-logo care.png" width="100" height="100"></td>
            </td></tr>
            <tr>
            <td> 48000 RAWANG, SELANGOR, MALAYSIA</td>
            </tr>
            <tr>
            <td> TEL: 03-6091 7753 FAX: 03-6093 7753 hello@spcaregroup.com</td>
            </tr>
            <tr>
            <td style="text-align:left; color:blue; font-size:100%;"><strong> BILL TO</strong></td>
            </tr>
            <tr>
            <?php 
			  $panel = mysqli_query($conn, "SELECT * FROM panel WHERE p_id = '".$_POST["p_id"]."'");
					  while ($row1 = mysqli_fetch_array($panel)) 
						{
							$name = $row1['mode'];
							$address = $row1['address'];
							$street = $row1['street'];
							$contact = $row1['contact'];
							
						}
			   ?>
            
            
            
            <td colspan="4" style="text-align:left;"> NAME : <?php echo $name;?><span style="float:right;">Bill Date:<?php echo date("Y.m.d");?></td>
            </tr>
            <tr>
            <?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(*) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							$total = $row1['COUNT(*)'];
							
						}
			   ?>
            <?php 
					$t_sql1 = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."' AND t_type ='1'");
					  while ($row1 = mysqli_fetch_array($t_sql1)) 
						{
							$total1 = $row1['COUNT(t_type)'];
							$no1 = $total1;
						}
						$t_sql2 = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."' AND t_type ='2'");
					  while ($row2 = mysqli_fetch_array($t_sql2)) 
						{
							$total2 = $row2['COUNT(t_type)'];
							$no2 = $total2;
						}
						$t_sql3 = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."' AND t_type ='3'");
					  while ($row3 = mysqli_fetch_array($t_sql3)) 
						{
							$total3 = $row3['COUNT(t_type)'];
							$no3 = $total3;
						}
						$t_sql4 = mysqli_query($conn, "SELECT COUNT(t_type) FROM patient WHERE reg_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND p_id = '".$_POST["p_id"]."' AND t_type ='4'");
					  while ($row4 = mysqli_fetch_array($t_sql4)) 
						{
							$total4 = $row4['COUNT(t_type)'];
							$no4 = $total4;
						}
												
					?>
          <?php
		  			$cost1 = mysqli_query($conn, "SELECT * FROM test_cost WHERE p_id = '".$_POST["p_id"]."' AND test_id = '1'");
					  while ($c_row1 = mysqli_fetch_array($cost1)) 
						{
							$p_cost1 = $c_row1['cost'];
							$t_cost1 = $p_cost1;
						}
						$cost2 = mysqli_query($conn, "SELECT * FROM test_cost WHERE p_id = '".$_POST["p_id"]."' AND test_id = '2'");
					  while ($c_row2 = mysqli_fetch_array($cost2)) 
						{
							$p_cost2 = $c_row2['cost'];
							$t_cost2 = $p_cost2;
						}
						$cost3 = mysqli_query($conn, "SELECT * FROM test_cost WHERE p_id = '".$_POST["p_id"]."' AND test_id = '3'");
					  while ($c_row3 = mysqli_fetch_array($cost3)) 
						{
							$p_cost3 = $c_row3['cost'];
							$t_cost3 = $p_cost3;
						}
						$cost4 = mysqli_query($conn, "SELECT * FROM test_cost WHERE p_id = '".$_POST["p_id"]."' AND test_id = '1'");
					  while ($c_row4 = mysqli_fetch_array($cost4)) 
						{
							$p_cost4 = $c_row4['cost'];
							$t_cost4 = $p_cost4;
						}
		  			$amount = ($no1* $t_cost1) + ($no2* $t_cost2) + ($no3* $t_cost3) + ($no4* $t_cost4);
		  ?>
            <td colspan="4"> ADDRESS : <?php echo $address.'-'.$street;?><span style="float:right;">Invoice :<?php echo $total.'0'.$amount?></td>
            </tr>
            <tr>
            <td colspan="4"> PHONE : <?php echo $contact;?></td>
            </tr>
            <tr>
            <td colspan="4" style="text-align:center; color:blue; font-size:100%;"> DESCRIPTION</td>
            </tr>
            <tr>
            <td colspan="4"> <span style="float:right;">Invoice Duration : From date <?php echo $_POST["from_date"]?> - To date : <?php echo $_POST["to_date"]?>
           
            </td>
            </tr>
            <tr>
            
            <td colspan="4"> <span style="float:right;">Total no.of Patients registered : <?php echo $total; ?>
						  
            </td>
            </tr>
            <tr>
            <td colspan="4"> <span style="float:right;">Total amount to be caluculated : <?php echo $amount;?></td>       
            </tr>
            <tr>
            <td colspan="4">COMMENTS:</td>       
            </tr>
            <tr>
            <td colspan="4">1.Total Payment Due in 30 days. 2. Please include invoice number on your check. 3.Make all payments to SP CARE SDN. BHD.</td>       
            </tr>
            </tr>
            </table> 
            <br>
           <table align="center" id="tb" border='1'>  
                <tr>  
                     <th width="20">S.NO.</th>  
                     <th width="100">ICNO</th>  
                     <th width="150">NAME</th>  
                     <th width="50">GENDER</th> 
                     <th width="50">TEST OBTAINED</th>  
                     <th width="50">TEST COST</th>
					 <th width="50">DATE</th>  
                </tr>  
      <?php 
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
             ?>
               <tr>
               		<td><?php echo $i; ?> </td>
                    <td><?php echo $row['icno']; ?> </td>
                    <td><?php echo $row['f_name']; ?> </td>
                    <td><?php echo $row['gender']; ?> </td>
                    <td><?php 
					$mode = mysqli_query($conn, "SELECT * FROM test_type where id = '".$row["t_type"]."'");
					    while ($type = mysqli_fetch_array($mode)) 
						{
							echo $type["test_type"];
							$test_id = $type["id"];
						}
									
					?> </td>
                    <td><?php 
					$cost = mysqli_query($conn, "SELECT * FROM test_cost where p_id = '".$row["p_id"]."' AND test_id='".$test_id."'");
					    while ($t_cost = mysqli_fetch_array($cost)) 
						{
							echo $t_cost["cost"];
							
						}
						//echo sum($t_cost["cost"]);
					?> 
                    </td>
                    <td><?php echo $row['reg_date']; ?> </td>
					
			    </tr>
               
               <?php
			  $i++;
           }  
		   
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="7"><center>No Patient Records Found</center></td>  
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
 