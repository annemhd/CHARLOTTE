<?php
include('configuration.php');

echo $_GET['prenom'];

$prenom = $_GET['prenom'];
$nom = $_GET['nom'];
$email = $_GET['email'];
$nom_organisation = $_GET['nom_organisation'];
$numero_siret = $_GET['numero_siret'];
$mot_de_passe = $_GET['mot_de_passe'];
$mot_de_passe = md5($mot_de_passe);

$sql = mysqli_query($link, "UPDATE utilisateurs SET prenom = '$prenom', nom = '$nom', email = '$email', nom_organisation = '$nom_organisation',  numero_siret = '$numero_siret', mot_de_passe = '$mot_de_passe' WHERE id_utilisateur = '" . $_SESSION['id_utilisateur'] . "'") or die('Erreur de la requête SQL');
if ($sql) {
    echo 'Mise a jour faite';
    header('location:tableaudebord.php');
} else {
    echo 'Erreur';
}
