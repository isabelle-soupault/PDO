<?php
class shows {

    private $id = 0;
    private $title = '';
    private $performer = '';
    private $date = 0000-00-00;
    private $showTypesId = 000;
    private $firstGenreId ='';
    private $secondGenreId = '';
    private $duration = 00-00;
    private $startTime = 00-00;


    private $dbShows = NULL;

    public function __construct(){
        $db = new db;
        $this->dbShows = $db->connect();
    }

    public function getAllShows() 
    {
        $sql= 'SELECT `type` FROM `showtypes` ';

        $result = $this->dbShows->query($sql);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }    
}


?>