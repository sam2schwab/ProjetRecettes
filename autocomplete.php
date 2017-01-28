<?php
if (is_ajax()) {
    if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
        $action = $_POST["action"];
        switch($action) { //Switch case for value of action
            case "requete": requete_function(); break;
        }
    }
}
//Function to check if the request is an AJAX request
function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function requete_function(){
    if (isset($_POST["table"]) && !empty($_POST["table"])) { //Checks if table value exists
        $table = $_POST["table"];
        $fields = $_POST["fields"];

        $bdd = new mysqli('192.168.0.105','Recettes','miammiam', 'projet_recette');
	    $bdd->set_charset("utf8");

        $tab_resultats = array();

        $sql = "SELECT $fields FROM $table ORDER BY nom_$table";
        $resultats = $bdd->query($sql);
        
        while($row = $resultats->fetch_assoc()){
            $tab_resultats[] = $row;
        }
        echo json_encode($tab_resultats);

        $resultats->close();
        $bdd->close();
    }
}
?>