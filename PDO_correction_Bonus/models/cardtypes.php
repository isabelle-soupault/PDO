<?php
class CardTypes {
    private $id = 0;
    private $type = '';
    private $discount = 0;
    private $dbCardTypes = NULL;
    public function __construct()
    {
        $db = new db;
        $this->dbCardTypes = $db->connect();
    }

    // method pour récuperer le type de carte
    public function getCardTypes() 
    {
        $sql = 'SELECT `id`, `type` FROM `cardtypes`';
        $result = $this->dbCardTypes->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    public function getCardTypesId() 
    {
        $sql = 'SELECT `id` FROM `cardtypes`';
        $result = $this->dbCardTypes->query($sql);
        return $result->fetchAll(PDO::FETCH_UNIQUE);
    }
}
