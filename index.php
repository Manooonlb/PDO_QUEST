<?php
require_once 'connec.php';

if(isset($_POST['firstname']) && ($_POST['lastname'])){
$pdo = new \PDO(DSN, USER, PASS);
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);

$query='INSERT INTO friend (firstname,lastname) VALUES (:firstname, :lastname)';
$statement = $pdo->prepare($query);

$statement->bindValue(':firstname',$firstname,\PDO::PARAM_STR);
$statement->bindValue(':lastname',$lastname,\PDO::PARAM_STR);

$statement->execute();

$query= "SELECT * FROM friend";
$statement= $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_NUM);


}
?>

<ul>
<?php 

foreach ($friends as $friend) { ?>
    <li>
        <?php foreach ($friend as $value) { ?>
            <?= $value ?>
        <?php } ?>
    </li>
<?php } ?>
</ul>

<form method="post">
    <input type ="text" name ="firstname" placeholder="First Name">
    <input type ="text" name ="lastname" placeholder="Last Name">
    <button type="submit">Envoyer</button>
</form> 

      






