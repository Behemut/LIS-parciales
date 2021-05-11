<?php

    require_once("inc/header.php");

    if ($_GET['idc'] != ''){
        $id = $_GET['idc'];
        $sql = "DELETE FROM `circuito` WHERE `idCircuito` = $id ";
        $result = query($sql);
        confirm($result);
        redirect('logindex.php');
    }
    
?>