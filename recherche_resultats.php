<?php
    require_once('db_connect.php');

    if($_POST)
    {
        $sorting = isset($_POST['sorting']) ? $_POST['sorting'] : "titre_recette";
        $order = isset($_POST['order']) ? $_POST['order'] : "ASC";

        $sql = "SELECT * FROM recette r, categorie c where r.categorie_recette = c.id_categorie ORDER BY $sorting $order";
    }
    else
    {
        $sql = "SELECT * FROM recette r, categorie c where r.categorie_recette = c.id_categorie ORDER BY titre_recette ASC";
    }

    $res = $mysqli->query($sql);
    $res->data_seek(0);
    while($row = $res->fetch_assoc()):?>
    <hr>
    <a class="recipe-link" href="#">
        <div class="recipe-info">
            <img src="images/<?php echo $row['photo_recette']?>" class="centered-and-cropped pull-left" width="110" height="110" alt="photo">
            <div class="recipe-details">
                <h4><div class="starrr starr-readonly pull-right" data-rating=<?php echo $row['note_recette']?>></div></h4>
                <h4><strong><?php echo $row['titre_recette']?></strong></h4>
                <p><span class="glyphicon glyphicon-tag"></span> Catégorie : <?php echo $row['nom_categorie']?><p>
                <p><span class="glyphicon glyphicon-time"></span> Préparation : <?php echo $row['temps_preparation_recette']?> min<p>
                <p><span class="glyphicon glyphicon-fire"></span> Cuisson : <?php echo $row['cuisson_recette'] ? $row['temps_cuisson_recette'].' min' : 'Sans'  ?><p>
            </div>
        </div>
    </a>
<?php endwhile; ?>
<hr>