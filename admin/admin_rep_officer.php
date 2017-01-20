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

function assign_function(str)
{
	//alert("hello");
	if (str == "") {
        document.getElementById("assign-success").innerHTML = "";

        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("assign-success").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","assign_officer.php?"+str,true);
        xmlhttp.send();
       window.location.reload();
    }
}
</script>

</head>
<body>
<?php require("header.php") ;

require "connect.php";
	if(isset($_POST['add-submit']))
	{
		if(!empty($_POST['add-id'])&&!empty($_POST['add-pass'])&&!empty($_POST['add-name'])&&!empty($_POST['add-designation']))
		{
			$id=$_POST['add-id'];
			$valid_email="/^[a-zA-Z0-9+-?^_{|}~]+/";
			if(!preg_match($valid_email,$id))
			{
				echo "enter valid ID";
			}
			else
			{
				$name=$_POST['add-name'];
				$valid_name="/^[a-zA-Z]+/";
				if(!preg_match($valid_name,$name))
				{
					echo "Enter valid name";
				}
				else
				{

					$designation=$_POST['add-designation'];
					$valid_string="/[a-zA-Z0-9._@|+-=?^{|}~]/";
					if(!preg_match($valid_string,$designation))
					{
						echo "Enter valid Designation";
					}
					else
					{

					$passwd=$_POST['add-pass'];

					$query = "insert into reporting_officer (rep_off_id,passwd,name,designation) values ('$id','$passwd','$name','$designation')";
					sqlsrv_query($conn,$query) or die('error in insertion');
					echo "form submitted successfully";
					}
				}
			}
		}
		else
		{
			echo "Entries are mandetory";
		}
	}
	

?>
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
 				<li><a data-toggle="pill" href="#search">Manage Officer</a></li>
 				<li><a data-toggle="pill" href="#assign">Asssign Officer</a></li>
 			</ul>
		</div>

 			<div class="container col-sm-5" id="c3">

 			<div class="tab-content">

<!--option no-1 Add an officer-->
 				<div id="add" class="tab-pane fade in active" >
 					<h3>Create New Reporting Officer</h3>
						<form role="form" action="" method="post" name="add-officer">
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
					<h3>Manage Officer</h3>
						<form role="form" method="post" action="" name="edit-form" >

							<div class="form-group">
							<label>Officer-ID</label>
							<input type="text" name="edit-id" class="form-control search" placeholder="Search officer by ID"  id="searchid">
							</div>
							<h4 id="note">Note:To show all officer type all.</h4>
							<div class="result"></div>
							
						</form>
				</div>
<!--option no-3 assign an officer's details -->
				<div id="assign" class="tab-pane fade">
					<h3>Assign Reporting Officer</h3><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#viewrepoff">View Reporting Officers</button>

	<?php


		$query1 = "select * from employee order by sno";
		

		$data1 = sqlsrv_query($conn,$query1,array(),array("scrollable" => 'keyset', )) or die(print_r(sqlsrv_errors(),true));
		
?>		

	<div id="assign-success"></div>				
    <table class="table">
	<thead>
    <tr style="font-wieght:bold">
    <th>S.No</th>
	<th >Officer ID</th>
	<th>Officer Name</th>
	<th>Cadre</th>
	<th>Ministry/Department</th>
	<th>Year of Reporting</th>
	<th>Previously assigned Reporting Officer</th>
	<th>Assign NEW Reporting Officer</th>

	</tr>
    </thead>
