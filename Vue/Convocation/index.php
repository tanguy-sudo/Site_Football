<?php $this->titre = "Convocation"; ?>
<table>
    <?php foreach ($convocations as $convocation): ?>
        <tr>
            <td> <?= $this->nettoyer($convocation['categorie']) ?> </td>
            <td> <?= $this->nettoyer($convocation['competition']) ?> </td>
        </tr>
    <?php endforeach; ?>
</table>