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
     * num continent (clé étrangère) relié à num de continent
     *
     * @var int
     */
    private $numNationalite;

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

    /**
     * renvoie l'objet continent associé
     *
     * @return Continent
     */ 
    public function getNumContinent() : Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * ecrit le num continent
     *
     * @param Continent $continent
     * @return self
     */
    public function setNumContinent(Continent $continent) : self
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }
    

    /**
     * Retourne l'ensemble des nationalite
     *
     * @return Nationalite[] tableau d'objet nationalite
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("select n.num as numero, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $lesResultats=$req->fetchAll(;
        return$lesResultats;)
    }
    /**
     * Trouvre une nationalite par son num
     * 
     * @param integer $id numéro du nationalite
     * @return Nationalite objet nationalite trouvé
     */


    public static function findById(int $id) :Nationalite
    {
        $req=MonPdo::getInstance()->prepare("Select * from nationalite where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'nationalite');
        $req->bindParam(':id', $id);
        $req->execute();
        $lesResultats=$req->fetch(;
        return $leResultats;)
    }
    /**
     * Permet d'ajouter un nationalite
     *
     * @param Nationalite $nationalite nationalite à ajouter
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */
    public static function add(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle,numContinent values(:libelle, :numContinent"));
        $req->bindParam(':libelle', $nationalite->getLibelle());
        $req->bindParam(':numContinent', $nationalite->numContinent());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de modifier un nationalite
     * 
     * @param Nationalite $nationalite nationalite à modifier
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */

    public static function update(Nationalite $nationalite) :int
    {
        $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle, numContinent= where num= :id");
        $req->bindParam(':id', $nationalite->getNum());
        $req->bindParam(':libelle', $nationalite->getLibelle());
        $req->bindParam(':numContinent', $nationalite->numContinent());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un nationalite
     * 
     * @param Nationalite $nationalite
     * @return integer
     */

    public static function delete(Nationalite $nationalite) :int
{
    $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
    $req->bindParam(':id', $nationalite->getNum());
    $nb=$req->execute();
    return $nb;
}
    

    
}
?>