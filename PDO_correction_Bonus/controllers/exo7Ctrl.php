<?php
$clients = new Clients;
$cardTypes = new CardTypes;
$cards = new Cards;
$cardTypesList = $cardTypes->getCardTypes();
$clientsListCards = $clients->getAllClientsCards();

// add client
if (isset($_POST['addClientSubmit'])) { // on vérifie que le btn submit cliqué
    $formErrors = []; // tableau vide
    $regexName = '/^[a-zA-Z \-]+$/';
    $regexCard = '/^[1-9][0-9]{3}$/'; // premiere n° de 1 à 9 + 3 chifres plus de 0 a 9
    // prénom
    if (!empty($_POST['firstName'])) { // le champ n'est pas vide
        if (preg_match($regexName, $_POST['firstName'])) {
            $clients->__set('firstName', htmlspecialchars($_POST['firstName']));
        } else {
            $formErrors['firstName'] = 'Merci de ne renseigner que des lettres';
        }
    } else {
        $formErrors['firstName'] = 'Veuillez entrer votre prénom';
    }
    // nom
    if (!empty($_POST['lastName'])) { // le champ n'est pas vide
        if (preg_match($regexName, $_POST['lastName'])) {
            $clients->__set('lastName', htmlspecialchars($_POST['lastName']));
        } else {
            $formErrors['lastName'] = 'Merci de ne renseigner que des lettres';
        }
    } else {
        $formErrors['lastName'] = 'Veuillez entrer votre nom';
    }
    // date
    if (!empty($_POST['birthDate'])) { // le champ n'est pas vide
        $clients->__set('birthDate', htmlspecialchars($_POST['birthDate']));
    } else {
        $formErrors['birthDate'] = 'Veuillez entrer votre date de naissance';
    }
    // card
    if (!empty($_POST['card'])) { // le champ n'est pas vide
        $clients->__set('card', htmlspecialchars($_POST['card']));
        // vérification card number
        if ($_POST['card'] = 1) {
            // on ajoute 
            if (!empty($_POST['cardNumber'])) { // le champ n'est pas vide
                if (preg_match($regexCard, $_POST['cardNumber'])) {
                    $clients->__set('cardNumber', htmlspecialchars($_POST['cardNumber']));
                    $cards->__set('cardNumber', htmlspecialchars($_POST['cardNumber']));
                } else {
                    $cardNumber = NULL;
                    $formErrors['cardNumber'] = 'Merci de renseigner une carte';
                }
            } else {
                $formErrors['cardNumber'] = 'Veuillez entrer votre numéro de carte';
            }
            // verifier que le select n'est pas vide
            if (!empty($_POST['types_cards'])) {
                $cardListAllowed = $cardTypes->getCardTypesId();
                // verifier que exist dans la bbdd
                if (in_array($_POST['types_cards'], $cardListAllowed)) {
                    $cards->__set('cardTypesId', htmlspecialchars($_POST['types_cards']));
                } else {
                } // end if verifier que le select

            } else {
            }
        } // end if card oui        
    } else {
        $formErrors['card'] = 'Indiquez s\'il y a une carte';
    }

    ////// exo 7   insert ADD CLIENT
    if (empty($formErrors)) {

        try { // commence
            $clients->beginTransaction();
            $clients->setNewClient(); // requete pour ajouter un client dans table clients
            if ($clients->__get('card') == 1) {
                $cards->addCard();  // requete pour enregistrer la carte du client dans table cards
            }
            $messageAddClient = 'Le client est bien renseigné. '; // fin operation
            $clients->commit();
        } catch (PDOException $errorTransaction) { 
            $clients->rollBack();
            $messageAddClient = 'Erreur pendant l\'ajout du client : ' . $errorTransaction->getMessage();
        }
    }
} // end if n.1 form submit
