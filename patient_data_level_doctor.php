<?php
include_once("header_doctor.php");
include_once("conn.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>   
    <meta charset="UTF-8">    	   
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="jquery-3.2.1.min.js"></script>

</head>


<header>
            <nav class="navbar navbar-expand-md fixed-top bg-body-tertiary shadow">
                <div class="container-fluid">
                    <a class="navbar-brand" href="doctor.php? = Doctor Home Page">
                    <img src="./img/Logo.png" alt="Logo" width="45" height="auto" class="d-inline-block">
                    <span class="fw-bold fs-4 text-danger">COV-19</span><span class="fw-bold fs-4 text-primary"> SYS</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="doctor.php? = Doctor Home Page">Home</a>
                            </li>
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Test Results
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item active" href="patient_data_level_doctor.php? = Patient Details">Validate</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="report_doc_day_wise.php">Print Report</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <?php
                                session_start();
                                if(isset($_SESSION["user_id"]))
                                {
                                    if((time() - $_SESSION['last_time']) > 180000)
                                    {
                                      header("location:logout.php");
                                    }
                                    else
                                    {
                                      $_SESSION['last_time'] = time();
                                    }
                                  }
                                
                                  {
                                    echo "Hi..".$_SESSION['user_id']."";
                                  }
                              ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end animate__animated animate__flipInX">
                                <li><a class="dropdown-item " href="#">Update Profile</a></li>
                                <li><a class="dropdown-item" href="reset_doc.php?=Passwor Reset">Change Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
            </nav>
  </header>

<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
<section class="pt-5  animate__animated animate__fadeInRight">
  <div class="container mt-5 p-4 table-responsive shadow-lg rounded rounded-4">
    <table class=" table table-hover table-bordered rounded rounded-2 text-center align-middle">
        <tr>
          <th colspan="8" class="bg-light text-primary fs-4 text-center">VALIDATE  PATIENT RECORDS &nbsp; <i class="bi bi-file-earmark-text-fill"></i></th>        
        <tr>
        	<td colspan="8" align="right">
           <form action="patient_data_level_doctor_res.php? = Patient Records" method="post" >
               <label for="" class="fw-bold">Patient IC/Passport No:</label> 
                 <input type="text" class="tb1" name="icno" placeholder="Enter IC/Passport No..">
                <input type="submit" class="btn btn-outline-secondary" name="submit" value="Search">
            </form>
            </td>
        <tr>

                <tr>
                	<th class="bg-light">S.No</th>
                    <th class="bg-light">IC/Passport No</th>
                    <th class="bg-light">Patient Name</th>
                    <th class="bg-light">Test Location</th>
                    <th class="bg-light">Test Obtained</th>
					<th class="bg-light">DOT</th>
                    <th class="bg-light">Result Status</th>
					<th class="bg-light">Confirm</th>
                    
                </tr>
        
               <?php
			   $i=1;
			  
				$sqlSelect = mysqli_query($conn, "SELECT * FROM patient where id NOT IN (select r_id from results) AND status = '1' ");       
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
                   <td align="center"><a href="patient_results.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-outline-primary">Validate <i class="bi bi-patch-check"></i></button></td>
                </tr>
                    <?php
					$i++;
                
			   }
                ?>
                </tbody>
        </table>
        
    </div>
</section>

</body>

</html>