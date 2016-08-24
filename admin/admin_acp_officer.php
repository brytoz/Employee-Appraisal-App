<!DOCTYPE html>
<html>
<head>
	<title>Admin_Officer</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require("header.php") ?>
<!--Select list to show options depending upon officer type-->
<div class="container col-sm-3" id="c1">
      <form role="form" method="post" name="page" action="<?php echo $_SERVER['PHP_SELF']?>" >
        <div class="form-group">
          <label >Select Officer Type</label>
            <select class="form-control" onchange="window.location=this.value">
              <option value="">Select</option>
              <option value="admin_gen_officer.php" >General Officer</option>
              <option value="admin_rep_officer.php" >Reporting-Officer</option>
              <option value="admin_rev_officer.php" >Reviewing-Officer</option>
              <option value="admin_acp_officer.php" selected="" >Accepting-Officer</option>
            </select>
        </div>
      </form>
    </div>
<!--Select list end-->


<!--Actions that can be performed by admin on a officer-->
 		<div class="container col-sm-5" id="c2">
 			<ul class="nav nav-pills">
 				<li class="active"><a data-toggle="pill" href="#add">Add Officer</a></li>
 				<li><a data-toggle="pill" href="#remove">Remove Officer</a></li>
 				<li><a data-toggle="pill" href="#edit">Edit Officer</a></li>
 				<li><a data-toggle="pill" href="#show">Show Officer</a></li>
 			</ul>
 			
 			<div class="tab-content">


 <!--option no-1 Add an officer-->
 				<div id="add" class="tab-pane fade in active">
 					<h3>Add Officer</h3>
						<form role="form">
	 						<div class="form-group">
 							<label>Login-ID</label>
 							<input type="text" name="" class="form-control">
 							</div>
 			
 							<div class="form-group">
 							<label>Password</label>
 							<input type="text" name="" class="form-control">
 							</div>
 			
 							<button type="submit" class="btn btn-default">Add</button>
 			
 	     				</form>
				</div>
<!--End of add officer code-->
<!--option no-2 Remove an officer-->
				<div id="remove" class="tab-pane fade">
					<h3>Remove Officer</h3>
						<form role="form">
							<div class="form-group">
							<label>Officer-ID</label>
							<input type="text" name="" class="form-control">
							</div>
							<button type="submit" class="btn btn-default">Search</button>
						</form>
				</div>
<!--End of remove officer code-->
<!--option no-3 edit an officer-->
 				<div id="edit" class="tab-pane fade">
					<h3>Edit Officer</h3>
						<form role="form">
							<div class="form-group">
							<label>Officer-ID</label>
							<input type="text" name="" class="form-control">
							</div>
							<button type="submit" class="btn btn-default">Search</button>
						</form>
				</div>	
<!--End of edit officer code-->
<!--option no-4 show an officer's details -->
				<div id="show" class="tab-pane fade">
					<h3>Show Officer</h3>
						<form role="form">
							<div class="form-group">
							<label>Officer-ID</label>
							<input type="text" name="" class="form-control">
							</div>
							<button type="submit" class="btn btn-default">Search</button>
						</form>
				</div>	
<!--End of edit officer code-->
 		</div>
<!--End of options code-->
</div>

<!--End of container-->

</body>
</html>