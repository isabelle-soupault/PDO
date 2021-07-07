<?php
class db
{
	public function connect()
	{
		/* SERVER */
		define('DB_HOST', 'localhost');
		/* USERNAME */
		define('DB_USER', 'root');
		/* PASSWORD */
		define('DB_PWD', '');
		/* DATABASE */
		define('DB_NAME', 'sql_colyseum');
		/* DNS Method */
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

