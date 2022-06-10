<?php
include('configuration.php');

echo $_GET['id'];

$id = $_GET['id'];
$sql = mysqli_query($link, "UPDATE utilisateurs SET acces = 'non' WHERE id_utilisateur ='$id' AND acces= 'oui'") or die('Erreur de la requête SQL');
if ($sql) {
    echo 'Accés restraint';
    // header("Refresh: 4; url=tableaudebord.php");
    header('location:tableaudebord.php');
} else {
    echo 'Erreur';
}
