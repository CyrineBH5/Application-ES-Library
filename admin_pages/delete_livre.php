<?php
require_once "../config/config.php";
require_once "../class/fn_admin.php";


$config_base = new config();
$bd = $config_base->getConnexion();

$admin = new fn_admin();
$id = $_GET['idi'];
$admin->delete_livres($id);
header("Location:tables-books.php");
exit;
//var_dump($result);
/*if (!$result) {
    die('Erreur : probleme' . mysqli_error($this->cnx));
} else {
    header("location:listMembre.php");
    exit;
}

mysqli_close($this->cnx);
*/
// Contrôle voulez-vous vraiment le supprimer