<?php
include('configuration.php');

if (!empty($_POST['nom_organisation']) && !empty($_POST['numero_siret'])) {
    $statut = 'organisateur';
    $acces = 'non';
} else {
    // LES CHAMPS SONT VIDES, LEUR ATTRIBUÉ LE STATUT "NORMAL" ET AUTORISER L'ACCÉS
    $statut = 'utilisateur';
    $acces = 'oui';
}

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$nom_organisation = $_POST['nom_organisation'];
$numero_siret = $_POST['numero_siret'];
$mot_de_passe = $_POST['mot_de_passe'];

// TOUT EST VALIDE
// CRYPTER LE MOT DE PASSE ET METTRE LES NOMS DE FAMILLE EN MAJUSCULE
$mot_de_passe = md5($mot_de_passe);
$nom = strtoupper($nom);
$sql = mysqli_query($link, "INSERT INTO utilisateurs ( prenom , nom , email , nom_organisation , numero_siret , mot_de_passe, statut, acces) VALUES ('$prenom' , '$nom' , '$email' , '$nom_organisation' , '$numero_siret' , '$mot_de_passe' , '$statut' , '$acces' )") or die('Erreur de la requête SQL');
if ($sql) {
    // SI L'ACCÉS EST AUTORISÉ
    if ($acces == 'oui') {
        $erreur = 'Votre inscription a bien été prise en compte, vous pouvez désormais vous connecter !';
        header('location:index.php');
    }
    if ($acces == 'non') {
        // SI IL N'EST PAS AUTORISÉ
        $erreur = 'Votre inscription a bien été prise en compte ! Vous pourrez accéder à votre compte une fois votre inscription validé par l’administration';
        header('location:index.php');
    }
} else {
    // SI LE FORMULAIRE N'EST PAS VALIDE
    $erreur = 'Une erreur est survenue lors de la création de votre compte';
}
