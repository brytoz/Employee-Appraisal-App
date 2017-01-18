<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta charset="utf-10">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style type="text/css">
   
#h
{
  float: none;
  margin: auto;
}
#profile
{
  float: none;
  margin: auto;
}
#r
{
  float: none;
  margin: auto;
}
#review
{
  float: none;
  margin: auto;
}


  </style>
</head>
<body>
<?php 
if(!empty($_GET))
{
	$emp_id=$_GET['uid'];
}
require "connect.php";
require "header.php";
?>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#profile">Profile</a></li>
  <li><a data-toggle="tab" href="#report">Report</a></li>
  <li><a data-toggle="tab" href="#review">Review</a></li>
</ul>

<div class="tab-content col-sm-10" id="h">
  <div id="home" class="tab-pane fade col-sm-50 in active">
    <?php 
    	$query="select employee.name as ename,reporting_officer.name as rname, review_officer.name as rvname,cadre,yor from 
    	employee join reporting_officer on reporting_officer.rep_off_id=employee.rep_off_id 
    	join review_officer on review_officer.rev_off_id=reporting_officer.rev_off_id";
    	$data=sqlsrv_query($conn,$query);
    	$row=sqlsrv_fetch_array($data);
      $rep_off=$row['rname'];
      $rev_off=$row['rvname'];
	?>
	<table class="table">
  <tbody>
		<tr>
			<th>Name</th>
			<td><?=$row['ename']?></td>
		</tr>
		<tr>
			<th>Cadre</th>
			<td><?=$row['cadre']?></td>
		</tr>   
		<tr>
			<th>Year of Reporting</th>
			<td><?php $yor=$row['yor'];
      echo date_format($yor, 'Y-m-d');?></td>
		</tr>
		<tr>
			<th>Reporting Officer</th>
			<td><?=$row['rname']?></td>
		</tr>
		<tr>
			<th>Reviewing Officer</th>
			<td><?=$row['rvname']?></td>
		</tr>
    </tbody>
	</table>
  </div>

  <!--//////////////////////////////////////////////////////////////////////////////-->
  <div id="report" class="tab-pane fade col-sm-50" id="r">
    <?php
    require "connect.php";
        $query="select * from rep_off_eval where emp_id='$emp_id'" ;
        $data=sqlsrv_query($conn,$query);
        $row=sqlsrv_fetch_array($data);

    $value1=$row['accomp_planned_work'];
    $value2=$row['qua_of_output'];
    $value3=$row['analyt_ability'];
    $value4=$row['accomp_excep_work'];
    $value10=$row['over_all_grade_wo'];
    $value6=$row['attitude_work'];
    $value7=$row['sense_of_respo'];
    $value10=$row['maint_of_desci'];
    $value9=$row['comm_skill'];
    $value10=$row['leader_qual'];
    $value11=$row['team_sprit'];
    $value12=$row['time_schedule'];
    $value13=$row['personal_rel'];
    $value14=$row['overall_pers'];
    $value110=$row['over_all_grade_pa'];
    $value16=$row['knwl_rule'];
    $value17=$row['planng_ability'];
    $value110=$row['decison_ability'];
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
          <td><?=$value10?></td></tr>
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
          <td><?=$value10?></td></tr>
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
          <td><?=$value110?></td>
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
          <td><?=$value110?></td>
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
//        if(!empty($_GET))
  //        {
    //        $emp_id=$_GET['uid'];
      //    }
        $query="select * from general_eval where emp_id = '$emp_id'";
        $data=sqlsrv_query($conn,$query)or die(print_r(sqlsrv_errors(),true));
        $row=sqlsrv_fetch_array($data);
             $value1=$row['public_relation'];
             $value2=$row['training'];
             $value3=$row['health_state'];
             $value4=$row['integrity'];
             $value10=$row['pen_picture'];
             $value6=$row['over_all_grading'];
             if(!empty($row['yor']))
             {
                $value7=$row['rdate'];
                $value7=date_format($value7,'Y-m-d');
              }
             
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
          <td>10.Pen Picture by Reporting Officer</td>
          <td><?=$value10?></td>
        </tr>
        <tr>
          <td>6.Overall numerical grading</td>
          <td><?=$value6?></td>
        </tr>
        <tr>
          <td>Date of Reporting</td>
          <td><?=$value7?></td>
        </tr>
        </tbody>
