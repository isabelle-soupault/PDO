<?php
require 'header.php';
?>
<h2>Afficher les <?= $limitChoiseUsers ?> premiers clients. </h2>

<form action="exo3-v2.php" name="limitChoiseForm"  method="post" enctype="multipart/form-data">
            <select name="limitChoise" id="" onchange="document.forms['limitChoiseForm'].submit()" class="form-select">
                <?php for($limitChoise=5; $limitChoise <= 25 ;$limitChoise +=5){ ?>
                    <option value="<?= $limitChoise ?>" <?= (isset($_POST['limitChoise']) && $_POST['limitChoise'] == $limitChoise)? 'selected' : '' ?> ><?= $limitChoise ?></option>
                <?php } ?>
            </select>
        </form>
<hr>
<ul class="list-unstyled row">
    <?php
    foreach ($clientslimitChoise as $key => $value) { 
    ?>
        <li class="mb-3 col-md-4">
            <p class=" bg-light p-3 mr-3"><strong><?= $value->id  ?> : </strong> <?= $value->firstName; ?> <?= $value->lastName; ?></p>
        </li>
    <?php
    }
    ?>

</ul>
</body>

</html>