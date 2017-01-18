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
<h2>Reporting Officers under you</h2>
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
	<td><button type="button" class="btn btn-link" onclick="location.href='officer_profile.php?rep_id=<?=$eid?>&rev_id=<?=$uid?>'">Profile</button></td>
	</tr>
	</tbody>
	<?php
		}
	?>

	</table>

</body>
</html>