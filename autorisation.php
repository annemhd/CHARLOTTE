<?php
include('configuration.php');

echo $_GET['id'];

$id = $_GET['id'];
$sql = mysqli_query($link, "UPDATE utilisateurs SET acces = 'oui' WHERE id_utilisateur = '$id' AND acces= 'non'") or die('Erreur de la requête SQL');
if ($sql) {
    echo 'Accés autorisé';
    // header("Refresh: 4; url=tableaudebord.php");
    header('location:tableaudebord.php');
} else {
    echo 'Erreur';
}
