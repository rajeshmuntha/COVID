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
<?php
$auth = $_SESSION["user_id"];
if($auth =='')
{
echo '<script type="text/javascript">
location.replace("logout.php? = Invalid Login");
 </script>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
<script src="jquery-3.2.1.min.js"></script>
 
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>


<header>
            <nav class="navbar navbar-expand-md fixed-top bg-body-tertiary shadow">
                <div class="container-fluid">
                    <a class="navbar-brand" href="admin_level.php? = Admin Home Page">
                    <img src="./img/Logo.png" alt="Logo" width="45" height="auto" class="d-inline-block">
                    <span class="fw-bold fs-4 text-danger">COV-19</span><span class="fw-bold fs-4 text-primary"> SYS</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="admin_level.php? = Admin Home Page">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="new_staff.php? = New Patient Creation">Staff</a>
                            </li>
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="new_patient_admin.php? = Patient Creation">Add New Patient</a></li>
                                <li><a class="dropdown-item active" href="patient_data_level_admin.php? = Patient Details">Patient Details</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="patient_data_level_II_admin.php? = Patient Details">Issue Kit</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="ptn_reports_admin.php? = Patient Reports">Test Results</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="report_admin_day_wise.php? = Patient Reports Admin">Test Wise</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="reports_panel_admin.php? = Panel Reports Super Admin">Invoice</a></li>
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
                                <li><a class="dropdown-item" href="reset_admin.php?=Passwor Reset">Change Password</a></li>
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
    <div style="margin-top: 120px;" class="outer-scontainer">
    <section class="container">
    <nav aria-label="breadcrumb mb-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="patient_data_level_admin.php?id=<?php echo $row["id"]; ?>">Total Patient Records</a></li>
    <li class="breadcrumb-item active" aria-current="page">Searched Patient Record</li>
  </ol>
</nav>

  <div class="container mt-3 p-4 table-responsive shadow-lg rounded rounded-4">
        <table class="table table-bordered">
        <tr>
          <td class="text-center bg-light text-primary fs-4"><strong>PATIENT RECORDS &nbsp; <i class="bi bi-file-earmark-text-fill"></i></strong></td>        
        <tr>
        	<td align="right">
           <form action="" method="post" >
               Patient IC/Passport No: 
                 <input type="text" class="tb1" name="icno" placeholder="Enter IC/Passport No." required/>
                <input type="submit" class="btn btn-outline-secondary" name="submit" value="Search">
            </form>
            </td>
        <tr>
        </table>

               <?php
			   $i=1;
			   $icno = $_POST['icno'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno like '%".$icno."%' order by id desc LIMIT 15");
			//$sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno = $icno group by icno LIMIT 10");
               ?>
               
            <div class="animate__animated animate__bounceInDown">   
            <table id="des" class="table table-bordered table-hover align-middle text-center mt-3">
            <thead>
                <tr>
                    <th class="bg-light align-middle" width='20'>S.No</th>
                    <th class="bg-light align-middle" width='90'>IC/Passport No</th>
                    <th class="bg-light align-middle" width='280'>Patient Name</th>
                    <th class="bg-light align-middle" width='90'>Test Type</th>
                    <th class="bg-light align-middle" width='80'>Reg. No.</th>
                    <th class="bg-light align-middle" width='100'>Test Location</th>
                    <th class="bg-light align-middle" width="140">DOR</th>
                    <th class="bg-light align-middle" width='40'>Details</th>
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
                    <td><?php  echo $row['time'];?></td>
                                        
                   <td><a href="patient_view.php?id=<?php echo $row["id"]; ?>" target="_blank"><button class="btn btn-outline-light"><img src="img/correct1.gif" width="30" height="auto"></button></td>
                </tr>
                    <?php
                    $i++;
                }
                ?>
                </tbody>
        </table>
        </div>
        <?php //} ?>
            </section>
      </div>

</body>

</html>