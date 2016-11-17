// Affichage de l'ingrédient inscrit dans un tableau'
//tableau_ingredients = Array();

function afficheingredient(tab_ing){

    q_ingredient = document.forms[0].ingredient.value;
    m_ingredient = document.forms[0].choixmesure.value;
    n_ingredient = document.forms[0].choixingredient.value; 
    
    alert(q_ingredient + " " + m_ingredient + " " + n_ingredient);

    //tab_ing[length]= Array(q_ingredient, m_ingredient, n_ingredient);
   // tab_ing[1]= Array(q_ingredient, m_ingredient, n_ingredient);
    //ing_ajout = tableau_ingredients[0][0]
    alert("ça marche : " + tab_ing);   
    
    return tab_ing;

}

