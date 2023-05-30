<?php

    /**
     * @access public
     * @package Entity
     */
   
   class EOrder{

    private int $companyID;
    private int $groupID;
    private String $companyName;
    private String $groupName;
    private array $items;
    private bool $sending;

    public function __construct(int $cID, int $gID, String $cN, String $gN, array $i){
        $this->companyID = $cID;
        $this->groupID = $gID;
        $this->companyName = $cN;
        $this->groupName = $gN;
        $this->items = $i;
        $this->sending = false;
    }

    //Defining getters

    public function getCompanyID(): int{
        return $this->companyID;
    }

    public function getGroupID(): int{
        return $this->groupID;
    }

    public function getCompanyName(): String{
        return $this->companyName;
    }

    public function getGroupName(): String{
        return $this->groupName;
    }

    public function getItems(): array{
        return $this->items;
    }

    public function getSending(): bool{
        return $this->sending;
    }

    //Defining methods

    public function setInShipping(): void{
        $this->sending = true;
    }

   }