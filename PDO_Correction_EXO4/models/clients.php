<?php
class clients {
    // domain + valeur par default
    private $id = 0;
    private $lastName = '';
    private $firstName= '';
    private $birthDate = '0000-00-00';
    private $card= true;
    private $cardNumber= 0;
    private $dbClients = NULL;
    // methods
    public function __construct()
    {
        $db = new db;
        $this->dbClients = $db->connect();

    }
    public function getAllClients() 
    {
        $sql = 'SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`,\'%d/%m/%Y\') AS `birthDate`, `cardNumber`,
        CASE WHEN `card` = 1 THEN "Oui"
            ELSE "Non"
        END AS `cardExist`
        FROM `clients`;
        ';
        // instance de la class sdClients + $result est un objet PDO retourne un tableau
        $result = $this->dbClients->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
        //https://www.php.net/manual/es/pdostatement.fetch.php
    }
    public function get20Clients() 
    {
        $sql = 'SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName` FROM `clients` LIMIT 20';
        $result = $this->dbClients->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
        
    }
    
    public function getClientslimitChoise($limit) 
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
    public function getClientsCardFidelity() 
    {
        $sql = 'SELECT `cards`.`id`, UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS `birthDate`, `card`, `cards`.`cardNumber` FROM `clients` INNER JOIN `cards` ON `clients`.`cardNumber` = `cards`.`cardNumber` WHERE `card`= 1 AND `cards`.`cardTypesId`= 1 '  ; 
        $result = $this->dbClients->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);        
    }   
    public function getclientsLastNameM() 
    {
        $sql = "SELECT `firstName`, `lastName` FROM `clients` WHERE `lastName` LIKE 'M%' ORDER BY `lastName` ASC";
        $result = $this->dbClients->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);        
    } 
}


?>