<?php
//  $user = 'root';
//  $password = '';
// try{
//     //connexion à mySql
//     $bdd=new PDO('mysql:host=localhost;dbname=colyseum', $user, $password);
//     //$bdd->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('DBStatement', array($bdd)));
// }
// catch(exception $e){
// // Afficher un messgage en cas d'erreur
//     die($e->getMessage());
// }

class DB {

	public static $instance;

	public function __construct() {}

	public static function getInstance() {

		if(empty(self::$instance)) {

			try {
				self::$instance = new PDO('mysql:host='. DB_HOST.';port='. DB_PORT.';dbname='. DB_NAME, DB_USER, DB_PASS);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);  
				self::$instance->query('SET NAMES utf8');
				self::$instance->query('SET CHARACTER SET utf8');

			} catch(PDOException $error) {
				echo $error->getMessage();
			}

		}

		return self::$instance;
	}

	// public static function setCharsetEncoding() {
	// 	if (self::$instance == null) {
	// 		self::connect();
	// 	}

		// self::$instance->exec(
		// 	"SET NAMES 'utf8';
		// 	SET character_set_connection=utf8;
		// 	SET character_set_client=utf8;
		// 	SET character_set_results=utf8");
	}
//}

?>