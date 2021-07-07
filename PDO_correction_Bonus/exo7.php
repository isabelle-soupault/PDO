<?php
require 'header.php';
require 'controllers/indexCtrl.php';
?>
<h2>7 - Cards clients</h2>
<div class="row mt-3">
    <?php
    foreach ($clientsListCards as $client) {
    ?>
            <div class="col-md-3 mb-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body ">
                        <h5 class="card-title">Nom : <?= $client->lastName; ?></h5>
                        <h5 class="card-title">Prénom : <?= $client->firstName; ?></h5>
                        <p class="card-text">Date de naissance : <?= $client->birthDate; ?></p>
                        <p class="card-text">Carte de fidélité : <?= $client->card; ?></p>
                        <p class="card-text">Carte de fidélité : <?= $client->cardNumber; ?></p>
                        
                    </div>
                </div>
            </div>

    <?php
    }
    ?>
</div> <!-- end row-->
</body>

</html>