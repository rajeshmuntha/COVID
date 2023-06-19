<?php
include_once("header_super_admin.php");
include_once("conn.php");
?> 

  
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script>
function mode(val) {
	$.ajax({
	type: "POST",
	url: "p_list.php",
	data:'mode='+val,
	success: function(data){
		$("#list").html(data);
	}
	});
}
</script>
  <?php 
$vali = substr(str_shuffle("123456789abcdefghjklmnpqrstvwxyz"), 1, 6);
$validate = strtoupper($vali);?>
<?php
//$auth = $_SESSION['user_id'];
?>

<!-- Bootstrap icons cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


    <header>
            <nav class="navbar navbar-expand-lg shadow-sm  bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="cpanel.php? = Staff Home Page">
                    <img src="./img/Logo.png" alt="Logo" width="45" height="auto" class="d-inline-block">
                    <span class="fw-bold fs-4 text-danger">COV-19</span><span class="fw-bold fs-4 text-primary"> SYS</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item  ">
                            <a class="nav-link " aria-current="page" href="cpanel.php? = Cpanel Home Page">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="new_staff_super_admin.php?=new staff">Staff</a>
                            </li>                            
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="queries_super_admin.php? = All Queries for Employees">Emp. Queries</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Registrations
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="day_wise_super_admin.php? = Day wise reports for super admin">Day Wise</a></li>
                                <li><a class="dropdown-item" href="panel_wise_super_admin.php">Panel Wise</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item " href="doctor_reports.php? = Panel Reports Super Admin">Doctor Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_staff_wise.php? = Registration Date xrd336efe">Employee Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_day_wise.php? = Patient Reports Super Admin">Test Wise</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="reports_panel.php? = Panel Reports Super Admin">Invoice</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item active" href="new_patient_super_admin.php? = Patient Creation">New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_super_admin.php? = Patient Details">Patient Details</a></li>
                                <li><a class="dropdown-item" href="update_del_super_admin.php? = Registration Date xrd336efe">Update / Delete</a></li>                                
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="patient_data_level_II_super_admin.php? = Sample Kit Validate">Kit Validate</a></li>
                                <li><a class="dropdown-item" href="ptn_reports_super_admin.php? = Patient Reports">Test Results</a></li>
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
                                <li><a class="dropdown-item" href="reset_s_admin.php?=Passwor Reset">Change Password</a></li>
                                <li><a class="dropdown-item" href="database-backup.php? = Database BackUp">DB Backup</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
            </nav>
  </header> 

<form action="" method="post" name="form1" id="form1">
<section class="mt-5">
  <div class="container p-4 shadow-lg rounded rounded-4">
    <table class="table table-responsive table-bordered">
      <thead>
        <tr class="text-center fs-4">
          <th scope="row" colspan="2" class="bg-light text-primary">REGISTER NEW PATIENT DETAILS</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <tr>
          <th scope="col" class="animate__animated animate__fadeInLeft"><input type="text" class="form-control" name="f_name" placeholder="Enter First Name" id="" required></th>
          <th scope="col" class="animate__animated animate__fadeInRight"><input type="text" class="form-control" name="f_name" placeholder="Enter Last Name" id="" required></th>
        </tr>
        <tr>
          <td class="animate__animated animate__fadeInLeft">
            <select class="form-select" aria-label="Default select example" name="gender" class="tb3" required>
              <option selected>Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Others">Others</option>
            </select>
          </td>
          <td class="animate__animated animate__fadeInRight"><input type="date" id="birthdaytime" name="dob" value="dd-mm-yyyy" class="form-control" required></td>
        </tr>
        <tr>
          <td class="animate__animated animate__fadeInLeft"><input type="text" class="form-control" id="icno" placeholder="IC / Passport No" name="icno" required>
          <input type="hidden" name="validation" value="<?php echo $validate; ?>"></td>
          <td class="animate__animated animate__fadeInRight"><input type="text" class="form-control" id="phno" placeholder="Phone Number" name="phno" required></td>
        </tr>
        <tr>
          <td class="animate__animated animate__fadeInLeft"><input type="email" class="form-control" id="email" placeholder="Email ID" name="email"></td>
          <td class="animate__animated animate__fadeInRight"><input type="text" class="form-control" id="postcode" placeholder="Post Code" name="pincode"></td>
        </tr>
        <tr>
          <td colspan="2" class="animate__animated animate__fadeInLeft"><textarea class="form-control" rows="1" placeholder="Address Line 1" id="comment" name="address" ></textarea></td>
        </tr>
        <tr>
          <td colspan="2" class="animate__animated animate__fadeInRight"><textarea class="form-control" rows="1" placeholder="Address Line 2" id="comment" name="street" ></textarea></td>
        </tr>
        <tr>
          <td class="animate__animated animate__fadeInLeft"><select name="state" class="form-control" required>
                  <option value="" selected>Select State</option>
                  <option value="Johor">Johor</option>
                  <option value="Kedah">Kedah</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="Kuala Lumpur">Kuala Lumpur</option>
                  <option value="Labuan">Labuan</option>
                  <option value="Malacca">Malacca</option>
                  <option value="Negeri Sembilan">Negeri Sembilan</option>
                  <option value="Pahang">Pahang</option>
                  <option value="Penang">Penang</option>
                  <option value="Perak">Perak</option>
                  <option value="Perlis">Perlis</option>
                  <option value="Putrajaya">Putrajaya</option>
                  <option value="Sabah">Sabah</option>
                  <option value="Sarawak">Sarawak</option>
                  <option value="Selangor">Selangor</option>
                  <option value="Terengganu">Terengganu</option>
                </select>
          </td>
          <td><select name="t_type" class="form-control" required>
                              <option value="" selected>Type of Test</option>
                              <?php $test =mysqli_query($conn,"SELECT * FROM test_type");
                      while($row=mysqli_fetch_array($test))
                      { ?>
                          <option value="<?php echo $row['id'];?>"><?php echo $row['test_type'];?></option>
                        <?php
                      }
                    ?></select>
          </td>
        </tr>
        <tr>
          <td class="animate__animated animate__fadeInLeft"><select name="t_location" class="form-control" required>
                            <option value="" selected>Test Location</option>
                            <option value="Walk-Thru">RM Walk-Thru</option>
                            <option value="SC-Walk-Thru">SC-Walk-Thru</option>
                            <option value="KD-Walk-Thru">KD-Walk-Thru</option>
                            <option value="Onsite">Onsite</option>
                            <option value="RT-Walk-Thru">RT-Walk-Thru</option>
                            <option value="AG-Walk-Thru">AG-Walk-Thru</option>
                            <option value="CH-Walk-Thru">CH-Walk-Thru</option>
                            <option value="ADLS-Walk-Thru">ADLS-Walk-Thru</option>
                          </select>
          </td>
          <td class="animate__animated animate__fadeInRight"><input type="text" class="form-control" id="text" placeholder="Enter Cash / RM000" name="rm_cash"></td>
        </tr>
        <tr>
          <td class="animate__animated animate__fadeInLeft"><select onChange="mode(this.value);"  name="p_mode" class="form-control" required="">
            <option selected value="">Payment Mode</option>
            <?php $query =mysqli_query($conn,"SELECT * FROM pay_mode");
            while($row=mysqli_fetch_array($query))
            { ?>
            <option value="<?php echo $row['id_mode'];?>"><?php echo $row['mode'];?></option>
            <?php
            }
            ?>
            </select>
          </td>
          <td class="animate__animated animate__fadeInRight"> <select name="p_id" id="list" class="form-control" required="">
                <option value="">Select</option>
              </select>           
            </td>
        </tr>
        <tr>
          <td class="animate__animated animate__fadeInLeft"><input type="text" class="form-control" id="referenceno" placeholder="Reference No" name="p_ref" required /></td>
          <td class="animate__animated animate__fadeInRight"><input type="text" class="form-control" id="text2" placeholder="RM000" name="rm_online" required /></td>
        </tr>
        <tr>
                <input type="hidden" name="author" value="<?php echo $auth; ?>">
          <?php
          date_default_timezone_set("Asia/Kuala_Lumpur");
          ?>
          <input type="hidden" name="reg_date" value=""></td>
          <input type="hidden" name="sys_date" value="<?php echo date('Y-m-d'); ?>"></td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="">
            <input type="submit" name="submit" value="Register" class="btn btn-outline-primary">
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<?php

