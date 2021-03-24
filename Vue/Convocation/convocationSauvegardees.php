<?php $this->titre = "Convocation"; ?>

<div class="row margin-row">
    <table class="table">
        <thead>
                <tr>
                    <th scope="col">date</th>
                    <th scope="col">equipe</th>
                    <th scope="col">competition</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
        </thead>
        <?php foreach ($convocations as $convocation): ?>
            <tbody>
                <tr>
                    <td> <?= implode('/', array_reverse(explode('-', $this->nettoyer($convocation['date']) ))); ?> </td>
                    <td><?= $this->nettoyer($convocation['equipe']); ?></td>
                    <td><?= $this->nettoyer($convocation['competition']); ?></td>
                    <form method="post" action="convocation/modifierConvocation">
                            <td> <input type="hidden" name="date" value="<?= $this->nettoyer($convocation['date']); ?>" /> </td>
                            <td> <input type="submit" value="modifier" /> </td>
                        </form> 
                    <form method="post" action="convocation/supprimer">
                            <td> <input type="hidden" name="id" value="<?= $this->nettoyer($convocation['id_convocation']); ?>" /> </td>
                            <td> <input type="submit" value="supprimer"/> </td>
                    </form> 
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
</div>