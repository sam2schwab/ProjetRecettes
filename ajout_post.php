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
     
    if (isset($_POST['tab_ingre'])) 
    {

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