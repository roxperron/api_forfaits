<?php 
    header('Content-Type: application/json');
    require_once 'controleurs/forfaits.php';
    $controleurForfait = new ControleurForfait;
    $controleurForfait -> afficherFicheJSON($_GET['id']);
?>