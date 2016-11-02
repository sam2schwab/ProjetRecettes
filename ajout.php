<?php $page = "ajout" ;
$portions = ["morceaux","personnes"];
$mesures = ["x", "cup","c. à soupe", "c. à thé", "L", "dL", "cL", "mL", "oz", "Kg", "g"];
$ingredients = ["carotte","betterave","couscous", "cumin", "farine kamut"];
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
  		<form>
    		
			<!--Ajout du titre-->
			<div class="form-group row">
      			<label for="titre" class="col-sm-2 col-form-label">Titre</label>
      			<div class="col-sm-10">
        			<input class="form-control" id="titre" placeholder="Titre">
      			</div>
    		</div>

			<!--Ajout du temps de préparation-->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Temps de préparation</label>
				<div class="col-sm-5">
					<div class="input-group">
						<input type="text" class="form-control" id="tempspreparationheures" placeholder="Heures">
						<div class="input-group-addon">h</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="input-group">
						<input type="text" class="form-control" id="tempspreparationminutes" placeholder="Minutes">
						<div class="input-group-addon">mn</div>
					</div>
				</div>
			</div>

			<!--Ajout d'une cuisson-->
			<fieldset class="form-group row">
				<label for="cuisson" class="col-sm-2 col-form-label">Cuisson</label>
      			<div class="col-sm-10">
        			<div class="form-check">
						<label class="radio-inline"><input type="radio" name="optradio">Oui</label>
						<label class="radio-inline"><input type="radio" name="optradio">Non</label>
					</div>
      			</div>
			</fieldset>

			<!--Ajout du temps de cuisson-->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Temps de cuisson</label>
				<div class="col-sm-5">
					<div class="input-group">
						<input type="text" class="form-control" id="tempscuissonheures" placeholder="Heures" disabled>
						<div class="input-group-addon">h</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="input-group">
						<input type="text" class="form-control" id="tempscuissonminutes" placeholder="Minutes" disabled>
						<div class="input-group-addon">mn</div>
					</div>
				</div>
			</div>

			<!--Ajout d'une portion-->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Portions</label>
				<div class="col-sm-10">
					<div class="input-group">
						<input type="text" class="form-control" id="portions" placeholder="Portion">
						<span class="input-group-btn" style="width:0px;"></span>
						<select class="form-control" id="choixportion" style="margin-left:-1px;">
							<?php foreach ($portions as $value) {
								echo '<option>'.$value.'</option>';
							}
							?>						
						</select>
					</div>
				</div>
			</div>
			
			<!--Ajout des ingrédients-->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ingrédients</label>
				<div class="col-sm-10">
					<div class="input-group">
						<input type="text" class="form-control" id="ingredient" placeholder="Ingrédient">
						<span class="input-group-btn" style="width:0px;"></span>
						<select class="form-control" id="choixmesure" style="margin-left:-1px;">
							<?php foreach ($mesures as $value) {
								echo '<option>'.$value.'</option>';
							}
							?>						
						</select>
						<span class="input-group-btn" style="width:0px;"></span>
						<select class="form-control" id="choixingredient" style="margin-left:-2px;">
							<?php foreach ($ingredients as $value) {
								echo '<option>'.$value.'</option>';
							}
							?>
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-info">
								<span class="glyphicon glyphicon-plus"></span>
							</button>		
						</span>
					</div>
				</div>
			</div>

			<!--Ajout des instruction-->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Instructions</label>
				<div class="col-sm-10">
					<div class="form-group">
						<textarea class="form-control" rows="5" id="instructions"></textarea>
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
						<input type="text" class="form-control" readonly>
            		</div>
            		<span class="help-block">
            	    	Sélectionner une photo
			        </span>
				</div>
    		</div>


    	<div class="form-group row">
      		<div class="offset-sm-2 col-sm-10">
        		<button type="submit" class="btn btn-primary">Enregistrer la recette !</button>
      		</div>
    	</div>
  		</form>
		</article>
	</body>
</html>