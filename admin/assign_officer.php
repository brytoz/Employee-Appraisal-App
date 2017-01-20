<?php 

		session_start();
		if($_SESSION['login_flag']==1){
		require "connect.php";
		//require 'header.php';

		$emp_id = $_GET['emp_id'];
		$rep_off_id = $_GET['rep_off_id'];

			//echo $emp_id,$rep_off_id;

			$query = "update employee set rep_off_id='$rep_off_id' where emp_id='$emp_id'";
			sqlsrv_query($conn,$query) or die('wrong IDs');
			$query =
					"update employee set rep_off_id='$rep_off_id' where emp_id='$emp_id'";
			
				sqlsrv_query($conn,$query) or die('wrong IDs');


				echo "Reporting Officer assgined ";
			
			//header("Location:admin_rep_officer.php");

		}
		else
			header("Location:../index.php?");
?>