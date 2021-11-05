<?php
session_start();
// var_dump($_SESSION);

include "autoload.php";
if(isset($_GET['c'])){
    if(isset($_GET['m'])){
        $c = $_GET['c'];
        $m = $_GET['m'];
    }
}
else{
    $c = "Ctrhome";
    $m = "getHome";
}
/**
 * Route test
 */
$ctrl = new $c;
$ctrl->$m();
?>
