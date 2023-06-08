<?php
include "conn.php";
// include_once "left_menu_emp1.php";

?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
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
<?php
include_once "header_level-I.php";
// include_once "time.php";
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
<!-- Bootstrap 5.3 cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<style>
#des {
  font-family: "cambria";
  border-collapse: collapse;
  width: 1000px;
   }

#des td {
  border: 1px solid #09F;
  padding: 9px;
  font-size: 14px;
 }

#des tr:nth-child(even){background-color: #f2f2f2;}

/*#des tr:hover {background-color: #ddd;}*/

#des th {
  padding-top: 16px;
  padding-bottom: 10px;
  text-align: center;
  background-color: #3db2e1;
  color: white;
  font-size: 16px;
}
</style>

<section class="pt-5">
  <div class="container table-responsive p-4 shadow-lg rounded rounded-4">
        <table class="table table-responsive table-hover table-bordered">
          <thead>
              <tr class="text-center fs-4">
              <th scope="row" colspan="5" class="bg-light text-primary">Registered Queries</th>
              </tr>
          </thead>
          <tbody class="text-center">
              <tr>
                  <th scope="col">Sl. No. </th>
                  <th scope="col">Query Type</th>
                  <th scope="col">Requested Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Response Date</th>
              </tr>
                <?php
                  $i=1;
                  $query=mysqli_query($conn,"select * from messages where author='".$auth."' ORDER by id desc limit 25");
                  while($row_q=mysqli_fetch_array($query)) {
                    $mid = $row_q["id"];
                ?>
              <tr>
                  <th scope="col"><?php echo $i;?></th>
                  <td scope="col"><?php echo $row_q["msg"];?></td>
                  <td scope="col"><?php echo $row_q["date"];?></td>
                  <td scope="col">
                  <?php 
                    switch($row_q["status"]){
                      case 0 : echo 'PENDING';
                      break;
                      case 1 : echo 'SUCCESS';
                      break;
                    }
                  ?>
                  </td>
                  <td scope="col">
                    <?php
                      $response=mysqli_query($conn,"select * from m_status where m_id='".$mid."'");
                      while($res_q=mysqli_fetch_array($response)) {
                      echo $res_q["date"];            
                      }
                      $i++;
              }  
                    ?>
                  </td>
              </tr>
          </tbody>
        </table>
  </div>
</section>




