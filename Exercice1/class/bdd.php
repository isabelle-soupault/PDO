<?php
class bdd{
    public function connect(){

        $bdd = new PDO('mysql:host=localhost;dbname=sql_colyseum;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        define('DB_HOST', 'localhost');
        define('DB_user', 'root');
        define('DB_PW', '');
        define('DB_NAME', 'sql_colyseum');

        $dsn= 'mysql='. DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';

        try{
        //bdd devient une instance de PDO 

            $bdd = new PDO('mysql:host=localhost;dbname=sql_colyseum;charset=utf8', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION )

        } catch(PDOExeption $e){
            echo 'échec lors de la connexion : ' . $e->getMessage();
            echo 'Informations : [', $e->getCode(), ']', $e->getMessage();
        } return $bdd;

    }

}


?>

