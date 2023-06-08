<?php
include_once("header_level-II.php");
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
<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    <div class="outer-scontainer">
        <div class="row" align='center'>
        <table width="1100">
        <tr>
          <td align="center"><strong>PATIENT RECORDS</strong></td>        
        <tr>
        	<td align="right">
           <form action="patient_data_level_II_res.php? = Results" method="post" >
               Patient IC/Passport No: 
                 <input type="text" class="tb1" name="icno" placeholder="Enter IC/Passport No..">
                <input type="submit" class="tb2" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>
               <?php
			   $i=1;
			   //$icno = $_POST['icno'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM patient where status ='0' order by id desc LIMIT 2000");
			//$sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno = $icno group by icno LIMIT 10");
               ?>
   <style>
#des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 1100px;
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
            <table align='center' id="des" border="1" width="1200">
            <thead align='center'>
                <tr>
                	<th width='40'>No.</th>
                    <th width='100'>IC/Passport No.</th>
                    <th width='300'>Patient Name</th>
                    <th width='100'>Reg. No.</th>
                    <th width='100'>Test Obtained</th>
                    <th width='100'>Test Location</th>
                    <th width='90'>DOR</th>
                    <th width="80">Kit Status</th>
                    <th width='80'>Issue Kit</th>
                    
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
                <td><?php  echo $row['validation']; ?></td>
                <td><!--<?php  echo $row['t_type']; ?>--><?php  //echo $row['t_type']; 
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
                            case 5: echo"Rapid PCR";
                            break;
                            case 6: echo"Saliva PCR";
                            break;
                            case 7: echo"INFLUENZA A & B ";
                            break;

                    }
                    




               ?>
               	
               </td>
                    <td><?php  echo $row['t_location']; ?></td>
                    <td><?php  echo $row['sys_date']; ?></td>
                    <td><?php  
					switch($row['status'])
					{
						case 0: echo "<font color='red'>PENDING</font>";
								break;
						case 1: echo "<font color='green'>ATTENDED</font>";
								break;
					}
					
					?></td>
                   <td><a href="kit_issue.php?id=<?php echo $row["id"]; ?>"><button><img src="img/correct.gif" width="20" height="20"></button></td>
                </tr>
                    <?php
					$i++;
                }
                ?>
                </tbody>
        </table>
        <?php //} ?>
    </div>

</body>

</html>