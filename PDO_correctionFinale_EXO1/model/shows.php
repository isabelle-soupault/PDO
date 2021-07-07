<?php
class shows {

    private $id = 0;
    private $type= '';

    private $dbShows = NULL;

    public function __construct(){
        $db = new db;
       
    }

    public function getAllShows() 
    {
        $sql= 'SELECT `type` FROM `showtypes` ';

        $result = $this->dbShows->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }    
}


?>