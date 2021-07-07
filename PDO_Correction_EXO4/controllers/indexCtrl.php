<?php  //  fichier pour controler l'affichage (extension des objets)
    $clients = new Clients;
    $clientsList = $clients->getAllClients(); // appel a la function de l'objet clients
    $clientsList20 = $clients->get20Clients();
    // exo 3 v2
    $limitChoiseUsers = 5;
    if (!empty($_POST['limitChoise'])) {
        // condition menor o igual a 25 y multiplo de 5
        if ($_POST['limitChoise'] <= 25 && $_POST['limitChoise'] <= 5 && $_POST['limitChoise'] % 5 == 0){
            $limitChoiseUsers = htmlspecialchars($_POST['limitChoise']);
        }

    }
    // method exo 3 v2
    
    $clientslimitChoise = $clients->getClientslimitChoise($limitChoiseUsers);
    // la method c'est une fonction de l'objetc, ici on peut ajouter un argument

    $clientsCardFid = $clients->getClientsCardFidelity();
    $clientsLastNameM = $clients->getclientsLastNameM();
    $shows = new Espectacles;
    $showsList = $shows->getAllShows();
    $showsTypeList = $shows->getTypeShows();
    $cardType = new cardType;
    $cardTypeslist = $cardType->getCardList();


    if (!empty($_POST['newUser'])) {
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $cardTypes = htmlspecialchars($_POST['cardTypes']);
        $cardNumber = htmlspecialchars($_POST['cardNumber']);
        
              
    }

?>
