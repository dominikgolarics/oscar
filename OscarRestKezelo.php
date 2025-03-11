<?php
include("restKezelo.php");
include("oscar.php");

class OscarRestKezelo extends RestKezelo{
    function getAllOscars(){
        $oscars = new Oscar();
        $sorAdat = $oscars->getAllOscars();

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat = array('error'=>'No Oscars Found!');
        } else{
            $statusCode = 200;
        }

        $this->setHttpHeaders($statusCode);
        header('Content-Type: Application/json; charset=utf-8');

        $result["Oscars"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "oscars.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function getOscarById($movieID){
        $oscars = new Oscar();
        $sorAdat = $oscars->getOscarByID($movieID);

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat = array('error'=>'No Oscars found by this ID!');
        } else{
            $statusCode = 200;
        }

        $this->setHttpHeaders($statusCode);
        header('Content-Type: Application/json; charset=utf-8');

        $result["OscarsById"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "oscarsbyid.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function getOscarByType($movieType){
        $oscars = new Oscar();
        $sorAdat = $oscars->getOscarByType($movieType);

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat = array('error'=>'No oscars found by this type!');
        } else{
            $statusCode = 200;
        }

        $this->setHttpHeaders($statusCode);
        header('Content-Type: Application/json; charset=utf-8');

        $result["OscarByType"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "oscarsbytype.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    function getFault(){
        $statusCode = 400;
        $this->setHttpHeaders($statusCode);
        header('Content-Type: Application/json; charset=utf-8');
        $sorAdat = array('error'=>'Bad Request');
        $result["Fault"] = $sorAdat;

        $response = $this->encodeJson($result);
        $file_path = "fault.json";
        $this->printfile($response, $file_path);
        echo $response;
    }

    public function encodeJSON($responseData){
        $jsonResponse=json_encode($responseData);
        return $jsonResponse;
    }

    function printfile($responseData, $file_path){
        file_put_contents($file_path, $responseData, LOCK_EX);
    }
}