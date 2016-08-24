<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	 <div class="container col-sm-3" id="c1">
	 		<div class="form-group">
				<label >Select Officer Type</label>
				<select class="form-control">
					<option value="">Select</option>
	    			<option value="1" >General Officer</option>
					<option value="2" >Reporting-Officer</option>
					<option value="3" >Reviewing-Officer</option>
					<option value="4" >Accepting-Officer</option>
				</select>
			</div>
	</div>
<!--//////////////////////////////////////////////////////////////////////-->
 		<div class="container col-sm-5" id="c1">
 			<ul class="nav nav-pills">
 				<li class="active"><a data-toggle="pill" href="#add">Add Officer</a></li>
 				<li><a data-toggle="pill" href="#remove">Remove Officer</a></li>
 				<li><a data-toggle="pill" href="#edit">Edit Officer</a></li>
 				<li><a data-toggle="pill" href="#show">Show Officer</a></li>
 			</ul>
 			
 			<div class="tab-content">
<!-- ......................................................................-->
 				<div id="add" class="tab-pane fade in active">
 					<h3>Add Officer</h3>
						<form role="form">
	 	     	
 					     	<div class="form-group">
 								<label>Name of the Officer</label>
 								<input type="text" name="" class="form-control">
	 						</div>
 			
 							<div class="form-group">
 							<label>Cadre</label>
 							<input type="text" name="" class="form-control">
 							</div>
 			
 							<div class="form-group">
 							<label>Reporting for the year/period of ending</label>
 							<input type="date" name="" class="form-control">
 							</div>
 			
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
<!-- .....................................................................-->
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
<!-- ......................................................................-->

 				<div id="edit" class="tab-pane fade">
					<h3>Remove Officer</h3>
						<form role="form">
							<div class="form-group">
							<label>Officer-ID</label>
							<input type="text" name="" class="form-control">
							</div>
							<button type="submit" class="btn btn-default">Search</button>
						</form>
				</div>	
<!--.......................................................................-->
				<div id="show" class="tab-pane fade">
					<h3>Remove Officer</h3>
						<form role="form">
							<div class="form-group">
							<label>Officer-ID</label>
							<input type="text" name="" class="form-control">
							</div>
							<button type="submit" class="btn btn-default">Search</button>
						</form>
				</div>	
<!--.......................................................................-->
 		</div>
 </div>
<!--//////////////////////////////////////////////////////////////////////-->
</body>

</html>