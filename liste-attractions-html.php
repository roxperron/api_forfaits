<?php require_once 'controleurs/attractions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tableau des attractions</title>
</head>
<body>
</body>
</html>




<?php
        $controleurAttraction=new ControleurAttraction ;
        $controleurAttraction->afficherTableauAttractions();
    ?>
