<?php $this->titre = "Rencontre"; ?>

<div class="row margin-row">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Catégorie</th>
            <th scope="col">Compétition</th>
            <th scope="col">Equipe</th>
            <th scope="col">Equipe adverse</th>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Terrain</th>
            <th scope="col">Site</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
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
                    <?php if(isset($_SESSION['valideConnexion']) && $_SESSION['valideConnexion'] == true && $_SESSION['type'] == "secretaire") : ?>
                        <form method="post" action="rencontre/modifRencontre">
                            <td> <input type="hidden" name="id" value="<?= $rencontre['id_rencontre'] ?>" /> </td>
                            <td> <input type="submit" value="modifier" /> </td>
                        </form> 
                        <form method="post" name="formSupprimerRencontre" action="rencontre/supprimer" onsubmit="return deleteRencontre()">
                            <td> <input type="hidden" name="id" value="<?= $rencontre['id_rencontre'] ?>" /> </td>
                            <td> <input type="submit" value="supprimer"/> </td>
                        </form> 
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>