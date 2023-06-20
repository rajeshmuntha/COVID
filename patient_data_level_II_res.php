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
<head>
    <!-- Google Fonts cdn -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="jquery-3.2.1.min.js"></script>
 

   
</head>
<body>

<header>
            <nav class="navbar navbar-expand-md  bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="employee_2.php? = Staff Home Page">
                    <img src="./img/Logo.png" alt="Logo" width="45" height="auto" class="d-inline-block">
                    <span class="fw-bold fs-4 text-danger">COV-19</span><span class="fw-bold fs-4 text-primary"> SYS</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="employee_2.php? = Staff Home Page">Home</a>
                            </li>
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sample Kit
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item active" href="patient_data_level_II.php? = Patient Details">Issue Kit</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="update_level_II.php? = Update Patient Details">Update / Edit</a></li>
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="report_emp2_day_wise.php? = Day Wise Reports SP Care">Reports</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="queries_employee_2.php? = Emplyee Queries">Reg. Queries</a>
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
                                <li><a class="dropdown-item" href="reset_emp2.php?=Passwor Reset">Change Password</a></li>
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
<section class="pt-5 mt-5">
  <div class="container p-4 shadow-lg rounded rounded-4">
        <?php
			$i=1;
			$icno = $_POST['icno'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM patient where icno like '%".$icno."%' AND status ='0' order by id desc LIMIT 20");
			?>
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th colspan="9" class="bg-light fs-4 fw-bold text-center text-primary">
                        PATIENT RECORDS <i class="bi bi-file-medical"></i>
                    </th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td colspan="9">
                        
        <form action="patient_data_level_II_res.php? = Record search data" method="post" >
            <div class="float-end py-4">
                <span class="fw-bold">Patient IC/Passport No: </span>
                <input type="text" class="" name="icno" placeholder="Enter Uniq ID" required/>
                <input type="submit" class="btn btn-outline-secondary btn-sm" name="submit" value="Get Details">
            </div>
        </form>
                    </td>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th class="bg-light" scope="row"">Sl No.</th>
                    <th class="bg-light">IC/Passport No</th>
                    <th class="bg-light">Patient Name</th>
                    <th class="bg-light">Reg. No.</th>
                    <th class="bg-light">Test Type</th>
                    <th class="bg-light">Test Location</th>
                    <th class="bg-light">DOR</th>
                    <th class="bg-light">Kit Status</th>
                    <th class="bg-light">Approve Kit</th>
                </tr>
            </thead>
            <?php
                while ($row = mysqli_fetch_array($sqlSelect)) {
                ?>
            <tbody>
                <tr class="text-center">
                    <td><?php  echo $i; ?></td>
                    <td><?php  echo strtoupper($row['icno']); ?></td>
                    <td><?php  echo $row['f_name']. '&nbsp;'.$row['l_name'];?></td>
                    <td><?php  echo $row['validation']; ?></td>
                    <td><!--<?php  echo $row['t_type']; ?>--><?php  //echo $row['t_type']; 
                        switch($row['t_type']){
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
                    ?></td>
                    <td><?php  echo $row['t_location']; ?></td>
                    <td><?php  echo $row['time'];?></td>
                    <td><?php  
                        switch($row['status'])
                        {
                            case 0: echo "<font color='red'>PENDING</font>";
                                    break;
                            case 1: echo "<font color='green'>ATTENDED</font>";
                                    break;
                        }					
                        ?>
                    </td>
                    <td><a href="kit_issue.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-outline-primary">Approve</button></td>
                </tr>
                    <?php
                        $i++;
                        } ?>
            </tbody>
        </table>
    </div>
  </div>
</section>

</body>

</html>