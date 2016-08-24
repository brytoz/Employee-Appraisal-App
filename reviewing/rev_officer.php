<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Part 5</title>

<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="nic.css">
<script src="/bookstore/nic/nic.js"></script>

</head>
<body onload="setDate()">

<?php
	include "header.php";
	if(!empty ($_GET))
	{
		$uid=$_GET['uid'];
		$repid=$_GET['repid'];
		$eid=$_GET['eid'];
	}
?>
	<div class="container">

		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Officer Profile</button>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal_report">Reporting Officer Evaluations</button>
		<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Officer Profile</h4>
      </div>
      <div class="modal-body">
       <?php
		require "connect.php";
        $query="select * from personal_data where emp_id='$eid'";
        $data=sqlsrv_query($conn,$query);
        $row=sqlsrv_fetch_array($data);
        	$name=$row['name'];
        	$dob=$row['dob'];
        	$dob=date('Y-m-d', strtotime('$dob'));
        	$qualifi=$row['qualifi'];
        	$app_present_grade=$row['app_present_grade'];
        	$app_present_grade=date('Y-m-d', strtotime('$app_present_grade'));
        	$grade=$row['grade'];
        	$present_post=$row['present_post'];
        	$date_app=$row['date_app'];
        	$date_app=date('Y-m-d', strtotime('$date_app'));
        	$leave_period_from=$row['leave_period_from'];
        	$leave_period_from=date('Y-m-d', strtotime('$leave_period_from'));
        	$leave_period_to=$row['leave_period_to'];
        	$leave_period_to=date('Y-m-d', strtotime('$leave_period_to'));
        	$training=$row['training'];
			?>
					<h4>Personal Data</h4>
      				<table class="table">
      				<thead>
      				<tr>
      					<th>Entries</th>
      					<th>Filled by Officer</th>
      				</tr>
      				</thead>
      				<tbody>
					<tr>
					<td>Name</td>
					<td><?=$name?></td>
					</tr>
					<tr>
					<td>Date of Birth</td>
					<td><?=$dob?></td>
					</tr>
					<tr>
					<td>Qualification</td>
					<td><?=$qualifi?></td></tr>
					<tr>
					<td>Date of continuous appointment to present grade</td>
					<td><?=$app_present_grade?></td></tr>
					<tr>
					<td>Grade</td>
					<td><?=$grade?></td></tr>
					<tr>
					<td>Present post and date of appointment thereto</td>
					<td><?=$present_post?></td></tr>
					<tr>
					<td>Date</td>
					<td><?=$date_app?></td></tr>
					<tr>
					<td>Period of absence from </td>
					<td><?=$leave_period_from?></td></tr>
					<tr>
					<td>Period of absence to</td>
					<td><?=$leave_period_to?></td></tr>
					<tr>
					<td>Undergone training if any</td>
					<td><?=$training?></td>
					</tr>
				</tr>
				</tbody>
					
			</table>

			<h4>Filled by Officer reported upon</h4>
		
       <?php
		require "connect.php";
        $query="select * from officer_rep_upon where emp_id='$eid'";
        $data=sqlsrv_query($conn,$query);
        $row=sqlsrv_fetch_array($data);
        	$brief_desc=$row['brief_desc'];
        	$obj=$row['obj'];
        	$achiev=$row['achiev'];
        	$shortfalls=$row['shortfalls'];
        	$higher_achie=$row['higher_achie'];
        	$dofilling=$row['dofilling'];
        	$dofilling=date('Y-m-d', strtotime('$dofilling'));
			?>

			<table class="table">
			<thead>
				<tr>
					<th>Entries</th>
					<th>Filled by officer reported upon</th>

				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Brief Description of duties</td>
					<td><?=$brief_desc?></td>
				</tr>
				<tr>
					<td>Targets/Objectives/Goals</td>
					<td><?=$obj?></td>

				</tr>
				<tr>
					<td>Achievements</td>
					<td><?=$achiev?></td>
				</tr>
				<tr>
					<td>The shortfalls with reference to the targets/objectives/goals</td>
					<td><?=$shortfalls?></td>
				</tr>
				<tr>
					<td>Items in which there have been significantly higher achievements and your contribution thereto</td>
					<td><?=$higher_achie?></td>
				</tr>
				<tr>
					<td>Date of filling the entry</td>
					<td><?=$dofilling?></td>
				</tr>
				</tbody>
</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 
<!--//////////////////////////////////////////////////////////////////////////-->
<div id="myModal_report" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Report</h4>
      </div>
      <div class="modal-body">
