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
  	<script type="text/javascript">
	$(function()
	{
		$(".search").keyup(function() 
			{ 
				var searchid = $(this).val();
				var dataString = 'search='+ searchid;
				if(searchid!='')
				{
   					 $.ajax({
    					type: "POST",
    					url: "search_rep_officer.php",
    					data: dataString,
    					cache: false,
    					success: function(html)
					    {
    						$(".result").html(html).show();
   						}
  				  });
				}
				return false;   
});

});
</script>

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
              <option value="admin_rep_officer.php " selected="" >Reporting-Officer</option>
              <option value="admin_rev_officer.php" >Reviewing-Officer</option>
            </select>
        </div>
      </form>
    </div>
<!--Select list end-->


<!--Actions that can be performed by admin on a officer-->
 		<div class="container col-sm-5" id="c2">
 			<ul class="nav nav-pills">
 				<li class="active"><a data-toggle="pill" href="#add">Create Officer</a></li>
 				<li><a data-toggle="pill" href="#search">Search Officer</a></li>
  				<li><a data-toggle="pill" href="#edit">Edit Officer</a></li>
 				<li><a data-toggle="pill" href="#assign">Asssign Officer</a></li>
 			</ul>
		</div>

 			<div class="container col-sm-5" id="c3">

 			<div class="tab-content">

<!--option no-1 Add an officer-->
 				<div id="add" class="tab-pane fade in active" >
 					<h3>Create New Reporting Officer</h3>
						<form role="form" action="admin_rep_officer_back.php" method="post" name="add-officer">
 							<div class="form-group">
 							<label>Name</label>
 							<input type="text" name="add-name" class="form-control">
 							</div>
 							
							<div class="form-group">
 							<label>Designation</label>
 							<input type="text" name="add-designation" class="form-control">
 							</div>

 							<div class="form-group">
 							<label>Login ID</label>
 							<input type="text" name="add-id" class="form-control">
 							</div> 		

 							<div class="form-group">
 							<label>Password</label>
 							<input type="text" name="add-pass" class="form-control">
 							</div>
 			
 							<button type="submit" class="btn btn-default" name="add-submit">Add</button>
 			
 	     				</form>
				</div>
<!--End of add officer code-->
<!--option no-2 edit an officer-->
 				<div id="search" class="tab-pane fade">
					<h3>Search Officer</h3>
						<form role="form" method="post" action="admin_rep_officer_back.php" name="edit-form" >

							<div class="form-group">
							<label>Officer-ID</label>
							<input type="text" name="edit-id" class="form-control search" placeholder="Search officer by ID"  id="searchid">
							</div>
							<h4 id="note">Note:To show all officer type all.</h4>
							<div class="result"></div>
							
						</form>
				</div>
				<div id="edit" class="tab-pane fade">
					<h3>Edit Officer</h3>
						<form role="form" method="post" action="admin_rep_officer_back.php" name="edit-form" >

							<div class="form-group">
							<label>Officer-ID</label>
							<input type="text" name="edit-id" class="form-control search" placeholder="Search officer by ID"  id="searchid">
							</div>
							<button type="submit" class="btn btn-default" name="edit-submit">Edit</button>
							
							
						</form>
				</div>	
<!--End of edit officer code-->
<!--option no-3 assign an officer's details -->
				<div id="assign" class="tab-pane fade">
					<h3>Assign Reporting Officer</h3>
						<form role="form" action="admin_rep_officer_back.php" method="post" name="as-form">
							<div class="form-group">
							<label>Reporting Officer-ID</label>
							<input type="text" name="as-rep" class="form-control">
							</div>
							<div class="form-group">
							<label>Officer-ID</label>
							<input type="text" name="as-off" class="form-control">
							</div>
							<button type="submit" name="as-submit"class="btn btn-default">Add</button>
						</form>
				</div>	
<!--End of assign officer code-->
 		</div>
<!--End of options code-->
</div>

<!--End of container-->

</body>
</html>