<?php
class Clients
{
    // domain + valeur par default
    private $id = 0;
    private $lastName = '';
    private $firstName = '';
    private $birthDate = '0000-00-00';
    private $card = true;
    private $cardNumber = 0;
    private $dbClients = NULL;
    // methods
    public function __construct()
    {
        $db = new db;
        $this->dbClients = $db->connect();
    }
    // function pour recuperer les valeurs des atributs
    public function __get($name)
    {
        return $this->$name;
    }
    // function pour remplir la valeur de l'atribut
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    // method pour inicialiser la transaction (x requetes )
    // 3 method pdo
    // https://www.php.net/manual/fr/pdo.begintransaction.php
    public function beginTransaction()
    {
        return $this->dbClients->beginTransaction();
    }
    //
    public function commit()
    {
        return $this->dbClients->commit();
    }
    public function rollBack()
    {
        return $this->dbClients->rollBack();
    }


    // exo 1
    public function getAllClients()
    {
        $sql = 'SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS `birthDate`, `card`, `cardNumber` FROM `clients` ORDER BY `id` ASC';
        // instance de la class sdClients + $result est un objet PDO retourne un tableau
        $result = $this->dbClients->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
        //https://www.php.net/manual/es/pdostatement.fetch.php
    }
    // exo 2
    public function get20Clients()
    {
        $sql = 'SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName` FROM `clients` LIMIT 20';
        $result = $this->dbClients->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    // exo 3
    public function getClientsLimitChoice($limit)
    // la method c'est une fonction de l'objetc, ici on peut ajouter un argument
    {
        //$sql = 'SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName` FROM `clients` LIMIT' . $limit;
        // avec LIMIT' . $limit; marche mais pas de sécurité -- injections sql
        // la method query est danger si il y a des forms avec des infos de l'exterieur
        // requette preparé
        $sql = 'SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName` FROM `clients` LIMIT :limit';
        // : marqueur nominatif  (marcador de nombre) ecrit juste avec : avant le mot créé
        $result = $this->dbClients->prepare($sql);
        $result->bindValue(':limit', $limit, PDO::PARAM_INT); // securité
        $result->execute(); // recupere la requette
        // marqueur nominatif + prepare + execute
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    // exo 4
    public function getClientsCardFidelity()
    {
        $sql = 'SELECT `clients`.`id`, UPPER(`clients`.`lastName`) AS `lastName`, `clients`.`firstName`, DATE_FORMAT(`clients`.`birthDate`, \'%d/%m/%Y\') AS `birthDate`, `card`, `cards`.`cardNumber` FROM `clients` INNER JOIN `cards` ON `clients`.`cardNumber` = `cards`.`cardNumber` WHERE `card`= 1  ';
        $result = $this->dbClients->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    // exo 5 
    public function getclientsLastNameM($search)  // : marqueur nominatif  
    {
        $search .= '%';
        $sql = 'SELECT `firstName`, `lastName` FROM `clients` WHERE `lastName` LIKE :search ORDER BY `lastName` ASC';
        // : marqueur nominatif  
        $result = $this->dbClients->prepare($sql);
        $result->bindValue(':search', $search, PDO::PARAM_STR);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC: retourne un tableau indexé par le nom de la colonne comme retourné dans le jeu de résultats
    }
    // exo 7
    public function getAllClientsCards()
    {
        //avec CASE + utilisé
        //$sql = 'SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS `birthDate`, CASE WHEN `card` = 0 THEN \'Non\' ELSE \'Oui\' END AS `card`, `cardNumber` FROM `clients`';  
        //avec IF
        $sql = 'SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS `birthDate`, IF (`card` = 0 , \'Non\', \'Oui\') AS `card`, `cardNumber` FROM `clients` ORDER BY `id` DESC';
        $result = $this->dbClients->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    // exo 7-2 
    public function setNewClient()  //  
    {
        // prepare la requete       
        $sql = 'INSERT INTO `clients` (`lastName`, `firstName`, `birthDate`, `card`, `cardNumber` ) VALUES (:lastName, :firstName, :birthDate, :cart, :cardNumber)';
        // on prepare la requete
        $result = $this->dbClients->prepare($sql);
        // on change les marqueurs nominatifs par les variables
        $result->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $result->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $result->bindValue(':birthDate', $this->birthDate, PDO::PARAM_STR); // date n'existe pas
        $result->bindValue(':cart', $this->card, PDO::PARAM_INT); // boolean n'existe pas
        $result->bindValue(':cardNumber', $this->cardNumber, PDO::PARAM_INT);
        // on execute la requete
        return $result->execute();
    }

    public function selectThisClient($clientId)
    {
        $sql = 'SELECT `id`  FROM `clients` WHERE `id`= $clientId';
        $result = $this->dbClients->query($sql);
        return $result->fetch(PDO::FETCH_OBJ);
    }

    public function deleteClient($clientID)
    {
        //var_dump($clientID);
        $clientID = $_POST['clientID'];
        // prepare la requette       
        $sql = 'DELETE FROM `clients` WHERE `id`= :clientId';
        // on change les marqueurs nominatifs par les variables
        $result = $this->dbClients->prepare($sql);
        $result->bindValue(':clientId', $clientID, PDO::PARAM_INT);
        // on execute la requette
        $result->execute();
        return $result->fetch(PDO::FETCH_OBJ);
    }
}
