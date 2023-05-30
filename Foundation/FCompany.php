<?php

    /**
     * @access public
     * @package Foundation
     */

    include_once("../Entity/ECompany.php");

    class FCompany{

        public static function loadInstance(int $id, PDO $handler){

            //Defining query
            $query = "SELECT * FROM companies WHERE id = $id";

            //Executing query
            $result = $handler->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            $result = $rows[0];

            //Parsing values 
            $name = $result["Name"];
            $catalog = $result["Catalog"];
            $orders = $result["Orders"];
            $description = $result["Description"];

            //Unserializing arrays
            $catalog = unserialize($catalog);
            $orders = unserialize($orders);

            //Instancing object
            $company = new ECompany($name, $catalog, $orders, $description, $id);

            //Returning object
            return $company;

        }

        public static function storeInstance(array $companyCreationValues, PDO $handler){

            //Getting values
            $name = $companyCreationValues["Name"];
            $catalog = $companyCreationValues["Catalog"];
            $description = $companyCreationValues["Description"];

            //Serializing arrays to store them
            $catalog = serialize($catalog);

            //Defining query
            $query = "INSERT INTO companies(ID, Name, Catalog, Orders, Description) VALUES (:ID, :name, :catalog, :orders, :description)";

            //Preparing query
            $stmt = $handler->prepare($query);

            //Executing query
            $stmt->execute(array(":ID"=>null, ":name"=>$name, ":catalog"=>$catalog, ":orders"=>null,":description"=>$description));

            return true;
        }
    }



?>
