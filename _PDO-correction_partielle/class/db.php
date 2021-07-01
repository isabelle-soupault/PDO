<?php
class db
{
	public function connect()
	{
		//header('Content-Type: application/json');
		/* === Database configuration == */
		/* server */
		define('DB_HOST', 'localhost');
		/* username */
		define('DB_USER', 'root');
		/* password */
		define('DB_PWD', '*');
		/* database */
		define('DB_NAME', '[poecLaManu]_colyseum');
		/* dns method */
		$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
		//========================
		try {
			$db = new PDO($dsn, DB_USER, DB_PWD);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Échec lors de la connexion : ' . $e->getMessage();
			echo 'Informations : [', $e->getCode(), '] ', $e->getMessage(); // On affiche le n° de l'erreur ainsi que le message
		}
		return $db;
	}
}
