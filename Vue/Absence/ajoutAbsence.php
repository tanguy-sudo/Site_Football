<?php $this->titre = "Absence"; ?>

<div class="row margin-row">
    <form class="row g-3" method="post" action="absence/valideAbsence">
        <div class="form-floating mb-3">
                    <select class="form-select" name="idEffectif" id="floatingSelect" required>
                        <?php foreach($effectifs as $effectif): ?>
                            <option value="<?= $this->nettoyer($effectif['id_effectif']) ?>"> <?= $this->nettoyer($effectif['prenom']).' '. $this->nettoyer($effectif['nom']); ?> </option>         
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Effectifs</label>
        </div>
       <!-- <div class="form-floating mb-3">-->
                <!--<input type="text" class="form-control date" id="dateConv" name="date" value="<p?= date('d/m/Y');?>" required />-->
                <!--<label for="dateConv">Date de convocation</label>-->
        <!--</div>-->
        <div class="form-floating mb-3">
            <input type="text" id="selectedValues" class="form-control date-values" id="dateConv" name="date" value="<?= date('d/m/Y');?>" required readonly/>
            <label for="dateConv">Date de convocation</label>
            <div style="width: 24%;margin:20px;">
                <div id="parent" class="container" style="display:none;">
                    <div class="row header-row">
                        <div class="col-xs previous">
                            <a id="previous" onclick="previous()">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="card-header month-selected col-sm" id="monthAndYear">
                        </div>
                        <div class="col-sm">
                            <select class="form-select col-xs-6" name="month" id="month" onchange="change()"></select>
                        </div>
                        <div class="col-sm">
                            <select class="form-select col-xs-6" name="year" id="year" onchange="change()"></select>
                        </div>
                        <div class="col-xs next">
                            <a id="next" onclick="next()">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <table id="calendar">
                        <thead>
                            <tr>
                                <th>D</th>
                                <th>L</th>
                                <th>M</th>
                                <th>M</th>
                                <th>J</th>
                                <th>V</th>
                                <th>S</th>
                            </tr>
                        </thead>
                        <tbody id="calendarBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect2" name="code" required>
                            <option value="Blessé">Blessé</option>
                            <option value="Suspendu">Suspendu</option>
                            <option value="Absent">Absent</option>         
                    </select>
                    <label for="floatingSelect2">Code absence</label>
        </div>
        <div class="mb-3">
            <button type="submit" name="ajoutAbs" class="btn btn-primary">valider</button>
        </div>
    </form>
</div> 

<?php

if(isset($_SESSION['errDate'])){ 
                echo"              
                <div id='myToast'>
                    <div class='d-flex justify-content-center'>    
                        <div class='toast-body'>
                            Veuillez indiqué une date
                        </div>
                    </div>
                </div>
                ";
                echo"<script> toastFunction(); </script>";
                unset($_SESSION['ajoutAb']);
}

?>