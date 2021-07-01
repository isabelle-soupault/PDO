<?php 

$bdd = new PDO('mysql:host=localhost;dbname=sql_colyseum;charset=utf8', 'root', '');

$response = $bdd->query('SELECT `firstName`, `lastName` FROM `clients`');
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
    <title>Exercice 1</title>
</head>
<body>
<div class="container">
    <h1>Exercice 1</h1>

    <p text-center> Exécuter le script colyseum.sql fourni avant de commencer. Tous les résultats devront être affichés dans une page index.php.

Afficher tous les clients.</p>


</div>
<div class="container text-center mt-4">


<p>Voici la liste de l'ensemble de nos clients !</p>

<table class="table table-striped">
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
    </tr>
    <?php foreach ($customers as $key => $value) { ?>
    <tr>
        <td> <?= $value->lastName ?> </td>
        <td> <?= $value->firstName ?> </td>
    </tr>

<?php } ?>

</table>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>



<!------------------------------------------------------->
<!--                  Correction                       -->
<!------------------------------------------------------->

<!--


emoji intégré à VScode : windows+ .

On va faire la correction en objet

1 - création du fichier connect.php et mettre dedans


$result est un type PDO statement, c'est un objet qui est renvoyé.
De cet objet, on s'en sert. On n'oublie pas que l'on est dans qsle model, donc on s'en moque de l'affichage.
Il existe le fetch et le fetchall.
Le fetchall lit toutes les lignes, le fetch une seule.
dans la partie clients, le return concerne toutes les lignes, donc on va avoir le fetchall.
Le fetch est à favoriser pour si on n'a qu'un seul et unique résultat
Exemple, pour retrouver une ID, on utilise le fetch vu qu'il est unique.
Avec les informations, on récupère sous forme de tableau.  Comme on voulait "juste récupérer" les informations, on fait maintenant un return $result->fetchAll() Le fetchAll peut avoir des options.
Si on met rien, il va envoyer tous les résultats sous format de tableau de tableau. Il est associatif ET numérique. Il va donc récupérer les informations en double. Ce qui peut mettre à genou le serveur.
Les options qu'on voit le plus sont

PDOStatements::FETCH_ASSOS

PDOStatements::FETCH_OBJ => en prenant ce tableau on récupère un tableau d'objets et non un tableau de tableau.
Ceci est une constante de PDO.

Ici, pour simplifier le tout, on va fair un seul controller par vues, sinon, il faut mettre en place du routeur.
Dans le dossier Controller, on créé un fichier nommé indexCTRL.php
C'est dedans qu'on va aller chercher l'objet qu'on a déclaré dans clients.
Pour cela, on va l'instancier. Pour se faire on va déclarer en php

$clients = new clients();

$clientsList = $clients->getAllClients(); // Ici le contrôler a récupérer les données.

Après, on passe dans index.php qui se positionne à la racine.
Dans cet index, on inclu les 3 fichiers créés et dans le bon ordre.

        require 'class/bdd.php';
        require 'model/clients.php';
        require 'controller/indexCtrl.php';

        Ici on a besoin de la base de données.
        Ensuite, des données récupérées par données
        Et pour finir de la gestion des données pour l'affichage.

Au niveau de l'affichage, on va faire un tableau.
Cosqmme on a un tableau on utilise le FOREACH
Ici le $key n'a pas d'utilité, donc on ne le met pas. Et le $value on pense à le renommer en quelquechose de plus compréhensible, comme par exemple $client

Cela donne foreach ($clientsList as $client){

Comme $clientsList est un tableau d'objets, $client est un objet.

Par convention le nom de famille est écrit en majuscule pour le différencier des prénoms. C'est particulièrement utile pour les noms de famille qui peuvent être pris pour des prénoms.

Ici on a 3 choix : CSS / PHP / SQL

C'est mieux de le faire en SQL car plus rapide.
En PHP, ce sera plus lent car ça devra le faire à chaque passage de boucle.
Et en CSS c'est pas forcément optimisé.


Si on créé des objets, des modèles, au dela de séparer les différents éléments c'est pour s'en resservir ailleurs.

Ici, si on met le nom en majuscule, on le fait directement de suite, sans avoir à revenir dessus plus tard.

La fonction sql qui le permet est UPPER(`lastName`) AS  `lastName` - ici on préfère laisser les magicQuotes.


De la même façon, on va également mettre en format français la date de naissance. Par défaut c'est YY/MM/DD




}






->