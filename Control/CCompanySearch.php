<?php

    /**
     * @access public
     * @package Control
     */

    include_once("../Foundation/Singleton.php");
    include_once("../Foundation/PersistentManager.php");

    class CCompanySearch{
        
        public function startCompanySearch(){
            //Guardare come fare redirect su una form (e anche come fare la form kek)
        }

        public function companySearch(String $nome, Position $location, int $ID){
                   
        
        }

        public function companySelect(int $ID){
            $persistentManager = PersistentManager::getInstance();
            $company = $persistentManager->load($ID, "FCompany");
        }
    }