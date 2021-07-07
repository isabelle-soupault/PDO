<?php
require 'header.php';
require 'controllers/indexCtrl.php';
?>
<h2>6 - Espectacles</h2>

<ul class="list-unstyled row">
    <?php
    foreach ($showsList as $show) {
    ?>
        <li class="mb-3 bg-light p-3 col-md-12">
            <p><strong><?= $show->title; ?></strong> par <?= $show->performer; ?> le <?= $show->date; ?> à <?= $show->startTime; ?></p>
        </li>
    <?php
    }
    ?>

</ul>
</body>

</html>