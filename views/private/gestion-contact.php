<?php 

$sth = $connexion->prepare("
SELECT id, prenom, nom, tel, email, message, DATE_FORMAT(dt_creation, '%d/%m/%Y') AS `dt_creation` FROM contacts ;
");
$sth->execute();
$messages = $sth->fetchAll();

?>