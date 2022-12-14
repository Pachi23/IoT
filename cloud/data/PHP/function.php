<?php

require_once "bd.php";

function getDataForGraph()
{
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
    return $bd->getLastValue();
}

function getLast10Recods()
{
    $bd = new data();
    return $bd->getLast10RecodsBD();
}

function getStats()
{
    $last = loadLast();
    $bd = new data();
    $data = $bd->getStatsBD();
    
    $data['last'] = $last['value'];
    return $data;
}