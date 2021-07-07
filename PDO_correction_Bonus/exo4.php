<?php
require 'header.php';
require 'controllers/indexCtrl.php';
?>
<h2>4 - N'afficher que les clients possédant une carte de fidélité.</h2>

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
        foreach ($clientsCardFid as $client) {
        ?>
            <tr>
                <td><?= $client->id; ?></td>
                <td><?= $client->lastName; ?></td>
                <td><?= $client->firstName; ?></td>
                <td><?= $client->birthDate; ?></td>
                <td><?= ($client->card == '1') ? 'Oui' : 'Non'; ?></td>
                <td><?= $client->cardNumber; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</body>

</html>