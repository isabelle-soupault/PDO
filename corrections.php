<!------------------------------------------------------->
<!--                  Correction Exo2                  -->
<!------------------------------------------------------->

<!--

Ici, on va créer un nouveau fichier nommé config.php car comme on a déjà instancié la DB, il n'est pas possible de le refaire une seconde fois.

La meilleur façon, est de tout mettre au même endroit dans un fichier config.php

on fait donc 
define('DB_HOST')

DB_HOST, USER and co est obligatoirement en majuscules.

Une fois le fichier créé, il faut rajouter le require config.php et en tout premier pour que ce soit bien pris en compte.

Comme on a que deux champs, l'idée ici est d'utiliser un select.

ici dans le sélecteur Value sera égale à l'ID de la BDD pour créer un lien avec cette dernière.

-->

<!------------------------------------------------------->
<!--                  Correction Exo3                  -->
<!------------------------------------------------------->

<!--

Ici on peut choisir de rendre paramétrable le nombre d'objets affichés, ou on peut aussi décider de laisser l'utilisateur de choisir combien il veut voir de données.
On va donc choisir de faire un menu déroulant pour afficher la quantité désirée.
On va faire une liste déroulante qui propose 5 - 10 - 15 - 20 - 25 clients.

on fait donc une boucle for ici car on veut des donénes spéciales.

REMARQUE = PREPARE fonctionne comme QUERRY sauf que PREPARE est plus sécurisé que QUERRY

Après une fois le formulaire remplit on peut :
    - faire la mise à jour au clic
    - faire la mise à jour en instantanné (le formulaire se valide tout seul)
    
    Pour recharger la page sans pour autant cliquer sur le bouton , on va utiliser une fonction JS.

    Pour le formulaire, on reste sur la même page, donc on est en action="index.php" et la méthode la plus adaptée est POST

    La fonction JS va s'appliquer sur l'évènement onchange.
    Il faut également donner un nom au formulaire. Ici on choisi name="limitChoiceForm"
    Ce qui va donner :
    <select name="limitCHoise" id="" onchange="document.forms['limitCHoiceForm'].submit()"

    Comme le POST est du traitement, cela va dans le controller et on va le traiter dedans avec la fonction suivante

    if(!empty($_POST['$limitChoice'])){


    }

On doit maintenant définir si la valeur est dans les choix possibles. Il faut donc mettre une autre condition qui indique

if($_POST['limitChoice'] <=25 && $_POST['limitCHoice'] % 5 ==0 ) mais on doit mettre avant une valeur de base (20) pour éviter les erreurs et un else. On a ainsi une valeur par défaut.

donc avant les if, on met 

$limitChoiceUsers=20;
    if(!empty($_POST['$limitChoice'])){
        if($_POST['limitChoice'] <=25 && $_POST['limitChoice'] >=5 && $_POST['limitCHoice'] % 5 ==0 ){
            $limitChoiceUsers = htmlspecialchars($_POST['limitChoice']);
        }

    }
    Et pour finir on rajoute également toujours dans le index.Ctrl
    $clientList20 = $clients->getClientsLimitChoice();

    Et dans clients.php, on a bien public function getClientsLimitChoice();

    Mais maintenant le controller récupère les données et veut les transmettre au model, alors que d'habitude on fait l'inverse.
    Juste pour ça on pourrait utiliser sessions ou cookies, mais c'est un peu lourd.
    On peut :
    - ajouter un nouvel attribut à clients.php mais c'est une très mauvaise pratique. en effet, ici, la limite ne décrit pas la table.

    - on indique "simplement" :public function getClientsLimitChoice($limit).
    Puis dans le clients.php on va remplacer limit:20 par LIMIT ' .$limit

    et en amont, on va 

    Néanmoins, cela peut poser un problème de sécurité. En effet, on créé une faille SQL et on peut avoir des injections de SQL.

    Qu'est-ce qu'une injection SQL ?

    C'est le fait d'injecter du SQL dans du SQL pour faire autre chose qui est prévu initialement.
    Cela demande du tatonnement et de la réflexion pour le faire.
    Dans notre cas, on attent une valeur int.
    Si avec F12 (inspecteur) on peut ajouter le chiffre attendu, mais on rajoute autre chose
    Donc on commence par ; et ensuite, tout le reste est une nouvelle requête sql et faire par exemple DROP TABLE User ou users
    des noms de tables qui sont redondantes. user / users étant un nom très commun.
    On peut aussi par exemple faire un insert into et ajouter son nom et devenir admin.
    Cela signifie que nos tables sont sécurisées.

    Autre exemple : sur le site, on a 2 champs, le champs emails et le champs password et le bouton connecter

    on connait par exemple l'email de l'admin.
    SI le site est mal fait on pourra avoir par exemple
    SELECT * FROM USERS
    WHERE email= `$_POST['email']` && password=`$_POST['password']` 

    on va squizzer les vérifications en rajoutant OR 1 =1 #
    cela permet de dire on veut email + PW OU que 1=1 et le # permet de mettre tout le reste en commentaires

    La méthode QUERRY est une méthode très rapide et basique. On ne s'en sert que si les données ne viennent pas de l'exterrieur.
    SI les données viennent de l'exterrieur, on va passer par PREPARE.
    On fait une requête préparé. En gros, cela dit "attention PDO, c'est un truc qui peut se faire attaquer, donc soit attentif"

    Donc en rajoute :limit (on fait un marqueur nominatif).
    Ce marqueur nominatif indique qu'on a une variable nommée qui va arriver.

    Le marqueur nominatif est comme une variable pour dire "tu remplaces ça par ceci".

    Le PREPARE est OBLIGATOIREMENT associé à un marqueur nominatif.

    et dans clients.php on remplace querry par PREPARE.
    Maintenant qu'on a fait un prepare, on doit dire par quoi on remplace.
    Cela va se traduire par $result->bindValue(':limit', $limit,PDO::PARAM_INT);
    $result->execute();

    On met le marqueur nominatif, on prépare
    le bindValue indique ce qui est attendu (le marqueur nominatif, la valeur et le fait que ce soit un int) puis on l'exécute.

    

   Néanmoins, maintenant, on ne conserve pas la valeur sélectionnée. Avec le code tel qu'il est, en arrivant sur la page, on est à 5, si on passe à 25, opn a bien l'affichage du 25, mais le formulaire repasse à 5. De ce fait on ne peut pas avoir l'affichage à 5 à volonté.
   On va donc rajouter une ternaire dans dans le option.
   Cela va se traduire par : < ?php (isset($_POST['limitChoice']) && $_POST['limitCHoice']== $limitChoice) ?  'selected':''



   Autre types de failles : 
   
