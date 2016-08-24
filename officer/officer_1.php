<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Officer</title>

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
require("header.php"); 
if(isset($_GET))
{
	$uid=$_GET['uid'];
	session_start();
	$_SESSION['uid']=$uid;
}



?>
	<div class="container">
	
	<div class="row">
		<div class="col-sm-2">
			<img class="img-thumbnail" src="thumbnail.jpeg" width="100px">
		</div>
		
		<div class="col-sm-10">
			<h2 class="text-center">Ministry of Road Transport and Highways
				<br><small>Government of India</small>
			</h2>
		</div>
		</div>
		
		
		<hr>
		<h3 class="text-center">Personal Data</h3>
		<p class="text-center">(To be filled by the Administrative Section concerned of the Ministry / Department / Office )</p>
		
		
		<form class="form-horizontal" role="form" action="officer_1_back.php" method="post">
			<div class="form-group">
				<label class="control-label col-sm-3">Name of Officer </label>
				<div class="col-sm-7">
					<input class="form-control" id="name-validate" onkeyup="myfunction()" type="text" placeholder="Enter Officer name" required="required" name="name">
				</div>
			</div>		
			
			<div class="form-group">
				<label class="control-label col-sm-3">Date of Birth </label>
				<div class="col-sm-2">
					<input class="form-control today-date" type="date" placeholder="Enter Officer name"  required="required" name="dob">
				</div>
			</div>	
		
			<div class="form-group">
				<label class="control-label col-sm-3">Academic &amp; Technical Qualification </label>
				<div class="col-sm-7">
					<input class="form-control" type="text" placeholder="Enter Qualification"  required="required" name="academic">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3" >Date of continuous appointment to the present grade </label>
				<label class="control-label col-sm-1">Date</label>
				<div class="col-sm-2">
					<input class="form-control today-date" type="date"  required="required" name="appoi">
				</div>
				<label class="control-label col-sm-1">Grade</label>
				<div class="col-sm-3">
					<input class="form-control" type="text" placeholder="Grade"  required="required" name="grade">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">Present post and date of appointment thereto</label>
				<label class="control-label col-sm-1">Post</label>
				<div class="col-sm-3">
					<input class="form-control" type="text" placeholder="Enter post"  required="required" name="post">
				</div>
				<label class="control-label col-sm-1">Date</label>
				<div class="col-sm-2">
					<input class="form-control today-date" type="date" required="required" name="pdate">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">Period of absence from duty (on training, leave etc.) during the year. If he has under gone training, specify</label>
				<label class="control-label col-sm-1">From</label>
				<div class="col-sm-2">
					<input class="form-control today-date" type="date" name="from">
				</div>
				
				<label class="control-label col-sm-offset-1 col-sm-1">To</label>
				<div class="col-sm-2">
					<input class="form-control today-date" type="date" name="to">
				</div>
				<br><br>
				
				<div class="col-sm-7">
					<input class="form-control" type="text" placeholder="If undergone training, specify here" name="training">
				</div>
			</div>
			
			<div class="text-center">
			<button class="btn btn-default" type="submit" name="submit_1">Proceed</button>
			</div>

			
		</form>
		<div class="text-center">
		<button class="btn btn-default" onclick="location.href='officer_2.php?uid=<?=$uid?>'" >See Report</button>
			</div>
			
			


	</div>
	
	<div class="footer"></div>
</body>
</html>