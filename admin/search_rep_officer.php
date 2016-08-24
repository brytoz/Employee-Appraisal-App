<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="container col-sm-3">
<?php
include('connect.php');
if($_POST)
{
	//echo "sharique";
	$q=$_POST['search'];
	if($q=='all'||$q=='All')
		$query="select * from reporting_officer";
	else
	$query = 	"select * from 
				reporting_officer where reporting_officer.rep_off_id like '%$q%' ";

	$data=sqlsrv_query($conn,$query) or die('error in searching');
?>
	<br><br>
	<table class="table">
	<thead>
	<th >S.No.</th>
	<th>Name</th>
	<th>Designation</th>
	<th >Reporting Officer ID</th>
	<th >Password</th>
	</tr>
	</thead>
<?php
	while($row=sqlsrv_fetch_array($data))
	{	
		
		$sno=$row['sno'];
		$passwd=$row['passwd'];
		$rep_off_id=$row['rep_off_id'];
		$name=$row['name'];
		$desi=$row['designation'];

?>
				<tbody>
				<tr >
				<td><?=$sno?></td>
				<td><?=$name?></td>
				<td><?=$desi?></td>
				<td><?=$rep_off_id?></td>
				<td><?=$passwd?></td>
				</tr>
				</tbody>
				
<?php
	}
}

?>

</table>
</div>
</body>
</html>
