<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>  
        <th>Prix</th>        
        <th>Description</th>        
        
       
    </tr>

    <?php
        foreach ($attractions as $attraction) {
    ?>
        <tr>
            <td><?= $attraction->id ?></td>
            <td><?= $attraction->name ?></td>
            <td><?= $attraction->price ?></td>
            <td><?= $attraction->description ?></td>
       
        </tr>
    <?php
        }
    ?>
</table>