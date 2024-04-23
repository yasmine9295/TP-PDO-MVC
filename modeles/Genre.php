<?php
class Genre {

    /**
     * numero du genre
     * 
     * @var int
     */
    private $num;

    /**
     * Libelle du genre
     * 
     * @var string
     */
    private $libelle;


    /**
     * Get the value of num
     */
    public function getNum()
    {
    return $this->num;
    }

    /**
     * Lit le libelle
     *
     * @return string
     */
    public function getLibelle() : string 
    {
    return $this->libelle;
    }

    /**
     * ecrit dans le libelle
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle(string $libelle) : self
    {
    $this->libelle = $libelle;

    return $this;
    }

    /**
     * Retourne l'ensemble des genre
     *
     * @return Genre[] tableau d'objet genre
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("Select * from genre");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'genre');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }
    /**
     * Trouvre un genre par son num
     * 
     * @param integer $id numéro du genre
     * @return Genre objet genre trouvé
     */


    public static function findById(int $id) :Genre
    {
        $req=MonPdo::getInstance()->prepare("Select * from genre where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
        $req->bindParam(':id', $id);
        $req->execute();
        $lesResultats=$req->fetch();
        return $lesResultats;
    }
    /**
     * Permet d'ajouter un genre
     *
     * @param Genre $genre genre à ajouter
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */
    public static function add(Genre $genre) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into genre(libelle) values(:libelle)");
        $libelle=$genre->getLibelle();
        $req->bindParam(':libelle' ,$libelle);
        $nb=$req->execute();
        return $nb;

    }

    /**
     * Permet de modifier un genre
     * 
     * @param Genre $genre genre à modifier
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */

    public static function update(Genre $genre) :int
    {
        $req=MonPdo::getInstance()->prepare("update genre set libelle= :libelle where num= :id");
        $num=$genre->getNum();
        $libelle=$genre->getLibelle();
        $req->bindParam(':id' , $genre->$num);
        $req->bindParam(':libelle' , $libelle);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un genre
     * 
     * @param Genre $genre
     * @return integer
     */

    public static function delete(Genre $genre) :int
{
    $req=MonPdo::getInstance()->prepare("delete from genre where num= :id");
    $num=$genre->getNum();
    $req->bindParam(':id' ,$num);
    $nb=$req->execute();
    return $nb;
}
    

    /**
     * Set numero du genre
     *
     * @param  int  $num  numero du genre
     *
     * @return  self
     */ 
    public function setNum(int $num) :self
    {
        $this->num = $num;

        return $this;
    }
}
?>