<?php
		require "connect.php";
        $query="select * from rep_off_eval where emp_id='$eid' and rep_off_id='$repid'" ;
        $data=sqlsrv_query($conn,$query);
        $row=sqlsrv_fetch_array($data);

		$value1=$row['accomp_planned_work'];
		$value2=$row['qua_of_output'];
		$value3=$row['analyt_ability'];
		$value4=$row['accomp_excep_work'];
		$value5=$row['over_all_grade_wo'];
		$value6=$row['attitude_work'];
		$value7=$row['sense_of_respo'];
		$value8=$row['maint_of_desci'];
		$value9=$row['comm_skill'];
		$value10=$row['leader_qual'];
		$value11=$row['team_sprit'];
		$value12=$row['time_schedule'];
		$value13=$row['personal_rel'];
		$value14=$row['overall_pers'];
		$value15=$row['over_all_grade_pa'];
		$value16=$row['knwl_rule'];
		$value17=$row['planng_ability'];
		$value18=$row['decison_ability'];
		$value19=$row['cordination_ability'];
		$value20=$row['ability_motivate'];
		$value21=$row['handling'];
		$value22=$row['quality_inspec'];
		$value23=$row['financial_prop'];
		$value24=$row['over_all_grade_fc'];	
?>
					<h4>Numerical Grading awarded by Reporting Officer</h4>
      				<table class="table">
      				<thead>
      				<tr>
      					<th>Assesment of work output(Weightage of this section would be 40%)</th>
      					<th>Filled by Reporting Officer</th>
      				</tr>
      				</thead>
      				<tbody>
					<tr>
					<td>i)Accomplishment of planned work/work
						allotted as per subjects allotted</td>
					<td><?=$value1?></td>
					</tr>
		 			<tr>
					<td>ii)Quality of output</td>
					<td><?=$value2?></td>
					</tr>
					<tr>
					<td>iii) Analytic ability</td>
					<td><?=$value3?></td></tr>
					<tr>
					<td>iv) Accomplishment of exceptional
						work/unforeseen task performed</td>
					<td><?=$value4?></td></tr>
					<tr>
					<td>Overall grading on
							'work output'</td>
					<td><?=$value5?></td></tr>
      				<tr>
      					<th>Assesment if personal attributes(weightage of this section would be 30%)</th>
      					<th>Filled by Reporting Officer</th>
      				</tr>
					<tr>
					<td>i) Attitude to work</td>
					<td><?=$value6?></td></tr>
					<tr>
					<td>ii) Sense of responsibility</td>
					<td><?=$value7?></td></tr>
					<tr>
					<td>iii) Maintenance of Discipline</td>
					<td><?=$value8?></td></tr>
					<tr>
					<td>iv) Communication skills</td>
					<td><?=$value9?></td></tr>
					<tr>
					<td>v) Leadership qualities</td>
					<td><?=$value10?></td>
					</tr>
					<tr>
					<td>vi) Capacity to work in team spirit</td>
					<td><?=$value11?></td>
					</tr>
					<tr>
					<td>vii) Capacity to adhere to time schedule</td>
					<td><?=$value12?></td>
					</tr>
					<tr>
					<td>viii) Inter-personal relation</td>
					<td><?=$value13?></td>
					</tr>
					<tr>
					<td>ix) Overall bearing and personality</td>
					<td><?=$value14?></td>
					</tr>
					<tr>
					<td>Overall
							grading on 'Personal Attributes'</td>
					<td><?=$value15?></td>
					</tr>
      				<tr>
      					<th>Assesment of functional competency (weightage to this section woul be 30%)</th>
      					<th>Filled by Reporting Officer</th>
      				</tr>
					<tr>
					<td>i) Knowledge of
						Rules/Regulations/Procedures in the area of function and ability
						to apply them correctly</td>
					<td><?=$value16?></td>
					</tr>
					<tr>
					<td>ii) Strategic planning ability</td>
					<td><?=$value17?></td>
					</tr>
					<tr>
					<td>iii) Decision making ability</td>
					<td><?=$value18?></td>
					</tr>
					<tr>
					<td>iv) Coordination ability</td>
					<td><?=$value19?></td>
					</tr>
					<tr>
					<td>v) Ability to motivate, develop and
						appraise subordinate</td>
					<td><?=$value20?></td>
					</tr>
					<tr>
					<td>vi) Initiative &amp; resourcefulness in
						handling/anticipating problems and unforeseen situations</td>
					<td><?=$value21?></td>
					</tr>
					<tr>
					<td>vii) Quality of inspection</td>
					<td><?=$value22?></td>
					</tr>
					<tr>
					<td>viii) Financial propriety</td>
					<td><?=$value23?></td>
					</tr>
					<tr>
					<td>Overall
							grading on 'Functional Competency'</td>
					<td><?=$value24?></td>
					</tr>
					</tbody>
					</table>

			<h4>GENERAL</h4>
		
       <?php
		require "connect.php";
        $query="select * from rep_general_eval where emp_id='eid'";
        $data=sqlsrv_query($conn,$query);
        $row=sqlsrv_fetch_array($data);
			       $value1=$row['public_relation'];
			       $value2=$row['training'];
			       $value3=$row['health_state'];
			       $value4=$row['integrity'];
			       $value5=$row['pen_picture'];
			       $value6=$row['over_all_grading'];
			       #$value7=$row['rdate'];
		?>

			<table class="table">
				<thead>
				<tr>
					<th>General</th>
					<th>Filled by Reporting Officer</th>

				</tr>
				</thead>
				<tbody>
				<tr>
					<td>1.Relations with the public</td>
					<td><?=$value1?></td>
				</tr>
				<tr>
					<td>2.Training</td>
					<td><?=$value2?></td>

				</tr>
				<tr>
					<td>3.State of health</td>
					<td><?=$value3?></td>
				</tr>
				<tr>
					<td>4.Integrity</td>
					<td><?=$value4?></td>
				</tr>
				<tr>
					<td>5.Pen Picture by Reporting Officer</td>
					<td><?=$value5?></td>
				</tr>
				<tr>
					<td>6.Overall numerical grading</td>
					<td><?=$value6?></td>
				</tr>
				</tbody>
