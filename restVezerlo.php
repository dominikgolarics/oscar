<?php
require_once("OscarRestKezelo.php");
$view = "";
if(isset($_GET["view"])){
    $view = $_GET["view"];

    switch($view){
        case "all":
            $oscarrest = new OscarRestKezelo();
            $oscarrest->getAllOscars();
            break;
        case "single":
            $oscarrest = new OscarRestKezelo();
            $oscarrest->getOscarById($_GET["id"]);
            break;
        case "type":
            $oscarrest = new OscarRestKezelo();
            $oscarrest->getOscarByType($_GET["name"]);
            break;
        default:
            $oscarrest = new OscarRestKezelo();
            $oscarrest->getFault();
    }
}