<!DOCTYPE html>
<html>
<head>
	<title>Officers Profile</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="nic.css">
</head>
<body>
<?php
include 'connect.php';
include 'header.php';

if(!empty($_GET))
	{
		$rep_id=$_GET['rep_id'];
		$rev_id = $_GET['rev_id'];
	}
$query="select * from employee where rep_off_id = '$rep_id' and rev_off_id='$rev_id'";
$data=sqlsrv_query($conn,$query,array(), array( "Scrollable" => 'keyset' )) 
	or die(print_r(sqlsrv_errors(),true));
		$row=sqlsrv_fetch_array($data);
		$num=sqlsrv_num_rows($data);
?>
<div class="container">
     <h3>Officers Reported</h3>
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
       	if($num)
        while($row=sqlsrv_fetch_array($data) or die(print_r(sqlsrv_errors(),true)))
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
					<td><button class="btn btn-link" onclick='location.href="rev_officer.php?revid=<?=$rev_id?>&repid=<?=$rep_id?>&empid=<?=$emp_id?>"'>Make Report</button></td>
				</tr>
				</tbody>
				
			<?php
				}
			?>
	</table>
</div>
</body>
</html>