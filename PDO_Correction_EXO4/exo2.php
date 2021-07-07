<?php
require 'header.php';
?>
<h2>2 - Types d'espectacles</h2>
<select name="types_shows" id="types_shows" class="form-select" aria-label="Default select example">

    <?php
    foreach ($showsTypeList as $show) {
    ?>
        <option value="<?= $show->id; ?>">
            <?= $show->type; ?>
        </option>
    <?php
    }
    ?>

</select>
</body>

</html>