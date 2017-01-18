<?php
require"connect.php";

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if(isset($_GET['user']))
{	
	$user = intval($_GET['user']);
	$_SESSION['user']=$user;
}

//echo $user;
//require"login.php";
if(isset($_POST['submit-login']))
{	
	$_SESSION['login_flag']=0;
	$user = $_SESSION['user'];
	$uid=$_POST['uname'];
	$pwd=$_POST['pword'];

	if ($user==1)
	{
		$query = "select user_id,passwd from admin  where user_id='$uid' and passwd='$pwd'";

		$data=sqlsrv_query($conn,$query,array(), array( "Scrollable" => 'keyset' ));
		$row=sqlsrv_fetch_array($data);
		$num=sqlsrv_num_rows($data);
		if($row)
		{
			$_SESSION['login_flag']=1;
			header('Location:admin');
		}
		else
			header('Location:index.php');

	}
	else if ($user==2)
	{
		$query = "select emp_id,passwd from employee where emp_id='$uid' and passwd='$pwd'";
		$data=sqlsrv_query($conn,$query,array(), array( "Scrollable" => 'keyset' ));
		$row=sqlsrv_fetch_array($data);
		$num=sqlsrv_num_rows($data);
		if($num)
		{	
			$_SESSION['login_flag']=1;
			$query1="select * from personal_data where emp_id='$uid'";
			$data1=sqlsrv_query($conn,$query1,array(), array( "Scrollable" => 'keyset' ));
			$query2="select * from officer_rep_upon where emp_id='$uid' ";
			$data2=sqlsrv_query($conn,$query2,array(), array( "Scrollable" => 'keyset' ));


			if(!sqlsrv_num_rows($data1))
			header('Location:officer/officer_1.php?uid='.$uid);
			else if(!sqlsrv_num_rows($data2))
			header('Location:officer/officer_2.php?uid='.$uid);
			else
			header('Location:officer/officer_home.php?uid='.$uid);
		}
		else
			header('Location:index.php');
	}
	else if ($user==3)
	{
		$query = "select rep_off_id,passwd from reporting_officer where rep_off_id='$uid' and passwd='$pwd'";
		$data=sqlsrv_query($conn,$query);
		$row=sqlsrv_fetch_array($data);
		$num=sqlsrv_num_rows($data);
		if($row){
			$_SESSION['login_flag']=1;
			header('Location:reporting/officer_home.php?uid='.$uid);
		}
		else
			header('Location:index.php');
	}
	else if ($user==4)
	{
		$query = "select rev_off_id,passwd from review_officer where rev_off_id='$uid' and passwd='$pwd'";
		$data=sqlsrv_query($conn,$query);
		$row=sqlsrv_fetch_array($data);
		$num=sqlsrv_num_rows($data);
		if($row){
			$_SESSION['login_flag']=1;
			header('Location:reviewing/rev_home.php?uid='.$uid);
		}
		else
			header('Location:index.php');
	}
}

?>