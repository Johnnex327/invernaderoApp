<?php 

    include 'connect.php';
    $connect = mysqli_connect($hostname, $username, $password, $database);

    date_default_timezone_set("America/Guayaquil");
    $fecha = date("Y-m-d") ?? '2022-06-28 00:00:00';

    $riegos = $_POST['riegos'] ??  0;
    $h_suelo = $_POST['h_suelo'] ??  0;
    $temperatura = $_POST['temperatura'] ??  32;
    $h_relativa = $_POST['h_relativa'] ??  65;
    $id_micro = $_POST['id_micro'] ?? 10;
    $estado = $_POST['estado'] ?? "-";


    $query = "SELECT * FROM control_riego WHERE fecha = '".$fecha."' AND id_micro= '$id_micro' ";
    $resultado = mysqli_query($connect, $query);
    


    if($resultado->num_rows === 1){ //Actualiza un registro existente

        //Programar el promedio se humedad / 2

        $result=$connect->query("UPDATE control_riego SET riegos='".$riegos."', h_suelo='".$h_suelo."', temperatura='".$temperatura."',  h_relativa='".$h_relativa."', id_micro='".$id_micro."', estado='".$estado."' WHERE fecha='".$fecha."' AND id_micro='".$id_micro."' ");
    }
    
    if($resultado->num_rows === 0){//Crea un registro si no existe la fecha en la BD

        $result=$connect->query("INSERT INTO control_riego (fecha, riegos, h_suelo, temperatura, h_relativa, id_micro, estado) VALUES ('".$fecha."', '".$riegos."', '".$h_suelo."', '".$temperatura."', '".$h_relativa."', '".$id_micro."', '".$estado."' );");
    }

    mysqli_close($connect);