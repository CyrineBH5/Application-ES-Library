<?php
require_once "../config/config.php";
require_once "../class/fn_admin.php";
require_once "../class/reservation.php";
//include "layout.php";

$config_base = new config();
$bd = $config_base->getConnexion();
$reservation = new Reservation($bd);
$id = $_GET['delid'];
$nb_reservation = $reservation->CountReservationUser($id);
if ($nb_reservation == 0) {
    $admin = new fn_admin();
    $admin->delete_membre($id);
    echo "<script>alert('Member can't be deleted ! ')</script>";
}
header("location:tables_member.php");
exit;