la faille XSS

Cas d'un champs commentaire pour rajouter des commentaires.
La faille XSS signifie Cross Site scripting

Ici on se dit que la page n'est peut être pas sécurisé. On va faire du JS.
<script> document.location.href="https://google.com" </script>
Cela signifie qu'on renvoie directement sur google (c'est la page indiqué mais rien n'empêche de faire la même page pour récupérer par exemple les informations bancaires.)
Dans ce cas c'est parcequ'on ne fait aucune vérification au moment de valider le commentaire.
On rappelle que htmlspecialChar permet d'éviter l'injection de JS


La faille INCLUDE

Cette faille permet de charger le fichier de mon choix.
 cela se traduit par ?bdd= bdd.php

 De là on peut télécharger un script qui permet ensuite d'afficher l'ensemble de l'arborescence et d'accéder aux différents éléments.
 Ceci n'est évidement qu'un exemple parmis tant d'autres de crapuleries possibles.

En tant que dev on doit avoir conscience des failles qui existent et si on maintient les bonnes pratiques, normalement ça devrait être bon, mais cela n'empêche pas de se maintenir à jours à ce sujet.
Il existe une association recenssant l'ensemble des failles existantes :  https://owasp.org/www-project-top-ten/




-->



<!------------------------------------------------------->
<!--                  Correction Exo4                  -->
<!------------------------------------------------------->

<!--

Il faut créer une nouvelle variable par exemple $clientLimitChoise

Rappel pour les jointures : table.colonne





    -->



<!------------------------------------------------------->
<!--                  Correction Exo5                  -->
<!------------------------------------------------------->

<!--


Ici on va demander à l'utilisateur de sélectionner lui-même le début.
On va passer par un marqueur nominatif.
Donc on remplace le querry par un prepare

et on réalise autant de bindvalue que nécessaire. Ici, on en a qu'un seul.

bindparam se fait au moment de la validation de la ligne
bindvalue va faire au niveau de l'exécution.

On créé donc la variable $search.



    -->

<!------------------------------------------------------->
<!--                  Correction Exo-Bonus             -->
<!------------------------------------------------------->

<!--

On veut donc un nouveau client.

Quand on fait un formulaire on doit se poser quelques questions
- a qui est destiné le questionnaire afin de pouvoir faire un questionnaire qui va bien.
- 

pour la regex carte de membre on part
[1-9][0-9]{3} => ici on dit que le premier ensemble sera entre 1 et 9 puis ensuite on ajoute 3 autres chiffres compris entre 0 et 9. Pour le premier groupe, on commence à 0 car on ne veut pas avoir de chiffre commençant par 0.


