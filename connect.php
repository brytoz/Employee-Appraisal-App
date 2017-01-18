<?php
$serverName = ".\SQLEXPRESS"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"nic");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false )  
{  
     echo "Could not connect.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  
//else
//	echo "connection established";

?>