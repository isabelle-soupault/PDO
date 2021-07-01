<?php
//header('Content-Type: application/json');
/* === Database configuration == */
/* server */
define('DB_HOST', 'localhost');
/* username */
define('DB_USER', 'hrafRoot');
/* password */
define('DB_PWD', 'HrafReda_=*h@b!Bi#73*');
/* database */
define('DB_NAME', '[poecLaManu]_colyseum');
/* dns method */
$dsn = 'mysql:host='. DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
/* PDO options */
$options  = [
	// set the PDO error mode to exception
	PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES    => false,
];

//========================
try {
	$db = new PDO($dsn, DB_USER, DB_PWD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo 'Échec lors de la connexion : ' . $e->getMessage();
	echo 'Informations : [', $e->getCode(), '] ', $e->getMessage(); // On affiche le n° de l'erreur ainsi que le message
}
?>