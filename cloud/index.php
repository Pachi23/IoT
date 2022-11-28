<?php

include "bd.php";

if($_REQUEST['function'] == "save")
{
    $bd = new data();
    $bd->setValue($_GET['value']);
    // echo "<pre>";
    // var_dump($bd->getValues());
    // echo "</pre>";
    echo var_dump($bd->getValues());
}

if ($_REQUEST['function'] == "load")
{
    $bd = new data();
    // echo "<pre>";
    // var_dump($bd->getValues());
    // echo "</pre>";
    echo json_encode($bd->getValues());
}

if ($_REQUEST['function'] == "loadLast") {
    $bd = new data();
    // echo "<pre>";
    // var_dump($bd->getLastValue());
    // echo "</pre>";
    echo json_encode($bd->getLastValue());
}


?>