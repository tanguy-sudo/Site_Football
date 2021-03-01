<?php $this->titre = "Rencontre"; ?>

<table>
    <thead>
        <tr>
            <td>Catégorie</td>
            <td>Compétition</td>
            <td>Equipe</td>
            <td>Equipe adverse</td>
            <td>Date</td>
            <td>Heure</td>
            <td>Terrain</td>
            <td>Site</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rencontres as $rencontre): ?>
             <tr>
                <td> <?= $this->nettoyer($rencontre['categorie']) ?> </td>
                <td> <?= $this->nettoyer($rencontre['competition']) ?> </td>
                <td> <?= $this->nettoyer($rencontre['equipe']) ?> </td>
                <td> <?= $this->nettoyer($rencontre['equipeAdverse']) ?> </td>
                <!-- la date est au format EN je l'affiche au format FR -->
                <td> <?= implode('/', array_reverse(explode('-', $this->nettoyer($rencontre['date']) ))); ?> </td>
                <td> <?= $this->nettoyer($rencontre['heure']) ?> </td>
                <td> <?= $this->nettoyer($rencontre['terrain']) ?> </td>
                <td> <?= $this->nettoyer($rencontre['site']) ?> </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>