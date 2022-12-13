<?php

include __DIR__ . "/data/PHP/function.php";

if ((isset($_REQUEST['function'])) && $_REQUEST['function'] == "save") {
    // El save ha da anar amb claus. Ex index.php?function=save&value=[10]
    var_dump(save($_GET['value']));
} else if ((isset($_REQUEST['function'])) && $_REQUEST['function'] == "load") {
    var_dump(load());
} else if ((isset($_REQUEST['function'])) && $_REQUEST['function'] == "loadLast") {
    var_dump(loadLast());
} else {
    include __DIR__ . "/data/PHP/graphs.php";
}