</table>

  </div>
  <div id="review" class="tab-pane fade col-sm-50">
  <?php
    
    $query="select * from rev_off_eval where emp_id='$emp_id'";
    $data=sqlsrv_query($conn,$query);
    $row=sqlsrv_fetch_array($data);
    $value1=$row['length_of_service'];
    $value2=$row['agreement'];
    $value3=$row['disagree'];
    $value4=$row['pen_picture'];
    $value10=$row['over_all_grading'];
    $value6=$row['place'];
    $value7=$row['dor'];
    $value7=date_format($value7, 'Y-m-d');

 ?>
<table class="table">
<tbody>
<tr>
  <th>1.Length Of service</th>
  <td><?=$value1?></td>
</tr>
<tr>
  <td>2.Do you agree with the assessment made by the reporting officer <br>with respect
          to the work output and the various attributes in Part-3 &amp; <br>Part-4? Do you
          agree with the  &nbsp;&nbsp;&nbsp;&nbsp;assessment of reporting <br>officer in respect of extraordinary
          achievements/significant failures of the officer reported<br>upon?(Ref. Part-3(A)
          and Part-4(10))
          <br><small>
          &nbsp;&nbsp;&nbsp;&nbsp;(In case you do not agree with any of the numerical assessments of attributes please record
          your assessments on the column provided for you in that section and initial your entries)
          </small></td>
        <td><?=$value2?></td>
      </tr>
      <tr>
        <td>3. In case of disagreement, specify the reasons. Is there anything you wish to modify or add?</td>
        <td><?=$value3?></td>
      </tr>
      <tr>
        <td>4. Pen Picture by Reviewing Officer. Please comment (in about 100 words) on the overall qualities
          of the officer including areas of strength and lesser strength and his  &nbsp;&nbsp;&nbsp;&nbsp;attitude towards weaker sections</td>
        <td><?=$value4?></td>
      </tr>
      <tr>
        <td>Overall numerical grading on the basis of weightage given in Section A, B and C in part-3
            of the Report</td>
        <td><?=$value10?></td>
      </tr>
      <tr>
        <td>Place:</td>
        <td><?=$value6?></td>
      </tr>
      <tr>
        <td>Date:</td>
        <td><?=$value7?></td>
      </tr>
      </tbody>
</table>



  </div>
  <div id="profile" class="tab-pane fade col-sm-50" >
    <?php
    require "connect.php";
        $query="select * from personal_data where emp_id='$emp_id'";
        $data=sqlsrv_query($conn,$query);
        $row=sqlsrv_fetch_array($data);
          $name=$row['name'];
          $dob=$row['dob'];
          $dob=date_format($dob, 'Y-m-d');
          $qualifi=$row['qualifi'];
          $app_present_grade=$row['app_present_grade'];
          $app_present_grade=date_format($app_present_grade, 'Y-m-d');
          $grade=$row['grade'];
          $present_post=$row['present_post'];
          $date_app=$row['date_app'];
          $date_app=date_format($date_app, 'Y-m-d');
          $leave_period_from=$row['leave_period_from'];
          $leave_period_from=date_format($leave_period_from, 'Y-m-d');
          $leave_period_to=$row['leave_period_to'];
          $leave_period_to=date_format($leave_period_to, 'Y-m-d');
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
        $query="select * from officer_rep_upon where emp_id='$emp_id'";
        $data=sqlsrv_query($conn,$query);
        $row=sqlsrv_fetch_array($data);
          $brief_desc=$row['brief_desc'];
          $obj=$row['obj'];
          $achiev=$row['achiev'];
          $shortfalls=$row['shortfalls'];
          $higher_achie=$row['higher_achiev'];
          $dofilling=$row['dofilling'];
          $dofilling=date_format($dofilling,'Y-m-d');
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
</div>





</body>
</html>