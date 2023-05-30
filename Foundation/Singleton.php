<?php

    /**
     * @access public
     * @package Foundation
     */

    class Singleton{

        private static $instance;

        private function construct(){}

        public function __clone(){
            trigger_error("Clone not allowed.",E_USER_ERROR);
        }

        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new self;
            }
            return self::$instance;
        }
    }    
?>