On doit créer un nouveau controller car c'est une nouvelle bue et pour simplifier le code.
De manière générale, nouvelle vue, nouveau controller.

Dans une page on peut avoir plusieures vues.
Par exemple dans le header on a une nav bar en un formulaire.
Là le formulaire d'inscription sera dans le controller du header.


Dans ce controller, on met toutes les vérifications du formulaire.

On peut appeller un controller sans pour autant le mettre dans le config.
Cela sert si on ne se sert pas de la partie en quesiton (require) à chaque fois.
Il suffit de le rajouter en require dans la page nécessaire.

La dans le cas du code affiché, c'est que ça enregistre mais il n'y a aucune vérification.
Si on arrive a passer les conditions, on peut faire planter l'application.

Par exemple, dans la date, on vérifie juste que ce ne soit pas vide.
On se rend d'abord dans la page clients.php

Ce qu'on va faire, c'est d'abord supprimer toutes les lignes de type $client = $_POST['firstName]

On va en revanche se servir des private $firstName etc

cela va donner
$result->bindValue(':lastName, $this->lastname)
Cependant, les variables sont en private.
Alors on doit mettre un getter et un setter

Cette fonction a pour objectif de récupérerr les valeurs des attributs.

public function __get($name){
    return $this->$name;
}

De là même façon, on fait une nouvelle méthode public

Cette fonction a pour objectif de remplir la valeur de l'attribut.

public function __set($name, $value){
    $this->$name = $value;
}


Ensuite, on modifie la ligne avec les bindValue de façon à avoir

$result = $this->dbClients->prepare($sql);
$result->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);

En PDO le brithDate est forcément une chaine de caractère et non un int.

Et pour les numéros de carte, et si on a ou non la carte, ce sera PARAM_INT

Pour le booleen, certaines bases de données ne gérant pas le boolleen, on passe par convencient par le tinyint

Ensuite on fait le execute

$result->execute();
Ensuite, il n'y a pas besoin de fetch ou fetchAll car on n'a pas de sélection de données.

on va donc faire un 
return $result->execute()
L'idée est de savoir si le execute a bien fonctionné ou pas.
Les 3/4 du temps les fonctions vont renvoyer des choses, on veut donc savoir si ça s'est bien passé ou pas.

Les bindValues vont typer les données.

Ensuite, on retourne dans le controller. et on met

$clients->__set('firstName', htmlspecialchars($_POST['firstName']));

Et on fait pareil pour toutes les autres entrées du controller.

On ne peut insérer le nouveau client que si 
 - le formulaire a été remplis
 - les vérifications ont été faites
 - il n'y a pas d'erreur

Il y a 2 façons de le faire : soit on passe par le empty, soit on oasse par le count == 0
Ici, on va passer par le empty
 Cela va se traduire par 
 if (empty($formErrors)){
    $clients->setNewClients();
    $messageAddClient = 'Le client est bien renseigné.'
 }



 Vérifications des champs.

 La date n'est pas vérifiée.

 Pour la carte :
 si on coche OUI, on doit OBLIGATOIREMENT enregistrer le numéro
 si on coche NON, on doit BLOQUER l'enregistrement de numéro.

Par contre, ici on n'indique rien dans la table cards.
On n'a en effet pas de liste déroulante avec les types de carte.

Pour chaque table il faut un model. Et dans ce cas, chaque page de model sera le nom EXACT de notre table car on sait plus facilement qui est à quoi.
Dans mon cas, ma page ne doit plus se nommer card mais cardsType vu qu'on va chercher les informations de la table nommée cardTypes. 

Le model ici va servir à récupérer les informations les types de cartes.

Maintenant on passe au controller. On n'a pas besoin de créer un novueau controller ici car on a déjà la vue avec le formulaire.

Attention, on a créé un novueau controller, il faut alors aller dans config pour ajouter le nouveau model.


On a créé "juste" la liste déroulante.
Maintenant il faut vérifier dans le controller que ce soit bien renseigné.

Vérifier de la bonne façon la liste déroulante avant l'insertion.

 - est-ce que ça a été réellement sélectionné.
 - si ce n'est pas vide.

nos vérifications seront faites si card = 1

Dans le controller, on va vérifier si ce n'est pas vide.
Il peut être compliqué de mettre en place la vérification récupérer la valeur, comparer avec la BDD, renvoyer la réponse car on peut avoir une réponse false si cela n'existe pas, mais également si ça prend trop de temps.

On voudrait l'ensemble des id dans la BDD? et on veut vérifier qu'ils existent.
Mais des fois, si on fait un fetchAll on va tout récupérer soit un tableau associatif, soit un tableau  qui prend les valeurs ID, sauf qu'on veut juste un tableau
les fetch_ASSOC renvoit un tableau.

