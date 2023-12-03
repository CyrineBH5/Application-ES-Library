<?php
class Livre
{
    private $id;
    private $titre;
    private $description;
    private $auteur;
    private $ISBN;
    private $categorie;
    private $nb_disponibilite;
    private $etat;

    private $cnx;

    function __construct()
    {
        $db = new config();
        $this->cnx = $db->getConnexion();
    }

    public function updateDispo($id)
    {
        $query = "UPDATE livreq SET nb_dispo=nb_dispo-1 WHERE id='$id';";
        mysqli_query($this->cnx, $query);
    }
    public function updateDispoDim($id)
    {
        $query = "UPDATE livreq SET nb_dispo=nb_dispo+1 WHERE id='$id';";
        mysqli_query($this->cnx, $query);
    }
    public function insertBook($titre, $image, $description, $auteur, $ISBN, $categorie, $date_edition, $nb_disponibilite)
    {
        $req = "insert into livreq (ISBN,image,titre,description,auteur,categorie,date_edition,nb_dispo)
         values ('$ISBN','$image','$titre','$description','$auteur','$categorie','$date_edition','$nb_disponibilite')";
        mysqli_query($this->cnx, $req);
    }
    public function getAllBooks()
    {
        $req = "select * from livreq";
        $res = mysqli_query($this->cnx, $req);
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }
    public function getBookByISBN($isbn)
    {
        $query = "SELECT * FROM livreq WHERE ISBN = '$isbn'";
        $result = mysqli_query($this->cnx, $query);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function getBookByID($id)
    {
        $query = "SELECT * FROM livreq WHERE id = '$id'";
        $result = mysqli_query($this->cnx, $query);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function updateBook($id, $image, $titre, $description, $auteur, $categorie, $date_edition, $nb_disponibilite)
    {
        $query = "UPDATE livreq SET Image='$image',titre = '$titre',description = '$description',auteur = '$auteur',
        categorie = '$categorie',date_edition = '$date_edition',nb_dispo = '$nb_disponibilite' WHERE id='$id';";
        mysqli_query($this->cnx, $query);
    }



    public function getBooksByPage($page, $perPage)
    {
        $offset = ($page - 1) * $perPage;
        $query = "SELECT * FROM livreq LIMIT $offset, $perPage";
        $result = mysqli_query($this->cnx, $query);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function getBooksSearch($titre)
    {
        $requete = "SELECT * FROM livrq WHERE titre LIKE ?";
        $titre = '%' . $titre . '%';
        $result = mysqli_query($this->cnx, $requete);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
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
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of disponibilite
     */
    public function getDisponibilite()
    {
        return $this->nb_disponibilite;
    }

    /**
     * Set the value of disponibilite
     *
     * @return  self
     */
    public function setDisponibilite($disponibilite)
    {
        $this->nb_disponibilite = $disponibilite;

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
