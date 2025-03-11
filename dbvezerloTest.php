<?php
    require_once 'dbvezerlo.php';

    class DBControllerTest{
        public function RunTest(){
            echo "Teszt indítása... <br>";
            $db = new DBController();
            if($this->TestConnection($db)){
                echo "Sikeres kapcsolódás";
            }
            else{
                echo "Sikertelen kapcsolódás";
            }
            if($this->SelectQueryTest($db)){
                echo "Sikeres";
            }
            else{
                echo "Sikertelen";
            }
            $db->closeDB();
        }

        private function TestConnection($db){
            $refl = new ReflectionClass($db);
            $property = $refl->getProperty('conn');
            $property->setAccessible(true);
            return !is_null($property->getValue($db));
        }

        private function SelectQueryTest($db){
            $result=$db->executeSelectQuery("SELECT m_type FROM movie WHERE m_id = 1");
            print_r($result);
            echo "<br>";
            return is_array($result) && !empty($result) && isset($result[0]['m_type']) && $result[0]['m_type']==1;
        }
    }
$test = new DBControllerTest();
$test->runTest();