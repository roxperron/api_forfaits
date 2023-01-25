<?php

require_once './modeles/attractions.php';



class ControleurAttraction {


    function afficherTableauAttractions() {
        $attractions = modele_attraction::ObtenirTous();
        require './vues/tableau_attractions.php';
    }


    function afficherJSON() {
       $attractions = modele_attraction::ObtenirTous();
       echo json_encode($attractions);
    }


   



}

?>