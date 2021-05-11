<?php

    require_once("inc/header.php");

    if ($_GET['idR'] != ''){
        $id = $_GET['idR'];
        $sql = "DELETE FROM `reservacion` WHERE `idReservacion` = $id ";
        $result = query($sql);
        confirm($result);
        redirect('myReservations.php');
    }
    
?>