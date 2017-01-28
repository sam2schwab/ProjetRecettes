<?php $page = "recherche";
$categories = ["Entrée","Repas","Dessert","Pain","Conseil","Sauce","Boisson"];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?php include("includes.php");?>
		<script type="text/javascript" src="recherche.js"></script>
		<script type="text/javascript" src="starrr.js"></script>
	</head>
	<body>
    	<?php include("header.php");?>
		<article class="container">
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h4 class="panel-title pull-left" style="padding-top: 7.5px;">Filtrer la recherche</h4>
						<button id="clear_filters" class="btn btn-sm btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span></button>
					</div>
					<div class="panel-body">
						<!--Mot-cles-->
						<form id="keyword-form">
							<button type="reset" class="close">&times;</button>
							<h4><strong>Mots-clés</strong></h4>
							<input type="text" class="form-control" data-role="tagsinput" id="ingredients-with">
						</form>
						<hr>
						<!--ingredients-->
						<form id="ingredients-form">
							<button type="reset" class="close">&times;</button>
							<h4><strong>Ingrédients</strong></h4>
							<div class="form-group">
								<label for="ingredients-with">Avec:</label>			
								<input type="text" class="form-control" data-role="tagsinput" id="ingredients-with">
							</div>
							<div class="form-group">
								<label for="ingredients-without">Sans:</label>			
								<input type="text" class="form-control" data-role="tagsinput" id="ingredients-without">
							</div>
						</form>
						<hr>
						<!--Note appreciation-->
						<form id="rating-form">
							<button type="reset" class="close">&times;</button>
							<h4><strong>Appréciation</strong></h4>
							<h4><div class="starrr pull-left" id="rating-search"></div></h4>
							<p>et plus<p>
						</form>
						<hr>
						<!--cuisson-->
						<form id="cooking-form">
							<button type="reset" class="close">&times;</button>
							<h4><strong>Cuisson</strong></h4>
							<div class="radio">
								<label><input type="radio" name="cooking" value="with">Avec</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="cooking" value="without">Sans</label>
							</div>
						</form>
						<hr>
						<!--temps-->
						<form id="time-form">
							<button type="reset" class="close">&times;</button>
							<h4><strong>Temps requis</strong></h4>
							<div class="form-group">
								<label for="prep-time">Préparation</label>
								<div class="input-group" id="prep-time">
									<span class="input-group-addon">&#8804;</span>
									<input type="number" min="0" class="form-control">
									<span class="input-group-addon">mn</span>
								</div>
							</div>
							<div class="collapse in"  id="cook-time-collapse">
								<div class="form-group" id="cook-time-group">
									<label for="cook-time">Cuisson</label>
									<div class="input-group" id="cook-time">
										<span class="input-group-addon">&#8804;</span>
										<input type="number" min="0" class="form-control">
										<span class="input-group-addon">mn</span>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<!--categorie-->
						<form id="category-form">
							<button type="reset" class="close">&times;</button>
							<h4><strong>Catégories</strong></h4>
							<?php foreach ($categories as $value) {
							echo '<div class="checkbox">
								<label><input type="checkbox" value="">'.$value.'</label>
							</div>';
							}?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="btn-group btn-group-justified">
					<div class="btn-group">
						<button class="btn btn-default btn-sort text-left">
							<span class="pull-left">Nom</span>
							<span class="glyphicon glyphicon-sort-by-attributes pull-right"></span>
						</button>
					</div>
					<div class="btn-group">
						<button class="btn btn-default btn-sort text-left">
							<span class="pull-left">Appréciation</span>
							<span class="glyphicon glyphicon-sort text-muted pull-right"></span>
						</button>
					</div>
					<div class="btn-group">
						<button class="btn btn-default btn-sort text-left">
							<span class="pull-left">Temps de préparation</span>
							<span class="glyphicon glyphicon-sort text-muted pull-right"></span>
						</button>
					</div>
				</div>
				<div id="list-recipes">
				<?php 
					$mysqli = new mysqli("192.168.0.105", "Recettes", "miammiam", "projet_recette");
					$mysqli->set_charset('utf8');
					$res = $mysqli->query("SELECT * FROM recette r, categorie c where r.categorie_recette = c.id_categorie ORDER BY titre_recette ASC");
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
				</div>
				<div class="text-center">
					<ul class="pagination">
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a class="disabled">...</a></li>
						<li><a href="#">50</a></li>
					</ul>
				</div>
			</div>			
		</article>
	</body>
</html>