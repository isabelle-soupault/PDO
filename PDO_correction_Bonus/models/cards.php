<?php
class Cards {
    private $id = 0;
    private $cardNumber = 0;
    private $cardTypesId = 0;
    private $dbCards = NULL;

    public function __construct()
    {
        $db = new db;
        $this->dbCards = $db->connect();
    }

    // select du form
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

   

    // enregistrer la carte du client dans la table Cards
    public function addCard() 
    {      
        $sql = 'INSERT INTO `cards` (`cardNumber`, `cardTypesId`) VALUES (:cardNumber, :cardTypesId)';
        // on prepare la requete
        $result = $this->dbCards->prepare($sql);
        // on change les marqueurs nominatifs par les variables
        
        $result->bindValue(':cardNumber', $this->cardNumber, PDO::PARAM_INT);
        $result->bindValue(':cardTypesId', $this->cardTypesId, PDO::PARAM_INT);
        // on execute la requete
        return $result->execute();
        
    }
  
}

?>