<?php
include "conn.php";
include_once "header_level-II.php";
// include_once "left_menu_emp2.php";
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>

<?php

?>
<?php
//session_start();
$auth = $_SESSION['user_id'];
$res=mysqli_query($conn,"select * from authenticate where user_id='".$auth."'");
						while($row=mysqli_fetch_array($res))
                        {
						$emp_id = $row["user_id"];
						$emp_name = $row["name"];
						$emp_des = $row["dgn"];
						$emp_type = $row["role"];
						
						}
?>
<html lang="en">
	<head>
    <link rel="shortcut icon" type="image/icon" href="img/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>      
  <!-- Google Fonts cdn -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
      <!-- Bootstrap 5.3 cdn -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <!-- Bootstrap icons cdn -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>     
<style>
  * {box-sizing: border-box;}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  margin-bottom: 50px;
  right: 50px;
  border: 1px solid white;
  border-radius: 20px !important;
  z-index: 100;
}

/* Add styles to the form container */
.form-container {
  max-width: 450px;
  padding: 10px;
  background-color: #ddd;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 10px 0;
  border: none;
  background: #fff;
  resize: none;
  min-height: 20px;
  border-radius: 10px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ffece7;
  border: 1px solid maroon;
  outline: none;
}
</style>
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
                            <li class="nav-item animate__animated animate__bounceInDown">
                            <a class="nav-link active" aria-current="page" href="employee_2.php? = Staff Home Page">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sample Kit
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="patient_data_level_II.php? = Patient Details">Issue Kit</a></li>
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

<section class="pt-4  animate__animated animate__backInRight">
  <div class="container p-4 table-responsive shadow-lg rounded rounded-4">
    <table class=" table table-hover table-bordered rounded rounded-2">
      <thead>
        <tr class="fs-5">
          <th scope="col" colspan="4" class="bg-light text-primary">
            <?php
            include_once "time.php"; ?>
          </th>
        </tr>
      </thead>
      <thead>
        <tr class="text-center fs-3">
        <th scope="col" colspan="3" class="bg-light text-danger"><i class="bi bi-virus"></i> COV-19<span class="text-primary"> SYS</span><span class="text-dark fw-normal"> | </span><span class="text-primary">EMPLOYEE-2 <i class="bi bi-person-badge"></i></span></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row" rowspan="5" class="text-center">
            <?php
            echo "<img src='img/staff_pics/".$emp_id.".jpg' width='100' height='auto'>"."";
            ?>
          </th>
        </tr>
        <tr>
          <th scope="row">User ID :</th>
          <td><?php echo $emp_id;?></td>
        </tr>
        <tr>
          <th scope="row">Employee Name :</th>
          <td ><?php echo $emp_name;?></td>
        </tr>
        <tr>
          <th scope="row">Designation :</th>
          <td ><?php echo $emp_des;?></td>
        </tr>
        <tr>
          <th scope="row">User Type :</th>
          <td >
            <?php //echo $emp_type;
            switch($emp_type)
            {
              case 1: echo"Super Admin";
              break;
              case 2: echo"Admin";
              break;
              case 3: echo"Doctor";
              break;
              case 4: echo"Employee-I";
              break;
              case 5: echo"Employee-II";
              break;
            }?>
          </td>
        </tr>
        <tr>
          <th scope="row" colspan="3"><span class=" float-end">Click to Register your Queries :- <button class="btn btn-danger btn-sm " onclick="openForm()">Submit your Queries</button></span></th>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<div class="row mt-2 fixed-bottom">
  <div class="col-lg-12 text-center">
    <p style="font-size: 12px;" class=" test-muted">All Rights Received
    <a class="text-decoration-none" href="https://sptechhub.com/">Designed and Developed by SPTECHHUB</a></p>
  </div>
</div>

<div class="chat-popup  animate__animated animate__backInRight" id="myForm">
  <form action="" method="post" class="form-container">
   <!-- <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>!-->
    <textarea placeholder="Type message../ Queries..." name="msg" required></textarea>
	  <input type="hidden" name="author" value="<?php echo $auth;?>">
    <div class="row">
      <div class="col-lg-6 col-6 d-grid">
        <input type="submit" name="submit" class="btn btn-success ">
      </div>
      <div class="col-lg-6 col-6 d-grid">
        <button type="button"  class="btn btn-danger" onClick="closeForm()">Close</button>
      </div>
    </div>
  </form>
</div>
<?php

if(isset($_POST["submit"])){
		$author = $_POST['author'];
      	$msg = $_POST['msg'];
       $sql = "INSERT INTO messages(author,msg) VALUES('$author','$msg')";
       $result = mysqli_query($conn, $sql);
       
       if($result){
       echo "";
       }
       else
       {
       echo "Failure!";
       }
     }
       else
       {
	   }
		   ?>
           <center>
           
     </form>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>		
</body>
</html>
