<?php
include('configuration.php');

$titre_evenement = $_POST['titre_evenement'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$type_evenement = $_POST['type_evenement'];
$adresse = $_POST['adresse'];
$code_postal = $_POST['code_postal'];
$ville = $_POST['ville'];
$description = $_POST['description'];

$titre_evenement = mysqli_real_escape_string($link, $titre_evenement);
$description = mysqli_real_escape_string($link, $description);
$sql = mysqli_query($link, "INSERT INTO evenements SET id_organisateur = '" . $_SESSION['id_utilisateur'] . "' ,  titre_evenement = '$titre_evenement', date_debut = '$date_debut', date_fin = '$date_fin', type_evenement = '$type_evenement',  adresse = '$adresse' , code_postal = '$code_postal' , ville = '$ville', description = '$description', signalement = 'non'") or die('Erreur de la requête SQL');
if ($sql) {
    echo 'evenement crée';
    header('location:tableaudebord.php');
} else {
    echo 'Erreur';
}
