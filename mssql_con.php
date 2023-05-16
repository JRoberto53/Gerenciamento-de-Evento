<?php
ini_set('display_errors', 1);
error_reporting(E_ALL); //corrected based on chris comment

$serverName = "GAMER\SQLEXPRESS";
$connectionInfo = array("UID"=>"SA", "PWD"=>"415263", "Database"=>"Grupo_23");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if( $conn === false ) {
	die( print_r( sqlsrv_errors(), true));
}

//sqlsrv_close($conn);
?>