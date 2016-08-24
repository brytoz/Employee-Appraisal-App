<?php
require "connect.php";
if(isset($_POST['submit']))
{
	 $r1=$_POST['r1'];
	 $r2=$_POST['r2'];
	 $r3=$_POST['r3'];
	 $r4=$_POST['r4'];
	 $r5=$_POST['r5'];
	 $r6=$_POST['r6'];
	 $r7=$_POST['agree'];

	 if(!empty($_GET))
	 {
	 		$uid=$_GET['uid'];
	 		$repid=$_GET['rep_id'];
	 		$eid=$_GET['emp_id'];
	 }
	 else
	 	echo "url variables are not passed";
	 if(!empty($r1)&&!empty($r2)&&!empty($r3)&&!empty($r4)&&!empty($r5)&&!empty($r6)&&!empty($r7))
	 {
	 	$query="insert into rev_off_eval (rev_off_id,emp_id,length_of_service,agreement,disagree,pen_picture,over_all_grading,place,dor) values ('$uid','$eid','$r1','$r7','$r2','$r3','$r4','$r5','$r6')";
	 	sqlsrv_query($conn,$query) or die(print_r(sqlsrv_errors(),true));
	 	echo "from submitted sucessfully";
	 }
}





?>