<?php
class showTypes{
    private $id=0;
    private $type="";
    private $dbShowTypes=NULL;

    public function __construct(){
       $db=new DB;
       $this->dbShowTypes=$db->getInstance();
    }

    public function getAllShowTypes(){
        $sql='SELECT `id`,`type` FROM `showtypes`';
        $response =$this->dbShowTypes->query($sql);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}