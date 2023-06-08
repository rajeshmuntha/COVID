<?php
error_reporting( error_reporting() & ~E_NOTICE )
?>
<!doctype html>
<html lang="en">
	<head>
    <link rel="shortcut icon" type="image/icon" href="img/favicon.png"/>
    <meta name"viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>SP CARE | PATIENT REPORTS</title>
    <!-- Google Fonts cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<style>
    *{
        box-sizing: border-box;
    }
</style>
     <body>
     <header>
            <nav class="navbar navbar-expand-md bg-body-tertiary shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="ptn_dashboard.php? = Patient Dashboard?">
                    <img src="./img/Logo.png" alt="Logo" width="30" height="auto" class="d-inline-block align-text-top">
                    <span class="fw-bold text-danger">COV-19</span> SYS
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="ptn_dashboard.php? = Patient Dashboard?">Home</a>
                            </li>
                            <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
									echo "Hi..".$_SESSION['icno']."";
								}						
							?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="ptn_login.php">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
            </nav>
        </header>


       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        
     <!-- <script src="script.js"></script>   -->
        </body>
        </html>
       
        