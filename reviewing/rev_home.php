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
<h2>Reporting Officers under you.</h2>
<table class="table">
<thead>
	<tr>
	<th>S.No.</th>
	<th>Officer ID</th>
	<th>Name</th>
	<th>designation</th>
	<th>View Officers</th>
	</tr>
</thead>

<?php
	if(!empty($_GET))
	{
		$uid=$_GET['uid'];
	}
		include "connect.php";
		$query="select reporting_officer.name,reporting_officer.designation,reporting_officer.rep_off_id,reporting_officer.sno from reporting_officer join review_officer
		on reporting_officer.rev_off_id=review_officer.rev_off_id where review_officer.rev_off_id='$uid'
		 ";
		$data=sqlsrv_query($conn,$query);
		
		while($row=sqlsrv_fetch_array($data))
		{
			$eid=$row['rep_off_id'];
?>
	<tbody>
	<tr>
	<td><?=$row['sno']?></td>
	<td><?=$eid?></td>
	<td><?=$row['name']?></td>
	<td><?=$row['designation']?></td>
	<td><button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Profile</button></td>
	</tr>
	</tbody>
	<?php
		}
	?>

	</table>
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
      <h3>Personal Data</h3>
      	<table class="table">
      	<thead>
      	<tr>
      		<th>Employee ID</th>
      		<th>Name</th>
      		<th>Date of Birth</th>
      		<th>Cadre</th>
      		<th>Rep.Officer ID</th>
      		<th>Make Report</th>
      		<th>Status</th>
		</tr>
		</thead>
       <?php

        require "connect.php";
        $query="select employee.emp_id,employee.rep_off_id,employee.name,employee.cadre from reporting_officer join employee on reporting_officer.rep_off_id=employee.rep_off_id where reporting_officer.rep_off_id='$eid'";
        $data=sqlsrv_query($conn,$query);
        while($row=sqlsrv_fetch_array($data))
        {	
        	$name=$row['name'];
        	$dob=date('Y-m-d', strtotime('$dob'));
        	$emp_id=$row['emp_id'];
        	$rep_off_id=$row['rep_off_id'];
        	$cadre=$row['cadre'];
			?>
				<tbody>
				<tr>
					<td><?=$emp_id?></td>
					<td><?=$name?></td>
					<td><?=$dob?></td>
					<td><?=$cadre?></td>
					<td><?=$rep_off_id?></td>
					<td><button class="btn btn-link" onclick='location.href="rev_officer.php?uid=<?=$uid?>&repid=<?=$eid?>&eid=<?=$emp_id?>"'>Make Report</button></td>
				</tr>
				</tbody>
				
			<?php
				}
			?>
</table>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
</html>