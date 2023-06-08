<?php
include_once("header_doctor.php");
include_once("conn.php");
include_once "left_menu_doctor.php";
error_reporting( error_reporting() & ~E_NOTICE )
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>
<?php
$auth = $_SESSION['user_id'];
//echo $auth;
?>
<!DOCTYPE html>
<html>

<head>
<script src="jquery-3.2.1.min.js"></script>
 
<style>
#des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 1000px;
   }

#des td {
  border: 1px solid #09F;
  padding: 6px;
  font-size: 14px;
 }

#des tr:nth-child(even){background-color: #f2f2f2;}

/*#des tr:hover {background-color: #ddd;}*/

#des th {
  padding-top: 16px;
  padding-bottom: 10px;
  text-align: left;
  background-color: #3db2e1;
  color: white;
  font-size: 16px;
}
</style>

<style type="text/css">
 
.tb1 {
	
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 1px; 
    border: 1.5px solid #3db2e1; 
	font-family: "Cambria";
    outline:0; 
    height:30px; 
    
}
.tb2 {
	-webkit-border-radius: 1px; 
    -moz-border-radius: 1px; 
    border-radius: 1px; 
    border: 1.5px solid #3db2e1; 
	font-family: "Cambria", Courier, monospace;
    outline:0; 
    height:30px; 
    width: 50px; 
}
</style>
</head>
    <div class="outer-scontainer">
        <div class="row" align='center'>
        <table width="1000">
        <tr>
          <td align="center"><strong>PATIENT RECORDS</strong></td>        
        <tr>
        	<td align="right">
           <form action="" method="post" >
               Patient IC/Passport No: 
                 <input type="text" class="tb1" name="icno" placeholder="Enter IC/Passport No..">
                <input type="submit" class="tb2" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>
               <?php
			   $i=1;
			   $icno = $_POST['icno'];
			   $sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno like '%".$icno."%' AND id NOT IN (select r_id from results) AND status = '1' ");
			//$sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno = $icno group by icno LIMIT 10");
               ?>
               
            <table align='center' border="1" id="des" width="1000">
            <thead>
                <tr>
                	<th width='30'>S.No</th>
                    <th width='100'>IC/Passport No</th>
                    <th width='250'>Patient Name</th>
                    <th width='120'>Test Location</th>
                    <th width='120'>Test Obtained</th>
					<th width='120'>DOT</th>
                    <th width='100'>Result Status</th>
					<th width='70'>Confirm</th>
                    
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
				
               <td><?php  echo $row['t_location']; ?></td>
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
                            case 5: echo"Rapid PCR/Molecular";
                            break;
                            case 6: echo"SALIVA PCR";
                            break;
                            case 7: echo"INFLUENZA A & B ";
                            break;

                    }
                    
              ?>
               
			   <td align="center"><?php  echo $row['reg_date']; ?></td>
                    <td><?php  //echo $row['absent']; 
					switch($row['status'])
					{
						case 0: echo "<font color='green'>ATTENDED</font>";
								break;
						case 1: echo "<font color='red'>PENDING</font>";
								break;
					}
					
					?></td>
                   <td align="center"><a href="patient_results.php?id=<?php echo $row["id"]; ?>"><button><img src="img/correct.gif" width="20" height="20"></button></td>
                </tr>
                    <?php
					$i++;
                }
                ?>
                </tbody>
        </table>
        
    </div>

</body>

</html>