<?php

require_once './modeles/forfaits.php';



class ControleurForfait {


    function afficherTableauForfaits() {
        $forfaits = modele_forfait::ObtenirTous();
        require './vues/tableau_forfaits.php';
    }


    function afficherJSON() {
       $forfaits = modele_forfait::ObtenirTous();
       echo json_encode($forfaits);
    }


   function afficherFicheForfait() {
        if(isset($_GET["id"])) {
            $forfaits = modele_forfait::ObtenirUn($_GET["id"]);
            if($forfaits) {  
                require './vues/fiche_forfait.php';
            } else {
                $erreur = "Aucun produits trouvés.";
               
            }
        } else {
            $erreur = "L'identifiant (id) du produit à afficher est manquant dans l'url";
            
        }
    }



   function afficherFicheJSON($id) {
        $forfaits = modele_forfait::ObtenirUn($id);
        echo json_encode($forfaits);
    }



    function ajouterJSON($data) {
        $resultat = new stdClass();
            if(isset($data['code']) && isset($data['name']) && isset($data['description']) && isset($data['lodging_name']) && isset($data['lodging_description']) && isset($data['lodging_address']) && isset($data['lodging_city']) && isset($data['lodging_postalcode']) && isset($data['lodging_phonenumber']) && isset($data['lodging_email']) && isset($data['lodging_website']) && isset($data['dateStart']) && isset($data['dateEnd']) && isset($data['regular_price']) && isset($data['promotion_price']) && isset($data['premium'])) {
        $resultat->message = modele_forfait::ajouter($data['code'], $data['name'], $data['description'],  $data['lodging_name'],  $data['lodging_description'],  $data['lodging_address'],  $data['lodging_city'],  $data['lodging_postalcode'],  $data['lodging_phonenumber'],  $data['lodging_email'],  $data['lodging_website'],  $data['dateStart'],  $data['dateEnd'],  $data['regular_price'],  $data['promotion_price'], $data['premium']);
        } else {
            $resultat->message = "Impossible d'ajouter un forfait. Des informations sont manquantes";
        }
        echo json_encode($resultat);
    }   

    function modifierJSON($data) {
        $resultat = new stdClass();
        if(isset($_GET['id'])){
            if(isset($data['code']) && isset($data['name']) && isset($data['description']) && isset($data['lodging_name']) && isset($data['lodging_description']) && isset($data['lodging_address']) && isset($data['lodging_city']) && isset($data['lodging_postalcode']) && isset($data['lodging_phonenumber']) && isset($data['lodging_email']) && isset($data['lodging_website']) && isset($data['dateStart']) && isset($data['dateEnd']) && isset($data['regular_price']) && isset($data['promotion_price']) && isset($data['premium'])) {
            $resultat->message = modele_forfait::modifier($_GET['id'], $data['code'], $data['name'], $data['description'],  $data['lodging_name'],  $data['lodging_description'],  $data['lodging_address'],  $data['lodging_city'],  $data['lodging_postalcode'],  $data['lodging_phonenumber'],  $data['lodging_email'],  $data['lodging_website'],  $data['dateStart'],  $data['dateEnd'],  $data['regular_price'],  $data['promotion_price'], $data['premium']);
            } else {
                http_response_code(500);
                $resultat->message = "Impossible de modifier le forfait. Des informations sont manquantes";
            }
    } else {

        http_response_code(500); 
        $resultat->message = "ID manquant";
    } 



        echo json_encode($resultat);
        }



        function supprimerJSON() {
            $resultat = new stdClass();
            if(isset($_GET['id'])) {
                $resultat = modele_forfait::supprimer($_GET['id']);
            } else {
                http_response_code(500); 
                $resultat->message = "ID manquant";
            }  
            echo json_encode($resultat);
        }




}

?>