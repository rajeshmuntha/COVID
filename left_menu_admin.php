<?php
session_start();
$auth = $_SESSION["user_id"];
if($auth =='')
{
echo '<script type="text/javascript">
location.replace("logout.php? = Invalid Login");
 </script>';
}
error_reporting( error_reporting() & ~E_NOTICE )
?>
<?php
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#mySidenav a {
  position: absolute;
  left: -80px;
  transition: 0.3s;
  padding: 15px;
  width: 120px;
  text-decoration: none;
  font-size: 16px;
  color: white;
  border-radius: 0 5px 5px 0;
   position: fixed;
}

#mySidenav a:hover {
  left: 0;
}

#about {
  top: 100px;
  background-color: #4CAF50;
}

#blog {
  top: 150px;
  background-color: #2196F3;
}

#projects {
  top: 200px;
  background-color: #f44336;
}

#contact {
  top: 250px;
  background-color: #555
}
#data {
  top: 300px;
  background-color: #F90
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="admin_level.php? = Admin Login Page" id="about">HOME</a>
  <a href="#" id="blog">COVID-19</a>
  <a href="#" id="projects">COVID-19</a>
  <a href="#" id="contact">COVID-19</a>
  <a href="queries_admin.php? = Emplyee Queries" id="data">Emp.Queries</a>
</div>
</body>
</html> 
