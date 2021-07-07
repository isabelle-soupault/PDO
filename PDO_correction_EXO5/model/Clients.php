<?php

Class Clients {
    private $id = 0;
    private $cardNumber = 0;
    private $cardTypeId = 0;
    private $lastName = '';
    private $firstName = '';

    public function allClients(){
        $sql =  'SELECT `firstname`,`lastname`, `birthDate`, `card`, `cardNumber` FROM clients';
        $res = SingletonPDO::getInstance()->query($sql);
        return $res;
    }

    public function getTwentyClients(){
        $sql =  'SELECT `firstname`,`lastname`, `birthDate`, `card`, `cardNumber` FROM clients LIMIT 20';
        $res = SingletonPDO::getInstance()->query($sql);
        return $res;
    }

    public function getClientsWithCards(){
        $sql =  'SELECT `firstname`,`lastname`, `birthDate`, `card`, `cardNumber` FROM clients WHERE `card` = 1';
        $res = SingletonPDO::getInstance()->query($sql);
        return $res;
    }

    public function getClientsByName($search){
        $search .= '%';
        $sql = 'SELECT `firstname`,`lastname`, `birthDate`, `card`, `cardNumber` FROM clients  WHERE `lastname` LIKE :search ORDER BY `lastname` ASC';
        $res = SingletonPDO::getInstance()->prepare($sql);
        $res->bindValue(':search', $search, PDO::PARAM_STR);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}