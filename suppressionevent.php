<?php
$id_event = $_POST['fiche_id'];
$link = mysqli_connect("localhost", "root", "root", "charlotte");
$sql = mysqli_query($link, "DELETE FROM evenements WHERE id_evenement = '$id_event'") or die('Erreur de la requête SQL');
if ($sql) {
    echo 'SUPPRIMÉ';
    // header("Refresh: 4; url=tableaudebord.php");
    header('location:tableaudebord.php');
} else {
    echo 'Erreur';
}