<?php
	while($row1=sqlsrv_fetch_array($data1))
	{	
		
		$sno=$row1['sno'];
		$emp_id=$row1['emp_id'];
		//$passwd=$row['passwd'];
		$rep_off_id=$row1['rep_off_id'];
		//$rev_off_id=$row['rev_off_id'];
		$name=$row1['name'];
		$cadre=$row1['cadre'];
		$depof=$row1['depof'];
		if(!empty($row1['yor']))
		{
			$yor=$row1['yor'];
			$yor=date_format($yor, 'Y-m-d');
		}
		//$yor=str_replace('/','-',$yor);
		//$yor=date('Y-m-d',strtotime($yor));

		$query2 = "select * from reporting_officer";
		$data2 = sqlsrv_query($conn,$query2,array(),array("scrollable" => 'keyset', ))
		or die(print_r(sqlsrv_errors(),true));


?>
				<tbody>
				<tr>
				<td><?=$sno?></td>
				<td><?=$emp_id?></td>
				<td><?=$name?></td>
				<td><?=$depof?></td>
				<td><?=$cadre?></td>
				<td><?php if(!empty($yor))echo $yor ?></td>
				<td><?=$rep_off_id?></td>
				<td>
					
					<div class="form-group ">
					<select class="form-control" onchange="assign_function(this.value)">
					<option value="">select</option>
	
						<?php
						while($row2=sqlsrv_fetch_array($data2))
						{	
							$name_rep_off = $row2['name'];
							$designation_rep_off = $row2['designation'];
							$reporting_id = $row2['rep_off_id'];

							$query3 = "select count(*) as count_emp from employee where rep_off_id = '$reporting_id'";
							
							$data3 = sqlsrv_query($conn,$query3,array(),array("scrollable" => 'keyset', ))
							or die(print_r(sqlsrv_errors(),true));

							$row3=sqlsrv_fetch_array($data3)or die(print_r(sqlsrv_errors(),true));

							$count_emp=$row3['count_emp'] ;
					?>
  
					<option value="<?php echo "rep_off_id=".$reporting_id."&emp_id=".$emp_id ; ?>" ><?=$count_emp," ",$name_rep_off?></option>



				<?php 
						}
				?>
    							</div>				
  							</select>
										

				</td>

				
				</tr>
				</tbody>

<?php
	
}

?>

	</table>


				</div>	
 		</div>
</div>







<!--End of container-->

<!-- Model for view the total reporting officers with number of assigned employees under them-->
<div class="modal fade" id="viewrepoff" role="dialog">
    						<div class="modal-dialog">
    
						      <!-- Modal content-->
      							<div class="modal-content" style="color: black">
        							<div class="modal-header">
          								<button type="button" class="close" data-dismiss="modal">&times;</button>
          								<h4 class="modal-title">
          								<table class="table">
											<thead>
    											<tr style="font-wieght:bold ">
												<th >Reporting Officer ID</th>
												<th>Officer Name</th>
												<th>Designation</th>
												<th>Reporting for Officers(numbers)</th>
												</tr>
    										</thead>
          								</h4>
        							</div>
        								

        				<div class="modal-body">
          				<?php
          						$query4 = "select * from reporting_officer";
								$data4 = sqlsrv_query($conn,$query4,array(),array("scrollable" => 'keyset', ))
								or die(print_r(sqlsrv_errors(),true));



						while($row4=sqlsrv_fetch_array($data4))
						{	
							$name_rep_off = $row4['name'];
							$designation_rep_off = $row4['designation'];
							$reporting_id = $row4['rep_off_id'];

							$query5 = "select count(*) as count_emp from employee where rep_off_id = '$reporting_id'";
							
							$data5 = sqlsrv_query($conn,$query5,array(),array("scrollable" => 'keyset', ))
							or die(print_r(sqlsrv_errors(),true));

							$row5=sqlsrv_fetch_array($data5)or die(print_r(sqlsrv_errors(),true));

							$count_emp=$row5['count_emp'] ;
					?>
        					<tbody>
								<tr>
									<td><?=$reporting_id?></td>
									<td><?=$name_rep_off?></td>
									<td><?=$designation_rep_off?></td>
									<td><?=$count_emp?></td>
    			

				<?php 
						}
				?>
								</tr>
							</tbody>

							</div>
							</table>
        									
        					<div class="modal-footer">
          						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        					</div>
      							

      							</div>
      
    						</div>
  						</div>


</body>
</html>