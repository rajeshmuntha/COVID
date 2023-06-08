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
  <a href="#" id="about">COVID-19</a>
  <a href="#" id="blog">COVID-19</a>
  <a href="#" id="projects">COVID-19</a>
  <a href="#" id="contact">COVID-19</a>
  <a href="queries_super_admin.php? = All Queries for Employees" id="data">Emp.Queries</a>
</div>
<!--
<div style="margin-left:80px;">
  <h2>Hoverable Sidenav Buttons</h2>
  <p>Hover over the buttons in the left side navigation to open them.</p>
</div>
  !--> 
</body>
</html> 
