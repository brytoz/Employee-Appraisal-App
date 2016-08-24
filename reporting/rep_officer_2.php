<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Part 4</title>

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
if(!empty($_GET))
{
  include "header.php";
	$uid=$_GET['uid'];
	$eid=$_GET['eid'];
	session_start();
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
        $query="select * from officer_rep_upon where emp_id='$emp_id'";
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
	<div class="container">
		<h3 class="text-center">GENERAL</h3>

		<form role="form" method="post" action="reporting_back.php" >
			
			<div class="form-group">
				<label class="control-label">1. Relations with the public (wherever applicable)
				<br><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Please comment on the officers accessibility to 
							the public and responsive to their needs)</small>
				</label>
				<textarea class="form-control" rows="5" required="required" name="public_relation"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">2. Training
				<br><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Please give recommendations for training with a view to further 
							improving the effectiveness and capabilities of the officers)</small>
				</label>
				<textarea class="form-control" rows="5" required="required" name="training"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">3. State of health</label>
				<textarea class="form-control" rows="5" required="required" name="health_state"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">4. Integrity
				<br><small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Please comment on the integrity of the officers) 
				</small>
				</label>
				<textarea class="form-control" rows="5" required="required" name="integrity"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">
					5.Pen Picture by Reporting Officer (in about 100 words) on the overall qualities of the officers 
					including areas of strength and lesser strength, extraordinary achievements, &nbsp;&nbsp;
					significant failure 
					(ref. 3(A) &amp; 3(B) of part-2) and attitude towards weaker sections 
				</label>
				<textarea class="form-control" rows="5" required="required" name="pen_picture"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">
					6. Overall numerical grading on the basis of weightage given in Section A, B and C in part-3
						of the Report
				</label>
				
				<select class="my-select" name="over_all_grading">
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
						Date: 
					</label>
					<div class="col-sm-2">
						<input class="form-control today-date" type="date" required="required" name="rdate">
					</div>
				</div>
			</div>

			<div class="text-center">
					<button class="btn btn-default" name="submit_2" type="submit" value="submit_2">Submit</button>
			</div>

		</form>
		
		<div class="footer"></div>
	</div>

</body>
</html>