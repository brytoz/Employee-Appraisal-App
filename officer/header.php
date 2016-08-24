<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


  include(dirname(__FILE__)."\..\login_back.php");
  if($_SESSION['login_flag']==1)
  {
    echo '
      <div class="container" id="header">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ministry of Transport</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
  </div>
</nav>

</div>
';

}
  else
  {
    
    header("Location:../index.php");
  }

 ?>

</body>
</html>