<?php $this->titre = "Absence"; ?>

<div class="row margin-row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Code de l'absence</th>
                <th scope="col">Date</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <?php if(isset($_SESSION['valideConnexion']) && $_SESSION['valideConnexion'] == true) : ?>
                    <th scope="col"></th>
                    <th scope="col"></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($absences as $absence): ?>
                <tr>
                    <td> <?= $this->nettoyer($absence['codeAbsence']) ?> </td>
                    <!-- la date est au format EN je l'affiche au format FR -->
                    <td> <?= implode('/', array_reverse(explode('-', $this->nettoyer($absence['date']) ))); ?> </td>
                    <td> <?= $this->nettoyer($absence['prenom']) ?> </td>
                    <td> <?= $this->nettoyer($absence['nom']) ?> </td>            
                    <?php if(isset($_SESSION['valideConnexion']) && $_SESSION['valideConnexion'] == true) : ?>
                        <form method="post" action="absence/supprimer">
                            <td> <input type="hidden" name="id" value="<?= $absence['id_absence'] ?>" /> </td>
                            <td> <input type="submit" value="supprimer" /> </td>
                        </form> 
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
