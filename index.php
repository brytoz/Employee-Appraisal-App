<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" async></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" async></script>
  	<link rel="stylesheet" type="text/css" href="style.css">
    <script>
function login_php(str) {
    //alert("Hello");
    if (str == "") {
        document.getElementById("id1").innerHTML = "";

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
                document.getElementById("id1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","login_back.php?user="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>

<body>
</div>

<div class="container col-sm-3" id="full"></div>


<div class="container col-sm-3" id="index-container">

	<div class="form-group ">
		<img src="images/2.jpg" class="img-responsive">
    <label >Login Option</label>
	
  <select class="form-control" onchange="login_php(this.value)">
		<option value="">Login Type</option>
    <option value="1" >Admin</option>
    <option value="2">Officer</option>
		<option value="3">Reporting-Officer</option>
		<option value="4">Reviewing-Officer</option>
	</select>
	
  </div>


			
			<form role="form" method="post" action="login_back.php">

			<div class="form-group ">
			<h2>Sign In</h2>
      <label>User Name</label>
			<input type="text" class="form-control" placeholder="Enter User ID" name="uname" size="35">
			
      <label>Password</label>
			<input type="Password" class="form-control" placeholder="Enter Password" name="pword" size="35"><br>
			
      <button type="submit" class="btn btn-default " name="submit-login">Login</button>
			
      </div>
		
    </form>


	</div>

</body>
</html>

