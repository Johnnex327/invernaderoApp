<?php
header('Access-Control-Allow-Origin: *');
include 'connect.php';
$json = array();


date_default_timezone_set("America/Guayaquil");
$fecha = date("Y-m-d");

$connect = mysqli_connect($hostname, $username, $password, $database);
$query = "select * from control_riego where fecha= '".$fecha."' ";
$results = mysqli_query($connect, $query);

if ($data = mysqli_fetch_array($results)) {
    $result["h_suelo"] = $data['h_suelo'];
    $result["temperatura"] = $data['temperatura'];
    $result["h_relativa"] = $data['h_relativa'];
    $json = $result;

} else {
    $result["h_suelo"] = '0';
    $result["temperatura"] = '0';
    $result["h_relativa"] = '0';
    $json = $result;
}

/* date_default_timezone_set("America/Guayaquil");
$hora = date("i");
if ($hora === '44') {
    $result = $connect->query("UPDATE variables_vivo SET suelo='40', temperature='20',  humidity='10' WHERE id=1");
} */

mysqli_close($connect);
echo json_encode($json);
