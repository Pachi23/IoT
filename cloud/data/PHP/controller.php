<?php
include_once "function.php";

if (isset($_REQUEST['function'])) {
    switch ($_REQUEST['function']) {

        case "getDataForGraph":
            echo json_encode(getDataForGraph());
            break;

        case "getLast10Recods":
            echo json_encode(getLast10Recods());
            break;
    }    
}
