<?php

$bdd = new PDO('mysql:host=localhost;dbname=sql_colyseum;charset=utf8', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


$type = $bdd->query('SELECT `type` FROM `showtypes`');
$showStyle = $type->fetchAll(PDO::FETCH_OBJ);

//$max = $bdd->query('SELECT COUNT(`type`) FROM `showtypes`');
//$maxStyle = $max ->fetchAll(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Exercice 2</title>
</head>
<body>
<div class="container">
    <h1>Exercice 2</h1>

    <p text-center> Afficher tous les types de spectacles possibles.</p>

</div>
<div class="container text-center mt-4">

<p> Les différents types de spectacles sont :</p>


<!--pour parcourir mon tableau d'informations transformer en objet-->
    <table class="">
        <tr> 
            <th>Liste des spectacles</th>
        </tr>   
        <tr>
        <?php foreach ($showStyle as $key => $value) { ?>
            <td>
            <?= $value->type;
            ?>
            </td>
        </tr>
    </table>
<?php
} ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>