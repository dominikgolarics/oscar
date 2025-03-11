<?php
require_once 'oscar.php';

function TestRun(){
    $oscar = new Oscar();
    $oscars = $oscar->getAllOscars();
    if(empty($oscars)){
        echo "Nincs adat.<br>";
    }
    else{
        echo "Filmek felsorolása: <br>";
        foreach($oscars as $osc){
            echo "id: ".$osc['m_ID']. " | Leírás:".$osc['m_desc']."<br><br>";
        }
    }
}

TestRun();