if(isset($_POST["submit"])){
   if(!empty($_POST['f_name']))
 {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $icno = $_POST['icno'];
    $validation = $_POST['validation'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $street = $_POST['street'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $t_type = $_POST['t_type'];
    $t_location = $_POST['t_location'];
    $rm_online = $_POST['rm_online'];
    $rm_cash = $_POST['rm_cash'];
    $p_mode = $_POST['p_mode'];
	$p_id = $_POST['p_id'];
    $p_ref = $_POST['p_ref'];
   $reg_date = $_POST['reg_date'];
   //if($_POST['reg_date']=="") {$reg_date= 0; }else{$reg_date = $_POST['reg_date'];}
    $author = $_POST['author'];
	 $sys_date = $_POST['sys_date'];
    
      $query = mysqli_query($conn, "SELECT * FROM patient WHERE icno='".$icno."' AND sys_date = '".$sys_date."'");
      $numrows = mysqli_num_rows($query);
    if($numrows == 0)
      { 
     //Insert to Mysqli Query
    // $sql = "INSERT INTO ptn_registration(f_name, l_name, gender, dob, icno, phno, email, address, street, pincode, state, t_type, c_amount, p_ref, reg_date) VALUES('$f_name', '$l_name', '$gender', '$dob', '$icno', '$phno', '$email', '$address', '$street', '$pincode', '$state', '$t_type', '$c_amount', '$p_ref', '$reg_date')";
    //   $result = mysqli_query($conn, $sql);
       $sql = "INSERT INTO patient(f_name, l_name, gender, dob, icno, validation, phno, email, address, street, pincode, state, t_type, t_location, rm_online, rm_cash, p_mode, p_id, p_ref, reg_date, author, sys_date) VALUES('$f_name', '$l_name', '$gender', '$dob', '$icno', '$validation', '$phno', '$email', '$address', '$street', '$pincode', '$state', '$t_type', '$t_location', '$rm_online', '$rm_cash', '$p_mode', '$p_id', '$p_ref', '$reg_date', '$author', '$sys_date')";
       $result = mysqli_query($conn, $sql);
       
       if($result){
      // echo "Created Successfully";
      // echo "<font color = 'green' align='center'><b>".strtoupper($f_name).":: - Created Successfully</b></font>";
      echo "<script type='text/javascript'>alert('Registered successfully!')</script>";
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
       //echo "That Reg.NO already exists!";
      echo "<font color = 'red' align='center'><b> IC/Passport No : ".strtoupper($icno)." - has been registered ".strtoupper($auth)."</b></font>";
      //echo "<b><br>".$name." - Already Exists</b>";
   
       }
       }
       else
       {
     }
      }  
    ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>