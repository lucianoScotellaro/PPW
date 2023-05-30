<?php

    class EUser{

        //Sistema mixed su Location e ID

        //Defining parameters

        private String $fullName;
        private String $username;
        private String $email;
        private String $password;
        private mixed $location;
        private mixed $userID;
        private String $payPal;
        private $friends;
        private $requests;
        private $invitations;

        //Defining constructor

        public function __construct(String $fn, String $u, String $e, String $pw, mixed $l, mixed $ID, String $pp, array $f, array $r, array $i){
            $this->fullName = $fn;
            $this->username = $u;
            $this->email = $e;
            $this->password = $pw;
            $this->location = $l;
            $this->userID = $ID;
            $this->payPal = $pp;
            $this->friends = $f;
            $this->requests = $r;
            $this->invitations = $i;
        }

        //Defining getters

        public function getFullName(): String{
            return $this->fullName;
        }

        public function getUsername(): String{
            return $this->username;
        }

        public function getEmail(): String{
            return $this->email;
        }

        public function getPassword(): String{
            return $this->password;
        }

        public function getLocation(): mixed{
            return $this->location;
        }

        public function getID(): mixed{
            return $this->userID;
        }

        public function getPayPal(): String{
            return $this->payPal;
        }

        public function getFriendlist(){
            return $this->friends;
        }

        public function getRequests(){
            return $this->requests;
        }

        public function getInvitations(){
            return $this->invitations;
        }

        //Defining methods 

        public function removeRequest(EUser $u){
            $userID = $u->getID();
            $key = array_search($userID, $this->requests);
            unset($this->requests[$key]);
        }
        
        public function addRequest(EUser $u){
            $userID = $u->getID();
            array_push($this->requests, $userID);
        }

        public function addFriend(EUser $u){
            $userID = $u->getID();
            array_push($this->friends, $userID);
        }

        public function addInvitation(EUser $u, EGroup $g){
            $userID = $u->getID();
            $groupID = $g->getID();
            array_push($this->invitations[$userID], $groupID);
        }

        public function removeInvitation(EUser $u, EGroup $g){
            $userID = $u->getID();
            $groupID = $g->getID();
            $key = array_search($this->invitations[$userID], $groupID);
            unset($this->invitations[$userID][$key]);
        }


    }

