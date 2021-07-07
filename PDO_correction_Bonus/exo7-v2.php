<?php
require 'header.php';
require 'controllers/exo7Ctrl.php';

if (isset($_POST['deleteClientSubmit'])) {

    $clientID = $_POST['clientID'];
    $messageDeleteClient = 'Le client ' . $clientID . ' est supprimé.' ;
}


?>
<h2>Exo 7 - Ajouter des clients</h2>
<?php
// message Ajouter client OK
if (isset($messageAddClient)) {
?>
    <div class="alert alert-info" role="alert"><?= $messageAddClient ?>
    </div>
<?php } // end if

if (isset($messageDeleteClient)) {
?>
    <div class="alert alert-info" role="alert"><?= $messageDeleteClient ?>
    </div>
<?php } // end if
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-4 offset-1 alert alert-info" id="leftSide">
            <img class="img-fluid" src="img/leftSide.jpg" />
        </div>
        <div class="col-6 card">
            <div class="card-body">
                <form action="exo7-v2.php" id="new_client" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label">Prénom :</label>
                        <input class="form-control" type="text" name="firstName" id="firstName" required/>
                        <p><?= (isset($formErrors['firstName'])) ? $formErrors['firstName'] : ''; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nom :</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" required />
                        <p><?= (isset($formErrors['lastName'])) ? $formErrors['lastName'] : ''; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date de naissance:</label>
                        <input class="form-control" type="date" name="birthDate" id="birthDate" required />
                        <p><?= (isset($formErrors['birthDate'])) ? $formErrors['birthDate'] : ''; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Avez vous une Carte ?</label>
                        <div class="col">
                            <input type="radio" id="cardYes" name="card" value="1" required>
                            <label for="cardYes">Oui</label>
                        </div>

                        <div class="col">
                            <input type="radio" id="cardNon" name="card" value="0" required>
                            <label for="cardNon">Non</label>
                        </div>
                        <p><?= (isset($formErrors['card'])) ? $formErrors['card'] : ''; ?></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quel est le Type de carte ?</label>
                    <select name="types_cards" id="types_cards" class="form-select" aria-label="Default select example">

                    <option value="0" >Sans carte</option>

                        <?php
                        foreach ($cardTypesList as $card) {
                        ?>
                            <option value="<?= $card->id; ?>">
                                <?= $card->type; ?>
                            </option>
                        <?php
                        }
                        ?>

                    </select>
                    </div> 


                    <div class="mb-3">
                        <label class="form-label">Numéro de card :</label>
                        <input class="form-control" type="text" name="cardNumber" id="cardNumber" />
                        <p><?= (isset($formErrors['cardNumber'])) ? $formErrors['cardNumber'] : ''; ?></p>
                    </div>

                    <input class="btn btn-secondary" type="submit" value="Ajouter client " name="addClientSubmit" />

                </form>

            </div>
        </div>
    </div>
</div>

<div class="container ">
    <h2 class="mt-3 bg-info text-center h2 p-3">Liste de clients</h2>
</div>
<div class="row mt-3">
    <?php
    foreach ($clientsListCards as $client) {
    ?>
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 18rem;">

                <div class="card-body ">
                    <h5 class="card-title"><?= $client->id; ?> - <?= $client->lastName; ?></h5>
                    <h5 class="card-title">Prénom : <?= $client->firstName; ?></h5>
                    <p class="card-text">Date de naissance : <?= $client->birthDate; ?></p>
                    <p class="card-text">Carte de fidélité : <?= $client->card; ?></p>
                    <p class="card-text">Carte de fidélité : <?= $client->cardNumber; ?></p>
                    
                    <form action="exo7-v2.php" id="delete_client" method="POST">
                        <input id="clientID" name="clientID" type="hidden" value="<?= $client->id; ?>">
                        <input class="btn btn-secondary" type="submit" value="Supprimer client <?= $client->id; ?>" name="deleteClientSubmit" />
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div> <!-- end row-->
</body>

</html>