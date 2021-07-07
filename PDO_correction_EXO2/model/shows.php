<?php

// $bd = DB::getInstance();
// DB::setCharsetEncoding();
class shows{
  
    private $id=0;
    private $title="";
    private $performer="";
    private $date="0000-00-00";
    private $startTime="0000-00-00";
    private $duration="0000-00-00";
    private $showTypesId=0;
    private $firstGenresId=0;
    private $secondGenresId=0;
    private $dbShows=NULL;

    public function __construct(){
       $db=new DB;
       $this->dbShows=$db->getInstance();
    }

    public function getAllShows(){
        $sql='SELECT  `title`,`performer` ,DATE_FORMAT(`date`, \'%d/%m/%Y\') AS `date` ,`startTime` FROM `shows` ORDER BY `title`';
        $reponse =$this->dbShows->query($sql);
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }
    public function insertShow(){
        $regex= "/^[a-zA-Z]+$/";
        if(isset($_POST['type'])){
if (preg_match($regex,$_POST['type'])){
    $type = htmlspecialchars(stripslashes(trim($_POST['type'])));
        $insert = "INSERT INTO `showtypes`( `type`) VALUES (:type)";
        $res = $this->dbShows->prepare($insert);
        $exec = $res->execute(array(":type"=>$type));
        // vérifier si la requête d'insertion a réussi
        if($exec){
         echo 'Données insérées';
        }else{
        echo "Échec de l'opération d'insertion";
 }
 }
}
}
}
  
?>