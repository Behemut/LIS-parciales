<?php
    include ('inc/header.php');
    if (!(empty($_GET))){
        $idR         = $_GET['idR'];
        $fechaSalida  = $_GET['fechaSalida'];
        $horaSalida = $_GET['horaSalida'];
        $fechaSalida  = date("Y-m-d h:i:s",strtotime($fechaSalida));
        $sql = "UPDATE reservacion SET fechaSalida = '$fechaSalida' , horaSalida = '$horaSalida' WHERE idReservacion = '$idR'";
        $result = query($sql);
        confirm($result);
        redirect("myReservations.php");
    }
?>