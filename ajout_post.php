<?php
    session_start(); //déclaré en début de fichier
    
    // Connexion à la base de données

    $bdd = new mysqli('192.168.0.105','Recettes','miammiam', 'projet_recette');
    echo $bdd->connect_error ? "err" : "ok";
    // $bdd = new PDO('mysql:host=192.168.0.105;dbname=projet_recette;charset=utf8', 'Recettes', 'miammiam');

    // Affichage des éléments postés:

    if (isset($_POST['titre'])) 
    {
        $titre = $_POST["titre"];
        print_r($titre);
    }

    if (isset($_POST['choixcategorie'])) 
    {
        $categorie = $_POST["choixcategorie"];
        print_r($categorie);
    }
    if (isset($_POST['prep-time'])) 
    {
        $preptime = $_POST["prep-time"];
        print_r($preptime);
    }
    
    if (isset($_POST['cooking'])) 
    {
        $cooking = $_POST["cooking"];
        print_r($cooking);
    }    
    
    if (isset($_POST['cook-time'])) 
    {
        $cooktime = $_POST["cook-time"];
        print_r($cooktime);
    }    
    
    if (isset($_POST['portions'])) 
    {
        $portions = $_POST["portions"];
        print_r($portions);
    }    
    
    if (isset($_POST['instructions'])) 
    {
        $instructions = $_POST["instructions"];
        print_r($instructions);
    }    
    
    if (isset($_POST['photo'])) 
    {
        $photo = $_POST["photo"];
        print_r($photo);
    }


    // Récupération des ingrédients
    if (isset($_POST['form_ingredients'])) 
    {
        print_r("<br>Le tableau existe!");
        $tableau = json_decode($_POST["form_ingredients"]);
        
        echo count($tableau) . "<br><br>";
        print_r($tableau);
        echo "<br>";

        //utilisation normale ensuite 
        for ($indice = 0 ; $indice < count($tableau) ; $indice++) 
        { 
            echo $tableau[$indice]->nom . "<br>" ;
        } 

    }

    // Récupération des ingrédients manquants
    if (isset($_POST['ingredients_manquants'])) 
    {
        print_r("<br>Le tableau existe!");
        $tableau_manq = json_decode($_POST["ingredients_manquants"]);
        
        echo count($tableau_manq) . "<br><br>";
        print_r($tableau_manq);
        echo "<br>";

        //utilisation normale ensuite 
        for ($indice = 0 ; $indice < count($tableau_manq) ; $indice++) 
        { 
            echo $tableau_manq[$indice]->nom . "<br>" ;
            echo $tableau_manq[$indice]->type . "<br>" ;
            echo $tableau_manq[$indice]->epicerie . "<br>" ;
        } 
    } 
        //$bdd = new mysqli('192.168.0.105','Recettes','miammiam', 'projet_recette');
        for ($indice = 0 ; $indice < count($tableau_manq) ; $indice++) 
        { 

            $sql = "INSERT INTO ingredient (nom_ingredient, type_ingredient, epicerie_ingredient) 
                            VALUES(\"".$tableau_manq[$indice]->nom."\", 1, 1)";
                            // VALUES(\"".$tableau_manq[$indice]->nom."\", ".$tableau_manq[$indice]->type.", ".$tableau_manq[$indice]->epicerie.")";
            echo $sql;
            $req = $bdd->query($sql);
            echo $req? "ok" : $bdd->error;

        } 

    // $req = $bdd->prepare('INSERT INTO ingredient (nom_ingredient, type_ingredient, epicerie_ingredient) VALUES(?, ?, ?)');
	// $req->execute(array($_GET['billet'], $_POST['auteur'], $_POST['commentaire']));

	// $req->closeCursor();


?>