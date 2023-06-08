<?php
include "header_level-I.php";
include "conn.php";
// include_once "left_menu_emp1.php";
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: ptn_login.php");
}
?>
<?php
$auth = $_SESSION["user_id"];
if($auth =='')
{
echo '<script type="text/javascript">
location.replace("logout.php? = Invalid Login");
 </script>';
}
?>


<html>  
<head>
    <meta name"viewport" content="width=device-width, initial-scale=1.0"/>
<!-- Bootstrap 5.3 cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<style>
  *{
    box-sizing: border-box;
  }
</style>
</head>
<body>
<section class="pt-5">
  <div class="container p-4 shadow-lg rounded rounded-4">
    <table class="table table-responsive table-hover table-bordered">
      <thead>
        <tr class="text-center fs-4">
          <th scope="row" colspan="3" class="bg-light text-primary">Patient Test Reports</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <th scope="col" class="pt-3">Patient Uniq ID No :-</th>
          <form action="ptn_reports_res.php? = Reports" method="post" >
            <td style="min-width: 150px;" scope="col"><input type="text" class="form-control" name="validation" placeholder="Enter Uniq ID" required=""/></td>
            <td>
              <input type="submit" class="btn btn-secondary" name="submit" value="Get Details">
            </td>
          </form> 
        </tr>
      </tbody>
    </table>
  </div>
</section>



<!-- Bootstrap js cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
