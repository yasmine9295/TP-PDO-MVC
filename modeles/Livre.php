<?php
class Livre {


    /**
     * 
     * 
     * @var int
     */
    private $prix;
    /**
     * numero du livre
     * 
     * @var int
     */
    private $num;

    /**
     * 
     * 
     * @var string
     */
    private $auteur;

    /**
     * 
     * 
     * @var string
     */
    private $genre;



    /**
     * 
     * 
     * @var int
     */
    private $annee;

    /**
     * Libelle du Livre
     * 
     * @var string
     */
    private $titre;

    /**
     * Ref du livre
     * 
     * @var int
     */
    private $isbn;

    /**
     * 
     * 
     * @var string
     */
    private $langue;

    /**
     * 
     * 
     * @var string
     */
    private $editeur;


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
    public function setTitre(string $titre) : self
    {
    $this->titre = $titre;

    return $this;
    }

  

    /**
     * Retourne l'ensemble des livres
     *
     * @return Livre[] tableau d'objet titre
     */
    public static function findAll(?string $reference="", ?string $genre="Tous") :array

    {
        $texteReq = "select n.num as numero, n.reference as 'libLivre', c.reference as 'libGenre' FROM livre n, genre c where n.numGenre = c.num";
    if ($reference !== "") {
        $texteReq .= " and n.reference like '%" . $reference . "%'";
    }
    if ($reference !== "Tous") {
        $texteReq .= " and c.num = " . $genre;
    }
    
        $texteReq .= " order by n.reference";
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


    public static function findById (int $id) :int
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
        $req=MonPdo::getInstance()->prepare("insert into livre(isbn) values(:isbn)");
        $isbn=$livre->getIsbn();
        $req->bindParam(':isbn' ,$isbn);
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
        $annee=$livre->getAnnee();
        $req->bindParam(':id' , $livre->$num);
        $req->bindParam(':a' , $livre->$annee);
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
    $annee=$livre->getAnnee();
    $prix=$livre->getPrix();
    $req->bindParam(':id' ,$prix);
    $req->bindParam(':id' ,$num);
    $req->bindParam(':d' ,$annee);
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

    /**
     * Get ref du livre
     *
     * @return  int
     */ 
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set ref du livre
     *
     * @param  int  $isbn  Ref du livre
     *
     * @return  self
     */ 
    public function setIsbn(int $isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get the value of prix
     *
     * @return  int
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @param  int  $prix
     *
     * @return  self
     */ 
    public function setPrix(int $prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of editeur
     *
     * @return  string
     */ 
    public function getEditeur()
    {
        return $this->editeur;
    }

    /**
     * Set the value of editeur
     *
     * @param  string  $editeur
     *
     * @return  self
     */ 
    public function setEditeur(string $editeur)
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * Get the value of annee
     *
     * @return  int
     */ 
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     *
     * @param  int  $annee
     *
     * @return  self
     */ 
    public function setAnnee(int $annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get the value of langue
     *
     * @return  string
     */ 
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set the value of langue
     *
     * @param  string  $langue
     *
     * @return  self
     */ 
    public function setLangue(string $langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get the value of auteur
     *
     * @return  string
     */ 
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @param  string  $auteur
     *
     * @return  self
     */ 
    public function setAuteur(string $auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of genre
     *
     * @return  string
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @param  string  $genre
     *
     * @return  self
     */ 
    public function setGenre(string $genre)
    {
        $this->genre = $genre;

        return $this;
    }
}
?>