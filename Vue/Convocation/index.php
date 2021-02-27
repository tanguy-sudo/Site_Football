<?php $this->titre = "Convocation"; ?>

<div class="row">
    <div class="col s12 m3"></div>
    <div class="col s12 m6">
        <form method="post" action="convocation/index/">
            <div class="input-field">
                <input type="text" class="datepicker" id="dateConv" name="date">  
                <label for="dateConv">Date de convocation</label>
                <button class="btn waves-effect waves-light" type="submit" name="action">Valider</button>
            </div>
        </form>
    </div>
</div>
<div class="row">
        <?php foreach($convocations as $convocation): ?>
            <div class="col s4">
                <div class="card-panel grey lighten-5">
                    <table>
                        <tr><td>Compétition : </td><td> <?= $this->nettoyer($convocation['competition']) ?> </td></tr>
                        <tr><td>Equipe adverse :</td><td> <?= $this->nettoyer($convocation['equipeAdverse']) ?> </td></tr>
                        <tr><td>Site :</td><td> <?= $this->nettoyer($convocation['site']) ?> </td></tr>
                        <tr><td>Terrain : </td><td> <?= $this->nettoyer($convocation['terrain']) ?> </td></tr>
                        <tr><td>Heure : </td><td> <?= $this->nettoyer($convocation['heure']) ?> </td></tr>
                        <tr><td>Message : </td><td> <?= $this->nettoyer($convocation['messageRdv']) ?> </td></tr>
                        <tr><td>Equipe : </td><td> <?= $this->nettoyer($convocation['equipe']) ?> </td></tr>
                    
                        <tr><td colspan="2">Liste des joueurs :</td></tr>
                         <?php foreach($effectifs as $effectif): ?>
                                <?php 
                                $a = $this->nettoyer($convocation['id_convocation']);
                                $b = $this->nettoyer($effectif['id_convocation']);
                                    if($a == $b ): 
                                ?>
                                   <tr>
                                        <td> <?= $this->nettoyer($effectif['nom']) ?> </td>
                                        <td> <?= $this->nettoyer($effectif['prenom']) ?> </td>
                                   </tr>
                                    <?php endif; ?>
                        <?php endforeach; ?> 
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
</div>
<script >
    const Calender = document.querySelector('.datepicker');
    M.Datepicker.init(Calender,{
        format:'dd/mm/yyyy',
        i18n:{
            cancel:'ANNULER',
            done:'D\'ACCORD',
            months: [ 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' ],
		    monthsShort: [ 'Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec' ],
		    weekdays: [ 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi' ],
		    weekdaysShort: [ 'Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam' ],
		    weekdaysAbbrev: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ]
        }
    });
</script>
<style>
    .datepicker-date-display{
    background-color: #ee6e73;
}
button.btn-flat {
    color: #ee6e73;
}
</style>
