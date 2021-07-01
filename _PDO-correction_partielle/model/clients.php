<?php
class clients
{
    //On instancie les attributs avec des valeurs par défaut (mais ce n'est pas obligatoire !) pour retrouver rapidement leurs types
    private $id = 0;
    private $lastName = '';
    private $firstName = '';
    private $birthDate = '0000-00-00';
    private $card = true;
    private $cardNumber = 0000;

    private $dbClients = NULL;

    public function __construct()
    {
        $db = new db;
        $this->dbClients = $db->connect();

    }

    public function getAllClients() 
    {
        $sql = 'SELECT `id`, `lastName`, `firstName`, `birthDate`, `card`, `cardNumber` FROM `clients`';
    }

}
