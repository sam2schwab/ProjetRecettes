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
	</head>
	<body>
    	<?php include("header.php");?>
		<article class="container">
			<div class="col-xs-3">
				<div class="panel panel-default">
					<div class="panel-heading">Critères de recherche</div>
					<div class="panel-body">
						<!--Mot-cles-->
						<form>
							<button type="reset" class="close">&times;</button>
							<h4><strong>Mots-clés</strong></h4>
							<input type="text" class="form-control" data-role="tagsinput" id="ingredients-with">
						</form>
						<hr>
						<!--ingredients-->
						<form>
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
						<!--cuisson-->
						<form>
							<button type="reset" class="close">&times;</button>
							<h4><strong>Cuisson</strong></h4>
							<div class="radio">
								<label><input type="radio" name="cookingradio">Avec</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="cookingradio">Sans</label>
							</div>
						</form>
						<hr>
						<!--temps-->
						<form>
							<button type="reset" class="close">&times;</button>
							<h4><strong>Temps requis</strong></h4>
							<div class="form-group">
								<label for="prep-time">Préparation</label>
								<div class="input-group" id="prep-time">
									<span class="input-group-addon">&#8804;</span>
									<input type="number" min="0" data-bind="value:replyNumber" class="form-control">
									<span class="input-group-addon">mn</span>
								</div>
							</div>
							<div class="form-group">
								<label for="cook-time">Cuisson</label>
								<div class="input-group" id="cook-time">
									<span class="input-group-addon">&#8804;</span>
									<input type="number" min="0" class="form-control">
									<span class="input-group-addon">mn</span>
								</div>
							</div>
						</form>
						<hr>
						<!--categorie-->
						<form>
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
			<div class="col-xs-9">
				
			</div>			
		</article>
	</body>
</html>