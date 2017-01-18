<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Officer 2</title>

<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="nic.css">
<script src="/bookstore/nic/nic.js"></script>

</head>
<body onload="setDate()">
<?php require("header.php");

if(isset($_GET))
{
	$uid=$_GET['uid'];
	//session_start();
	$_SESSION['uid']=$uid;
}

require "connect.php";

 $query = "select * from officer_rep_upon where emp_id= '$uid' ";
 $data=sqlsrv_query($conn,$query,array(), array( "Scrollable" => 'keyset' ));
 $num=sqlsrv_num_rows($data);
 if($num)
 	header('Location : officer_2.php');
?>
	<div class="container">
		<h3 class="text-center">To be filled in by the Officer reported upon<br><small>(Please read carefully the instruction before filling the entries)</small></h3>
		
		<hr>
		<form role="form" method="post" action="officer_back.php">
			<div class="form-group">
				<label class="control-label">1. Brief description of duties </label>
				<textarea class="form-control" rows="5" required="required" name="bd"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">2. Please specify targets/objectives/goals (in quantitative or other terms) of work you set for yourself or that were set for you, eight to ten items of works in order of priority and your achievement against each targets.(Example: Annual Action Plan for your Division)</label>
				<div class="panel panel-default">	
					<table class="table table-bordered">
	    				<thead>
    						<tr>
        						<th class="col-sm-3">Targets/Objectives/Goals</th>
        						<th class="col-sm-9">Achievements</th>
      						</tr>
   						</thead>
    					<tbody>
      						<tr>
        						<td class="containingelement"><textarea class="form-control" rows="10" id="textarea1" required="required" name="obj"></textarea></td>
        						<td class="containingelement"><textarea class="form-control" rows="10" id="textarea2" required="required" name="ach"></textarea></td> 
      						</tr>
    					</tbody>
  					</table>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label">
					3. (A) Please state briefly, the shortfalls with references to the targets/objectives/goals referred to in items 2.
						Please specify constraints, if any, in achieving the targets.
				</label>
				<textarea class="form-control" rows="5" required="required" name="sf"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">
					&nbsp;&nbsp;&nbsp;&nbsp;(B) Please also indicate items in which there have been significantly higher achievements and your contributions thereto
				</label>
				<textarea class="form-control" rows="5" required="required" name="ha"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label">
					4. Please state whether the annual return on immovable property for the preceding calendar year was filed within
					the prescribed date i.e. 31st January of the year following the calendar year. If not, the date of filling the return 
					should be given.
				</label>
				<textarea class="form-control" rows="5" required="required" name="ip"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-1">Date:</label>
				
				<div class="col-sm-2">
					<input class="form-control today-date" type="date" name="dof" required="required">
				</div>
			</div>
			
			<br><br>
			<div class="text-center">
				<button class="btn btn-default" name="submit_2">Submit</button>
			</div>
		</form>
	</div>
	
	<div class="footer"></div>
</body>
</html>