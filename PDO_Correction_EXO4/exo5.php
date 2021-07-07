<?php
require 'header.php';
?>
<h2>5 - Une recherche - Les clients avec M</h2>
<div class="row mt-3">
    <?php
    foreach ($clientsLastNameM as $client) {
    ?>

            <div class="col-md-3 mb-3">
                <div class="card" style="width: 18rem;">

                    <div class="card-body ">
                        <h5 class="card-title"><?= $client->lastName; ?>, <?= $client->firstName; ?></h5>
                        
                    </div>
                </div>
            </div>

    <?php
    }
    ?>
</div> <!-- end row-->
</body>

</html>