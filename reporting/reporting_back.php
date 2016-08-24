<?php
#echo "check";
require "connect.php";
//print_r($_POST);

 if(isset($_POST['submit_1']))
 {
	if(isset($_POST['list1'])&&isset($_POST['list2'])&&isset($_POST['list3'])&&isset($_POST['list4'])&&isset($_POST['list5'])&&isset($_POST['list6'])&&isset($_POST['list7'])&&isset($_POST['list8'])&&isset($_POST['list9'])&&isset($_POST['list10'])&&isset($_POST['list11'])&&isset($_POST['list12'])&&isset($_POST['list13'])&&isset($_POST['list14'])&&isset($_POST['list15'])&&isset($_POST['list16'])&&isset($_POST['list17'])&&isset($_POST['list18'])&&isset($_POST['list19'])&&isset($_POST['list20'])&&isset($_POST['list21'])&&isset($_POST['list22'])&&isset($_POST['list23'])&&isset($_POST['list24']))
	{
		session_start();
		$uid=$_SESSION['uid'];
		$eid=$_SESSION['eid'];
		$list1=$_POST['list1'];
		$list2=$_POST['list2'];
		$list3=$_POST['list3'];
		$list4=$_POST['list4'];
		$list5=$_POST['list5'];
		$list6=$_POST['list6'];
		$list7=$_POST['list7'];
		$list8=$_POST['list8'];
		$list9=$_POST['list9'];
		$list10=$_POST['list10'];
		$list11=$_POST['list11'];
		$list12=$_POST['list12'];
		$list13=$_POST['list13'];
		$list14=$_POST['list14'];
		$list15=$_POST['list15'];
		$list16=$_POST['list16'];
		$list17=$_POST['list17'];
		$list18=$_POST['list18'];
		$list19=$_POST['list19'];
		$list20=$_POST['list20'];
		$list21=$_POST['list21'];
		$list22=$_POST['list22'];
		$list23=$_POST['list23'];
		$list24=$_POST['list24'];
		#echo $list1,$list2;
		$query="insert into rep_off_eval(
		rep_off_id,
		emp_id,
		accomp_planned_work,
		qua_of_output,
		analyt_ability,
		accomp_excep_work,
		over_all_grade_wo,
		attitude_work,
		sense_of_respo,
		maint_of_desci,
		comm_skill,
		leader_qual,
		team_sprit,
		time_schedule,
		personal_rel,
		overall_pers,
		over_all_grade_pa,
		knwl_rule,
		planng_ability,
		decison_ability,
		cordination_ability,
		ability_motivate,
		handling,
		quality_inspec,
		financial_prop,
		over_all_grade_fc)
		values
		(
			'$uid','$eid',
			'$list1','$list2','$list3','$list4','$list5','$list6','$list7','$list8','$list9','$list10','$list11','$list12','$list13','$list14','$list15','$list16','$list17','$list18','$list19','$list20','$list21','$list22','$list23','$list24')";
		sqlsrv_query($conn,$query)or  die( print_r( sqlsrv_errors(), true));
		header('Location:rep_officer_1.php?uid='.$uid.'&eid='.$eid); 

	}

}


	else if(isset($_POST['submit_2']))
	{
		if(!empty($_POST['public_relation'])&&!empty($_POST['training'])&&!empty($_POST['health_state'])&&!empty($_POST['integrity'])&&!empty($_POST['pen_picture'])&&!empty($_POST['over_all_grading'])&&!empty($_POST['rdate']))
		{
			session_start();
			$uid=$_SESSION['uid'];
			$eid=$_SESSION['eid'];
			$public_relation=$_POST['public_relation'];
			$training=$_POST['training'];
			$health_state=$_POST['health_state'];
			$integrity=$_POST['integrity'];
			$pen_picture=$_POST['pen_picture'];
			$over_all_grading=$_POST['over_all_grading'];
			$rdate=$_POST['rdate'];
			$rdate=date('Y-m-d', strtotime('$rdate'));

			$query="insert into rep_general_eval 
			(rep_off_id,emp_id,public_relation,training,health_state,integrity,pen_picture,over_all_grading,rdate)
			values
			('$uid','$eid','$public_relation','$training','$health_state','$integrity','$pen_picture','$over_all_grading','$rdate')";
			echo "check";

			sqlsrv_query($conn,$query)or die(print_r(sqlsrv_errors(),true));
			echo "form submitted succesfully";



		}
	}
?>