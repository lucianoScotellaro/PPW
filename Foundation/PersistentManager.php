<?php

    /**
     * @access public
     * @package Foundation
     */

    include_once("Singleton.php");

    class PersistentManager extends Singleton{
        // private String $hostname = "localhost";
        private PDO $dbHandler;

        //Initializing connection to DB
        public function __construct(){
            $this->dbHandler = new PDO("mysql:host=localhost;dbname=shoppingpartydb", "root", "");
        }

        public function getDBHandler():PDO{
            return $this->dbHandler;
        }
        
        public function load(int $id, String $objectType){
            $handler = $this->dbHandler;
            $result = $objectType::loadInstance($id,$handler);
            return $result;
        }

        public function store(array $values, String $objectType){
            $handler = $this->dbHandler;
            $objectType::storeInstance($values, $handler);
        }
    } 

?>

