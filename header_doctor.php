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

</head>

        <title>SP CARE | DOCTOR</title>
     </head>
     <body>
     	<header>
        <div class="logo">
        <h1 class="logo-text"><img src="img/h_logo.png" width="10%"> <span class="logo-text2" style="color: #fff !important;position: absolute; left: 108px; top: 14px;"><span style="color: #961c1f;"> 
        <head> 
          <style>
            h1 {
                text-shadow: 0 0 3px #3db2e1;
                }
          </style>COV-19 </span>
        </head>SYSTEM</span></h1> 
        </div>
        <i class="fa fa-bars menu-toggle" style="font-size:25px;color:red"></i>
        <ul class="nav">
        	<li><a href="doctor.php? = Staff Home Page">Home</a></li>
            <li><a href="#">Test Results</a>
            <ul style="left: 0px">
            		
                    	<li><a href="patient_data_level_doctor.php? = Patient Details">Validate</a></li>
                        <li><a href="#">Print Report</a></li>
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
        