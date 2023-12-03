<?php
require_once "../config/config.php";
require_once "../class/Livre.php";
require_once "../class/reservation.php";
$config_base = new config();
$bd = $config_base->getConnexion();
$reservation = new Reservation($bd);
$livre = new Livre($bd);
$id = $_GET['delid'];
$res = $reservation->getReservation($id);
$etat = $res[0]['etat'];
echo $etat;
if ($etat == "Accepted") {
    $etat = "Refused";
    $reservation->updateEtat($res[0]['id'], $etat);
    $isbn = $reservation->getReservationByISBN($id);
    $books = $livre->getBookByISBN($isbn);
    $livre->updateDispoDim($books[0]['id']);
} else {
    $etat = "Refused";
    $reservation->updateEtat($res[0]['id'], $etat);
}
header('location:dashboard_ad.php');
