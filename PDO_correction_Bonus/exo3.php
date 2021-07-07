<?php
require 'header.php';
require 'controllers/indexCtrl.php';
?>
<h2>3 - Afficher les 20 premiers clients. </h2>

<ul class="list-unstyled row">
    <?php
    foreach ($clientsList20 as $client) {
    ?>
        <li class="mb-3 col-md-4">
            <p class=" bg-light p-3 mr-3"><strong><?= $client->id; ?> : </strong> <?= $client->firstName; ?> <?= $client->lastName; ?></p>
        </li>
    <?php
    }
    ?>

</ul>
</body>

</html>