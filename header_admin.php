<?php
error_reporting( error_reporting() & ~E_NOTICE )
?>
<!doctype html>
<html lang="en">
	<head>
    <link rel="shortcut icon" type="image/icon" href="img/favicon.png"/>
    <meta name"viewport" content="width=device-width, initial-scale=1.0"/>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
    	<link rel="stylesheet" href="css/style.css">
        <title>SP CARE | ADMIN</title>
     </head>
     <body>
     	<header class="shadow-sm">
        <div class="logo">
        <h1 class="logo-text"><img src="img/h_logo.png" width="10%"> <span class="logo-text2" style="color: #fff !important;position: absolute; left: 108px; top: 14px;"><span style="color: #961c1f;"> 
        <head> 
          <style>
            h1 {
                text-shadow: 0 0 3px #3db2e1;
                }
          </style>COV-19 </span>
        </head>SYS</span></h1> 
        </div>
        <i class="fa fa-bars menu-toggle" style="font-size:25px;color:red"></i>
        <ul class="nav">
        	<li><a href="admin_level.php? = Staff Home Page">Home</a></li>
            <li><a href="new_staff.php? = New Patient Creation<strong></strong>">Staff</a>
              </li>
            <li><a href="#">Patient</a>
            <ul style="left: 0px">
            		<li><a href="new_patient_admin.php? = Patient Creation">New Patient</a></li>
                    <li><a href="patient_data_level_admin.php? = Patient Details">Patient Details</a></li>
                    <li><a href="patient_data_level_II_admin.php? = Sample Kit Validate">Kit Issue</a></li>
                    <li><a href="ptn_reports_admin.php? = Patient Reports">Test Results</a></li>
             </ul>
            </li>  
            <li><a href="#">Reports</a>
            <ul style="left: 0px">
                    <li><a href="report_admin_day_wise.php? = Patient Reports Admin">Test Wise</a></li>
                    <li><a href="#">Invoice</a></li>                   
             </ul>
            </li>
            <li><a href="#">
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
									echo "HI..".$_SESSION['user_id']."<br/>";
									//echo "<a href='logout.php'>logout</a>";
								}
							
							
							?>
            
            </a>
            	<ul><li><a href="reset.php?=Passwor Reset">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                 </ul>
            </li> 
         
        </ul>
        </header>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        
     <script src="script.js"></script>  
        </body>
        </html>
        <br>
        <br>
        <br>
        <br>
        