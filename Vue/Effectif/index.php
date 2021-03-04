<?php $this->titre = "Effectif"; ?>

<div class="row margin-row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">type de licence</td>
                <th scope="col">Prenom</td>
                <th scope="col">Nom</td>
                <th scope="col">Licencié</td>
                <?php if(isset($_SESSION['valideConnexion']) && $_SESSION['valideConnexion'] == true &&  $_SESSION['type'] == 'secretaire') : ?>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($effectifs as $effectif): ?>
                <tr>
                    <td> <?= $this->nettoyer($effectif['typeLicence']) ?> </td>
                    <td> <?= $this->nettoyer($effectif['prenom']) ?> </td>
                    <td> <?= $this->nettoyer($effectif['nom']) ?> </td>
                    <td> <?= $this->nettoyer($effectif['Licence']) ?> </td>
                    <?php if(isset($_SESSION['valideConnexion']) && $_SESSION['valideConnexion'] == true &&  $_SESSION['type'] == 'secretaire') : ?>
                        <form method="post" action="effectif/supprimer/">
                            <td> <input type="hidden" name="id" value="<?= $effectif['id_effectif'] ?>" /> </td>
                            <td> <input type="submit" value="Supprimer" /> </td>
                        </form> 
                        <?php if($this->nettoyer($effectif['Licence']) == 'non') : ?>
                            <form method="post" action="effectif/modifieLicence/">
                                <td> <input type="hidden" name="idE" value="<?= $effectif['id_effectif'] ?>" /> </td>
                                <td> <input type="submit" value="Devenir licencié" /> </td>
                            </form> 
                        <?php endif; ?>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>