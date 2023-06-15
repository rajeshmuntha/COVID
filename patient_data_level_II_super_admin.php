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
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> 

</head>
<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    <div class="outer-scontainer">
    <section class="pt-4 ">
  <div class="container p-4 table-responsive shadow-lg rounded rounded-4">
        <table class="table table-bordered table-hover">
        <tr>
          <td align="center" class="bg-light text-primary fs-4"><strong>Patient Records</strong></td>        
        <tr>
        	<td align="right">
           <form action="patient_data_level_II_super_admin_res.php? = Results" method="post" >
               Patient IC/Passport No: 
                 <input type="text" class="tb1" name="icno" placeholder="Enter IC/Passport No..">
                <input type="submit" class="btn btn-secondary" name="submit" value="Search">
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
             
            <table id="des" class="table table-bordered table-hover text-center align-middle mt-3 animate__animated animate__bounceInDown">
            <thead align='center'>
                <tr>
                	<th class="align-middle bg-light" width='40'>No.</th>
                    <th class="align-middle bg-light" width='100'>IC/Passport No.</th>
                    <th class="align-middle bg-light" width='280'>Patient Name</th>
                    <th class="align-middle bg-light" width='100'>Test Obtained</th>
                    <th class="align-middle bg-light" width='80'>Reg. No.</th>
                    <th class="align-middle bg-light" width='100'>Test Location</th>
                    <th class="align-middle bg-light" width='80'>DOR</th>
					<th class="align-middle bg-light" width="80">Kit Status</th>
                    <th class="align-middle bg-light" width='60'>Issue Kit</th>
                    
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
                            case 7: echo"Influenza A & B";
                            break;
                    }
                  ?>
               	
               </td>
                <td><?php  echo $row['validation']; ?></td>
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
                   <td><a href="kit_issue_super_admin.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-outline-success">Approve</button></td>
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