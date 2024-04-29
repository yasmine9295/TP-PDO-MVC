

<div class="container mt-5">
    <h2 class='pt-3 text-center'> <?php echo $mode ?> un livre</h2>

    <form action="index.php?uc=livres&action=valideForm" method="post" class="col-md-6 offset-md-3 border border-primary p-3">
    <div class="form-group">
        <label for='libelle'> Libellé </label>
        <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' 
                    value="<?php if($mode == "Modifier") {echo $livre->getlibelle();}?>">
                    
            </div>
            <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $livre->getNum();}?>">
            <div class="form-group">
                
        <label for='livre'> Genre </label>
        <select name="livre" class="form-control">
        <?php
       foreach($lesGenre as $genre){
        $selection=$genre->num == $genreel ? 'selected' : '';
        echo "<option value='".$genre->getNum()."'". $selection.">".$genre->getLibelle()."</option>";
        }
        ?>
        </select>
    </div>
            <div class="form-group">
        <label for='livre'> Auteur </label>
        <select name="livre" class="form-control">
        </select>
    </div>
    <div class="row">
        <div class="col"> <a href="index.php?uc=livres&action=list" class='btn btn-primary btn-block'> Revenir à la liste</a></div>
        <div class="col"><button type='submit' class='btn btn-info btn-block'> <?php echo $mode ?> </button></div>
    </div>
    </form>

</div>

