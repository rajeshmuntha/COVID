<?php
include_once("header_admin.php");
include_once("conn.php");
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>

  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
  <?php 
$vali = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10);
$validate = strtoupper($vali);
?>
<?php
$auth = $_SESSION['user_id'];
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
<!-- Bootstrap icons cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
                            <li class="nav-item animate__animated animate__bounceInDown">
                            <a class="nav-link active" aria-current="page" href="new_staff.php? = New Patient Creation">Staff</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="new_patient_admin.php? = Patient Creation">Add New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_admin.php? = Patient Details">Patient Details</a></li>
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

  
<section style="margin-top: 100px;">
  <div class="container p-4 shadow rounded rounded-4">
    
<form action="" method="post" name="form1" id="form1">
<table class="table-responsive table table-hover table-bordered text-center align-middle">
  <thead>
    <tr>
      <th scope="row" colspan="2" class="fs-4 bg-light text-primary" >ADD NEW STAFF &nbsp; <i class="bi bi-people-fill"></i></th>
    </tr>
  </thead>
  
  <tbody>
  <tr><th scope="">Staff ID</th>
    <td scope=""><input type="text" class="form-control animate__animated animate__fadeInRight" name="user_id" placeholder="Enter Staff Uniq ID" required/></td>
  </tr>
  <tr>
      <th scope="">Login Password</th>
    <td><input type="password" class="form-control animate__animated animate__fadeInRight" placeholder="Enter Login Password" name="pass" required>
					</td>
  </tr>
  <tr>
      <th scope="">Name of the Staff</th>
    <td scope=""><input type="text" class="form-control animate__animated animate__fadeInRight" placeholder="Enter Staff Name" name="name" required></td>
  </tr>
  <tr>
      <th scope="">Designation</th>
    <td scope=""><input type="text" class="form-control animate__animated animate__fadeInRight" placeholder="Enter Designation" name="dgn" required></td>
  </tr>
  <tr>
      <th scope="">Role of Staff</th>
    <td scope=""><select name="role" class="form-control animate__animated animate__fadeInRight" required="required">
      <option selected value="">Select Role</option>
      <option value="1">Super Admin</option>
      <option value="2">Admin</option>
      <option value="3">Doctor</option>
      <option value="4">Employee-I</option>
      <option value="5">Employee-II</option>
    </select></td>
    <input type="hidden" name="status" value="0">
	<input type="hidden" name="value" value="1">
  </tr>                                           
  <tr>
    <td colspan="2">
      <div class="">
      <input type="submit" class="btn btn-outline-primary animate__animated animate__tada" name="submit" value="Register" />
      </div>
    </td>
  </tr>
  </tbody>
</table>
<?php
if(isset($_POST["submit"])){
   if(!empty($_POST['user_id']))
 {
	 	$user_id = $_POST['user_id'];
 		$pass = md5($_POST['pass']);
		$name = $_POST['name'];
		$dgn = $_POST['dgn'];
		$role = $_POST['role'];
		$status = $_POST['status'];
		$value = $_POST['value'];
		$query = mysqli_query($conn, "SELECT * FROM authenticate WHERE user_id='".$user_id."'");
		$numrows = mysqli_num_rows($query);
		if($numrows == 0)
			{ 
		 	 $sql = "INSERT INTO authenticate(user_id, pass, name, dgn, role, status, value) VALUES('$user_id', '$pass', '$name', '$dgn', '$role', '$status', '$value')";
			 $result = mysqli_query($conn, $sql);
			 
			 if($result){
			?><center>
            <?php
			echo "<font color = 'green' align='center'><b>".strtoupper($name).":: - Created Successfully</b></font>";
			?>
            </center>
            <?php
		 }
			 else
			 {
			 echo "Failure!";
			 }
		 }
			 else
			 {
			?>
             <center>
             <?php
			echo "<font color = 'red' align='center'><b> ID : ".strtoupper($name)." - Already Exists</b></font>";
				 
			 }
			 }
			 else
			 {
		 }
			}  
		?>
		</center>
      <?php
			   $i=1;
			  // $icno = $_POST['icno'];
            $sqlSelect = mysqli_query($conn, "SELECT * FROM authenticate where value='1' order by id desc");
			
               ?>
</form>
  </div>
</section>  

    
<section class="pt-4">
  <div class="container p-4 shadow-lg rounded rounded-4 table-responsive">
    <table class=" table table-hover table-bordered text-center align-middle">
  <thead>
    <tr>
      <th scope="row" colspan="7" class="fs-4 bg-light text-primary" >Staff Configuration &nbsp; <i class="bi bi-gear-fill"></i></th>
    </tr>
  </thead>
            <thead>
                <tr>
                	<th class="bg-light align-middle">S.No.</th>
                    <th class="bg-light align-middle" >User ID</th>
                    <th class="bg-light align-middle" >Employee Name</th>
                    <th class="bg-light align-middle" >Role of Activity</th>
                    <th class="bg-light align-middle">Status</th>
                    <th class="bg-light align-middle">Action</th>
                    <th class="bg-light align-middle">Reset</th>
                                       
                </tr>
            </thead>
<?php
                
                while ($row = mysqli_fetch_array($sqlSelect)) {
                    ?>
                    
                <tbody>
                <tr>
                <td><?php  echo $i; ?></td>
                <td><?php  echo strtoupper($row['user_id']); ?></td>
                <td><?php  echo strtoupper($row['name']);?></td>
				<td><?php  //echo $row['role']; 
				
				switch($row['role'])
					{
						case 1: echo "Super Admin";
								break;
						case 2: echo "Admin";
								break;
						case 3: echo "Doctor";
								break;
						case 4: echo "Employee-I";
								break;
						case 5: echo "Employee-II";
								break;
					}
				
				?></td>
                    <td><?php  //echo $row['status'];                    
					switch($row['status'])
					{
						case 0: echo "<font color='red'>INACTIVE</font>";
								break;
						case 1: echo "<font color='green'>ACTIVE</font>";
								break;
					}
					
					?></td>
                    <td align="center" valign="middle"><a href="admin_employee_approval.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-outline-secondary">Click to Config <i class="bi bi-gear"></i></button></td>
                    <td align="center" valign="middle"><a href="admin_reset_employee_password.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-outline-primary">Change Password <i class="bi bi-key"></i></button></td>
                    
                    
                                 
                </tr>
                    <?php
					$i++;
                }
                ?>
                </tbody>
        </table>
  </div>
</section>        
        <?php //} ?>