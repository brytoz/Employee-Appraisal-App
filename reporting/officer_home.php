<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="nic.css">
</head>
<body>
<?php include "header.php";?>
<h2>Officers under you.</h2>
<table class="table">
<thead>
<tr>
	<th>S.No.</th>
	<th>Officer ID</th>
	<th>Name</th>
	<th>Cadre</th>
	<th>View Officer</th>
	<th>Make Report</th>
	<th>Status</th>
	</tr>
  </thead>
<?php
  
	if(isset($_GET))
	{
		$uid=$_GET['uid'];
	}
include "connect.php";
$query="select * from reporting_officer join employee 
		on reporting_officer.rep_off_id=employee.rep_off_id where reporting_officer.rep_off_id='$uid'";
		$data=sqlsrv_query($conn,$query);
		while($row=sqlsrv_fetch_array($data))
		{
			$eid=$row['emp_id'];
?>
<tbody>
<tr>
	<td><?=$row['sno']?></td>
	<td><?=$row['emp_id']?></td>
	<td><?=$row['name']?></td>
	<td><?=$row['cadre']?></td>
	<td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Profile</button></td>
	<td>
	<button class="btn btn-link" onclick='location.href="rep_officer_1.php?uid=<?=$uid?>&eid=<?=$eid?>"'>Make Report</button>
	</td>

</tr>
</tbody>
<?php
}
?>
</table>


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
        $query="select * from personal_data where emp_id='$uid'";
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
        $query="select * from officer_rep_upon where emp_id='$uid'";
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

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

        </div>

    </div>

  </div>
</div>




</body>
</html>