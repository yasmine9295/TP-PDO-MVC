<?php
class Livre {

    /**
     * numero du livre
     * 
     * @var int
     */
    private $num;

    /**
     * Libelle du Livre
     * 
     * @var string
     */
    private $titre;


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
    public function getTitre() : string 
    {
    return $this->titre;
    }

    /**
     * ecrit dans le titre
     *
     * @param string $titre
     * @return self
     */
    public function settitre(string $titre) : self
    {
    $this->titre = $titre;

    return $this;
    }

    /**
     * Retourne l'ensemble des livres
     *
     * @return Livre[] tableau d'objet titre
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("Select * from livre");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Livre');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }
    /**
     * Trouvre un livre par son num
     * 
     * @param integer $id numéro du livre
     * @return Livre objet livre trouvé
     */


    public static function findById(int $id) :int
    {
        $req=MonPdo::getInstance()->prepare("Select * from livre where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Livre');
        $req->bindParam(':id', $id);
        $req->execute();
        $lesResultats=$req->fetch();
        return $lesResultats;
    }
    /**
     * Permet d'ajouter un Livre
     *
     * @param Livre $livre livre à ajouter
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */
    public static function add(Livre $livre) :int
    {
        $req=MonPdo::getInstance()->prepare("insert into livre(titre) values(:titre)");
        $titre=$livre->getLibelle();
        $req->bindParam(':libelle' ,$titre);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de modifier un livre
     * 
     * @param Livre $livre livre à modifier
     * @return integer resultat (1 si l'opération a reussi, 0 si non)
     */

    public static function update(Livre $livre) :int
    {
        $req=MonPdo::getInstance()->prepare("update livre set titre= :titre where num= :id");
        $num=$livre->getNum();
        $titre=$livre->getTitre();
        $req->bindParam(':id' , $livre->$num);
        $req->bindParam(':titre' , $titre);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un livre
     * 
     * @param Livre $livre
     * @return integer
     */

    public static function delete(Livre $livre) :int
{
    $req=MonPdo::getInstance()->prepare("delete from livre where num= :id");
    $num=$livre->getNum();
    $req->bindParam(':id' ,$num);
    $nb=$req->execute();
    return $nb;
}
    

    /**
     * Set numero du livre
     *
     * @param  int  $num  numero du livre
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