<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
include('connect.php');
if($_POST)
{
	//echo "sharique";
	$q=$_POST['search'];
	//echo $q;
	if($q=='all'||$q=='All')
		$query="select * from review_officer order by sno";
	else
	$query = 	"select * from 
				review_officer where rev_off_id like '%$q%'  order by sno";

	$data=sqlsrv_query($conn,$query) or die('error in searching');
?>
	<br><br>
	<table class="table">
	<thead>
	<tr>
	<th >S.No.</th>
	<th>Name</th>
	<th>Designation</th>
	<th >reviewing Officer ID</th>
	<th >Password</th>
	</tr>
	</thead>
<?php
	while($row=sqlsrv_fetch_array($data))
	{	
		
		$sno=$row['sno'];
		$passwd=$row['passwd'];
		$rev_off_id=$row['rev_off_id'];
		$name=$row['name'];
		$desig=$row['designation'];

?>
				<tbody>
				<tr >
				<td><?=$sno?></td>
				<td><?=$name?></td>
				<td><?=$desig?></td>
				<td><?=$rev_off_id?></td>
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
