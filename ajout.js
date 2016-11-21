// Affichage de l'ingrédient inscrit dans un tableau'
//tableau_ingredients = Array();
var tab_ing = [];
var id_ingr = 0;

var ingre_dispo = [
        "eau",
        "citron",
        "carotte"
    ];
    
$( function() {
    $( "#choixingredient" ).autocomplete({
      source: ingre_dispo
    });
  } );

function afficheingredient(){

    q_ingredient = document.forms[0].ingredient.value;
    m_ingredient = document.forms[0].choixmesure.value;
    n_ingredient = document.forms[0].choixingredient.value; 
    
    tab_ing.push({id: id_ingr, quantite: q_ingredient, mesure: m_ingredient, nom: n_ingredient});
    console.log(tab_ing);
    iLen = tab_ing.length;

    var pre_ingredient = document.createElement("pre");
    var descingr = q_ingredient + " " + m_ingredient + " " + n_ingredient;
    var valing = id_ingr;
    $(pre_ingredient).addClass("ingredient").html(descingr).val(valing);
    var btn_ingredient = document.createElement("button");
    $(btn_ingredient).attr("type","button").html("-").addClass("btn btn-danger btn-xs pull-right");
    $(pre_ingredient).append(btn_ingredient);
    $("#liste_ingredients").append(pre_ingredient);

    // Vérification de l'existence d'un ingrédient dans le tableau
    var presence_tableau = "non";
    for(var i=0; i < ingre_dispo.length; i++)
    {
        if (n_ingredient == ingre_dispo[i]){
            presence_tableau = "oui";
        }
    }
    // Si l'ingrédient n'est pas présent, ajout dans le tableau du nouvel ingrédient
    if (presence_tableau == "non"){
        ingre_dispo.push(n_ingredient);
    }
  

    $(btn_ingredient).click((function(){
        $(pre_ingredient).remove();
        var val_ingr = $(pre_ingredient).val();
        for(var i= 0; i < tab_ing.length; i++)
            {
                if (tab_ing[i].id == val_ingr){
                    position = i
                }
            }
        tab_ing.splice(position,1);
    }));
    
    id_ingr += 1;

    document.getElementById("ingredient").reset();
    document.getElementById("choixmesure").reset();
    document.getElementById("choixingredient").reset(); 

};