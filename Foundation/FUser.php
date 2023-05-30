<?php

    /**
     * @access public
     * @package Foundation
     */

    include_once "../Entity/EUser.php"; 

    class FUser{

        //private static String $table = "user";
        
        public static function loadInstance(int $id, PDO $handler){

            //Defining query
            $query = "SELECT * FROM users WHERE id = $id";

            //Executing query
            $result = $handler->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            $result = $rows[0];

            //Parsing values
            $fullName = $result["Name"];
            $username = $result["Username"];
            $email = $result['Email'];
            $password = $result['Password'];           
            $location = $result['Residence'];
            $payPal = $result['PayPal'];
            $friends = $result['Friends'];
            $requests = $result['Requests'];
            $invitations = $result['Invitations'];

            //Unserializing arrays
            $friends = unserialize($friends);
            $requests = unserialize($requests);
            $invitations = unserialize($invitations);

            //Instancing object
            $user = new EUser($fullName, $username, $email, $password, $location, $id ,$payPal, $friends, $requests, $invitations);
            
            //Returning object
            return $user;
        }

        public static function storeInstance(array $registrationValues, PDO $handler){
            
            //Getting values
            $name = $registrationValues["Name"];
            $username = $registrationValues["Username"];
            $email = $registrationValues["Email"];
            $password = $registrationValues["Password"];
            $location = $registrationValues["Location"];
            $payPal = $registrationValues["payPal"];

            //Defining query
            $query = "INSERT INTO users(ID, Username, Password, Name, Residence, PayPal, Email, Friends, Requests, Invitations) VALUES (:ID, :username, :userpassword, :fullName, :residence, :paypal, :email, :friends, :requests, :invitations)";
            
            //Preparing query
            $stmt = $handler->prepare($query);

            //Exectuing query
            $stmt->execute(array(":ID"=>null, ":username"=>$username, ":userpassword"=>$password, ":fullName"=>$name, ":residence"=>$location, ":paypal"=>$payPal, ":email"=>$email, ":friends"=>null,":requests"=>null, ":invitations"=>null));

            return true;
        }
    }
?>