<?php


include('inscription.php');

include('contact.php');

if (isset($_SESSION)) {
    include('gerercompte.php');
}

if (isset($_SESSION)) {
    include('ajoutevent.php');
    // include('miseajourfiche.php');
}
