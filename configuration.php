<?php
// CONFIGURATION
// DÉMARRAGE DE LA SESSION
session_start();

// CONFIGURATION DE LA BASE DE DONNÉES
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "root", "root", "charlotte");

// RÉCUPÉRATION DU NOM DE LA BASE DE DONNÉE
$result = mysqli_query($link, "SELECT DATABASE()");
$row = mysqli_fetch_row($result);
