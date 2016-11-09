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
					<div class="panel-heading">Critères de recherche</div>
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
			<?php for($i = 0;$i < 20; $i++):?>
				<div>
					<img src="pasta.jpg" class="centered-and-cropped pull-left" width="100" height="100" alt="photo">
					<div class="recipe-details">
						<h4><div class="starrr starr-readonly pull-right" data-rating='4'></div></h4>
						<h4><strong>Pâtes aux crevettes et aux olives</strong></h4>
						<p><span class="glyphicon glyphicon-tag"></span> Catégorie : Repas<p>
						<p><span class="glyphicon glyphicon-time"></span> Préparation : 15 min<p>
						<p><span class="glyphicon glyphicon-fire"></span> Cuisson : 25 min<p>
					</div>
				</div>
				<hr>
			<?php endfor; ?>
			</div>			
		</article>
	</body>
</html>