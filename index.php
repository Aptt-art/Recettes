<?php

// TODO bien réécrire les includes avec les parenthèses

if (!isset($_GET['route']) || empty($_GET['route'])) {
    $maRoute = [];
} else {
    $maRoute = explode('/', $_GET['route']);
}

if (!isset($maRoute[0]) || $maRoute[0] == '' || $maRoute[0] == 'accueil') {
    include './pages/accueil.php';
} else if ($maRoute[0] == 'recettes') {

    // Tous les recettes+++++++++++++++++++++++++++++

    if (!isset($maRoute[1]) || ($maRoute[1] == 'toutes' || $maRoute[1] == '')) {

        include('./pages/toutes_les_recettes.php');

    } else if (is_numeric($maRoute[1])) {
        $id_recette_demande = $maRoute[1];

        include('./php/select_one_recette.php');
        
        if ( $recette == true) {

            include('./pages/une_recette.php');
        } else {
            include "./pages/erreur404.php";
        }
    } else {
        include 'pages/erreur404.php';
    }
} else if ($maRoute[0] == 'ingredients') {

    // Tous les ingrédients +++++++++++++++++++++++++++++++++

    if (!isset($maRoute[1]) || ($maRoute[1] == 'toutes' || $maRoute[1] == '')) {
        include 'pages/ingredients/ingredients.php';
    } else if (is_numeric($maRoute[1])) {
        $id_ingredient_demande = $maRoute[1];

        if (
            $ingredient_trouve == true
            // && sizeof($ingredient_trouve) > 0
        ) {
            include 'pages/ingredients/un_ingredient.php';
        } else {
            include "./pages/erreur404.php";
        }
    } else {
        include 'pages/erreur404.php';
    }
} else if ($maRoute[0] == 'contact') {

    
    include './pages/contact.php';

} else {
    include 'pages/erreur404.php';
}
