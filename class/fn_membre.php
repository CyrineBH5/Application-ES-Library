<?php
class fn_membre
{
    private $id;
    private $cin;
    private $nom;
    private $prenom;
    private $date_naiss;
    private $adresse;
    private $num_tel;
    private $login;
    private $password;
    protected $table = "membre";
    protected $cnx; /// objet de connexion
    // constructeur pour la connexion
    function __construct()
    {
        $db = new config();
        $this->cnx = $db->getConnexion();
    }
    function getMemberById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = '$id'";
        $result = mysqli_query($this->cnx, $query);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    public function updateProfile($id, $nom, $prenom, $date, $num_tel, $adresse, $login)
    {
        $query = "UPDATE $this->table SET nom = '$nom',prenom = '$prenom',date_naissance = '$date',
        adresse = '$adresse',num_tel='$num_tel',login = '$login' WHERE id='$id';";
        mysqli_query($this->cnx, $query);
    }
    /*function findAllMembre()
    {
        $sql = "select * from " . $this->table;
        $stmt = mysqli_prepare($this->cnx, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }*/

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
     * Get the value of cin
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set the value of cin
     *
     * @return  self
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of date_naiss
     */
    public function getDate_naiss()
    {
        return $this->date_naiss;
    }

    /**
     * Set the value of date_naiss
     *
     * @return  self
     */
    public function setDate_naiss($date_naiss)
    {
        $this->date_naiss = $date_naiss;

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
     * Get the value of login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
