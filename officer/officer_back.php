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
		$query="insert into personal_data (emp_id,name,dob,qualifi,app_present_grade,grade,present_post,date_app,leave_period_from,leave_period_to,training) values('$uid','$name','$dob','$quali','$appoi','$grade','$post','$pdate','$from','$to','$training') ";
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
			$query="insert into officer_rep_upon (emp_id,brief_desc,obj,achiev,shortfalls,higher_achiev,dofilling,ip) values ('$uid','$bd','$obj','$ach','$sf','$ha','$dof','$ip')";
			sqlsrv_query($conn,$query) or die(print_r(sqlsrv_errors(),true));
			echo "form submitted successfully";
	}

}

?>