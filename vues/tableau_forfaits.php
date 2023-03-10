<table>
    <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Nom</th>          
        <th>Description</th>        
        <th>Établissement</th>
        <th>Description</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Code postal</th>
        <th>Numéro de téléphone</th>
        <th>Courriel</th>
        <th>Site web</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Prix régulier</th>
        <th>Prix promotionel</th>
        <th>Prenium</th>
    </tr>

    <?php
        foreach ($forfaits as $forfait) {
    ?>
        <tr>
            <td><?= $forfait->id ?></td>
            <td><?= $forfait->code ?></td>
            <td><?= $forfait->name ?></td>
            <td><?= $forfait->description ?></td>
            <td><?= $forfait->name ?></td>
            <td><?= $forfait->description ?></td>
            <td><?= $forfait->address ?></td>
            <td><?= $forfait->city ?></td>
            <td><?= $forfait->postalcode ?></td>
            <td><?= $forfait->phonenumber ?></td>
            <td><?= $forfait->email ?></td>
            <td><?= $forfait->website ?></td>
            <td><?= $forfait->dateStart ?></td>
            <td><?= $forfait->dateEnd ?></td>
            <td><?= $forfait->regular_price ?></td>
            <td><?= $forfait->promotion_price ?></td>
            <td><?= $forfait->premium?></td>
        </tr>
    <?php
        }
    ?>
</table>