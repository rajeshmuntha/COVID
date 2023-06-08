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

        <title>SP CARE | PATIENT REPORTS</title>
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
            <li><a href="#">
            <?php
							
							session_start();
							if(isset($_SESSION["icno"]))
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
									echo "Hi..".$_SESSION['icno']."<br/>";
									//echo "<a href='logout.php'>logout</a>";
								}
							
							
							?>
            
            </a>
            	<ul><li><a href="ptn_login.php">Logout</a></li>
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
        