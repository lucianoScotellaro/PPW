<?php

    /**
     * @access public
     * @package Foundaiton
     */

    include_once("../Entity/EGroup.php");

    class FGroup{

        public static function loadInstance(int $id, PDO $handler){

            //Defining query
            $query = "SELECT * FROM groups WHERE id = $id";

            //Executing query
            $result = $handler->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            $result = $rows[0];

            //Parsing values
            $name = $result["Name"];
            $date = $result["Date"];
            $goal = $result["Goal"];
            $members = $result["Members"];
            $leader = $result["Leader"];
            $location = $result["Location"];
            $items = $result["Items"];
            $payments = $result["Payments"];
            $carts = $result["Carts"];
            $private = $result["Private"];

            //Unserializing arrays
            $members = unserialize($members);
            $items = unserialize($items);
            $payments = unserialize($payments);
            $carts = unserialize($carts);

            //Instancing object
            $group = new EGroup($name, $id, $date, $goal, $members, $leader, $location, $items, $carts, $payments, $private);

            //Returning object
            return $group;
        }

        public static function storeInstance(array $groupCreationValues, PDO $handler){

            //Getting values
            $name = $groupCreationValues["Name"];
            $date = $groupCreationValues["Date"];
            $goal = $groupCreationValues["Goal"];
            $members = $groupCreationValues["Members"];
            $leader = $groupCreationValues["Leader"];
            $location = $groupCreationValues["Location"];
            $items = $groupCreationValues["Items"];
            $payments = $groupCreationValues["Payments"];
            $carts = $groupCreationValues["Carts"];
            $private = $groupCreationValues["Private"];

            //Defining query
            $query = "INSERT INTO groups(ID, Name, Date, Goal, Members, Leader, Location, Items, Payments, Carts, Private) VALUES (:ID, :name, :date, :goal, :members, :leader, :location, :items, :payments, :carts, :private";

            //Preparing query
            $stmt = $handler->prepare($query);

            //Executing query
            $stmt->execute(array(":ID"=>null, ":name"=>$name, ":date"=>$date, ":goal"=>$goal, ":members"=>$members, ":leader"=>$leader, ":location"=>$location, ":items"=>$items, ":payments"=>$payments, ":carts"=>$carts, ":private"=>$private));

            return true;
        }
    }
?>
