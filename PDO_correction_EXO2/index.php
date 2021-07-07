<?php
require 'config.php';
require 'class/connexion.php';
require 'model/clients.php';
require 'model/showTypes.php';
require 'model/shows.php';
require 'controller/indexCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Lire des données</title>
</head>

<body>


        <h2>la liste des clients</h2>
        <!-- 
//var_dump($clients);
</pre> -->

        <!--afficher tous les clients -->
        <table>
                <tr>
                        <th scope="col">Id</th>
                        <th scope="col">lastName</th>
                        <th scope="col">firstName</th>
                        <th scope="col">birthDate</th>
                        <th scope="col">CardNumber</th>
                </tr>
                <?php
                foreach ($clientsList as $client) {
                ?>
                        <tr>

                                <td><?= $client->id ?></td>
                                <td><?= $client->lastName ?></td>
                                <td><?= $client->firstName ?></td>
                                <td><?= $client->birthDate ?></td>
                                <?php if ($client->card == 1) { ?>
                                        <td><?= $client->cardNumber ?></td>
                                <?php  } else { ?>
                                        <td><?php echo 'No card'; ?></td>
                                <?php } ?>

                        </tr>
                <?php } ?>
        </table>
        <h2>la liste des spectacles possibles</h2>
        <!--afficher tous les clients -->
        <select name="showTypes" id="showTypes">
                <?php
                foreach ($showTypeslist as $showType) {
                ?>
                        <option value="<?= $showType->id ?>"> <?= $showType->type ?></option>
                <?php } ?>
        </select>

        <h2>la liste des 20 premiers clients</h2>
        <table>
                <tr>
                        <th scope="col">Id</th>
                        <th scope="col">lastName</th>
                        <th scope="col">firstName</th>
                        <th scope="col">birthDate</th>
                        <th scope="col">CardNumber</th>
                </tr>
                <?php
                foreach ($clientsList as $client) {
                ?>
                        <tr>
                                <td><?= $client->id ?></td>
                                <td><?= $client->lastName ?></td>
                                <td><?= $client->firstName ?></td>
                                <td><?= $client->birthDate ?></td>
                                <?php if ($client->card == 1) { ?>
                                        <td><?= $client->cardNumber ?></td>
                                <?php  } else { ?>
                                        <td><?php echo 'No card'; ?></td>
                                <?php } ?>

                        </tr>
                <?php } ?>
        </table>
        <h2>la liste des clients qui ont une carte</h2>
        <table>
                <tr>
                        <th scope="col">Id</th>
                        <th scope="col">lastName</th>
                        <th scope="col">firstName</th>
                        <th scope="col">birthDate</th>
                        <th scope="col">CardNumber</th>
                </tr>

                <?php
                foreach ($clientsHasCardList as $clients) {
                ?>
                        <tr>
                                <td><?= $clients->id ?></td>
                                <td><?= $clients->lastName ?></td>
                                <td><?= $clients->firstName ?></td>
                                <td><?= $clients->birthDate ?></td>
                                <td><?= $clients->cardNumber ?></td>
                        </tr>
                <?php } ?>
        </table>
        <h2>Tous les clients dont le nom commence par la lettre "M"</h2>
        <?php
        foreach ($clientsLastNameStartMList as $client) {
        ?>
                <p><strong>Nom:</strong> <?= $client->lastName ?></p>
                <p><strong>Prenom:</strong><?= $client->firstName ?></p>
        <?php
        }
        ?>
        <h2>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. </h2>
        <?php
        foreach ($showList as $show) {
        ?>
                <p><?= $show->title ?> par <?= $show->performer ?> le <?= $show->date ?> à <?= $show->startTime ?></p>
        <?php
        }
        foreach ($clientsList as $client) {
        ?>
                <p><strong>Nom:</strong> <?= $client->lastName ?></p>
                <p><strong>Prenom:</strong><?= $client->firstName ?></p>
                <p><strong>Date de naissance:</strong><?= $client->birthDate ?></p>
                <p><strong>Carte de fidélité:</strong><?php if ($client->card == 1) {
                                                                echo "Oui";
                                                        } else {
                                                                echo "Non";
                                                        } ?></p>
                <?php if ($client->card == 1) { ?>
                        <p><strong>Numero de carte:</strong><?= $client->cardNumber ?></p>
                <?php } else { ?>
                        <p><strong>Numero de carte:</strong><?php echo 'Ne possede pas de carte'; ?></p>
        <?php
                }
        }
        ?>
        <h2>Inserer un show</h2>
        <form action="#" method="post">
                <label>Entrez un show</label>
                <input type="text" name="type">
                <p><input type="submit" name="insert" value="Insérer"></p>
        </form>
</body>

</html>