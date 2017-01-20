<?php 

		session_start();
		if($_SESSION['login_flag']==1){
		require "connect.php";
		//require 'header.php';

		$rep_off_id = $_GET['rep_off_id'];
		$rev_off_id = $_GET['rev_off_id'];

			//echo $emp_id,$rep_off_id;

			$query = "update employee set rev_off_id='$rev_off_id' where rep_off_id='$rep_off_id'";
			sqlsrv_query($conn,$query) or die('wrong IDs');
			$query =
					"update reporting_officer set rev_off_id='$rev_off_id' where rep_off_id='$rep_off_id'";
			
				sqlsrv_query($conn,$query) or die('wrong IDs');


				echo "Review Officer assgined ";
			
			//header("Location:admin_rep_officer.php");

		}
		else
			header("Location:../index.php?");
?>