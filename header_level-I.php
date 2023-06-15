<?php
error_reporting( error_reporting() & ~E_NOTICE )
?>
<?php
session_start();
$auth = $_SESSION["user_id"];
if($auth =='')
{
echo '<script type="text/javascript">
location.replace("logout.php? = Invalid Login");
 </script>';
}
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<!doctype html>
<html lang="en">
	<head>
    <link rel="shortcut icon" type="image/icon" href="img/favicon.png"/>
    <meta name"viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">  
    <title>SP CARE | EMPLOYEE I</title>  
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet"> 
    <!-- Bootstrap 5.3 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="jquery-3.2.1.min.js"></script>
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <style>
        *{
            box-sizing: border-box;
            font-family: 'Barlow', sans-serif;
        }
        .navbar-nav > .nav-item > .nav-link:hover{
            font-weight: 500;
            color: #0d6efd !important;
            background-image: url(./img/virus.svg);
            background-repeat: no-repeat;
        }
        .navbar-nav > .nav-item > .active{
            font-weight: 600;
            color: #0d6efd !important;
            text-align: center;
            border-bottom: 2px solid #0d6efd;
            background-image: url(./img/virus.svg);
            background-repeat: no-repeat;
        }
        .navbar-nav > .nav-item > .nav-link > dropdown-menu > dropdown-item :hover{
            font-weight: 500;
            color: #0d6efd !important;
        }
        .navbar-nav > .nav-item > dropdown-menu > dropdown-item .active{
            font-weight: 600;
            color: #0d6efd !important;
            border-bottom: 2px solid #0d6efd;
        }
    </style>

</head>
     <body>
       


        <!-- Bootstrap js cdn -->
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
    
 
        <br>
<?php
// include_once "left_menu_emp1.php";
?>      
     </body>
</html>