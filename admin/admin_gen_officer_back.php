<?php
	require "connect.php";
	if(isset($_POST['add-submit']))
	{
		if(!empty($_POST['add-name'])&&!empty($_POST['add-cadre'])&&!empty($_POST['add-date'])&&!empty($_POST['add-id'])&&!empty($_POST['add-pass']))
		{
			$name=$_POST['add-name'];
			$valid_name="/^[a-zA-Z]+/";
			if(!preg_match($valid_name,$name))
			{
				echo "Enter valid name";
			}
			else
			{

				$cadre=$_POST['add-cadre'];
				$valid_name="/^[a-zA-Z]+/";
				if(!preg_match($valid_name,$cadre))
				{
					echo "Enter valid cadre";
				}
				else
				{
					$date=$_POST['add-date'];
					$id=$_POST['add-id'];
					$valid_email="/^[a-zA-Z0-9+-=?^_{|}~]+/";
					if(!preg_match($valid_email,$id))
					{
						echo "enter valid ID";
					}
					else
					{
						$passwd=$_POST['add-pass'];
						$date=date('Y-m-d', strtotime('$date'));
						$query = "insert into employee (emp_id,passwd,cadre,name,yor) values ('$id','$passwd','$cadre','$name','$date')";
						sqlsrv_query($conn,$query) or die('error in insertion');
						echo "form submitted successfully";
					}
				}
			}
		}
		else
		{
			echo "Entries are mandetory !";
		}
	}
	else if(isset($_POST['edit-submit']))
	{
		if(!empty($_POST['edit-id']))
		{
			$id=$_POST['edit-id'];
			//echo $id;
			$query="select emp_id from employee where emp_id='$id'";
			$data=sqlsrv_query($conn,$query);
			if(sqlsrv_fetch_array($data))
			{
				header("Location:edit_gen_officer.php?id=".$id);
			}
			else
			{
				echo "employee doesnot exist";
			}
			//$row=sqlsrv_fetch_array($data);
			//$num=sqlsrv_num_rows($data);

		}
		else
		{
			echo "Entries are mandetory !";
		}
	}
?>