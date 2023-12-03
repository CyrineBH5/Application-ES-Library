<?php
require_once "../config/config.php";
require_once "../class/Livre.php";
require_once "../class/reservation.php";
$config_base = new config();
$bd = $config_base->getConnexion();
$livre = new Livre($bd);
$reservation = new Reservation($bd);
$id = $_GET['delid'];
$isbn = $reservation->getReservationByISBN($id);
$books = $livre->getBookByISBN($isbn);
$livre->updateDispo($books[0]['id']);
$res = $reservation->getReservation($id);
$etat = "Accepted";
$reservation->updateEtat($res[0]['id'], $etat);
header('location:dashboard_ad.php');
