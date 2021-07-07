<?php 
require_once('class/database.php');
require_once('model/Shows.php');
$event = new Shows;


if (!empty($_POST['type']) && $_POST['submit'] == 'createShow') {
    $type = $_POST['type'];
    $sql = $event->newShowType($type);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="type">Entrez votre nouveau type de Show : </label>
        <input type="text" name="type" id="">
        <input type="submit" name="submit" value="createShow">
    </form>
    
</body>
</html>