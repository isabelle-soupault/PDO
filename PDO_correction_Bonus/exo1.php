<?php
require 'header.php';
require 'controllers/indexCtrl.php';
?>
<h2>1 - Montrer la liste de clients</h2>
<table class="table table-striped">
    <caption>Liste des clients</caption>
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
</table>
</body>

</html>