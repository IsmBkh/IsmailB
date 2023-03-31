<?php 

// Récupération des données formulaire contact

// il faut réaliser des vérifications sur les valeurs dans $_POST avant de les stocker dans les variables 
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$commentaire = $_POST['commentaire'];

// Connexion à la base de données MySQL

// attention il ne faut pas mettre les identifiants de la base de données en clair (en tout cas sur github)
// est ce que ces identifiants fonctionnent ?? Est ce que tu as essayer de faire un INSERT directement
// ajouter un var_dump sur $pdo pour vérifier que ça fonctionne
$host='localhost';
$dbname='id20512936_portfolio';
$username='id20512936_ismailbakhtaoui';
$password='P!>a=kfZ7nYWxR98';
$dsn="mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options =[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false, 
]; 

try {
    $pdo = new PDO($dsn, $username, $password, $options);
}catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}

// Insérer les données du formulaire dans la table de contacts

$sth = $connexion->prepare("
    INSERT INTO contacts (prenom, nom, tel, email, commentaire, dt_creation) 
    VALUES 
    (:email, :nom, :tel, :email, :commentaire, NOW()
    ");
$sth->execute($_POST);

// la constant WWW n'est pas déclarée

header("Location:".WWW."?confirmation.php");
exit();

?>
    