

<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9">
            <h2>Liste des nationalités</h2>
        </div>
        <div class="col-3">
            <a href="index.php?uc=nationalites&action=add" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Créer une nationalité
            </a>
        </div>
    </div>

    
    <form id="formRecherche" action="index.php?uc=nationalites&action=list" method="post" class="border border-primary rounded p-3">
        <div class="row">
        <div class="col">
            <input type="text" class='form-control' id='libelle' placeholder='saisir le libelle' name='libelle' value="<?php if($action == "Modifier") {echo $laNationalite->libelle ;} ?>">
</div>
<div class="col">
<select name="continent" class="form-control">
    <?php
    foreach($lesContinents as $continent){
      $selection=$continent->getNum() == $continentSel ? 'selected' : '';
        echo "<option value='".$continent->getNum()."'". $selection.">".$continent->getLibelle()."</option>";
    }
      ?>
      </select>
</div>
<div class="col">
    <button type="submit" class="btn btn-success btn-block"> Rechercher</button>
</div>


    <table class="table table-hover table-striped">
  <thead>
    <tr class="d-flex">
      <th scope="col"class="col-md-2">Numéro</th>
      <th scope="col"class="col-md-4">Libellé</th>
      <th scope="col"class="col-md-4">Continent</th>
      <th scope="col"class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesNationalites as $nationalite){
        echo "<tr class='d-flex'>";

            echo "<td class='col-md-2'>$nationalite->numero</td>";
            echo "<td class='col-md-4'>$nationalite->libNation</td>";  
            echo "<td class='col-md-4'>$nationalite->libContinent</td>"; 
              
            echo "<td class='col-md-2'>
                <a href='index.php?uc=nationalites&action=update&num=$nationalite->numero' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer cette nationalite ?' data-suppression='index.php?uc=nationalites&action=delete&num=$nationalite->numero' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
        echo "</tr>";


    }
    
// supprimerNationalite.php?num=$nationalite->num

    ?>
 
   
    
  </tbody>
</table>    


</div>
