<?php
require "connect.php";
if(isset($_POST['submit_1']))
{
	session_start();
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$dob=date('Y-m-d', strtotime('$dob'));
	$quali=$_POST['academic'];
	$appoi=$_POST['appoi'];
	$appoi=date('Y-m-d', strtotime('$appoi'));
	$grade=$_POST['grade'];
	$post=$_POST['post'];
	$pdate=$_POST['pdate'];
	$pdate=date('Y-m-d', strtotime('$pdate'));
	$from=$_POST['from'];
	$from=date('Y-m-d', strtotime('$from'));
	$to=$_POST['to'];
	$to=date('Y-m-d', strtotime('$to'));
	$training=$_POST['training'];
	$uid=$_SESSION['uid'];
	if(!empty($name)&&!empty($dob)&&!empty($quali)&&!empty($grade)&&!empty($post)&&!empty($pdate)&&!empty($from)&&!empty($to)&&!empty($uid))
	{
		//echo $name,$dob,$quali,$appoi,$grade,$post,$pdate,$from,$to,$training,$uid;
		$query="insert into personal_data values('$uid','$name','$dob','$quali','$appoi','$grade','$post','$pdate','$from','$to','$training') ";
		$data=sqlsrv_query($conn,$query) or die(print_r(sqlsrv_errors(),true));
		echo "from submitted successfully";
	}



}
else if(isset($_POST['submit_2']))
{
	session_start();
	$uid=$_SESSION['uid'];
	$bd=$_POST['bd'];
	$obj=$_POST['obj'];
	$ach=$_POST['ach'];
	$sf=$_POST['sf'];
	$ha=$_POST['ha'];
	$ip=$_POST['ip'];
	$dof=$_POST['dof'];

	if(!empty($bd )&&!empty($obj)&&!empty($ach)&&!empty($sf)&&!empty($ha)&&!empty($ip)&&!empty($dof))
	{
			$query="insert into officer_rep_upon (emp_id,brief_desc,achiev,shortfalls,higher_achie,dofilling,obj,ip) values ('$uid','$bd','$ach','$sf','$ha','$dof','$obj','$ip')";
			sqlsrv_query($conn,$query) or die(print_r(sqlsrv_errors(),true));
			echo "form submitted successfully";
	}

}












?>