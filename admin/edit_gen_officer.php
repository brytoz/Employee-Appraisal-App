<!DOCTYPE html>
<html>
<head>
	<title>Edit Officers</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require("header.php") ?>
<div class="container col-sm-3" id="c1">
      <form role="form" method="post" name="page" action="<?php echo $_SERVER['PHP_SELF']?>" >
        <div class="form-group">
          <label >Select Officer Type</label>
            <select class="form-control" onchange="window.location=this.value">
              <option value="">Select</option>
              <option value="admin_gen_officer.php" >General Officer</option>
              <option value="admin_rep_officer.php" >Reporting-Officer</option>
              <option value="admin_rev_officer.php">Reviewing-Officer</option>
            </select>
        </div>
      </form>
    </div><!--Select list end-->
<!--Actions that can be performed by admin on a officer-->

<!--//////////////////////////PHP//////////////////////////////////////-->
<?php
    require "connect.php";
    $id=$_GET['id'];
    //echo $id;
    $query = "select * from employee where emp_id='$id'";
    $data=sqlsrv_query($conn,$query);
    $row=sqlsrv_fetch_array($data);
    if(isset($_POST['update-submit']))
    {
      if(!empty($_POST['add-name'])&&!empty($_POST['add-cadre'])&&!empty($_POST['add-date'])&&!empty($_POST['depof'])&&!empty($_POST['add-id'])&&!empty($_POST['add-pass']))
        {
          $name=$_POST['add-name'];
          $valid_name="/^[a-zA-Z]+/";
          if(!preg_match($valid_name,$name))
          {
            echo "Enter valid name";
          }
          else
          {

              $cadre=$_POST['add-cadre'];
              $valid_name="/^[a-zA-Z]+/";
              if(!preg_match($valid_name,$cadre))
              {
                echo "Enter valid cadre";
              }
              else
              {
                $date=$_POST['add-date'];
                $id=$_POST['add-id'];
                $valid_email="/^[a-zA-Z0-9+-=?^_{|}~]+/";
              if(!preg_match($valid_email,$id))
              {
                  echo "enter valid ID";
              }
              else
              {
                $depof=$_POST['depof'];
                $passwd=$_POST['add-pass'];
                $date=date('Y-m-d', strtotime('$date'));
                $query = "update employee set 
                emp_id='$id',
                passwd='$passwd',
                cadre='$cadre',
                name='$name',
                yor='$date' ,
                depof = '$depof'
                where emp_id='$id'";
                sqlsrv_query($conn,$query) or die('error in insertion');
                echo "Officer Updated Successfully";
              } 
          }
        }
      }
          
        
        else
        {
          echo "Entries are mandetory";
        }
    }
    else if(isset($_POST['rm-submit']))
    {
      //echo $id;
      $query = "delete from employee where emp_id='$id'";
      sqlsrv_query($conn,$query) or die('Error in deletion');
      echo "Officer deleted Successfully";
    }


?>
<!--////////////////////////PHP END/////////////////////////////////////-->

    <div class="container col-sm-6">
 
						<form role="form" action="" name="add-form" method="post">
	 	     	
 					    <div class="form-group" >
 								<label>Name of the Officer</label>
 								<input type="text" name="add-name" class="form-control" value="<?=$row['name']?>">
	 						</div>
 			
 							<div class="form-group">
 							  <label>Cadre</label>
 							  <input type="text" name="add-cadre" class="form-control" value="<?=$row['cadre']?>">
 							</div>

 							<div class="form-group">
 							  <label>Login-ID</label>
 							  <input type="text" name="add-id" class="form-control" value="<?=$row['emp_id']?>">
 							</div>
 			
 							<div class="form-group">
 							  <label>Password</label>
 							  <input type="text" name="add-pass" class="form-control" value="<?=$row['passwd']?>">
 							</div>

              <div class="form-group">
                <label>Ministry/Department of</label>
                <input type="text" name="add-pass" class="form-control" value="<?=$row['depof']?>">
              </div>

              <div class="form-group">
                <label>Reporting for the year/period of ending</label>
                <input type="date" name="add-date" class="form-control" value="<?php $yor=$row['yor'];
                echo date_format($yor, 'Y-m-d');?>" 
                >
              </div>
 			
 							<button type="submit" class="btn btn-default" name="update-submit">Update</button>
              <button type="submit" class="btn btn-default" name="rm-submit">Remove</button>
            </form>
</div>

</body>
</html>