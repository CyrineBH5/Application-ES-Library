<?php
class config
{
    function getConnexion()
    {
        $host = "localhost";
        $user = "root";
        $pas = "";
        $bd = "gestion_biblio";
        //$dsn = "mysql:host=localhost;dbname=bd_connexion";
        try {
            //$cnx = new PDO($dsn, $user, $pas);
            $cnx = new mysqli($host, $user, $pas, $bd);
            return $cnx;
        } catch (Exception $e) {
            echo "Problème de connexion à la BD." . $e->getMessage();
        }
    }
}
