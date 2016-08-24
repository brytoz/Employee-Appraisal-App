<?php

require "connect.php";

$query="select * from employee";
$data=sqlsrv_query($conn,$query,array(), array( "Scrollable" => 'keyset' ));
$num=sqlsrv_num_rows($data) or die(print_r(sqlsrv_errors(),true));
echo $num;	




?>