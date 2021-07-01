<?php

require 'class/db.php';
//require 'model/clients.php';
require 'model/shows.php';
require 'controller/indexCtrl.php';


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Guitarz : instruments et équipements de musique ; spécialiste en guitare, basse, ukulélé et autres ; achetez vos instruments en boutique ou en ligne sur notre eShop" />
    <meta name="author" content="//" />
    <meta name="robots" content="index, follow">
    <title> // </title>
 
    <!-- Mobile Specific Meta
	================================================== -->
    <meta name="viewport" cogntent="width=device-width, initial-scale=1.0">

    <!-- Favicon
	================================================== -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->

    <!-- CSS (libs, Framework, etc.)
	================================================== -->
    <!-- Bootstrap Css Bundle  -->
    <!-- appel distant -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <!-- Bootstrap Icons -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> -->
    <!-- Fontawesome  -->
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" /> -->
    <!-- Google Fonts  -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;600&display=swap" rel="stylesheet"> -->
    <!-- appel en local -->
    <link rel="stylesheet" href="css/libs/BS-5.x/dist/bootstrap-grid.css">
    <!-- Main custom stylesheet -->
    <link rel="stylesheet" href="styles.css">


    <!-- JAVASCRIPT (mandatory inside head-tags)
	================================================== -->
    <!-- NoScript
	================================================== -->
    <noscript>
        <meta http-equiv="refresh" content=1;url="path_to_noscript.html" />
    </noscript>
</head>

<body>
<p>Exercice 2 - Afficher tous les types de spectacles possibles.</p>
<table>
    <tr>
    <th scope="col">Styles de Spectacles </th>
    </tr>
    <?php
            foreach ($showsList as $show) {
            ?>
    <tr>
    <td><?= $show->genreID ?></td>        
    </tr>
    <?php }
                ?>
</table>



    <!--<table>
        <caption>Exercice 1 - Liste des clients</caption>
        <tbody>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Carte de fidélité</th>
                <th scope="col">Numéro de carte</th>
            </tr>
            <?php
            foreach ($clientsList as $client) {
            ?>
                <tr>
                    <td><?= $client->id; ?></td>
                    <td><?= $client->lastName; ?></td>
                    <td><?= $client->firstName; ?></td>
                    <td><?= $client->birthDate; ?></td>
                    <td><?= $client->card; ?></td>
                    <td><?= $client->cardNumber; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>-->
</body>

</html>