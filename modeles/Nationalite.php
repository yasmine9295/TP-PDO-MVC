<?php
class Nationalite {

    /**
     * numero du nationalite
     * 
     * @var int
     */
    private $num;

    /**
     * Libelle du nationalite
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
    $this->libelle + $libelle;

    return $this;
    }

    private $numContinent;

    /**
     * Retourne l'ensemble des continents
     *
     * @return Continent[] tableau d'objet continent
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("Select * from continent");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->execute();
        $lesResultats=$req->fetchAll(;
        return$lesResultats;)
    }
    /**
     * Trouvre un continent par son num
     * 
     * @param integer $id numéro du continent
     * @return Continent objet continent trouvé
     */


    public static function findById(int $id) :Continent
    {
        $req=MonPdo::getInstance()->prepare("Select * from continent where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->bindParam(':id', $id);
        $req->execute();
        $lesResultats=$req->fetch(;
        return $leResultats;)
    }
    /**
     * Permet d'ajouter un continent
     *
     * @param Continent $continent continent à ajouter
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */
    public static function add(Continent $continent) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into continent(libelle) values(:libelle");
        $req->bindParam(':libelle', $continent->getLibelle());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de modifier un continent
     * 
     * @param Continent $continent continent à modifier
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */

    public static function update(Continent $continent) :int
    {
        $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
        $req->bindParam(':id', $continent->getNum());
        $req->bindParam(':libelle', $continent->getLibelle());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un continent
     * 
     * @param Continent $continent
     * @return integer
     */

    public static function delete(Continent $continent) :int
{
    $req=MonPdo::getInstance()->prepare("delete from continent where num= :id");
    $req->bindParam(':id', $continent->getNum());
    $nb=$req->execute();
    return $nb;
}
    
}
?>