</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!--/////////////////////////////////////////////////////////////////////////-->



	<div class="container">
		<form role="form" action="rev_officer_back.php?uid=<?=$uid?>&emp_id=<?=$eid?>&rep_id=<?=$repid?>" method="post">
			<div class="form-group">
				<label class="control-label">
					1. REMARKS OF THE REVIEWING OFFICER
					<br><small>&nbsp;&nbsp;&nbsp;&nbsp; Length of service the Reviewing Officer</small>
				</label>
				<textarea class="form-control" rows="5" required="required" name="r1"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">
					2. Do you agree with the assessment made by the reporting officer with respect
					to the work output and the various attributes in Part-3 &amp; Part-4? Do you
					agree with the  &nbsp;&nbsp;&nbsp;&nbsp;assessment of reporting officer in respect of extraordinary
					achievements/significant failures of the officer reported upon?(Ref. Part-3(A)
					and Part-4(5))
					<br><small>
					&nbsp;&nbsp;&nbsp;&nbsp;(In case you do not agree with any of the numerical assessments of attributes please record
					your assessments on the column provided for you in that section and initial your entries)
					</small>
				</label>
					<label class="radio-inline">
					<input type="radio" name="agree" value="yes">Yes
					</label>
					<label class="radio-inline">
					<input type="radio" name="agree" value="no">No</label>
					</div>
			
			<div class="form-group">
				<label class="control-label">
					3. In case of disagreement, specify the reasons. Is there anything you wish to modify or add?
				</label>
				<textarea class="form-control" rows="5" name="r2"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">
					4. Pen Picture by Reviewing Officer. Please comment (in about 100 words) on the overall qualities
					of the officer including areas of strength and lesser strength and his  &nbsp;&nbsp;&nbsp;&nbsp;attitude towards weaker sections
				</label>
				<textarea class="form-control" rows="5" required="required" name="r3"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">
					Overall numerical grading on the basis of weightage given in Section A, B and C in part-3
						of the Report
				</label>
				
				<select class="my-select" name="r4">
      						<option>1</option>
        					<option>2</option>
        					<option>3</option>
        					<option>4</option>
        					<option>5</option>
        					<option>6</option>
        					<option>7</option>
        					<option>8</option>
        					<option>9</option>
        					<option>10</option>
      				</select>
			</div>
			
			<div class="form-group">
			<div class="row">
				<label class="control-label col-sm-1">
					Place: 
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="r5">
				</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="row">
				<label class="control-label col-sm-1">
					Date: 
				</label>
				<div class="col-sm-2">
					<input class="form-control today-date" type="date" required="required" value="12-12-1994" name="r6">
				</div>
			</div>
			</div>
			
			<div class="text-center">
				<button class="btn btn-default" name="submit">Submit</button>
			</div>
		</form>
		
		<div class="footer"></div>
	</div>
</body>
</html>