<?php
require 'header.php';
require 'controllers/indexCtrl.php';
?>
<h2>Afficher les <?= $limitChoiceUsers ?> premiers clients. </h2>
<form action="exo3-v2.php" name="limitChoiceForm"  method="POST" enctype="multipart/form-data">
            <select name="limitChoice" id="" onchange="document.forms['limitChoiceForm'].submit()" class="form-select">
                <?php for($limitChoice=5; $limitChoice <= 25 ;$limitChoice +=5){ ?>
                    <option value="<?= $limitChoice ?>" <?= (isset($_POST['limitChoice']) && $_POST['limitChoice'] == $limitChoice)? 'selected' : '' ?> ><?= $limitChoice ?></option>
                <?php } ?>
            </select>
        </form>

        <div class="row mt-3">


    <?php
    foreach ($clientsLimitChoice as $key => $value) { ?>
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body ">
                    <h5 class="card-title"><?= $value->lastName ?></h5>
                </div>
            </div>
        </div>
    <?php  }
    ?>

</div> <!-- end row -->

</body>

</html>