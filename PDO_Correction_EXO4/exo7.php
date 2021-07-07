<?php
require 'header.php';
?>
<h2>Exercice 7 - Afficher toutes les informations clients et pour la carte de fidélité, ajouter via SQL OUI et NON  => Ne pas passer par PHP :)</h2>
<div class="row mt-3">
    <?php
    foreach ($clientsList as $client) {
    ?>

            <div class="col-md-3 mb-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body ">
                        <h5 class="card-title">Nom : <?= $client->lastName; ?></h5>
                        <h5 class="card-title">Prénom : <?= $client->firstName; ?></h5>
                        <p class="card-text">Date de naissance : <?= $client->birthDate; ?></p>
                        <p class="card-text">Carte de fidélité : <?= $client->cardExist ?></p>
                        <p class="card-text">
                            <?= $client->cardNumber ?>
                        </p>
                    </div>
                </div>
            </div>

    <?php
    }
    ?>
</div> <!-- end row-->
</body>

</html>