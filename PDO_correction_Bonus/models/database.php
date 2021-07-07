<?php
class db
{

    public function connect()
    {
        
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4'; // method mysql
        /* PDO options */
        //https://www.php.net/manual/es/pdo.setattribute.php
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
        ];
        // Now you create your connection string
        try {
			$db = new PDO($dsn, DB_USER, DB_PWD, $options);
		} catch (PDOException $e) {
			//echo 'Échec lors de la connexion : ' . $e->getMessage();
			//echo 'Informations : [', $e->getCode(), '] ', $e->getMessage(); // On affiche le n° de l'erreur ainsi que le message
			die("Database connection failed: " . $e->getCode() . ' - ' . $e->getMessage());
		}
		return $db;
    }
}
