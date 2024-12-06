<?php

if (!isset($_GET['route']) || empty($_GET['route'])) {
    $maRoute = [];
} else {
    $maRoute = explode('/', $_GET['route']);
}



if (!isset($maRoute[0]) || $maRoute[0] == '' || $maRoute[0] == 'accueil') {
    include './pages/accueil.php';
} else if ($maRoute[0] == 'recettes') {

    // tous les recettes+++++++++++++++++++++++++++++

    if (!isset($maRoute[1]) || ($maRoute[1] == 'toutes' || $maRoute[1] == '')) {
        include 'pages/toutes_les_recettes.php';
    } else if (is_numeric($maRoute[1])) {
        
        $id_recette_demande = $maRoute[1];



     include('php/select_one_recette.php');
       


        if (
            $id_recette_demande == true
            // && sizeof($recette_trouve) > 0
        ) {

            include './pages/une_recette.php';
        } else {
            include "./pages/erreur404.php";
        }
    } else {
        include 'pages/erreur404.php';
    }
} else if ($maRoute[0] == 'ingredients') {

    // tous les ingredient +++++++++++++++++++++++++++++++++

    if (!isset($maRoute[1]) || ($maRoute[1] == 'toutes' || $maRoute[1] == '')) {
        include 'pages/ingredients/ingredients.php';
    } else if (is_numeric($maRoute[1])) {
        $id_ingredient_demande = $maRoute[1];


        if (
            $ingredient_trouve == true
            // && sizeof($ingredient_trouve) > 0
        ) {

            include 'pages/ingredients/une_ingredient.php';
        } else {
            include "./pages/erreur404.php";
        }
    } else {
        include 'pages/erreur404.php';
    }
} else {
    include 'pages/erreur404.php';
}
