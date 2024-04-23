

<div class="container mt-5">
    <h2 class='pt-3 text-center'> <?php echo $mode ?> un auteur</h2>

    <form action="index.php?uc=auteurs&action=valideForm" method="post"
        class="col-md-6 offset-md-3 border border-primary p-3">
        <div class="form-group">
            <label for='titre'> Titre </label>
            <input type="text" class='form-control' id='libelle' placehoder='Saisir le libellé' name='titre'
                value="<?php if($mode == "Modifier") {echo $auteur->getNom() ;}?>">
        </div>
        <div class="form-group">
            <label for='genre'> Genre </label>
            <select name="genre" class="form-control">
                <?php
                foreach ($lesNationalites as $nationalite) {
                    $selection = $nationalite->getNum() == $leAuteur->getNationalite()->getNum() ?'selected' : '';
                    echo "<option value='".$genre->getNum()."'". $selection.">".$genre->getNom()."</option>";
                }
                ?>
                </select>
            </div>



        <input type="hidden" id="num" name="num"
            value="<?php if($mode == "Modifier") {echo $leAuteur->getNum() ;}?>">
        <div class="row">
            <div class="col"> <a href="index.php?uc=auteurs&action=list" class='btn btn-primary btn-block'> Revenir à
                    la liste</a></div>
            <div class="col"><button type='submit' class='btn btn-info btn-block'> <?php echo $mode ?>
                </button></div>
        </div>
    </form>

</div>

