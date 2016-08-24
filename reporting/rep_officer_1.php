<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Part 3</title>

<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="nic.css">

</head>
<body>
<?php
	include "header.php";
	if(isset($_GET))
	{
		$uid=$_GET['uid'];
		$eid=$_GET['eid'];
		if(!isset($_SESSION)){
			session_start();
		}
		$_SESSION['uid']=$uid;
		$_SESSION['eid']=$eid;
	}
?>
	<div class="container">

		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Officer Profile</button>
		<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

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

		<p class="text-center">Numerical grading is to be awarded by
			reporting and reviewing authority which should be on a scale of 1-10,
			where 1 refers to the lowest grade and 10 to the highest.</p>
		<p class="text-center small">(Please read carefully the
			instruction before filling the entries)</p>
		<hr>
		<form class="form-horizontal" role="form" method="post" action="reporting_back.php">

			<h5 class="text-center">(A) Assessment of work output (weightage
				of this section would be 40%)</h5>
			<ul class="list-group">
				<li class="list-group-item">
					<div class="col-sm-8">i)Accomplishment of planned work/work
						allotted as per subjects allotted</div> 
						<select class="my-select" name="list1">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">ii) Quality of output</div> 
					<select class="my-select" name="list2">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">iii) Analytic ability</div> 
					<select class="my-select" name="list3">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">iv) Accomplishment of exceptional
						work/unforeseen task performed</div> 
						<select class="my-select" name="list4">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">
						<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Overall grading on
							'work output'</strong>
					</div> <select class="my-select" name="list5">
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
				</li>
			</ul>

			<h5 class="text-center">(B) Assessment of personal attributes
				(weightage of this section would be 30%)</h5>
			<ul class="list-group">
				<li class="list-group-item">
					<div class="col-sm-8">i) Attitude to work</div> 
					<select class="my-select" name="list6">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">ii) Sense of responsibility</div> 
					<select class="my-select" name="list7">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">iii) Maintenance of Discipline</div> 
					<select class="my-select" name="list8">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">iv) Communication skills</div> 
					<select class="my-select" name="list9">
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
				</li>

				<li class="list-group-item">
					<div class="col-sm-8">v) Leadership qualities</div> 
					<select class="my-select" name="list10">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">vi) Capacity to work in team spirit</div> 
					<select class="my-select" name="list11">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">vii) Capacity to adhere to time schedule</div> 
					<select class="my-select" name="list12">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">viii) Inter-personal relation</div> 
					<select class="my-select" name="list13">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">ix) Overall bearing and personality</div> 
					<select class="my-select" name="list14">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">
						<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Overall
							grading on 'Personal Attributes'</strong>
					</div> 
					<select class="my-select" name="list15">
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
				</li>
			</ul>

			<h5 class="text-center">(C) Assessment of functional competency</h5>
			<ul class="list-group">
				<li class="list-group-item">
					<div class="col-sm-8">i) Knowledge of
						Rules/Regulations/Procedures in the area of function and ability
						to apply them correctly</div> 
						<select class="my-select" name="list16">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">ii) Strategic planning ability</div> 
					<select class="my-select" name="list17">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">iii) Decision making ability</div> 
					<select class="my-select" name="list18">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">iv) Coordination ability</div> 
					<select class="my-select" name="list19">
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
				</li>

				<li class="list-group-item">
					<div class="col-sm-8">v) Ability to motivate, develop and
						appraise subordinate</div> 
						<select class="my-select" name="list20">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">vi) Initiative &amp; resourcefulness in
						handling/anticipating problems and unforeseen situations</div> 
						<select class="my-select" name="list21">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">vii) Quality of inspection</div> 
					<select class="my-select" name="list22">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">viii) Financial propriety</div> 
					<select class="my-select" name="list23">
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
				</li>
				<li class="list-group-item">
					<div class="col-sm-8">
						<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Overall
							grading on 'Functional Competency'</strong>
					</div> 
					<select class="my-select" name="list24">
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
				</li>
			</ul>
			</div>
			<div class="text-center">
			<button class="btn btn-default"  type="submit" name="submit_1">Submit</button>
			</div>
			</form>
			<div class="text-center">
			<button class="btn btn-default" onclick="location.href='rep_officer_2.php?uid=<?=$uid?>&eid=<?=$eid?>'">Proceed</button>
			</div>
			

		
		<div class="footer"></div>
	</div>
</body>
</html>