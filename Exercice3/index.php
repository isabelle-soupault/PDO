<?php 

$bdd = new PDO('mysql:host=localhost;dbname=sql_colyseum;charset=utf8', 'root', '');

$response = $bdd->query('SELECT `firstname`, `lastname` FROM `clients` ORDER BY `lastName` ASC LIMIT 20');
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
    <title>Exercice 3</title>
</head>
<body>
<div class="container">
    <h1>Exercice 3</h1>

    <p text-center> Afficher les 20 premiers clients.</p>


</div>
<div class="container text-center mt-4">


<p>Voici la liste de l'ensemble de nos clients !</p>

<!--On affiche chaque entrée une à une-->

    <?php foreach ($customers as $key => $value) { // pour parcourir mon tableau d'informations transformer en objet?> 

        <?= $value->lastName ?> <?= $value->firstName ?> <br>

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