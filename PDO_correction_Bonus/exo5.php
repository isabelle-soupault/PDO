<?php
require 'header.php';
require 'controllers/indexCtrl.php';
?>
<h2>5 - Une recherche - Les clients avec M</h2>

<div class="content">
    <form action="exo5.php" method="POST">
        <label for="search">Rechercher</label>
        <input type="text" name="search" id="">
        <input type="submit" value="rechercher">
    </form>
</div>
<div class="row mt-3">


    <?php
    foreach ($clientsLastNameM as $row) : ?>
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body ">
                    <h5 class="card-title"><?= $row['lastName'] ?>, <?= $row['firstName'] ?></h5>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>

</div> <!-- end row-->
</body>

</html>