<?php


$connect = mysqli_connect(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'] ?? '',
    $_ENV['DB_BD']
);

date_default_timezone_set("America/Guayaquil");
$fecha = date("Y-m-d") ?? '2022-06-27 00:00:00';

$riegos = $_POST['riegos'] ??  2;
$h_suelo = $_POST['h_suelo'] ??  45;
$temperatura = $_POST['temperatura'] ??  34;
$h_relativa = $_POST['h_relativa'] ??  73;
$id_micro = $_POST['id_micro'] ??  3;


$query = "SELECT * FROM control_riego WHERE fecha = '" . $fecha . "' ";
$resultado = mysqli_query($connect, $query);

if ($resultado->num_rows === 1) { //Actualiza un registro existente

    //Programar el promedio se humedad / 2

    $result = $connect->query("UPDATE control_riego SET riegos='" . $riegos . "', h_suelo='" . $h_suelo . "', temperatura='" . $temperatura . "',  h_relativa='" . $h_relativa . "', id_micro='" . $id_micro . "' WHERE fecha='" . $fecha . "'");
} else { //Crea un registro si no existe la fecha en la BD

    $result = $connect->query("INSERT INTO control_riego (fecha, riegos, h_suelo, temperatura, h_relativa, id_micro) VALUES ('" . $fecha . "', '" . $riegos . "', '" . $h_suelo . "', '" . $temperatura . "', '" . $h_relativa . "', '" . $id_micro . "');");
}

mysqli_close($connect);
