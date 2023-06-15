<?php
include "header_super_admin.php";
include "conn.php";
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: ptn_login.php");
}
?>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <section class="pt-4 animate__animated animate__fadeInRight">
  <div class="container p-4 table-responsive shadow-lg rounded rounded-4">
<table class="table table-bordered ">
        <tr>
          <th class="bg-light text-primary fs-4 text-center">Patient Reports</th>        
        <tr>
          <tr>
        	<td align="right">
           <form action="ptn_reports_super_admin_res.php? = Results" method="post" >
               Patient Uniq ID No: 
                 <input type="text" class="tb3" name="validation" placeholder="Enter Uniq ID">
                <input type="submit" class="btn btn-secondary" name="submit" value="Search">
            </form>
            </td>
        </tr>
        </table>
  </div>
  </section>
		
