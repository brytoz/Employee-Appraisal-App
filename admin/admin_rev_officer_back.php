<?php
	require "connect.php";


	if(isset($_POST['add-submit']))
	{
		if(!empty($_POST['add-id'])&&!empty($_POST['add-pass'])&&!empty($_POST['add-name'])&&!empty($_POST['add-designation']))
		{
			$id=$_POST['add-id'];
			$valid_email="/^[a-zA-Z0-9+-=?^_{|}~]+/";
			if(!preg_match($valid_email,$id))
			{
				echo "enter valid ID";
			}
			else
			{
					$passwd=$_POST['add-pass'];
				
					$valid_name="/^[a-zA-Z]+/";
					$name=$_POST['add-name'];
					if(!preg_match($valid_name,$name))
					{
						echo "Enter valid";
					}
					else
					{
						$desig=$_POST['add-designation'];
						if(!preg_match($valid_name,$desig))
						{
							echo "Enter valid";
						}
						$query = "insert into review_officer (rev_off_id,passwd,name,designation) values ('$id','$passwd','$name','$desig')";
						sqlsrv_query($conn,$query) or die('error in insertion');
						echo "form submitted successfully";
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
			$query="select rev_off_id from review_officer where rev_off_id='$id'";
			$data=sqlsrv_query($conn,$query);
			if(sqlsrv_fetch_array($data))
			{
				header("Location:edit_rev_officer.php?id=".$id);
			}
			else
			{
				echo "employee doesnot exist";
			}
		}
	}
	
	else if(isset($_POST['as-submit']))
	{	
			//echo $_POST['rep-id'];
			//echo $_POST['rev-id'];

		if(!empty($_POST['rep-id'])&&!empty($_POST['rev-id']))
		{
				//echo "check";
			$rep_id=$_POST['rep-id'];
			$rev_id=$_POST['rev-id'];

			//echo $rep_id,$rev_id;
			$query = "update reporting_officer set rev_off_id= '$rev_id' where rep_off_id= '$rep_id' ";
			
			sqlsrv_query($conn,$query) or die(print_r(sqlsrv_errors(),true));
			//echo "form submitted successfully 1";
			$query ="update employee 
					set rev_off_id= '$rev_id'
					where employee.rep_off_id= '$rep_id'";
			sqlsrv_query($conn,$query) or die(print_r(sqlsrv_errors(),true));
			
			echo "form submitted successfully ";
		}
		else
		{
			echo "Entries are mandetory";
		}
	}


?>