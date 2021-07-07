<?php
class Espectacles {
    // domain + valeur par default
    private $id = 0;
    private $title = '';
    private $performer = '';
    private $date = '0000-00-00';
    private $startTime = '00:00';
    private $type = '';
    private $typeId = 0;
    private $dbShows = NULL;
    // methods
    public function __construct()
    {
        $db = new db;
        $this->dbShows = $db->connect();
    }
    public function getTypeShows() 
    {
        $sql = 'SELECT `id`, `type` FROM `showtypes`';
        // instance de la class dbShows + $result est un objet PDO retourne un tableau
        $result = $this->dbShows->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAllShows() 
    {
        $sql = 'SELECT `title`, `performer`, `date`, `startTime` FROM `shows`';
        $result = $this->dbShows->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    
}

    

?>