<?php

$bdd = new PDO('mysql:host=localhost;dbname=sql_colyseum;charset=utf8', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


$type = $bdd->query('SELECT `id`, UPPER(`lastName`) AS `lastName`, `firstName`, DATE_FORMAT(`birthDate`,\'%d/%m/%Y\') AS `birthDate`, `cardNumber`,
CASE WHEN `card` = 1 THEN "Oui"
    ELSE "Non"
END AS `cardExist`
FROM `clients`;
');
$showStyle = $type->fetchAll(PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Exercice 7</title>
</head>
<body>
<div class="container">
    <h1>Exercice 7</h1>

    <p text-center> Afficher tous les clients comme ceci :

Nom : Nom de famille du client

Prénom : Prénom du client

Date de naissance : Date de naissance du client

Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas)

Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.</p>

</div>




<!--pour parcourir mon tableau d'informations transformer en objet-->
<div class="container">
<p> Les différents types de spectacles sont :</p>
    <div class="row justify-content-center">
        <div class="col-auto">
        <table class="table table-striped">
        <tr>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Date de Naissance</th>
            <th scope="col">Carte de fidélité</th>
            <th scope="col">Numéro de la carte</th>
        </tr>
        <?php foreach ($showStyle as $key => $value) { ?>
        <tr>
            <td><?= $value->firstName ?></td>
            <td><?= $value->lastName ?></td>
            <td><?= $value->birthDate ?></td>
            <td><?= $value->cardExist ?></td>
            <td><?= $value->cardNumber;?></td>    
        </tr>
        <?php  } ?>

        </table> 
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<!--Format fr en requête SQL-->
