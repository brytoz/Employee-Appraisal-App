<?php 

include(dirname(__FILE__)."/nic/login_back.php");
session_start();
if($_SESSION['login_flag']==1)
{
	session_destroy();
	header('Location:../index.php');
}




 ?>