<?php 
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: POST, DELETE, PUT, OPTIONS");
    header('Access-Control-Allow-Headers: Content-Type');
    require_once './controleurs/forfaits.php';
    $controleurForfait = new ControleurForfait;

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': 
            if(isset($_GET['id'])){
                $controleurForfait->afficherFicheJSON($_GET['id']);
            } else {
                $controleurForfait->afficherJSON();
            }
            break;

        case 'POST': 
            $corpsJSON = file_get_contents('php://input');
            $data = json_decode($corpsJSON, TRUE);
            $controleurForfait->ajouterJSON($data);
            break;
        
        case 'PUT':
                $corpsJSON = file_get_contents('php://input');
                $data = json_decode($corpsJSON, TRUE);
                $controleurForfait->modifierJSON($data);
            break;
            
        case 'DELETE':
                $controleurForfait->supprimerJSON($_GET['id']);
            break;
            default;
    }

?>