<?php
$clients= new clients;
$clientsList= $clients->getAllClients();

//liste des 20 premiers clients
$clientsList= $clients->getTwentyClients();

//liste des clients qui ont une carte
$clientsHasCardList= $clients->getClientsHasCard();

//liste des clients dont le nom commence par M
$clientsLastNameStartMList= $clients->getClientsLastNameStartM();

//liste des types de show
$showTypes= new showTypes;
$showTypeslist= $showTypes->getAllShowTypes();

//Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure
$shows= new shows;
$showList= $shows->getAllShows();
?>