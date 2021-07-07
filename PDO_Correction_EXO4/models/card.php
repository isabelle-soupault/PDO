<?php

class cardType{
    private $id = 0;
    private $type = '';
    private $discount = 0;
    private $dbCard = NULL;

    public function __construct()
    {
        $db = new db;
        $this->dbCard = $db->connect();

    }

    public function getCardList() {
        $sql = 'SELECT `id`, `type`, `discount` FROM `cardtypes` ';

    $result = $this->dbCard->query($sql);
    return $result->fetchAll(PDO::FETCH_OBJ);
    }
      
}


?>