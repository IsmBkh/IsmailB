<?php
session_start();

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Nettoyer les données soumises par le formulaire
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $nom = htmlspecialchars(trim($_POST['nom']));
    $tel = htmlspecialchars(trim($_POST['tel']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['commentaire']));

    // Vérifier si les champs obligatoires ont été remplis
    if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($message)) {
        // Envoyer un email de confirmation
        $to = $email;
        $subject = 'Confirmation de contact';
        $message = "Bonjour $prenom,\n\nNous avons bien reçu votre message et nous vous en remercions.\n\nNous vous répondrons dans les meilleurs délais.\n\nCordialement,\n\nL'équipe de notre site.";
        $headers = 'From: noreply@example.com';
        mail($to, $subject, $message, $headers);

        // Supprimer les données du formulaire de la session
        unset($_SESSION['form']);

        // Afficher un message de confirmation
        echo '<p>Merci pour votre message, nous vous répondrons dans les meilleurs délais.</p>';
    } else {
        // Les champs obligatoires n'ont pas été remplis
        echo '<p>Les champs marqués d\'une astérisque (*) sont obligatoires.</p>';
    }
} else {
    // Le formulaire n'a pas été soumis
    header("Location: ".WWW."?index.php");
}

exit ; 

?>
