<?php 
    require_once('class/database.php');
    require_once('model/Clients.php');
    require_once('model/Shows.php');
    require_once('controller/indexCtrl.php');

    // $clients = new Clients;
    $events = new Shows;

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice pdo</title>
</head>
<body>
    <h2>ex1 : Tous les clients : </h2>
    <?php
        foreach($clientsList as $row) {
            echo $row['firstname'] . ' ' . $row['lastname'] . ' - ';
        }
    ?>
    <h2>ex 2 : Tous les types de shows</h2>
    <?php
        foreach($allShowsTypes as $row) {
            echo $row['type'] . ' - ';
        }
    ?>
    <h2>ex3 : 20 premiers clients</h2>
    <?php 
    
    foreach($twentyClientsList as $row) {
        echo $row['firstname'] . ' ' . $row['lastname'] . ' - ';
    }
    ?>
    <h2>ex4 : Les clients qui possèdent une carte de fidélité</h2>
    <?php 
    foreach($clientsWithCards as $row) {
        echo $row['firstname'] . ' ' . $row['lastname'] . ' - ';
    }
    ?>

    <h2>ex 5 : Les clients dont le nom commence par M</h2>
    <form action="" method="post">
        <label for="search">Rechercher</label>
        <input type="text" name="search" id="">
        <input type="submit" value="rechercher">
    </form>
    <?php 
    foreach($clientsByName as $row) : ?>
        <p>
            <b>Nom de Famille :</b> <?= $row['lastname'] ?><br>
            <b>Prénom :</b><?= $row['firstname'] ?><br>
        </p>
    <?php
    endforeach;
    ?>
    <h2>ex 6 : Toutes les perf avec date et heure</h2>
    <?php 
        foreach($perfomanceList as $row) {
            echo  $row['title'] . ' par ' . $row['performer'] . ' le ' . $row['date'] . ' à ' .$row['startTime'] . '<br>';
        }
    ?>
    <h2>ex 7 : Tous les clients avec infos de carte</h2>
    <?php 
    foreach($spareArray as $row) :?>
        <b>Nom :</b><?= $row['lastname'] ?><br>;
        echo '<b>Prénom :</b> ' . $row['firstname']. '<br>';
        echo '<b>Date de naissance :</b> ' . $row['birthDate']. '<br>';
        echo '<b>Carte de fidélité :</b> ' . ($row['card'] == 1 ? 'Oui' : 'Non') . '<br>';
        echo '<b>Numéro de carte :</b> ' . ($row['cardNumber'] != NULL ? $row['cardNumber'] : 'x'). '<br>';
        echo '<hr>';
    <?php endforeach; ?>
</body>
</html>