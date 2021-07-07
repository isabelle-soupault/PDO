<?php

require 'class/db.php';
require 'model/clients.php';
require 'model/shows.php';
require 'controller/indexCtrl.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Colyseum</title>
</head>
<body>
    <pre>
        <?= var_dump($showsList) ?>
    </pre>
    <h1>exo1</h1>
    <p>Afficher tous les clients.</p>
    <table>
        
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
        <?php foreach ($clients as $key => $value) { // pour parcourir mon tableau d'informations transformer en objet?> 
            <tr>
                <td><?= $value->id ?><br></td>
                <td><?= $value->lastName ?><br></td>
                <td><?= $value->firstName ?><br></td>
            </tr>
        <?php } ?>
    </table>
    <h2>exo2</h2>
    <p>Afficher tous les types de spectacles possibles.</p>
    <table>
        <select name="" id="">
        <?php foreach ($showsList as $key => $value) { ?> 
            <option value="<?= $value->$key ?>"><?= $value->type ?></option>
            <?php } ?>
        </select>
    </table>
    <h2>exo3</h2>
    <p>Afficher les <?= $limitChoiceUsers ?> premiers clients.</p>
    <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
        <form action="index.php" method="POST" name="limitChoiceForm">
            <select name="limitChoice" id="" onchange="document.forms['limitChoiceForm'].submit()">
                <?php for($limitChoice=5; $limitChoice <= 25 ;$limitChoice +=5){ ?>
                    <option value="<?= $limitChoice ?>" <?= (isset($_POST['limitChoice']) && $_POST['limitChoice'] == $limitChoice)? 'selected' : '' ?> ><?= $limitChoice ?></option>
                <?php } ?>
            </select>
        </form>
        <?php foreach ($clientsList20 as $key => $value) { ?> 
            <tr>
                <td><?= $value->id ?><br></td>
                <td><?= $value->lastName ?><br></td>
                <td><?= $value->firstName ?><br></td>
            </tr>
        <?php } ?>
    </table>
    </table>
    <h2>exo4</h2>
    <p>N'afficher que les clients possédant une carte de fidélité.</p>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
        </tr>
        <?php foreach ($clientsCards as $key => $value) { ?> 
            <tr>
                <td><?= $value->lastName ?><br></td>
                <td><?= $value->firstName ?><br></td>
            </tr>
        <?php } ?>
    </table>
    <h2>exo5</h2>
    <p>Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
        Les afficher comme ceci : <br>Nom : Nom du client <br>Prénom : Prénom du client <br>Trier les noms par ordre alphabétique.</p>
    <?php foreach ($clientsNameStartByM as $key => $value) { ?> 
        <p><b>Nom :</b><?= $value->lastName ?></p>
        <p><b>Prénom :</b> <?= $value->firstName ?></p>
    <?php } ?>
    <h2>exo6</h2>
    <p>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.</p>
    <?php foreach ($showCalendar as $key => $value) { ?> 
        <p>Spectacle <?= $value->title ?> par <?= $value->performer ?>, le <?= $value->date ?> à <?= $value->startTime ?>.</p>
    <?php } ?>
    <h2>exo7</h2>
    <p>Afficher tous les clients comme ceci : <br>
    Nom : Nom de famille du client <br>
    Prénom : Prénom du client <br>
    Date de naissance : Date de naissance du client<br>
    Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas)<br>
    Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.</p>
    <?php foreach ($showUsersInfo as $key => $value) { ?> 
        <p>Nom : <?= $value->lastName ?></p><br>
        <p>Prénom : <?= $value->firstName ?></p><br>
        <p>Date de naissance : <?= $value->birthDate ?></p><br>
        <p>Carte de fidélité : <?= $value->card ?></p><br>
        <p>Numéro de carte : <?= $value->cardNumber ?></p><br>
    <?php } ?>
</body>
</html>