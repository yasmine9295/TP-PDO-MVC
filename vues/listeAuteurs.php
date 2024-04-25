<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9">
            <h2>Liste des auteurs</h2>
        </div>
        <div class="col-3">
            <a href="index.php?uc=auteurs&action=add" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Créer un auteur
            </a>
        </div>
    </div>

    <form id="formRecherche" action="index.php?uc=auteurs&action=list" method="post"
        class="border border-primary rounded p-3 mt-3 mb-3">

       
        <div class="row">
            <div class="col">

                <input type="text" class='form-control' id='libelle' placeholder='saisir le libelle' name='libelle' 
                    value="<?php if($action == "Modifier") {echo $laNationalite->libelle ;} ?>">
                   
            </div>
            <div class="col">
                <select name="nationalite" class="form-control">
                    <?php
    foreach($lesNationalites as $nationalite){
      $selection=$nationalite->numero == $nationaliteSel ? 'selected' : '';
        echo "<option value='".$nationalite->numero."'". $selection.">".$nationalite->libNation."</option>";
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
                        <th scope="col" class="col-md-2">Numéro</th>
                        <th scope="col" class="col-md-4">Nom</th>
                        <th scope="col" class="col-md-2">Prénom</th>
                        <th scope="col" class="col-md-2">Nationalités</th>
                        <th scope="col" class="col-md-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    foreach($lesAuteurs as $auteur){
        echo "<tr class='d-flex'>";

            echo "<td class='col-md-2'>".$auteur->getNum()."</td>";
            echo "<td class='col-md-4'>".$auteur->getNom()."</td>";
            echo "<td class='col-md-2'>".$auteur->getPrenom()."</td>";  
            echo "<td class='col-md-2'>".$nationalite->libNation."</td>";
            echo "<td class='col-md-2'>
                <a href='index.php?uc=auteurs&action=update&num=" .$auteur->getNum()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer cet auteur ?' data-suppression='index.php?uc=auteurs&action=delete&num=".$auteur->getNum()."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
        echo "</tr>";


    }

// supprimerNationalite.php?num=$nationalite->num

    ?>



                </tbody>
            </table>


        </div>

        