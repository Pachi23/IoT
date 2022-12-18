<?php

require_once "bd.php";

function getDataForGraph()
{
    return load();
}

function save($value)
{
    $bd = new data();

    $tmp = trim($value, "[");
    $value = intval(trim($tmp, "]"));

    $bd->setValue($value);
    $data = loadLast();

    $lastValue = $data['value'];
    return intval($lastValue);
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
    if (!(isset($last))) {
        $data['min'] = "-";
        $data['max'] = "-";
        $data['last'] = "-";
        return $data;
    }

    $allData = load();

    $min = $allData[0]['value'];
    $max = $allData[0]['value'];
    $count = 0;
    $mean = 0;

    foreach ($allData as $key => $value) {
        $val = $value['value'];
        if ($val > $max)
            $max = $val;
        else if ($val < $min)
            $min = $val;

        $mean += $val;
        $count++;
    }

    $mean = round($mean / $count, 4);

    $data['min'] = $min;
    $data['max'] = $max;
    $data['last'] = $last['value'];
    $data['mean'] = $mean;
    $data['count'] = $count;

    return $data;
}