<?php

include "bd.php";

if($_REQUEST['function'] == "save")
{
    $bd = new data();
    $bd->setValue($_GET['value']);
    echo "<pre>";
    var_dump($bd->getValues());
    echo "</pre>";
}

if ($_REQUEST['function'] == "load")
{
    $bd = new data();
    echo "<pre>";
    var_dump($bd->getValues());
    echo "</pre>";
    return json_encode($bd->getValues());
}

if ($_REQUEST['function'] == "loadLast") {
    $bd = new data();
    echo "<pre>";
    var_dump($bd->getLastValue());
    echo "</pre>";
    return json_encode($bd->getLastValue());
}


?>