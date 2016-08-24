<?php
	require "connect.php";
	if(isset($_POST['add-submit']))
	{
		if(!empty($_POST['add-id'])&&!empty($_POST['add-pass'])&&!empty($_POST['add-name'])&&!empty($_POST['add-designation']))
		{
			$id=$_POST['add-id'];
			$valid_email="/^[a-zA-Z0-9+-?^_{|}~]+/";
			if(!preg_match($valid_email,$id))
			{
				echo "enter valid ID";
			}
			else
			{
				$name=$_POST['add-name'];
				$valid_name="/^[a-zA-Z]+/";
				if(!preg_match($valid_name,$name))
				{
					echo "Enter valid name";
				}
				else
				{

					$designation=$_POST['add-designation'];
					$valid_string="/[a-zA-Z0-9._@|+-=?^{|}~]/";
					if(!preg_match($valid_string,$designation))
					{
						echo "Enter valid Designation";
					}
					else
					{

					$passwd=$_POST['add-pass'];

					$query = "insert into reporting_officer (rep_off_id,passwd,name,designation) values ('$id','$passwd','$name','$designation')";
					sqlsrv_query($conn,$query) or die('error in insertion');
					echo "form submitted successfully";
					}
				}
			}
		}
		else
		{
			echo "Entries are mandetory";
		}
	}
	else if(isset($_POST['edit-submit']))
	{
		if(!empty($_POST['edit-id']))
		{
			$id=$_POST['edit-id'];
			$query="select rep_off_id from reporting_officer where rep_off_id='$id'";
			$data=sqlsrv_query($conn,$query);
			if(sqlsrv_fetch_array($data))
			{
				header("Location:edit_rep_officer.php?id=".$id);
			}
			else
			{
				echo "employee doesnot exist";
			}
		}
	}
	else if(isset($_POST['as-submit']))
	{
		if(!empty($_POST['as-rep'])&&!empty($_POST['as-off']))
		{
			$rep_id=$_POST['as-rep'];
			$off_id=$_POST['as-off'];
			$query = "update employee set rep_off_id='$rep_id' where emp_id='$off_id'";
			sqlsrv_query($conn,$query) or die('wrong IDs');
			$query =
					"update employee set rep_off_id='$rep_id' where emp_id='$off_id'";
			
				sqlsrv_query($conn,$query) or die('wrong IDs');
			echo "form submitted successfully";

		}
	}


?>