<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

$query ="SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
    <div>
        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname">
    </div>
    <div>   
        <label for="lastname">nom :</label>
        <input type="text" id="lastname" name="lastname" required>
    </div>
    <div>
        <button type=submit>nouvel ami</button>
    </div>
</form>
<ul>
    <?php
    foreach ($friends as $friend): ?>
    <li>
        <?= $friend['firstname'] . " " . $friend['lastname'] ?>
    </li>
    <?php endforeach ?>
</ul>

</body>
</html>