
<?php 

    session_start(); //déclaré en début de fichier
    
    // Connexion à la base de données

    $bdd = new mysqli('192.168.0.105','Recettes','miammiam', 'projet_recette');
	$bdd->set_charset("utf8");

	$page = "ajout" ;
	$tableau_ingredients = [];
	$ingredients = [];
	$nom_ingre = "";
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
		<article class="container">

  		<form action="ajout_post.php" id="form" method="post">
    		 									<!--target="_blank"-->
		
		<!--Ajout du titre-->
		<div class="form-group row">
			<label for="titre" class="col-sm-2 col-form-label">Titre</label>
			<div class="col-sm-10">
				<input class="form-control" name="titre" id="titre" placeholder="Titre">
			</div>
		</div>

		<!-- Ajout d'une catégorie -->
		
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Catégorie</label>
			<div class="col-sm-10">

				<select class="form-control" name='choixcategorie' id='choixcategorie'>;
					<?php
					$results = $bdd->query("SELECT * FROM categorie ORDER by nom_categorie");
					$results ->data_seek(0);
					while($row = $results->fetch_assoc()) :
					?>
					<option value="<?php echo $row['id_categorie'] ?>" ><?php echo $row['nom_categorie'] ?></option>
					<?php endwhile; ?>
				</select>

			</div>
		</div>

		<!--Ajout du temps de préparation-->
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Temps de préparation</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="number" class="form-control" name="prep-time" id="prep-time" placeholder="Minutes">
					<div class="input-group-addon">mn</div>
				</div>
			</div>
		</div>

		<!--Ajout d'une cuisson-->
		<fieldset class="form-group row">
			<label for="cuisson" class="col-sm-2 col-form-label">Cuisson</label>
			<div class="col-sm-10">
				<div class="form-check">
					<label class="radio-inline"><input type="radio" name="cooking" value="with">Avec</label>
					<label class="radio-inline"><input type="radio" name="cooking" value="without">Sans</label>
				</div>
			</div>
		</fieldset>

		<!--Ajout du temps de cuisson-->
		<div class="collapse in"  id="cook-time-collapse">
			<div class="form-group row" id="cook-time-group">
				<label class="col-sm-2 col-form-label">Temps de cuisson</label>

				<div class="col-sm-10">
					<div class="input-group">
						<input type="number" class="form-control"name="cook-time" id="cook-time" placeholder="Minutes">
						<div class="input-group-addon">mn</div>
					</div>
				</div>
			</div>
		</div>

		<!--Ajout d'une portion-->
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Portions</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="number" class="form-control" name="portions" id="portions" placeholder="Portion">
					<span class="input-group-btn" style="width:0px;"></span>
					<select class="form-control" id="choixportion" style="margin-left:-1px;">
						<option value="0">morceaux</option>
						<option value="1">personnes</option>
					</select>
				</div>
			</div>
		</div>

		<!-- Création du pop-up "Ajout infos ingredient" -->
		<div class="modal fade" id="ajout_infos_ing" role="dialog">
			<div class="modal-dialog">

				<!-- Contenu du pop-up-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Ajout d'information sur l'ingrédient</h4>
					</div>
					<div class="modal-body" id="contenu_infos">

						<!--Ajout du nom de l'ingredient-->
						<div class="form-group row">
							<label for="nomingre" class="col-sm-2 col-form-label">Nom</label>
							<div class="col-sm-10">
								<input class="form-control" name="nomingretext" id="nomingretext">
							</div>
						</div>

						<!--Ajout du type de l'ingredient-->
						<div class="form-group row">
							<label for="typeingre" class="col-sm-2 col-form-label">Type</label>
							<div class="col-sm-10">
								<select class="form-control" id="choixtypeing" name="choixtypeing" style="margin-left:-1px;">
									<?php
									$results = $bdd->query("SELECT * FROM type_ingredient ORDER by nom_type_ingredient");
									$results ->data_seek(0);
									while($row = $results->fetch_assoc()) :
									?>
									<option value="<?php echo $row['id_type_ingredient'] ?>" ><?php echo $row['nom_type_ingredient'] ?></option>
									<?php endwhile; ?>						
								</select>
							</div>
						</div>

						<!--Ajout de l'épicerie de l'ingredient-->
						<div class="form-group row">
							<label for="epicingre" class="col-sm-2 col-form-label">Épicerie</label>
							<div class="col-sm-10">
								<select class="form-control" id="choixepicerieing" name="choixepicerieing" style="margin-left:-1px;">
									<?php
									$results = $bdd->query("SELECT * FROM epicerie ORDER by nom_epicerie");
									$results ->data_seek(0);
									while($row = $results->fetch_assoc()) :
									?>
									<option value="<?php echo $row['id_epicerie'] ?>" ><?php echo $row['nom_epicerie'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="ajout_infos_php()">Ajouter</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Refuser</button>
					</div>
				</div>

			</div>
		</div>	

		<!--Ajout des ingrédients-->
		<input type="hidden" id="form_ingredients" name="form_ingredients" value="">
		<input type="hidden" id="ingredients_manquants" name="ingredients_manquants" value="">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Ingrédients</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="number" class="form-control" id="ingredient" placeholder="Quantité">
					<span class="input-group-btn" style="width:0px;"></span>
					<select class="form-control" id="choixmesure" style="margin-left:-1px;">
						<?php
						$results = $bdd->query("SELECT * FROM mesure ORDER by id_mesure");
						$results ->data_seek(0);
						while($row = $results->fetch_assoc()) :
						?>
						<option value="<?php echo $row['id_mesure'] ?>" ><?php echo $row['nom_mesure'] ?></option>
						<?php endwhile; ?>
					</select>
					<span class="input-group-btn" style="width:0px;"></span>
					<input id="choixingredient" class="form-control" style="margin-left:-2px;" placeholder="Nom ingrédient">
					<span class="input-group-btn">
						<button type="button" class="btn btn-info" name="ajoutingredient" id="ajoutingredient" style="margin-left:-2px;" onclick="ajout_ingre_php()">
							<span class="glyphicon glyphicon-plus"></span>
						</button>	
					</span>	
				</div>

				<div>
					<div id="liste_ingredients">
					</div>
					<input type="hidden" id="tab_ingre" name="tab_ingre" value="">
				</div>
			</div>
		</div>


		<!--Ajout des instruction-->
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Instructions</label>
			<div class="col-sm-10">
				<div class="form-group">
					<textarea class="form-control" rows="5" name="instructions" id="instructions"></textarea>
				</div>
			</div>
		</div>

		<!--Ajout d'une photo-->
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Photo</label>
			<div class="col-sm-10">
				<div class="input-group">
					<label class="input-group-btn">
					<span class="btn btn-primary">
						Parcourir<input type="file" style="display: none;">
					</span>
					</label>
					<input type="text" class="form-control" name="photo" id="photo" readonly>
				</div>
				<span class="help-block">
					Sélectionner une photo
				</span>
			</div>
		</div>

    	<div class="form-group row">
      		<div class="offset-sm-2 col-sm-10">
        		<button id="ajouter" type="submit" class="btn btn-primary pull-right">Ajouter la recette !</button>
      		</div>
    	</div>
  		</form>
		</article>
	</body>
</html>