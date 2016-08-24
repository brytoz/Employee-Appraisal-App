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
    $query = "select * from review_officer where rev_off_id='$id'";
    $data=sqlsrv_query($conn,$query);
    $row=sqlsrv_fetch_array($data);
    if(isset($_POST['update-submit']))
    {
      if(!empty($_POST['up-id'])&&!empty($_POST['up-pass'])&&!empty($_POST['up-name'])&&!empty($_POST['up-designation']))
        {
          $rev_id=$_POST['up-id'];
          $valid_email="/^[a-zA-Z0-9+-=?^_{|}~]+/";
          if(!preg_match($valid_email,$rev_id))
          {
            echo "enter valid ID";
          }
          else
          {
            $pas=$_POST['up-pass'];
            $name=$_POST['up-name'];
            $valid_name="/^[a-zA-Z]+/";
            if(!preg_match($valid_name,$name))
            {
              echo "Enter valid";
            }
            else
            {
              $desig=$_POST['up-designation'];
              $valid_name="/^[a-zA-Z]+/";
              if(!preg_match($valid_name,$desig))
              {
                  echo "Enter valid";
              }
              else
              {
                $query = "update review_officer set 
                rev_off_id='$rev_id',
                passwd='$pas',
                name='$name',
                designation='$desig'
                where rev_off_id='$id'";
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
      $query = "delete from review_officer where rev_off_id='$id'";
      sqlsrv_query($conn,$query) or die('Error in deletion');
      $query = "update reporting_officer set rev_off_id='' where rev_off_id='$id'";
      sqlsrv_query($conn,$query) or die('Error in deletion');
      $query = "update employee set rev_off_id='' where rev_off_id='$id'";
      sqlsrv_query($conn,$query) or die('Error in deletion');
      echo "Officer deleted Successfully";
    }


?>
<!--////////////////////////PHP END/////////////////////////////////////-->

    <div class="container col-sm-6">
 
            <form role="form" action="" name="add-form" method="post">
              
              <div class="form-group">
              
              <label>Name</label>
              <input type="text" name="up-name" class="form-control" value="<?=$row['name']?>">
              </div>

              <div class="form-group">
              <label>Designation</label>
              <input type="text" name="up-designation" class="form-control" value="<?=$row['designation']?>">
              </div>

              <div class="form-group">
              <label>Login-ID</label>
              <input type="text" name="up-id" class="form-control" value="<?=$row['rev_off_id']?>">
              </div>
              

              <div class="form-group">
              <label>Password</label>
              <input type="text" name="up-pass" class="form-control" value="<?=$row['passwd']?>">
              </div>
              

              <button type="submit" class="btn btn-default" name="update-submit">Update</button>

              <button type="submit" class="btn btn-default" name="rm-submit">Remove</button>
            
            </form>
</div>

</body>
</html>