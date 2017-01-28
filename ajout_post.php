<?php
    session_start(); //déclaré en début de fichier
	// $req = $bdd->prepare('INSERT INTO commentaires (ID_billet, auteur, commentaires, date_commentaire) VALUES(?, ?, ?, ?)');
	// $req->execute(array($_GET['billet'], $_POST['auteur'], $_POST['commentaire'], date('Y-m-d H:i:s')));

	// $req->closeCursor();

    print "Bienvenue à cette page cachée.<br><br>";

    // if (isset($_POST['ta']))
    // {
    //     print "tableau envoyé !<br><br>";
        
    //     $tab_ingre_reconstitue = explode("|",$_POST['tab_ingre']);
    
    // Affichage des éléments postés:

    if (isset($_POST['titre'])) 
    {
        $titre = $_POST["titre"];
        print_r($titre);
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
?>