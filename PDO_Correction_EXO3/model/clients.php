<?php
    class Clients
    {
        //Tip : On peut instancier les attributs avec des valeurs par défaut (mais ce n'est pas obligatoire !)... 
        // ce qui permet de distinguer plus rapidement leurs types (0 = int ; '' = string, 0000-00-00 = date)
        private $id = 0;
        private $lastName = '';
        private $firstName = '';
        private $birthDate = '0000-00-00';
        private $card = true;
        private $cardNumber = 0000;

        private $dbClients = NULL;

        // 'public /private /protected' + 'function() {}' = éq. une fontion en POO
        public function __construct()
        {
            $db = new Db;
            $this->dbClients = $db->connect();

        }

        public function getAllClients() 
        {
            // $sql = 'SELECT `id`, `lastName`, `firstName`, `birthDate`, `card`, `cardNumber` FROM `clients`';

            // Pour changer les noms en MAJ, on utilise la méthode UPPER + AS
            // Pour changer le format de la date, on utilise la méthode DATE_FORMAT (+ options désirées) + AS
            $sql = 'SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS `birthDate`, `card`, `cardNumber` FROM `clients`';

            $result = $this->dbClients->query($sql);    //c'est un PDOStatement qui retourne plusieurs infos
            return $result->fetchAll(PDO::FETCH_OBJ);   //fetchAll() peut prendre des options pour choisir le format dans lequel on récupère les données, soit ici un tableau objet

        }
        public function get20firstClients() 
        {
            
            $sql = ('SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS `birthDate`, `card`, `cardNumber` FROM `clients` LIMIT 20');

            $result = $this->dbClients->query($sql);    //c'est un PDOStatement qui retourne plusieurs infos
            return $result->fetchAll(PDO::FETCH_OBJ);   //fetchAll() peut prendre des options pour choisir le format dans lequel on récupère les données, soit ici un tableau objet

        }
        public function getClientsLimitChoice($limit) 
        {
            
            $sql = 'SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS `birthDate`, `card`, `cardNumber` FROM `clients` LIMIT :limit';
            //: => représente un marqueur nominatif

            $result = $this->dbClients->prepare($sql);    //c'est un PDOStatement qui retourne plusieurs infos
            // prepare => prépare la requête sécurisée
            $result->bindValue(':limit', $limit, PDO::PARAM_INT); 
            // bindValue permet de remplacer le marqueur nominatif dans la requête sql par $limit
            $result->execute(); // execute le prepare + bindValue
            return $result->fetchAll(PDO::FETCH_OBJ);   //fetchAll() peut prendre des options pour choisir le format dans lequel on récupère les données, soit ici un tableau objet

        }

        public function getNewUser($user) {
            $sql= 'INSERT INTO clients (`firstName`, `lastName`, `cardTypes`, `cardNumber`)
            VALUES (?, ?,  ?, ?)';

            $result= $this->dbClients->prepare($sql);
            $result->execute($user->firstName, $user->lastName, $user->cardTypes, $user->cardNumber);

        }

    }
?>
