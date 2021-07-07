<?php  //  fichier pour controler l'affichage (extension des objets)
    $clients = new Clients;
    $clientsList = $clients->getAllClients(); // appel a la function de l'objet clients
    $clientsList20 = $clients->get20Clients();
    $clientsListCards = $clients->getAllClientsCards();
    // exo 3 v2
    $limitChoiceUsers = 5;
    if (!empty($_POST['limitChoice'])) {
        // condition menor o igual a 25 y multiplo de 5
        $limitChoiceUsers = htmlspecialchars($_POST['limitChoice']);
        if ($_POST['limitChoice'] <= 25 && $_POST['limitChoice'] <= 5 && $_POST['limitChoice'] % 5 == 0){
            $limitChoiceUsers = htmlspecialchars($_POST['limitChoice']);
        }
    }
    // method exo 3 v2   
    $clientsLimitChoice = $clients->getClientsLimitChoice($limitChoiceUsers);
    // la method c'est une fonction de l'objetc, ici on peut ajouter un argument
    // method exo 4
    $clientsCardFid = $clients->getClientsCardFidelity();

    // exo 5
    //$search = '';
    if (!empty($_POST['search'])) {
        $search = htmlspecialchars($_POST['search']);
        $clientsLastNameM = $clients->getclientsLastNameM($search);        
    } else {
        $clientsLastNameM = $clients->getclientsLastNameM('');
    }
    
    // exo 7   delete CLIENT
    if (isset($_POST['deleteClientSubmit']))  {
        $clientID = $_POST['clientID'];
        $deleteThisClient = $clients->deleteClient($clientID);  
        $messageDeleteClient = 'Le client est supprimé ';       
    } 
    
    //  Shows / espectacles
    // EXO 6 et 2
    //$clientsLastNameM = $clients->getclientsLastNameM($search);
    $shows = new Shows;
    $showsList = $shows->getAllShows();
    $showsTypeList = $shows->getTypeShows();

?>