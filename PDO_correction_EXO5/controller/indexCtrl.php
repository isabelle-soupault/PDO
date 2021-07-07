<?php
    $clients = new Clients;
    $shows = new Shows;

    $clientsList = $clients->allClients();

    $twentyClientsList = $clients->getTwentyClients();

    $clientsWithCards = $clients->getClientsWithCards();

    $spareArray = $clients->getClientsWithCards();
    
    if (!empty($_POST['search'])) {
        $search = htmlspecialchars($_POST['search']);
        $clientsByName = $clients->getClientsByName($search);        
    } else {
        $clientsByName = $clients->allClients();
    }

    $perfomanceList = $shows->allShows(); 

    $allShowsTypes = $shows->allShowsTypes();
?>