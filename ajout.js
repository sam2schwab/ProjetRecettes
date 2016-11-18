// Affichage de l'ingrédient inscrit dans un tableau'
//tableau_ingredients = Array();
var tab_ing = [];

function afficheingredient(){

    q_ingredient = document.forms[0].ingredient.value;
    m_ingredient = document.forms[0].choixmesure.value;
    n_ingredient = document.forms[0].choixingredient.value; 
    
    alert(q_ingredient + " " + m_ingredient + " " + n_ingredient);
    tab_ing.push({quantite: q_ingredient, mesure: m_ingredient, nom: n_ingredient})
    console.log(tab_ing);
    //tab_ing[length]= Array(q_ingredient, m_ingredient, n_ingredient);
   // tab_ing[1]= Array(q_ingredient, m_ingredient, n_ingredient);
    //ing_ajout = tableau_ingredients[0][0]
    //alert("ça marche : " + tab_ing);   
    
    return tab_ing;

}

