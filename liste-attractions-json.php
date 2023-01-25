<?php 
    header('Content-Type: application/json');
    require_once 'controleurs/attractions.php';
    $controleurAttraction = new ControleurAttraction;
    $controleurAttraction -> afficherJSON();
?>
