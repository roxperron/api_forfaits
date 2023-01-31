<?php 
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    require_once './controleurs/attractions.php';
    $controleurAttraction = new ControleurAttraction;

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': 
            if(isset($_GET['id'])){
                $controleurAttraction->afficherFicheJSON($_GET['id']);
            } else {
                $controleurAttraction->afficherJSON();
            }
            break;

        default;
    }

?>