On veut un simple tableau tout "bête" On cherche donc à remplacer 
[ ]['id'] OU []-> ID par []

D'après la doc, fetch_column sert à récupérer les valeurs uniques d'une seule colonne.
Après quelques tatonnements, on a trouvé que la fonction FETCH

if(!empty($_POST['type_cards'])){
    $cardListAllowed = $cardTypes->
}else{

}


Ensuite, on doit faire une méthode pour insérer une donnée dans cards alors que pour le moment on est dans cardsType. Donc il faut créer un nouveau model.

Par contre, ici l'insertion risque d'être très compliquée.


On doit maintenant récupérer le setter dans clients et le mettre dans cards.
On prend soin de le positionner après le controller.
On doit ensuite instancier  dans le controller le cards par $cards = new =cards.

On va ensuite inserrer le type de card quand il n'y a pas d'erreur.
Si on peut inserrer le client on peut alors inserrer la carte.
Mais on doit bien prendre en compte que si il n'y a pas de cartre, on ne remplisse pas avec du vide.

cela va se traduire par un 
if ($clients->__get('card')== 1){
    $cards->addCard

}

L'idée finale est d'enregistrer dans les deux tables : la table client ET la table cards.

Maintenant il faut répondre à la question :
 - on a un client qui a une cartre de fidélité et il y a un problème : 
  - le client ne s'est pas renseigné
   - le client s'est renseigné, mais pas card - la BDD est compromise.


   Dans le premier cas, on peut faire une condition pour ne pas insérer les informations.
   Pour le second, si la carte ne s'enregistre pas, il vaut mieux ne rien enregistrer que d'enregistrer des moitiés d'informations.
   Possibilités :
    - supprimer le client - mais c'est pas la meilleur des options, sauf pour avoir une BDD gruyère
    
    - utiliser les transactions : j'ai plusieurs requêtes qui vont ensemble : si elles passent toutes, fait le, si une plante, ne fait rien.

 Une exeption est une erreur qui, si on en fait rien va arrêter complêtement le script.
 Pour éviter cela, on demande de mettre un message.


Si on a une erreur, on va attraper l'exeption et errière on va pouvoir faire fonctionner le système.

On va utiliser le BeginiTransaction

on fait les requetes SQL 1 et 2

SI c'est OK => commit
SI PAS OK => rollback (annulation des deux requêtes et non suppression)


On va donc aller dans clients et créer une nouvelle methode public
public function beginTransaction() {
    return $this->dbclients->beginTransaction()
}

Cette methode va permettre d'exécuter la transaction du PDO et lui dire qu'on démare la transaction.

Ensuite, on réalise les requêtes qui nous interessent soit commit et rollback

public function commit(){
    return $this->dbclients->commit()

}
public function rollback(){
    return $this->dbclients->rollback()

}


Maintenant on a tout pour dire tu fais des transactions, des commits et des rollback.

A présent on va dans le controller clients.

Pour éviter que l'exception explose tout, on va faire un trycatch.

Donc, on se placce au niveau de empty($formerror)
et on va rajouter 
try{

}catch

Et on insère dedans toute la partie pour enregistrer la carte.

Mais on va également rajouter

$client->beginTransaction()

et après le message 'tout est bien enregistré', on rajoute
$client->commit();

Donc ici, si tout se passe bien, on va commit.

Mais si ce n'est pas le cas, dans le catch on rajoute

catch (PDOExeption $errorTransaction){
    $clients->rollBack();
    $messageAddClient = 'Une erreur est survenue lors de l'ajout du client : ' . $errorTransaction->getMessage();
}


On peut mettre autant de ligne qu'on veut dans le catch comme par exemple s'envoyer un email avec ce qui a foiré, l'écrire dans un fichier etc.
De manière général il ne faut surtout pas envoyer le message d'erreur à l'utilisateur. Cela ne sert ici que pour voir ce qu'il se passe et rien d'autre.

Maintenant on va tester en provoquant une erreur.
Pour cela, on va sur le code, et sur model clients.
Dans la methode qui fait l'insertion (addclients) on va la faire planter. Pour le plantage, on retire simplement le O de INTO.

Ensuite, on va sur le formulaire pour le remplir.
en front on a bien une erreur qui s'affiche. En BDD, on n'a pas non plus.

Puis, on retourne dans le code, on remet le O de INTO et dans cards on fait pareil en retirant le O de INTO pour l'insertion de la carte.
On a bien également une erreur d'insertion. Il faut à présent vérifier si cela n'a pas été ajouté.
Après vérifications dans la BDD, cela fonctionne comme on le souhaitait.

Ici, comme on n'est jamais arrivé au commit, le script plante, et donc on bascule sur le catch et le message d'erreur.

-->