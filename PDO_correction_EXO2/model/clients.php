<?php

// $bd = DB::getInstance();
// DB::setCharsetEncoding();
class clients{
    private $id=0;
    private $lastName="";
    private $firstName="";
    private $birthDate="0000-00-00";
    private $card=true;
    private $cardNumber=0;
    private $dbClients=NULL;

    public function __construct(){
       $db=new DB;
       $this->dbClients=$db->getInstance();
    }

    public function __destruct(){

    }
    public function getAllClients(){
        $sql='SELECT `id`,UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS `birthDate`,`card`,`cardNumber`FROM `clients`';
        $reponse =$this->dbClients->query($sql);
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }
    public function getTwentyClients(){
        $sql='SELECT `id`,UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS `birthDate`,`card`,`cardNumber`FROM `clients`limit 20 ';
        $reponse =$this->dbClients->query($sql);
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }
    public function getClientsHasCard(){
        $sql='SELECT `id`,UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS `birthDate`,`card`,`cardNumber`FROM `clients`WHERE `card`=1 ';
        $reponse =$this->dbClients->query($sql);
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }
    public function getClientsLastNameStartM(){
        $sql='SELECT `id`, `lastName`, `firstName`FROM `clients` WHERE `lastName` LIKE \'M%\' ORDER BY `lastName`';
        $reponse =$this->dbClients->query($sql);
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }
   
}
?>