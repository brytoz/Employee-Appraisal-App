<!DOCTYPE html>
<html>
<head></head>
<body>

<div class="container col-sm-3">
<?php
include('connect.php');
if($_POST)
{
	//echo "sharique";
	$q=$_POST['search'];
	if($q=='all'||$q=='All')
		$query="select * from employee";
	else
	$query = "select * from employee where emp_id like '%$q%' order by sno";
	$data=sqlsrv_query($conn,$query) or die('error in searching');
?>
	<br><br>
	<table class="table">
	<thead>
    <tr style="font-wieght:bold">
	<th >S.No.</th>
	<th >Officer ID</th>
	<th >Password</th>
	<th>Officer Name</th>
	<th>Reporting Officer ID</th>
	<th>Reviewing Officer ID</th>
	<th>Cadre</th>
	<th>Ministry/Department of</th>
	<th>Year of Reporting</th>
	</tr>
    </thead>
<?php
	while($row=sqlsrv_fetch_array($data))
	{	
		
		$sno=$row['sno'];
		$emp_id=$row['emp_id'];
		$passwd=$row['passwd'];
		$rep_off_id=$row['rep_off_id'];
		$rev_off_id=$row['rev_off_id'];
		$name=$row['name'];
		$cadre=$row['cadre'];
		$depof=$row['depof'];
		if(!empty($row['yor']))
		{
			$yor=$row['yor'];
			$yor=date_format($yor, 'Y-m-d');
		}
		//$yor=str_replace('/','-',$yor);
		//$yor=date('Y-m-d',strtotime($yor));

?>
				<tbody>
				<tr >
				<td><?=$sno?></td>
				<td><?=$emp_id?></td>
				<td><?=$passwd?></td>
				<td><?=$name?></td>
				<td><?=$rep_off_id?></td>
				<td><?=$rev_off_id?></td>
				<td><?=$depof?></td>
				<td><?=$cadre?></td>
				<td><?php if(!empty($yor))echo $yor ?></td>
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
