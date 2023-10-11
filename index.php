<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

header ('Location: friends.php');

$data = array_map('trim', $_POST);
$firstname = htmlentities($data['firstname']);
$lastname = htmlentities($data['lastname']);

$query = 'INSERT INTO friend (`firstname`, `lastname`) VALUES(:firstname, :lastname)';
$statement =$pdo->prepare($query);

$statement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
$statement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
$statement->execute();


$query ="SELECT * FROM friend";
$statement = $pdo->query($query);
$friend = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <?php echo $data['firstname'] . " ". $data['lastname']?> est mon ami<br>
    </p>

</body>
</html>