<?php
//declare (strict_types = 1);
define('DB_HOST', 'localhost'); //attributs connexion
define('DB_USER', 'root');
define('DB_PWD', '');
define('DB_NAME', 'sql_colyseum');

require 'models/database.php';
require 'models/clients.php';
require 'models/espectacles.php';
require 'models/card.php';
require 'controllers/indexCtrl.php';
?>