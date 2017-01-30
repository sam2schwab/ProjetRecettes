<?php
	$page = "recherche";
	require_once('db_connect.php');
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
							<?php
							$res = $mysqli->query("SELECT * FROM categorie");
							$res->data_seek(0);
							while($row = $res->fetch_assoc()):?>
							<div class="checkbox">
								<label><input type="checkbox" value="<?php echo $row['id_categorie']?>"><?php echo $row['nom_categorie']?></label>
							</div>
							<?php endwhile;?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="btn-group btn-group-justified">
					<div class="btn-group">
						<button class="btn btn-default btn-sort text-left update" value="titre_recette">
							<span class="pull-left">Nom</span>
							<span class="glyphicon glyphicon-sort-by-attributes pull-right"></span>
						</button>
					</div>
					<div class="btn-group">
						<button class="btn btn-default btn-sort text-left update" value="note_recette">
							<span class="pull-left">Appréciation</span>
							<span class="glyphicon glyphicon-sort text-muted pull-right"></span>
						</button>
					</div>
					<div class="btn-group">
						<button class="btn btn-default btn-sort text-left update" value="temps_preparation_recette">
							<span class="pull-left">Temps de préparation</span>
							<span class="glyphicon glyphicon-sort text-muted pull-right"></span>
						</button>
					</div>
					<input type="hidden" id="sorting" value="titre_recette">
					<input type="hidden" id="order" value="asc">
				</div>
				<div id="list-recipes">
				<?php include("recherche_resultats.php");?>
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