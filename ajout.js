// Affichage de l'ingrédient inscrit dans un tableau'
//tableau_ingredients = Array();
var tab_ing = [];
var id_ingr = 0;

var ingre_dispo = [];

var ingre_manquants = [];

// Gestion autocomplete ingredients
$("document").ready(function(){
    var data = {
        "action": "requete",
        "table" : "ingredient",
        "fields": "nom_ingredient"
    };

    $.ajax({
            type: "POST",
            dataType: "json",
            url: "autocomplete.php", //Relative or absolute path to autocomplete.php file
            data: data,
            success: function(data) {
                data.forEach(function(element) {
                    ingre_dispo.push(element["nom_ingredient"]);
                }, this);
                // Complète la proposition d'ingrédients dispo dans la BD
                $( "#choixingredient" ).autocomplete({
                source: ingre_dispo
                });
            }
        });

});


$( function() {
    // Sélectionne la catégorie "Repas" par défaut
    var categorie="3"; // 3 est la valeur de "Repas" dans la BD 
    $("#choixcategorie").val(categorie);
    $("#form").submit(function(event){
        //Transmet un tableau des ingredients en string
        $('#form_ingredients').val(JSON.stringify(tab_ing));
        console.log(JSON.stringify(tab_ing));
        //Transmet un tableau des ingrédients manquant en string
        $('#ingredients_manquants').val(JSON.stringify(ingre_manquants));
        console.log(JSON.stringify(ingre_manquants));
        return true;
    });
});

// Fonction appelée quand click sur bouton +
function ajout_ingre_php()  
{  
    if (ingre_dispo.indexOf($('#choixingredient').val()) != -1){
        ajout_ingre_js();
    }
    else{
        $("#ajout_infos_ing").modal();
        $('#nomingretext').val($('#choixingredient').val());
    }
}  

// Fonction appelée quand click sur bouton Ajouter (pop-up)
function ajout_infos_php()  
{  
    $('#choixingredient').val( $('#nomingretext').val());
    ingre_dispo.push($('#choixingredient').val());

    n_ingredient = $('#choixingredient').val();
    type_ingredient = $('#choixtypeing').val();
    epic_ingredient = $('#choixepicerieing').val(); 

    ingre_manquants.push({nom: n_ingredient, type: type_ingredient, epicerie: epic_ingredient});
    console.log(ingre_manquants);

    ajout_ingre_js();

}  

// Fonction qui insère les ingrédients dans le tableau et les affiche
function ajout_ingre_js(){

    q_ingredient = $('#ingredient').val();
    m_ingredient = $('#choixmesure').val();
    n_ingredient = $('#choixingredient').val(); 

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

    // Valeurs par défaut des champs de remplissage pour ingrédient 
    document.forms[0].ingredient.value = "";
    document.forms[0].choixmesure.value = "Mesure";
    document.forms[0].choixingredient.value = ""; 

    return tab_ing;
};
