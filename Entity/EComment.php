<?php

    class EComment{
        private int $userID;
        private int $companyID;
        private int $itemID;
        private String $text;
        private int $vote;

        public function __construct(int $u, int $c, int $i, String $t, int $v){
            $this->userID = $u;
            $this->companyID = $c;
            $this->itemID = $i;
            $this->text = $t;
            $this->vote = $v;
        }

        
    }