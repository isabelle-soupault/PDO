<?php
require 'header.php';


var_dump($_POST['firstName']);


?>
<h2>Bonus  - Ajouter un nouvel utilisateur</h2>
<div class="row mt-3">

<form action="bonus.php" method="POST" name="newUser">

<div class="row">
    <div class="col">
        <label for="firstName"> Prénom</label>
        <input type="text" class="form-control" placeholder="Prénom" aria-label="Prénom" id="firstName" name="firstName" >
    </div>
    <div class="col">
    <label for="lastName"> Nom</label>
    <input type="text" class="form-control" placeholder="Nom" aria-label="Last name" id="lastName" name="lastName">
    </div>
</div>

<div>
    <label for="card"> Type de carte</label>
    <select name="cardTypes" id="cardTypes">
        <option value="0">Sans carte </option>
                <?php
                foreach ($cardTypeslist as $cardType) {
                ?>
                        <option value="<?= $cardType->id ?>"> <?= $cardType->type ?></option>
                        
                <?php } ?>
        </select>
</div>

<div>
                    <label for="carNumber"  name="cardNumber">
                        <input type="number" name="cardNumber" id="cardNumber">
                    </label>

</div>

<div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>

  </div>
</form>



<!------------------------------------------------------->
<!--                  Notes                            -->
<!------------------------------------------------------->
<!--
  => comme on récupère des choses depuis l'utilisateur, on va utiliser prepare

  => il faut vérifier que les champs utilisés sont biens ceux qu'on attends : regex entre autre

  => on doit faire en sorte en objet que le View envoie les informations via le controller au model.
  Sachant qu'on ne peut pas parler directement au model. On a déjà fait ça dans un exercice précédent

  => exercice où on a vu ça : exercice 3 sur les limites où l'utilisateur ajoute lui-même les limites de son choix.
  Egalement vu en exercice 5



-->
