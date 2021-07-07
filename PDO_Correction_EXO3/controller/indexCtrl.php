<?php

    $clients = new Clients;
    $clientsList = $clients->getAllClients();
    $limitChoiceUsers = 5;
    if (!empty($_POST['limitChoice'])) {
        if ($_POST['limitChoice'] <= 25 &&  $_POST['limitChoice'] >= 5 && $_POST['limitChoice'] % 5 == 0) {
            $limitChoiceUsers = htmlspecialchars($_POST['limitChoice']);
        }
    }
    //$clientsList20 = $clients->get20firstClients();

    $clientsList20 = $clients->getClientsLimitChoice($limitChoiceUsers);
    
    $shows = new Shows;
    $showsList = $shows->getAllShowTypes();

?>