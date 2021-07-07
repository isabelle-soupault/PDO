<?php
// Create connection
$servername = 'localhost';
$username = 'admin_cris';
$password = 'cristina-6400';
$dbname = 'colyseum';
// creation objet 
$connection = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8mb4', $username, $password);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Exercices PDO</title>
</head>

<body>

    <main class="container">
        <h1>PDO exemples</h1>
        <p class="connexion">
            <?php
            // code de verification connexion bbdd
            try {
                // set the PDO error mode to exception
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
        </p>
        <div class="row">
            <div class="col-md-4">
                <h2 class="fs-5">1 - Montrer la liste de clients </h2>
                <ul class="list-unstyled">
                    <?php
                    $sql_customers = 'SELECT `id`, `firstName`, `lastName` FROM `clients`';
                    foreach ($connection->query($sql_customers) as $row) {
                    ?>
                        <li>
                            <?php
                            echo  $row['id'] . ' - ' . $row['firstName'] .  ' ' . $row['lastName'];
                            ?>
                        </li>
                    <?php
                    } // end foreach
                    ?>
                </ul>

            </div><!-- end col 6-->
            <div class="col-md-4">
                <h2 class="fs-5">2 - Montrer la liste de types d'espectacles </h2>
                <ul class="list-unstyled">
                    <?php
                    $sql_show_type = "SELECT `type` FROM `showtypes`";
                    foreach ($connection->query($sql_show_type) as $row) {
                    ?>
                            <li>
                                <?php
                                echo  $row['type'];
                                ?>
                            </li>
                    <?php
                    } // end foreach
                    ?>
                </ul>
            </div>
            <div class="col-md-4">
                <h2 class="fs-5">3 - Afficher les 20 premiers clients. </h2>
                <ul class="list-unstyled">
                    <?php
                    $sql_customers = "SELECT `id`, `firstName`, `lastName` FROM `clients` LIMIT 20";
                    foreach ($connection->query($sql_customers) as $row) {
                    ?>
                            <li>
                                <?php
                                echo  $row['id'] . ' - ' . $row['firstName'] .  ' ' . $row['lastName'];
                                ?>
                            </li>
                    <?php
                        } // end foreach
                    ?>
                </ul>
            </div><!-- end col 6-->
            <div class="col-md-6">
                <h2 class="fs-5">4 - N'afficher que les clients possédant une carte de fidélité. </h2>
                <ul class="list-unstyled">
                    <?php
                    $sql_customers = "SELECT `id`, `firstName`, `lastName` FROM `clients` WHERE `card`= 1;";                   
                    foreach ($connection->query($sql_customers) as $row) {
                    ?>
                            <li>
                                <?php
                                echo  $row['id'] . ' - ' . $row['firstName'] .  ' ' . $row['lastName'];
                                ?>
                            </li>
                    <?php
                       } // end foreach

                    ?>
                </ul>

            </div><!-- end col 6-->
            <div class="col-md-6">
                <h2 class="fs-5">5 - Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
                </h2>
                <ul class="list-unstyled">
                    <?php
                    $sql_customers = "SELECT `firstName`, `lastName` FROM `clients` WHERE `lastName` LIKE 'M%' ORDER BY `lastName` ASC";
                    foreach ($connection->query($sql_customers) as $row) {
                    ?>
                            <li class="mb-3 bg-light p-4 ">
                                <p><strong>Nom : </strong><?= $row['lastName']; ?> </p>
                                <p><strong>Prénom : </strong><?= $row['firstName']; ?> </p>
                            </li>
                    <?php
                          } // end foreach
                    ?>
                </ul>


            </div><!-- end col 6-->

            <div class="col-12">

                <h2 class="fs-5">6 - Spectacle par artiste, le date à heure. </h2>
                <ul class="list-unstyled">
                    <?php
                    $sql_show_type = "SELECT `title`, `performer`, `date`, `startTime` FROM `shows`";
                    foreach ($connection->query($sql_show_type) as $row) {                  
                    ?>
                            <li class="mb-3 bg-light p-4 ">
                                <?php
                                echo  $row['title'] . ', par ' . $row['performer'] . ' le ' . $row['date'] . ' ' . ' à ' . $row['startTime'];
                                ?>
                            </li>
                    <?php
                        } // end foreach
                    ?>
                </ul>
            </div>
            <div class="col-12">
                <h2 class="fs-5">7 - Afficher tous les clients </h2>
                <div class="row">
                    <?php
                    // selection des clients de la bbdd
                    $sql_customers = "SELECT  `firstName`, `lastName`, `birthDate`, `card`, `cardNumber` FROM `clients`";
                    foreach ($connection->query($sql_customers) as $row) {
                    ?>
                            <div class="col-md-3 mb-3">
                                <div class="card" style="width: 18rem;">

                                    <div class="card-body ">
                                        <h5 class="card-title">Nom : <?= $row['lastName'] ?></h5>
                                        <h5 class="card-title">Prénom : <?= $row['firstName'] ?></h5>
                                        <p class="card-text">Date de naissance : <?= $row['birthDate'] ?></p>
                                        <p class="card-text">Carte de fidélité : <?= ($row['card'] == '1') ? 'Oui' : 'Non'; ?></p>
                                        <p class="card-text">
                                            <?php
                                            if ($row['cardNumber'] == NULL) {
                                                echo '<br>';
                                            } else {
                                                echo 'Numéro de carte : ' . $row['cardNumber'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    <?php
                         } // end foreach
                    ?>
                </div> <!-- end row-->
            </div>
        </div> <!-- end row-->
    </main>
</body>
</html>