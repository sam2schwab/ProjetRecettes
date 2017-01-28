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
    if (isset($_POST['tab_ingre'])) 
    {
        print_r("<br>Le tableau existe!");
        $tableau = $_POST["tab_ingre"];
        $tab = unserialize(base64_decode($tableau));
        
        echo count($tab) . "<br><br>";
        print_r($tab);

        //utilisation normale ensuite 
        for ($indice = 0 ; $indice < count($tab) ; $indice++) 
        { 
            echo $tab[$indice][2] . "<br>" ;
        } 

    } 
?>