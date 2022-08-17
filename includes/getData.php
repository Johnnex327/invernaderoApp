<?php
header('Access-Control-Allow-Origin: *');
include 'connect.php';
$json = array();


date_default_timezone_set("America/Guayaquil");
$fecha = date("Y-m-d");

$connect = mysqli_connect($hostname, $username, $password, $database);

$query = "select * from control_riego where fecha= '".$fecha."' AND id_micro= '1' ";
$query2 = "select * from control_riego where fecha= '".$fecha."' AND id_micro= '2' ";
$query3 = "select * from control_riego where fecha= '".$fecha."' AND id_micro= '3' ";
$query4 = "select * from control_riego where fecha= '".$fecha."' AND id_micro= '4' ";

$results = mysqli_query($connect, $query);
$results2 = mysqli_query($connect, $query2);
$results3 = mysqli_query($connect, $query3);
$results4 = mysqli_query($connect, $query4);

if ($data = mysqli_fetch_array($results) 
and $data2 = mysqli_fetch_array($results2)
and $data3 = mysqli_fetch_array($results3)
and $data4 = mysqli_fetch_array($results4)
) {
    $result["h_suelo"] = $data['h_suelo'];
    $result["temperatura"] = $data['temperatura'];
    $result["h_relativa"] = $data['h_relativa'];
    $result["id_micro"] = $data['id_micro'];
    $result["estado"] = $data['estado'];

    $result["h_suelo2"] = $data2['h_suelo'];
    $result["temperatura2"] = $data2['temperatura'];
    $result["h_relativa2"] = $data2['h_relativa'];
    $result["id_micro2"] = $data2['id_micro'];
    $result["estado2"] = $data2['estado'];

    $result["h_suelo3"] = $data3['h_suelo'];
    $result["temperatura3"] = $data3['temperatura'];
    $result["h_relativa3"] = $data3['h_relativa'];
    $result["id_micro3"] = $data3['id_micro'];
    $result["estado3"] = $data3['estado'];

    $result["h_suelo4"] = $data4['h_suelo'];
    $result["temperatura4"] = $data4['temperatura'];
    $result["h_relativa4"] = $data4['h_relativa'];
    $result["id_micro4"] = $data4['id_micro'];
    $result["estado4"] = $data4['estado'];


    $json = $result;

} else {
    $result["h_suelo"] = '0';
    $result["temperatura"] = '0';
    $result["h_relativa"] = '0';
    $json = $result;
}



mysqli_close($connect);
echo json_encode($json);
