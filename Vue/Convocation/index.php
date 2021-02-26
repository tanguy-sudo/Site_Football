<?php $this->titre = "Convocation"; ?>

<div class="row">
    <div class="col s12 m3"></div>
    <div class="col s12 m6">
        <form>
            <div class="input-field">
                <input type="text" class="datepicker" id="dateConv">  
                <label for="dateConv">Date de convocation</label>
            </div>
        </form>
    </div>
</div>

<table>
   <?php foreach($convocations as $convocation): ?>
        <tr>
            <td> <?= $this->nettoyer($convocation['competition']) ?> </td>
            <td> <?= $this->nettoyer($convocation['equipeAdverse']) ?> </td>
            <td> <?= $this->nettoyer($convocation['site']) ?> </td>
            <td> <?= $this->nettoyer($convocation['terrain']) ?> </td>
            <td> <?= $this->nettoyer($convocation['heure']) ?> </td>
            <td> <?= $this->nettoyer($convocation['messageRdv']) ?> </td>
            <td> <?= $this->nettoyer($convocation['equipe']) ?> </td>
            <td> <?= $this->nettoyer($convocation['id_convocation']) ?> </td>

            <?php foreach($effectifs as $effectif): ?>
                <?php 
                $a = $this->nettoyer($convocation['id_convocation']);
                $b = $this->nettoyer($effectif['id_convocation']);
                    if($a == $b ): 
                ?>
                    <td> <?= $this->nettoyer($effectif['prenom']) ?> </td>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>

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
