<?php
$regex= "/^[a-zA-Z]+$/";

//exercice 1:Afficher tous les clients
$reponse = $bdd->prepare('SELECT `id`, `lastName`, `firstName`, `birthDate`,`card`,`cardNumber`FROM `clients`');
$reponse->execute();
$clients=$reponse->fetchAll(PDO::FETCH_OBJ);

//exercice 2:Afficher tous les types de spectacles possibles
$reponse = $bdd->prepare('SELECT `id`,`type` FROM `showtypes`');
$reponse->execute();
$showtypes=$reponse->fetchAll(PDO::FETCH_OBJ);

//exercice 3:Afficher les 20 premiers clients.
$reponse = $bdd->prepare('SELECT `id`, `lastName`, `firstName`, `birthDate`,`card`,`cardNumber`FROM `clients`limit 20  ');
$reponse->execute();
$clientsTwenty=$reponse->fetchAll(PDO::FETCH_OBJ);

//exercice 4:N'afficher que les clients possédant une carte de fidélité.
$reponse = $bdd->prepare('SELECT `id`, `lastName`, `firstName`, `birthDate`,`card`,`cardNumber`FROM `clients` WHERE `card`=1 ');
$reponse->execute();
$clientsCard=$reponse->fetchAll(PDO::FETCH_OBJ);

//exercice5:Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
$reponse = $bdd->prepare("SELECT `id`, `lastName`, `firstName`FROM `clients` WHERE `lastName` LIKE 'M%' ORDER BY `lastName` ");
$reponse->execute();
$clientsM=$reponse->fetchAll(PDO::FETCH_OBJ);

//exercice6:Afficher le titre de tous les spectacles ainsi que l'artiste.
$reponse = $bdd->prepare('SELECT  `title`,`performer` ,`date` ,`startTime` FROM `shows` ORDER BY `title`');
$reponse->execute();
$shows=$reponse->fetchAll(PDO::FETCH_OBJ);

//exercice7:Afficher tous les clients comme ceci
$reponse = $bdd->prepare('SELECT `id`, `lastName`, `firstName`, `birthDate`,`card`,`cardNumber`FROM `clients`');
$reponse->execute();
$clientsInfo=$reponse->fetchAll(PDO::FETCH_OBJ);

//exercice7:Inserer un show
 // récupérer les valeurs 
 if(isset($_POST['type']))
if (preg_match($regex,$_POST['type'])){
    $type = htmlspecialchars(stripslashes(trim($_POST['type'])));

 // Requête mysql pour insérer des données
 $insert = "INSERT INTO `showtypes`( `type`) VALUES (:type)";
 $res = $bdd->prepare($insert);
 $exec = $res->execute(array(":type"=>$type));
 // vérifier si la requête d'insertion a réussi
 if($exec){
   echo 'Données insérées';
 }else{
   echo "Échec de l'opération d'insertion";
 }
 }
  
