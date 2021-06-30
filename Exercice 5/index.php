<?php 

$bdd = new PDO('mysql:host=localhost;dbname=sql_colyseum;charset=utf8', 'root', '');

$response = $bdd->query('SELECT `firstName`,  `lastName`
FROM `clients`
	WHERE `lastName` LIKE "M%"
    ORDER BY lastName ASC');

$customers = $response->fetchAll(PDO::FETCH_OBJ);
    // Fetch permet de parcourir le résultat de la requête ligne par ligne tandis que fetchAll() renvoie toutes les lignes sous forme de tableau et le mode PDO::FETCH_OBJ permet mon tableau en objet

?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Exercice 5</title>
</head>
<body>
<div class="container">
    <h1>Exercice 5</h1>

    <p text-center> Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
Les afficher comme ceci :

Nom : Nom du client

Prénom : Prénom du client

Trier les noms par ordre alphabétique.</p>


</div>
<div class="container text-center mt-4">


<p>Voici la liste des clients dont le nom commence par la lettre M et dont le nom est classé par ordre alphabétique !</p>

<!--On affiche chaque entrée une à une-->

    <?php foreach ($customers as $key => $value) { // pour parcourir mon tableau d'informations transformer en objet?> 

        <p> Nom du client : <?= $value->lastName ?></p>
        <p>Prénom du client : <?= $value->firstName ?>  </p>

    <?php } ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>



<!------------------------------------------------------->
<!--                  Correction                       -->
<!------------------------------------------------------->

<!--


emoji intégré à VScode : windows+ .

->