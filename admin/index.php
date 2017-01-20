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
              url: "search_officer.php",
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
<?php require("header.php") ;

require "connect.php";
  if(isset($_POST['add-submit']))
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
            $passwd=$_POST['add-pass'];
            $depof=$_POST['depof'];
            $date=date('Y-m-d', strtotime('$date'));
            $query = "insert into employee (emp_id,passwd,cadre,name,yor,depof) values ('$id','$passwd','$cadre','$name','$date','$depof')";
            sqlsrv_query($conn,$query) or die('error in insertion');
            echo "form submitted successfully";
          }
        }
      }
    }
    else
    {
      echo "Entries are mandetory !";
    }
  }
  else if(isset($_POST['edit-submit']))
  {
    if(!empty($_POST['edit-id']))
    {
      $id=$_POST['edit-id'];
      //echo $id;
      $query="select emp_id from employee where emp_id='$id'";
      $data=sqlsrv_query($conn,$query);
      if(sqlsrv_fetch_array($data))
      {
        header("Location:edit_gen_officer.php?id=".$id);
      }
      else
      {
        echo "employee doesnot exist";
      }
      //$row=sqlsrv_fetch_array($data);
      //$num=sqlsrv_num_rows($data);

    }
    else
    {
      echo "Entries are mandetory !";
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
              <option value="admin_gen_officer.php" selected="">General Officer</option>
              <option value="admin_rep_officer.php" >Reporting-Officer</option>
              <option value="admin_rev_officer.php" >Reviewing-Officer</option>
            </select>
        </div>
      </form>
    </div>
<!--Select list end-->
<!--Actions that can be performed by admin on a officer-->
    <div class="container col-sm-3  " id="c2">
      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#add">Add Officer</a></li>
        <li><a data-toggle="pill" href="#edit">Manage Officer</a></li>
      </ul>
      
      <div class="tab-content">


 <!--option no-1 Add an officer-->
        <div id="add" class="tab-pane fade in active">
          <h3>Add Officer</h3>
            <form role="form" action="" name="add-form" method="post">
          
                <div class="form-group" >
                <label>Name of the Officer</label>
                <input type="text" name="add-name" class="form-control">
              </div>
      
              <div class="form-group">
              <label>Cadre</label>
              <input type="text" name="add-cadre" class="form-control">
              </div>
      
              <div class="form-group">
              <label>Report for the year/period of ending</label>
              <input type="date" name="add-date" class="form-control">
              </div>

              <div class="form-group">
              <label>Ministry/Department of</label>
              <input type="date" name="depof" class="form-control">
              </div>
      
              <div class="form-group">
              <label>Login-ID</label>
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
<!--option no-2 Edit an officer-->
        <div id="edit" class="tab-pane fade">
          <h3>Edit Officer</h3>
            <form role="form" method="post" action="" name="edit-form" >

              <div class="form-group">
              <label>Officer-ID</label>
              <input type="text" name="edit-id" class="form-control search" placeholder="Search officer by ID"  id="searchid">
              </div>
              <h5>Type all to list all officers</h5>
              <div class="result"></div>
              
            </form>
        </div>
<!--End of remove officer code-->
    </div>
<!--End of options code-->
</div>

<!--End of container-->

</body>
</html>