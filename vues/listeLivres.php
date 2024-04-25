<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9">
            <h2>Liste des livres</h2>
        </div>
        <div class="col-3">
            <a href="index.php?uc=livres&action=add" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Créer un livre
            </a>
        </div>
    </div>

    <form id="formRecherche" action="index.php?uc=livres&action=list" method="post"
        class="border border-primary rounded p-3 mt-3 mb-3">

        <div class="row">
            <div class="col">

                <input type="text" class='form-control' id='libelle' placeholder='saisir le nom' name='libelle'>

            </div>
            <div class="col">

<input type="text" class='form-control' id='libelle' placeholder='saisir prenom' name='libelle'>

</div>

            <div class="col">
                <select name="genre" class="form-control">
                    <?php
    foreach($lesGenres as $genre){
      $selection = $genre->getNum() == $genreSel ? 'selected' : '';
        echo "<option value='".$genre->getNum()."'". $selection.">".$genre->getLibelle()."</option>";
    }
      ?>
                </select>
            </div>
            
            <div class="col">
                <button type="submit" class="btn btn-info btn-block"> Rechercher</button>
            </div>
        </div>
</form>




        <table class="table table-hover table-striped">
            <thead>
                <tr class="d-flex">

                    <th scope="col" class="col-md-2">Référence</th>
                    <th scope="col" class="col-md-1">Libellé</th>
                    <th scope="col" class="col-md-1">Prix</th>
                    <th scope="col" class="col-md-1">Editeur</th>
                    <th scope="col" class="col-md-2">Année</th>
                    <th scope="col" class="col-md-1">Langue</th>
                    <th scope="col" class="col-md-1">Auteur</th>
                    <th scope="col" class="col-md-1">Genre</th>
                    <th scope="col" class="col-md-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
    foreach($lesLivres as $livre){
        echo "<tr class='d-flex'>";

            echo "<td class='col-md-2'>".$livre->getisbn()."</td>";
            echo "<td class='col-md-1'>".$livre->gettitre()."</td>";
            echo "<td class='col-md-1'>".$livre->getprix()."</td>";  
            echo "<td class='col-md-1'>".$livre->getediteur()."</td>";  
            echo "<td class='col-md-2'>".$livre->getannee()."</td>"; 
            echo "<td class='col-md-1'>".$livre->getlangue()."</td>"; 
            echo "<td class='col-md-1'>".$livre->getauteur()."</td>"; 
            echo "<td class='col-md-1'>".$livre->getnum()."</td>";        
            echo "<td class='col-md-2'>
                <a href='index.php?uc=livres&action=update&num=" .$livre->getisbn()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer ce livre ?' data-suppression='index.php?uc=livres&action=delete&num=".$livre->getisbn()."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
        echo "</tr>";


    }
    
// supprimerNationalite.php?num=$nationalite->num

    ?>



            </tbody>
        </table>


</div>