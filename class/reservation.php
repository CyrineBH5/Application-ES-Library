<?php
class Reservation
{
    private $id;
    private $titre;
    private $num_tel;
    private $auteur;
    private $ISBN;
    private $categorie;
    private $date_edition;
    private $username;
    private $adresse;
    private $image;
    private $etat;
    private $cnx;
    private $table = "reservation";
    public function getReservationByuser_id($user_id)
    {
        $req = "select * from reservation where user_id='$user_id';";
        $res = mysqli_query($this->cnx, $req);
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }

    public function CountReservationUser($id)
    {
        $req = "select count(*) from reservation where user_id='$id' and etat='Accepted' or etat='In progress' ;";
        $res = mysqli_query($this->cnx, $req);
        $row = mysqli_fetch_row($res);
        $count = $row[0];
        return $count;
    }
    //update etat de la table reservation 
    public function getReservation($id)
    {
        $req = "select * from reservation where id='$id';";
        $res = mysqli_query($this->cnx, $req);
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }
    public function updateEtat($id, $etat)
    {
        $query = "UPDATE reservation SET etat='$etat' WHERE id='$id';";
        mysqli_query($this->cnx, $query);
    }
    public function getReservationByISBN($id)
    {
        $query = "SELECT ISBN FROM reservation WHERE id = '$id'";
        $result = mysqli_query($this->cnx, $query);
        $row = mysqli_fetch_array($result);
        return $row['ISBN'];
    }
    function insertReservation($user_id, $username, $adresse, $num_tel, $ISBN, $image, $titre, $auteur, $categorie, $date_edition, $date_reservation, $etat)
    {
        $req = "insert into $this->table (user_id,username,adresse,num_tel,ISBN,image,titre,auteur,categorie,date_edition,date_reservation,etat)
        values ('$user_id','$username','$adresse','$num_tel','$ISBN','$image','$titre','$auteur','$categorie','$date_edition','$date_reservation','$etat')";
        mysqli_query($this->cnx, $req);
    }
    function __construct()
    {
        $db = new config();
        $this->cnx = $db->getConnexion();
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of num_tel
     */
    public function getNum_tel()
    {
        return $this->num_tel;
    }

    /**
     * Set the value of num_tel
     *
     * @return  self
     */
    public function setNum_tel($num_tel)
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    /**
     * Get the value of auteur
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of ISBN
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * Set the value of ISBN
     *
     * @return  self
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    /**
     * Get the value of categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of date_edition
     */
    public function getDate_edition()
    {
        return $this->date_edition;
    }

    /**
     * Set the value of date_edition
     *
     * @return  self
     */
    public function setDate_edition($date_edition)
    {
        $this->date_edition = $date_edition;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }
}
