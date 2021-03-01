<?php $this->titre = "Effectif"; ?>

<table>
    <thead>
        <tr>
            <td>type de licence</td>
            <td>Prenom</td>
            <td>Nom</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($effectifs as $effectif): ?>
             <tr>
                <td> <?= $this->nettoyer($effectif['typeLicence']) ?> </td>
                <td> <?= $this->nettoyer($effectif['prenom']) ?> </td>
                <td> <?= $this->nettoyer($effectif['nom']) ?> </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>