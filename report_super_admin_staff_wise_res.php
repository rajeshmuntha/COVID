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
        
        
           <form action="" method="post" >
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
               <?php
			   $i=1;
			   $date = $_POST['reg_date'];

               $type = $_POST['author'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM patient where reg_date = '".$date."' AND author = '".$type."'");
			//$sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno = $icno group by icno LIMIT 10");
               ?>
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
          <table align='center' border="1" id="des" width="900">
            <thead>
                <tr>
                	<th width='50'>Sl.No</th>
                    <th width='100'>ICNO</th>
                    <th width='450'>Patient Name</th>
                    <th width='130'>Test Type</th>
                   <th width='160'>Reg.Date</th>
					<!-- <th width="100">Kit Approved</th>
                     <th width='40'>Details</th>!-->
                    
                </tr>
            </thead>
<?php
                
                while ($row = mysqli_fetch_array($sqlSelect)) {
                    ?>
                    
                <tbody>
                <tr>
                <td><?php  echo $i; ?></td>
                <td><?php  echo strtoupper($row['icno']); ?></td>
                <td><?php  echo $row['f_name']. '&nbsp;'.$row['l_name'];?></td>
				
               <td><?php  //echo $row['t_type']; 
                    switch($row['t_type'])
                    {
                            
                            case 1: echo"rT-PCR";
                            break;
                            case 2: echo"RTK-Antigen";
                            break;
                            case 3: echo"RTK-Antigen(PERKESO)";
                            break;
                            case 4: echo"Antibody IGM/IGG";
                            break;

                    }
                    




               ?></td>
                  <td><?php  echo strtoupper($row['time']); ?></td>  
                   
                </tr>
                    <?php
					$i++;
                }
                ?>
                </tbody>
        </table>
  <table width="800" border="0" align="center">
            <tr>
              <td width="149">Total Records :</td>
              <td width="217"><?php 
			  $sql_r = mysqli_query($conn, "SELECT COUNT(*) FROM patient where reg_date = '".$date."' AND author = '".$type."'");
					  while ($row1 = mysqli_fetch_array($sql_r)) 
						{
							echo $row1['COUNT(*)'];
						}
			   ?></td>
              <td width="412">&nbsp;</td>
            </tr>
  </table>
  </div>
  <table width="800" border="0">
            <tr>
              <td align="center"><button onClick="printContent('div1')"><img src="img/print.png" width="20" height="20" /></button></div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>

</body>

</html>