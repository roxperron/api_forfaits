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
            if(
                isset($data['code']) 
                && isset($data['name']) 
                && isset($data['description']) 
                && isset($data['lodging']['name']) 
                && isset($data['lodging']['description'])
                && isset($data['lodging']['address'])
                && isset($data['lodging']['city'])
                && isset($data['lodging']['postalcode'])
                && isset($data['lodging']['phonenumber'])
                && isset($data['lodging']['email'])
                && isset($data['lodging']['website'])
                && isset($data['startdate']) 
                && isset($data['enddate']) 
                && isset($data['price']) 
                && isset($data['newprice']) 
                && isset($data['prenium'])) {
        $resultat->message = modele_forfait::ajouter(
            $data['code'], 
            $data['name'], 
            $data['description'],  
            $data['lodging']['name'], 
            $data['lodging']['description'],
            $data['lodging']['address'],
            $data['lodging']['city'],
            $data['lodging']['postalcode'],
            $data['lodging']['phonenumber'],
            $data['lodging']['email'],
            $data['lodging']['website'],
            $data['startdate'],  
            $data['enddate'],  
            $data['price'],  
            $data['newprice'], 
            $data['prenium']);
        } else {
            http_response_code(500); 
            $resultat->message = "Impossible d'ajouter un forfait. Des informations sont manquantes";
        }
        echo json_encode($resultat);
    }   

    function modifierJSON($data) {
        $resultat = new stdClass();
        if(isset($_GET['id'])){
            if(
            isset($data['code']) 
            && isset($data['name']) 
            && isset($data['description']) 
            && isset($data['lodging']['name']) 
            && isset($data['lodging']['description'])
            && isset($data['lodging']['address'])
            && isset($data['lodging']['city'])
            && isset($data['lodging']['postalcode'])
            && isset($data['lodging']['phonenumber'])
            && isset($data['lodging']['email'])
            && isset($data['lodging']['website'])
            && isset($data['startdate']) 
            && isset($data['enddate']) 
            && isset($data['price']) 
            && isset($data['newprice']) 
            && isset($data['prenium'])) {
                $resultat->message = modele_forfait::modifier
                    ($_GET['id'],
                    $data['code'], 
                    $data['name'], 
                    $data['description'],  
                    $data['lodging']['name'], 
                    $data['lodging']['description'],
                    $data['lodging']['address'],
                    $data['lodging']['city'],
                    $data['lodging']['postalcode'],
                    $data['lodging']['phonenumber'],
                    $data['lodging']['email'],
                    $data['lodging']['website'],
                    $data['startdate'],  
                    $data['enddate'],  
                    $data['price'],  
                    $data['newprice'], 
                    $data['prenium']);
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