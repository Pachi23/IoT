<?php

require_once "bd.php";

function getDataForGraph()
{
    $bd = new data();
    return load();
}

function save($value)
{
    $bd = new data();
    $bd->setValue($value);
    return load();
}

function load()
{
    $bd = new data();
    return $bd->getValues();
}

function loadLast()
{
    $bd = new data();
    return json_encode($bd->getLastValue());
}
