<?php
class clients 
{
    private $id = 0;
    private $lastName = '';
    private $firstName = '';
    private $birthDate = '0000-00-00';
    private $card = true; 
    private $cardNumber = 0000;

    private $dbClients = NULL;

//Ici on instancie avec des valeurs par défaut pour retrouver rapidement les valeurs. Si les attribus sont obligatoires, les valeurs par défaut non, mais sont visuelles 

    public function __construct(){
        $bdd = new bdd;
        //$bdd->connect();
        //ici on a instancié notre objet PDO  mais connect ne renvoie nul part et on veut l'utiliser partout.
        $this->dbClients = $bdd->connect();
    }
//Maintenant on fait du MVC (modele (gère les données) View (gère l'affichage) Controleur (c'est le négociateur car les deux autres ne se parlent pas entre eux) ) 
    public function getAllClients(){
//Cette méthode va aller dans la BDD récupérer tous les clients. Donc cela fait maintenant penser aux requêtes sql
        $sql = 'SELECT `firstName`, `lastName` FROM `clients`';
    }

}

?> 

<!--Il n'est pas possible de faire $instance -> __contruct()
En revanche, on peut faire $instance = new Class le fait car cela appelle implicitement le __construct()-->