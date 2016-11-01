<?php $page = "index";
$categories = ["Entrée","Repas","Dessert","Pain","Conseil","Sauce","Boisson"];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?php include("includes.php");?>
	</head>
	<body>
		<?php include("header.php");?>
		<div class="container">
			<article>
				<div class="col-md-8">
					<!--Recherche par mot-cles-->
					<div class="panel panel-default">
						<div class="panel-heading">Recherche par mots-clés</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="keyword-search">Mots-clés:</label>
								<div class="input-group" id="keyword-search">
									<input type="text" class="form-control">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary btn-block">
											<span class="glyphicon glyphicon-search"></span> Recherche
										</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<!--Recherche par ingredients-->
					<div class="panel panel-default">
						<div class="panel-heading">Recherche par ingrédients</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="ingredients-with">Avec:</label>			
								<input type="text" class="form-control" data-role="tagsinput" id="ingredients-with">
							</div>
							<div class="form-group">
								<label for="ingredients-without">Sans:</label>			
								<input type="text" class="form-control" data-role="tagsinput" id="ingredients-without">
							</div>
							<button type="submit" class="btn btn-primary pull-right">
								<span class="glyphicon glyphicon-search"></span> Recherche
							</button>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<!--Recherche par catégories-->
					<div class="panel panel-default">
						<div class="panel-heading">Catégories</div>
						<div class="panel-body">
							<?php foreach ($categories as $value) {
								echo '<button class="btn btn-lg btn-default btn-block">'.$value.'</button>';
							}?>
						</div>
					</div>
				</div>
			</article>
		</div>
	</body>
</html>